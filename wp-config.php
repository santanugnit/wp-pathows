<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pathos_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':<t5YN9!4{Tv,ZO<*QkNEB+UKR06>#:?bl`^RYB%,gK#W3zx94C%bLR&16W6YE!F');
define('SECURE_AUTH_KEY',  'oL9aPfC+/-u>Lx8HxN7&]R@@Q@$A_Q2]Ft: An`>7[}!DK=#y4K41?; WqGhcd-T');
define('LOGGED_IN_KEY',    'K]9l}tT0AMl+V*)8bE+Ye5yATQ=rDx$Y(,H>/}YpEK06LTJ/1%|3JH|JuLTZEH}h');
define('NONCE_KEY',        'O8hl|H(e|V=IqM>jeX9Ua>0h&W3>SRYJ??C<(pl6lCnr%c0J]D 2r&Vcn09N=+PQ');
define('AUTH_SALT',        '@9olOy9n~~?e=SD3)O3s*.!j00.L2:Fua9,@Y24^U!XUy%ZE=4VGTjP-`C^Q`5iS');
define('SECURE_AUTH_SALT', 'KDS gQ^).*v^}A.5k+@FuzFd?J)vGD ;1c6EM>SjRoucQg{*z=I&fWmtan?J%/rw');
define('LOGGED_IN_SALT',   'IkqT(9<j#O)9A.40Sm1Fpvsd4MHPW!/=c==hB}_,K^j[f4Hyt4^N 7^{w7m 7^4r');
define('NONCE_SALT',       'H`^R:fXt0?,Ihf<TcZyRDxfCy,C#G0cXRx%gn(hjne([-LhSG]LPPV_C}}!ii,(O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);



// Disable display of errors and warnings 
//define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
