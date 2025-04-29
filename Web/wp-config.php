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
define( 'DB_NAME', 'modernfurniture' );

/** Database username */
define( 'DB_USER', 'Mateusz' );

/** Database password */
define( 'DB_PASSWORD', '21Mateusz21' );

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
define( 'AUTH_KEY',         'L^-jY{ )h#f7:EQ-!OZRY|[UP@[Ig6Y-Qw/>g+#d41CbJ)H3Q&xyhi5.Lp;#o=!4' );
define( 'SECURE_AUTH_KEY',  't6{|&YaG;~K^+MXLN-m6_<kD9`Z27Aw/1?l^{iJ6U*UyYSfWO%*1C DfD$w>|uEN' );
define( 'LOGGED_IN_KEY',    '!!0eY./IA2W0X.JV|Lh(?Sf2JDtXe116u|yuoZn43;&`nZv/fWPxoR[@Ty]vIN]{' );
define( 'NONCE_KEY',        '5ExR/7k-k%#s@{R;@e~66:$dqJiih(g=j?2+N>A:<=7Pwbx8mv_*y/s~D*)BIc^]' );
define( 'AUTH_SALT',        '<S:WDO+RMaZyZ3i|Sg)%mP}Kbr~JovdL@_*qg5=)1iN@@=Ut_>zYS|>[/p</a;l9' );
define( 'SECURE_AUTH_SALT', 'h9wC]IP+*Bk.$V!-A8RA^Ki%?,!_wMX{a:yZy#6~mA*bDRl,p`D|hxr>MsKmSLcO' );
define( 'LOGGED_IN_SALT',   'WTu%EHzoR~f*FzxBsLiX4CYNqIEZ`I.M/^QA;tC>lX=[+cWvhMy1-KRgn%w,Ko:d' );
define( 'NONCE_SALT',       ':g%UW|{oB.CEh(E*I#Z~B*JmA#9v-0HY!s&HeL=E}y3f%pu&fE@w?en)G=Jd*A;#' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'mf_';

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
define( 'WP_DEBUG', false );
//define( 'WP_DEBUG_DISPLAY', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
