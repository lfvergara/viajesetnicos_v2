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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'viajesetnicos_v2' );

/** MySQL database username */
define( 'DB_USER', 'Naboo' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Dandoran.30' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'n{[~oyKoJTGybx]`0F])u_P$EpWj4[^F@SD%-9Lu[%MJ_/okT .[V=Z?fK+|{c=X' );
define( 'SECURE_AUTH_KEY',  'DM5C&0ES))g*h&P+9`UpRet=a!C=,xbD~!>g8ErZkd<x>&oG` OlR,6a^Dg0--S>' );
define( 'LOGGED_IN_KEY',    'zM*2ee$p/qUPf[)UxY^Sff ^-p=WkwKDNI.Zul#He$N1p1{=Y=HXMZ&! M*_Zd(}' );
define( 'NONCE_KEY',        'Q|i4IRH6hbBESA*8QE.|^+=^2k:N0^igt&~+/9iMxSl:MMV]q>7Q?6Uhz*3wnA!x' );
define( 'AUTH_SALT',        'n5E|Ohp+j2l;AEQ?F>tQ+KVOV?9-SOp(zK6$L<e7K6&krL2Hl@8_pZ28;)]]x6B*' );
define( 'SECURE_AUTH_SALT', 'cW(1X~dylc|3~wDP-;@t^3d}&Omdpui>+B-5J8tV-,rm)Umc d!W)[wD5GPt_H`]' );
define( 'LOGGED_IN_SALT',   '+un%m;YiRT;b9FH_->LtlX7~xBiIyH>6Sb2d&d0kyk!;F.64.6]ByVAyF$b9D~I9' );
define( 'NONCE_SALT',       '`X(2Wzrc;e#fE!9m5>0)w&]H(D,?dz3[68i!&B>JV0F<ULxYwRf2wtL%^{%A<IXy' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ps_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
