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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '(s![MWxkEGl*NY^0b?BOYb@,NA#@Qx*&Cp{Z`m7CrB[wC@O%[:*N4kO[4>y>/>qy' );
define( 'SECURE_AUTH_KEY',  '1gq38kJ)noSpzYJTpoiq+%_Zr]eVYg`(CC;.HyKzg7P6KfG2R]>(/GYDt1O2pi,9' );
define( 'LOGGED_IN_KEY',    'Bloxz=aI0~p,}9&,FK/3>>gG9& rA6j&7vXV1lxCk?YSg2o:V8$/ln;TbzmpilPK' );
define( 'NONCE_KEY',        '=U]#32oseZd*C?7nFM^Ls{A{BWtHz>!61;^[GX3>A4G=7@D-~JS-6(?}C~oYNB5L' );
define( 'AUTH_SALT',        '(Mv;rqoeB6Nfn9*0SnAc{17ze2hg5z8gH].o2NKoq@2p{>@*DL%3mWAMa36+r8jc' );
define( 'SECURE_AUTH_SALT', 'ugPA$dFF6FZWSl^cp-l;HHG7][=wJ5J*!=Ce6;MUWB(+R^`5}qQ=J9cwv*9-G;QL' );
define( 'LOGGED_IN_SALT',   '?<SH;@?[30cf:(z A7OuCY/ZywTh+%#WV-Uwl_*@|-:}hFO>,B9AqY`~~w0J6zt$' );
define( 'NONCE_SALT',       ',2?mx@{}v<P$wn<X4rt.$ lXe!pd_&OiW(ZxH8@nVGV 2?c#5hCk0=vmPNuiW6}~' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
