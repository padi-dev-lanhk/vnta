<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nhvntjnj_padi_vnta' );

/** Database username */
define( 'DB_USER', 'nhvntjnj_paditech' );

/** Database password */
define( 'DB_PASSWORD', 'Paditech@123_' );

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
define( 'AUTH_KEY',         'soV qGa+_/^9cA +_<AfG*6lh%t// O; g~tL+:Azq=[m$+ihES3$Xf}q/F}+(56' );
define( 'SECURE_AUTH_KEY',  'cHr-7fEWw^cD<z~f@sW2m>IjX?R-T(9EZND+z80F5DsNc*G^_Tl:`UD4fX.@jhWd' );
define( 'LOGGED_IN_KEY',    '|`]K!nSRP4S4<n`C:H2$ Q8nJ1sN;Bch1K8nu=VG&EeWPpPc}:Qf&kK<Y, kGi&]' );
define( 'NONCE_KEY',        '!:gX|G:vQ3EnC39)^[]v91OgaTa`/u/kx:O%Ju-fR#:!~m3R{gPS{G+h[}-4p#5:' );
define( 'AUTH_SALT',        ']yy#hB4z/?9^`YPl$)@kIJX5u;f+BRVA7poM3s;{O4VF/<`*e_c.`M1.IznvV<5A' );
define( 'SECURE_AUTH_SALT', 'DcI:iqmFB=h;U.T_#y6+WDi8CzuL(#)gWnt88Lx)v[Q4(CM.IBQdy3>`C6VQ2<6@' );
define( 'LOGGED_IN_SALT',   '.J,{Y@$0Fv3:^i2gZ/3>,YAg_7dZ~SF?8DIV{V+WB#Zw)#AQ|ZND>;H%/e$RpRe2' );
define( 'NONCE_SALT',       '$b#sTAKt-B2tQ+S.Z1Y6e2;h>u_u|R!jy&9Y~Z1[Ag8{cM~SV&WgO0>Ed3BNI_SQ' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
//ini_set('display_errors','Off');
//ini_set('error_reporting', E_ALL );
//define('WP_DEBUG', false);
//define('WP_DEBUG_DISPLAY', false);
define( 'WP_DEBUG', true );


define( 'WP_DEBUG_LOG', true );


define( 'WP_DEBUG_DISPLAY', false );


@ini_set( 'display_errors', 0 );

define( 'WP_AUTO_UPDATE_CORE', false );
//Disable updating everything for WordPress
define( 'DISALLOW_FILE_MODS', true );
define( 'AUTOMATIC_UPDATER_DISABLED', true );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
