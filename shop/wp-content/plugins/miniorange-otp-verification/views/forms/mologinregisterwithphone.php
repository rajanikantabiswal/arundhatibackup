<?php
/**
 * Load admin view for Miniorange Login and Registration form.
 *
 * @package miniorange-otp-verification/views
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use OTP\Helper\MoConstants;
use OTP\Helper\MoMessages;
use OTP\Helper\MoUtility;

echo '	<div class="mo_otp_form" id="' . esc_attr( get_mo_class( $handler ) ) . '">
	        <input  type="checkbox" ' . esc_attr( $disabled ) . ' 
	                id="mo_login_registration_form" 
	                class="app_enable"  
	                data-toggle="mo_login_reg_options" 
	                name="mo_customer_validation_login_register_phone_enable" 
                    style="margin-right:10px;"
	                value="1" ' . esc_attr( $mo_login_registration ) . ' />
			<strong>' . esc_html( $form_name ) . '</strong>';

echo '     <div class="mo_registration_help_desc" id="mo_login_reg_options">
                    <div>
                        <p class="mo-title py-mo-2 mo-login-registration-shortcode">' . esc_html( mo_( 'Add this shortcode to the page where you want to show form: ' ) ) . '<b>[mo_otp_loginreg_form]</b></p>
                        <p> OR</p>
                        <p id="mo_create_new_page" class="mo-title py-mo-2">' . esc_html( mo_( 'Create a login/registration form with one click ' ) ) . ':
                        <a id="mo_create_new_page" class="mo_links mo_link_pointer">' . esc_html( mo_( 'Click here' ) ) . '</a></p>
                    </div>

                    <div class="w-full flex flex-col gap-mo-6">
                        <div class="flex">
                            <div style="width:50%">
                                <b>' . esc_html( mo_( 'Select User Role after Registration ' ) ) . ': </b>  
                            </div>
                            <div>
                                <select style="width:125%" name="mo_customer_validation_default_user_role" id="mo_default_user_role">';
								global $wp_roles;
								$selected = '';
foreach ( $wp_roles->roles as $key => $value ) {
	$selected = ( $key === $mo_default_user_role ) ? 'selected' : '';
	echo '<option ' . esc_attr( $selected ) . ' value="' . esc_attr( $key ) . '">' . esc_html( $value['name'] ) . '</option>';
}
							echo '</select>
                            </div>
                        </div>
                        
                        <div class="flex">
                            <div style="width:50%">
                                <b>' . esc_html( mo_( 'Select page to redirect to after Login & Registration ' ) ) . ': </b></div><div>';

								wp_dropdown_pages(
									array(
										'name'     => 'mo_login_reg_page_id',
										'selected' => esc_attr( $redirect_page_id ),
									)
								);
								echo '
                            </div>
                        </div>
                
                    <div>
                    <b>' . esc_html( mo_( ' Update Button Texts and CSS' ) ) . ':</b>
                    </div>
                    <div id="mo-login-reg-button-text-css-changes">
                    <div id="input-field-texts" class="pt-mo-4 flex" >
                        <div class="mr-mo-2">
                            <div class="mo-input-wrapper">
                                <label class="mo-input-label">' . esc_html( mo_( 'Login/Register Button Text' ) ) . '</label>
                                <input class=" mo-form-input" 
                                    placeholder="' . esc_html( mo_( 'Enter the Login button text' ) ) . '" 
                                    value="' . esc_attr( $button_text ) . '" 
                                    type="text" name="mo_customer_validation_mo_login_sendotp_button_text" >
                            </div>
                        </div>  
                        <div class="mr-mo-2">
                            <div class="mo-input-wrapper">
                                <label class="mo-input-label">' . esc_html( mo_( 'Enter OTP Field Text' ) ) . '</label>
                                <input class=" mo-form-input" 
                                    placeholder="' . esc_html( mo_( 'Enter the Enter OTP Field Text' ) ) . '" 
                                    value="' . esc_attr( $enter_otp_text ) . '" 
                                    type="text" name="mo_customer_validation_mo_login_enterotp_field_text" >
                            </div>
                        </div> 
                        <div class="mr-mo-2">
                            <div class="mo-input-wrapper">
                                <label class="mo-input-label">' . esc_html( mo_( 'Verify OTP Button Text' ) ) . '</label>
                                <input class=" mo-form-input" 
                                    placeholder="' . esc_html( mo_( 'Enter the verification button text' ) ) . '" 
                                    value="' . esc_attr( $verify_button_text ) . '" 
                                    type="text" name="mo_customer_validation_mo_login_verify_button_text" >
                            </div> 
                        </div> 
                    </div>

                    <div class="flex pt-mo-4 gap-mo-4">
                        <div class="mo-input-wrapper mr-mo-2">
                            <label class="mo-input-label">' . esc_html( mo_( 'Login/Register Button CSS' ) ) . '</label>
                            <input class=" mo-form-input w-full" 
                                placeholder="' . esc_html( mo_( 'Enter semicolon seperated CSS. Ex- color:black; background-color: white;' ) ) . '" 
                                value="' . esc_attr( $login_button_css ) . '" 
                                type="text" name="mo_customer_validation_mo_login_button_css" >
                        </div>
                        <div class="mo-input-wrapper mr-mo-2">
                            <label class="mo-input-label">' . esc_html( mo_( 'Verify OTP Button CSS' ) ) . '</label>
                            <input class=" mo-form-input w-full" 
                                placeholder="' . esc_html( mo_( 'Enter semicolon seperated CSS. Ex- color:black; background-color: white;' ) ) . '" 
                                value="' . esc_attr( $verify_button_css ) . '" 
                                type="text" name="mo_customer_validation_mo_verify_button_css" >
                        </div>
                    </div>
                </div>      

                        <div class="flex-1 mt-mo-4">
                            <input  type="checkbox" ' . esc_attr( $disabled ) . '
                            class="app_enable"
					        data-toggle="molr_sms_notification_template" 
                            name="mo_customer_validation_login_reg_send_note"
                            value="1" ' . esc_attr( $login_reg_send_note ) . ' />
                            <strong>
                                ' . esc_html( mo_( 'Send Notification to users Phone Number after registration' ) ) . '
                            </strong>';

								echo '
       
                            <div id="molr_sms_notification_template"  ' . esc_attr( $login_reg_send_note_hidden ) . ' class="w-full py-mo-4 pr-mo-4 ml-mo-4">
                                    <div>
                                        <label><b>' . esc_attr( mo_( 'Notification Template' ) ) . ':</b></label>';
									mo_draw_tooltip(
										esc_html( mo_( 'For Indian customers: ' ) ),
										wp_kses( mo_( "To modify SMS templates, first register them on the DLT portal. Learn about the registration process at <u><i><a href='https://plugins.miniorange.com/dlt-registration-process-for-sending-sms' target='_blank' >DLT Registration</a></i></u>. )" ), MoUtility::mo_allow_html_array() )
									);
									echo '
                                        <textarea ' . ( esc_attr( $disabled ) ) . ' 
                                        id="login_reg_notif_msg" 
                                        class="mo-textarea w-full mo_remaining_characters" 
                                        name="mo_customer_validation_login_reg_notif_msg"/>' . esc_html( mo_( $login_reg_new_account_sms_notif ) ) . '
                                    </textarea>
                                    <p class="pt-mo-3"><b>' . esc_html( mo_( 'Available Tags: ' ) ) . '</b>' . esc_html( mo_( '{site-name}, {username}, {password}, {user-id}' ) ) . '</p>
                                    </div>
                            </div>
                        </div>     
                    </div>
            </div>    
	    </div>';
