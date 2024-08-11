<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'one' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

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
define( 'AUTH_KEY',         '),B8f`bz!;Td-ft?7I(Iu=|3S32ye>])H:TcOs`OFo}A$j%QW46<+7bY5jb^mZot' );
define( 'SECURE_AUTH_KEY',  'j~t2+oWAD$0x[yTq-RD<B)IDQdd;d`{kK{`FSL:uy%=Cj|dH4 A/M5OC<L<?*AT_' );
define( 'LOGGED_IN_KEY',    '$6Gf.G&J4W>1j*4 F{GW#pirn+ cmE82rsqH|zPga{%l4@d4DhIevbT6abq|uNla' );
define( 'NONCE_KEY',        'UWP(DrIW6LB=%`Nj}UoqDotf_sk@~pNc1$~E!$lVlWWUPaI!x@V}F.SspZ}h5:_}' );
define( 'AUTH_SALT',        '=xbvvu~vc1ka8UY^q+5g{Ush5_#m/(j<*V3jF.>e,P!U/PX@b&[JiLz]Z`%[A@xG' );
define( 'SECURE_AUTH_SALT', '4[x%lQ_$8<@U|WCMD0tT)F1X_oHAMl{pr#yk)u;sjWufjgczzO?wG@T}T+iQZ/LG' );
define( 'LOGGED_IN_SALT',   ',oI!Cq};K;jLEk>wwd^EtF^ao6Kt/BsMBS[p>bhYsIfRc$jHXl#q]%zXqtw&;Vnc' );
define( 'NONCE_SALT',       'qj3E:%J9LpRK}vnxY7E%As5Yi$C?e&U>NAP^-a7!p;7up/u1MgydpBGtJJCyEMa.' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
