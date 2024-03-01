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
define('DB_NAME', 'Alcozer');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY', 'WJ14]}{/pUlIhc1D&AthC$(ysL6%3f}L<s]<Xz$Q&eP,6lG., NWFyb{_Aj!Ld/+');
define('SECURE_AUTH_KEY', 'sz_=7FN#tGP*21 ll0@N%*FIct3aHoq0~]H3?jh#PFw~OC(,T{QM{?9e(ZU?zZ?U');
define('LOGGED_IN_KEY', 'KR.0]c}fT{g8?o;>1UZ1pD:H]D|N`Pm{`|w}@kZK#45^5%<M#S_>_.d|EA1.cyV~');
define('NONCE_KEY', 'Kxgq Gnsf6h=$hXl@[fg:v.r_U-cWY~|+2xSLNcfc8ITMeB/3^tz]ZF3XJLhuPZ7');
define('AUTH_SALT', 'gQ*H}:6$Bk=BR _(]9rsz`^zC<u`2@z%~1+[wT&{g}&&n&lr:]>{&|_@zc?KeNW,');
define('SECURE_AUTH_SALT', 'Z%Pn;tCq#s`mUt_ )oE)dgs>j1NG}w:Ro5dXn:1i<}^TQP~OE5HrGpo?z!A)wi*:');
define('LOGGED_IN_SALT', 'I<hOc8rQ>Vd$CgWce@n>TY5N@=o&ua9&1<s?gZcE4)N>-DHJz ~0K}MNti$PVDo|');
define('NONCE_SALT', 'DxF&.0O,T2Le9Op3(<$|lj6*2-,-}c?#Fmx#UIzTGJ&85A7&WDf!Pi=,ZL=;Ug&]');

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
// define( 'WP_DEBUG', false );
define('WP_DEBUG', false);
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';



