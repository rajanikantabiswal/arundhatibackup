<?php
/**Load adminstrator changes for Miniorange Gateway
 *
 * @package miniorange-otp-verification/helper
 */

namespace OTP\Helper;

use OTP\Traits\Instance;
use OTP\Helper\MoPHPSessions;
use OTP\Helper\FormSessionVars;
require_once ABSPATH . 'wp-admin/includes/upgrade.php';

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * This class has transaction reporting specific Contenet
 */
if ( ! class_exists( 'MoReporting' ) ) {
	/**
	 * MoReporting class
	 */
	class MoReporting {

		use Instance;

		/**Constructor
		 **/
		public function __construct() {
			if ( get_mo_option( 'is_mo_report_enabled' ) ) {
				$this->create_reporting_table();
				$this->check_and_migrate_table_structure();
			}
			add_filter( 'mo_start_reporting', array( $this, 'start_reporting' ), 1, 6 );
			add_filter( 'mo_update_reporting', array( $this, 'update_reporting' ), 1, 2 );
			add_action( 'admin_init', array( $this, 'routedata' ), 1 );
			add_action( 'wp_ajax_mo_generate_report', array( $this, 'mo_generate_report' ) );
			add_action( 'wp_ajax_nopriv_mo_generate_report', array( $this, 'mo_generate_report' ) );
			add_action( 'wp_ajax_mo_toggle_report', array( $this, 'mo_toggle_report' ) );
			add_action( 'wp_ajax_nopriv_mo_toggle_report', array( $this, 'mo_toggle_report' ) );
		}
		/**
		 * This function is to generate reporting.
		 */
		public function routedata() {
			if ( ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['_wpnonce'] ) ), 'mo_admin_actions' ) ) ) { // phpcs:ignore -- false positive.
				return;
			}
			$data = MoUtility::mo_sanitize_array( $_POST );

			if ( isset( $_POST['action'] ) && ( 'mo_download_report' === $data['action'] ) ) {
				$this->mo_download_report( $data );
			}
			if ( isset( $_POST['action'] ) && ( 'mo_delete_report' === $data['action'] ) ) { // phpcs:ignore -- false positive.
				$this->mo_delete_report( $data );
			}
		}
		/**
		 * This function is to enable/disable reporting.
		 */
		public function mo_toggle_report() {
			if ( ! check_ajax_referer( 'motogglereportnonce', 'security', false ) ) {
				return;
			}
			$data = MoUtility::mo_sanitize_array( $_POST );
			if ( isset( $data['mo_is_report_enabled'] ) ) {
				$is_report_enabled = intval( $data['mo_is_report_enabled'] );
				update_mo_option( 'is_mo_report_enabled', $is_report_enabled );
				wp_send_json_success();
			} else {
				wp_send_json_error( 'Invalid request' );
			}
		}
		/**
		 * This function is to generate reporting.
		 */
		public function mo_generate_report() {
			global $wpdb;
			if ( ! check_ajax_referer( 'generatereportnonce', 'security', false ) ) {
				return;
			}
			$data          = MoUtility::mo_sanitize_array( $_POST );
			$from_date     = $data['mo_from_date'];
			$to_date       = $data['mo_to_date'];
			$search_user   = $data['mo_user_key'];
			$req_type      = $data['mo_request_type'];
			$entries       = $this->get_entries( $from_date, $to_date, $search_user, $req_type );
			$mo_gmt_offset = get_mo_option( 'gmt_offset' );
			if ( 0 !== $mo_gmt_offset ) {
				$mo_timezone = $mo_gmt_offset > 0 ? 'UTC +' . $mo_gmt_offset : 'UTC ' . $mo_gmt_offset;
			} else {
				$mo_timezone = 'UTC';
			}
			if ( ! empty( $entries ) ) {
				$html = '<tr class="mo_report_table_heading">
								<th style="width: 12%;">Email/Phone</th>
								<th style="width: 20%;">Form Name</th>
								<th style="width: 15%;">Message Type</th>
								<th style="width: 10%;">Status</th>
								<th style="width: 10%;">IP Address</th>
								<th style="width: 13%;">Time<br>' . esc_html( $mo_timezone ) . '</th>
							</tr>';
				foreach ( $entries as $value ) {
					$form_name    = isset( $value['form_name'] ) && ! empty( $value['form_name'] )
						? sanitize_text_field( $value['form_name'] )
						: 'N/A';
					$ip_address   = isset( $value['ip_address'] ) && ! empty( $value['ip_address'] )
						? $value['ip_address']
						: 'N/A';
					$contact_info = ! empty( $value['phone'] ) ? $value['phone'] : $value['email'];

					$html .= '<tr class="mo_report_row">
								<td style="padding: 8px 12px; word-break: break-all; text-align: center;">' . esc_html( $contact_info ) . '</td>
								<td style="padding: 8px 12px; text-align: center;">' . esc_html( $form_name ) . '</td>
								<td style="padding: 8px 12px; text-align: center;">' . esc_html( $value['otp_type'] ) . '</td>
								<td style="padding: 8px 12px; text-align: center;">' . esc_html( $value['status'] ) . '</td>
								<td style="padding: 8px 12px; text-align: center;">' . esc_html( $ip_address ) . '</td>
								<td style="padding: 8px 12px; text-align: center; font-size: 0.9em;">' . esc_html( $value['time'] ) . '</td>
							</tr>';
				}
			} else {
				$html = '<tr class="mo_report_table_heading">
							<th style="width: 12%;">Email/Phone</th>
							<th style="width: 20%;">Form Name</th>
							<th style="width: 15%;">Message Type</th>
							<th style="width: 10%;">Status</th>
							<th style="width: 10%;">IP Address</th>
							<th style="width: 13%;">Time</th>
						</tr>
						<tr class="mo_report_row">
							<td colspan="6" style="text-align: center; padding: 2rem; color: #666;">No results found</td>
						</tr>';
			}
			wp_send_json(
				(
					MoUtility::create_json(
						$html,
						MoConstants::SUCCESS_JSON_TYPE
					)
				)
			);
		}
		/**
		 * This function is to download report.
		 *
		 * @param array $data - Data submitted by the user.
		 */
		public function mo_download_report( $data ) {
			global $wpdb;
			$from_date   = $data['mo_from_date'];
			$to_date     = $data['mo_to_date'];
			$statement   = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `{$wpdb->prefix}mo_reporting` WHERE time BETWEEN %s AND %s ORDER BY time DESC", array( $from_date, $to_date ) ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, Direct database call without caching detected -- DB Direct Query is necessary here.
			$wp_filename = 'transaction_report_' . gmdate( 'd-m-y' ) . '.csv';
			ob_end_clean();
			$wp_file = fopen( $wp_filename, 'w' );
			$array2  = array(
				'id'         => 'ID',
				'txID'       => 'txId',
				'phone'      => 'phone_number',
				'email'      => 'user_email',
				'form_name'  => 'form_name',
				'otp_type'   => 'otp_type',
				'status'     => 'status',
				'ip_address' => 'ip_address',
				'time'       => 'currentTime',
			);
			fputcsv( $wp_file, $array2 );

			foreach ( $statement as $value ) {
				$date  = strtotime( $value->{'time'} );
				$date2 = gmdate( 'd/M/Y h:i:s', $date );

				$data = array(
					'id'         => $value->{'id'},
					'txID'       => $value->{'txID'},
					'phone'      => $value->{'phone'},
					'email'      => $value->{'email'},
					'form_name'  => isset( $value->{'form_name'} ) ? $value->{'form_name'} : '',
					'otp_type'   => $value->{'otp_type'},
					'status'     => $value->{'status'},
					'ip_address' => isset( $value->{'ip_address'} ) ? $value->{'ip_address'} : 'N/A',
					'time'       => $date2,

				);

				fputcsv( $wp_file, $data );
			}

			fclose( $wp_file );

			header( 'Content-Description: File Transfer' );
			header( 'Content-Disposition: attachment; filename=' . $wp_filename );
			header( 'Content-Type: application/csv;' );
			readfile( $wp_filename );
			exit;
		}
		/**
		 * This function is to delete report.
		 *
		 * @param array $data - Data submitted by the user.
		 */
		public function mo_delete_report( $data ) {
			global $wpdb;
			$from_date = $data['mo_from_date'];
			$to_date   = $data['mo_to_date'];
			$db_name   = $wpdb->prefix . 'mo_reporting';
			$statement = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `{$wpdb->prefix}mo_reporting` WHERE time BETWEEN %s AND %s ORDER BY time DESC", array( $from_date, $to_date ) ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, Direct database call without caching detected -- DB Direct Query is necessary here.
			foreach ( $statement as $value ) {
				$wpdb->delete( $db_name, array( 'id' => $value->{'id'} ), array( '%d' ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, Direct database call without caching detected -- DB Direct Query is necessary here.
			}
		}

		/**
		 * Start the transaction auditing.
		 *
		 * @param string $tx_id - transaction id.
		 * @param string $user_email - email id.
		 * @param string $phone_number - phone number.
		 * @param string $otp_type - otp type.
		 * @param string $message - message.
		 * @param string $status - delivery status.
		 */
		public function start_reporting( $tx_id, $user_email, $phone_number, $otp_type, $message, $status ) {
			global $wpdb;
			$current_time = current_datetime()->format( 'Y-m-d H:i' );
			$otp_type     = strtoupper( $otp_type );
			$form_name    = $this->get_form_name_from_session();
			$db_name      = $wpdb->prefix . 'mo_reporting';
			$data         = array(
				'txID'      => $tx_id,
				'email'     => $user_email,
				'phone'     => $phone_number,
				'form_name' => $form_name,
				'otp_type'  => $otp_type,
				'time'      => $current_time,
				'status'    => $status,
			);
			if ( get_mo_option( 'reporting_table_migration_completed' ) ) {
				$data['ip_address'] = MoUtility::get_current_ip_address();
			}
			if ( get_mo_option( 'is_mo_report_enabled' ) ) {
				$this->insert_report( $db_name, $data );
			}
		}
		/**
		 * Update the transaction auditing.
		 *
		 * @param string $tx_id - transaction id.
		 * @param string $status - delivery status.
		 */
		public function update_reporting( $tx_id, $status ) {
			global $wpdb;
			$current_time = current_datetime()->format( 'Y-m-d H:i' );
			$db_name      = $wpdb->prefix . 'mo_reporting';
			$data         = array(
				'status' => $status,
				'time'   => $current_time,
			);
			if ( get_mo_option( 'reporting_table_migration_completed' ) ) {
				$data['ip_address'] = MoUtility::get_current_ip_address();
			}
			$tally_tx_id = array( 'txID' => $tx_id );
			if ( get_mo_option( 'is_mo_report_enabled' ) ) {
				$this->update_report( $db_name, $data, $tally_tx_id );
			}
		}

		/**
		 * Check and migrate table structure if needed.
		 */
		private function check_and_migrate_table_structure() {
			$table_migration_completed = get_mo_option( 'reporting_table_migration_completed' );

			if ( ! $table_migration_completed ) {
				$migration_result = $this->migrate_table_structure();
				if ( $migration_result ) {
					update_mo_option( 'reporting_table_migration_completed', true );
				}
			}
		}

		/**
		 * Migrate table structure to current version.
		 *
		 * @return bool - True if migration was successful
		 */
		private function migrate_table_structure() {
			global $wpdb;
			$table_name = $wpdb->prefix . 'mo_reporting';

			$table_exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Direct database call for table existence check.
			if ( ! $table_exists ) {
				return true;
			}

			$migration_success = true;
			$ip_column_exists  = $wpdb->get_var( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Direct database call for column existence check.
				$wpdb->prepare(
					"SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
					WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = 'ip_address'",
					DB_NAME,
					$table_name
				)
			);

			if ( 0 === (int) $ip_column_exists ) {
				$result = $wpdb->query( 'ALTER TABLE `' . esc_sql( $table_name ) . '` ADD COLUMN `ip_address` varchar(45) DEFAULT \'\' NOT NULL AFTER `time`' ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange -- Schema change necessary for IP tracking feature.
				if ( false === $result ) {
					$migration_success = false;
				}
			}

			$message_column_exists = $wpdb->get_var( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Direct database call for column existence check.
				$wpdb->prepare(
					"SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
					WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = 'message'",
					DB_NAME,
					$table_name
				)
			);

			if ( 0 !== (int) $message_column_exists ) {
				$result = $wpdb->query( 'ALTER TABLE `' . esc_sql( $table_name ) . '` DROP COLUMN `message`' ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange -- Schema change necessary for removing message column.
				if ( false === $result ) {
					$migration_success = false;
				}
			}
			$form_column_exists = $wpdb->get_var( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Direct database call for column existence check.
				$wpdb->prepare(
					"SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
					WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = 'form_name'",
					DB_NAME,
					$table_name
				)
			);

			if ( 0 === (int) $form_column_exists ) {
				$result = $wpdb->query( 'ALTER TABLE `' . esc_sql( $table_name ) . '` ADD COLUMN `form_name` varchar(100) DEFAULT \'\' NOT NULL AFTER `email`' ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange -- Schema change necessary for form_name tracking feature.
				if ( false === $result ) {
					$migration_success = false;
				}
			}

			// Check if otp_type column needs to be expanded from varchar(20) to varchar(100).
			$otp_type_column_info = $wpdb->get_var( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Direct database call for column type check.
				$wpdb->prepare(
					"SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS 
					WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = 'otp_type'",
					DB_NAME,
					$table_name
				)
			);

			if ( $otp_type_column_info && strpos( $otp_type_column_info, 'varchar(20)' ) !== false ) {
				$result = $wpdb->query( 'ALTER TABLE `' . esc_sql( $table_name ) . '` MODIFY COLUMN `otp_type` varchar(100) NOT NULL' ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange -- Schema change necessary for longer OTP types.
				if ( false === $result ) {
					$migration_success = false;
				}
			}

			return $migration_success;
		}

		/**
		 * Create transaction auditing table.
		 */
		public function create_reporting_table() {
			global $wpdb;
			$table_name   = $wpdb->prefix . 'mo_reporting';
			$table_exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Direct database call for table existence check.

			if ( $table_exists ) {
				return;
			}

			$mo_collate = $wpdb->get_charset_collate();

			$create_table = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}mo_reporting` (
		  id bigint(50) NOT NULL AUTO_INCREMENT,
		  txID varchar(255),
		  phone varchar(55) NOT NULL,
		  email varchar(255) NOT NULL,
		  form_name varchar(100) DEFAULT '' NOT NULL,
		  otp_type varchar(100) NOT NULL,
		  status varchar(55) DEFAULT '' NOT NULL,
		  time datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		  ip_address varchar(45) DEFAULT '' NOT NULL,
		  PRIMARY KEY  (id),
		  KEY idx_txid (txID),
		  KEY idx_time (time),
		  KEY idx_phone (phone),
		  KEY idx_email (email)
		) $mo_collate;";

			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $create_table );

			update_mo_option( 'reporting_table_migration_completed', true );
		}
		/**
		 * Insert into database with automatic cleanup of old entries.
		 *
		 * @param string $db - database table name.
		 * @param array  $data - data to insert.
		 * @return bool - True if successful, false otherwise
		 */
		public function insert_report( $db, $data ) {
			global $wpdb;
			$result = $wpdb->insert( $db, $data ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, Direct database call without caching detected -- DB Direct Query is necessary here.
			if ( false === $result ) {
				return false;
			}
			$this->cleanup_old_entries( $db );
			return true;
		}

		/**
		 * Cleanup entries older than 100 days to prevent table bloat.
		 *
		 * @param string $db - database table name.
		 * @return bool - True if cleanup was successful
		 */
		private function cleanup_old_entries( $db ) {
			global $wpdb;

			$cutoff_date = gmdate( 'Y-m-d H:i:s', strtotime( '-100 days' ) );

			$deleted_count = $wpdb->query( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Direct database call for cleanup operation.
				$wpdb->prepare(
					'DELETE FROM `' . esc_sql( $db ) . '` WHERE `time` < %s',
					$cutoff_date
				)
			);

			return false !== $deleted_count;
		}

		/**
		 * Update databse entries.
		 *
		 * @param string $db - database table name.
		 * @param array  $data - data to update.
		 * @param array  $tally_tx_id - transaction id for WHERE clause.
		 * @return bool - True if successful, false otherwise
		 */
		public function update_report( $db, $data, $tally_tx_id ) {
			global $wpdb;

			$result = $wpdb->update( $db, $data, $tally_tx_id ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, Direct database call without caching detected -- DB Direct Query is necessary here.
			if ( false === $result ) {
				return false;
			}
			return true;
		}
		/**
		 * Update databse entries.
		 *
		 * @param string $from_date - from date.
		 * @param string $to_date - to date.
		 * @param string $search_user - user.
		 * @param string $req_type - request type.
		 */
		public function get_entries( $from_date, $to_date, $search_user, $req_type ) {
			global $wpdb;
			$data_entries = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}mo_reporting WHERE time BETWEEN %s AND %s ORDER BY time DESC", $from_date, $to_date ), ARRAY_A );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, Direct database call without caching detected -- DB Direct Query is necessary here.

			if ( 'req_all' !== $req_type ) {
				foreach ( $data_entries as $key => $row ) {
					$row_otp_type = strtoupper( $row['otp_type'] );
					$filter_type  = strtoupper( $req_type );

					if ( 'NOTIFICATION' === $filter_type ) {
						if ( 'PHONE' === $row_otp_type || 'EMAIL' === $row_otp_type ) {
							unset( $data_entries[ $key ] );
						}
					} elseif ( $filter_type !== $row_otp_type ) {
						unset( $data_entries[ $key ] );
					}
				}
			}

			if ( ! empty( $search_user ) ) {
				foreach ( $data_entries as $key => $row ) {
					if ( $row['email'] !== $search_user ) {
						unset( $data_entries[ $key ] );
					}
				}
			}

			return $data_entries;
		}
		/**
		 * Get form name from session variables for reporting.
		 * Optimized version that directly gets the form name from session instead of using reflection.
		 *
		 * @return string Form name or empty string if not found.
		 */
		private function get_form_name_from_session() {
			$form_name = MoPHPSessions::get_session_var( 'current_form_name' );
			return $form_name;
		}
	}
}
