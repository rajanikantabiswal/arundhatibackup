<?php





/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u916366914_ajpl_backup');

/** Database username */
define('DB_USER', 'u916366914_ajpl_admin');

/** Database password */
define('DB_PASSWORD', 'Arundhati#2025');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EGubmer}wLhtwz^/~(XA $d>$2QUnGf?!voG>PCgT]F,_4^g=TD}dL4`Hp!13qQ7');
define('SECURE_AUTH_KEY',  '6i9k}H_OVfkpr`<h=a*#sBEW1u/8fvLPJ:e^?O5dzrR{JXFS1#i@^8+nTVr{<u3s');
define('LOGGED_IN_KEY',    '>%^[|)}hJ{pF^qEB>hZAZ{]?)*szfg5S}ELh`w4A Rln>X[CI d`q!(0f5w{X6c{');
define('NONCE_KEY',        'COyo|OOEt!Z2dQp78+0nZL?R:Ufdmx%: %-s?B(0v%>kyt49HY-ybc4=J@N+|c.5');
define('AUTH_SALT',        'hZGrk$&i4>x]BbyPJP/%kL ?(f0[W##.#<xXP(bSNfS/!T3 ]:p7*t):nS #,#EZ');
define('SECURE_AUTH_SALT', 'pgN^6+`mq_52z>rm^=.3}juabLn@%C_vrAvbbyVT.N_>iEKZ%3p/N%0|<L?}!D^g');
define('LOGGED_IN_SALT',   'Y4T~cd`I9M`H78jYU%wy2cZ&a:mezk.CZq,VmtAz[Z5IU]-oq P[X4{xNgAHg!pj');
define('NONCE_SALT',       '9D8~}oG0o;_>](^i64EI[ZNz^z1gHkCC%33}Nz`H s)-9Kpy$H<N3U!<Sp f5NbL');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */

/* Add any custom values between this line and the "stop editing" line. */

define('DISALLOW_FILE_EDIT', true);
define('CONCATENATE_SCRIPTS', false);




define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false); // Set to true if you want to show errors on screen
// @ini_set( 'display_errors', 0 );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
