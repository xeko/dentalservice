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
define('DB_NAME', 'story');

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
define('AUTH_KEY',         'fj=y7qFiJ.d]tQ Q|kCL;?sX>O|P/hkJ-Fms^ivUDB;!4F^W$=]5wVPaicseKN5j');
define('SECURE_AUTH_KEY',  '38C95i$!GJX:jUiC.=KH8zSSQm8Rs2K%>8M)etk(jeSkP/d^;0%_0uoz F1J2x2e');
define('LOGGED_IN_KEY',    '7@D~7d5eT4W@s[!pG y>VRNz7Elq39^^~333Z1bPDA6C5Q^=YFMqwDLgQ8m&V:4D');
define('NONCE_KEY',        '4I`}_;leVvX6:%gDrOF148*q2(JwAQay11?/5TY*7*[JE=GA`,pDSHO2Gdm#r[ag');
define('AUTH_SALT',        '7oeWAOaR^M{b=?Ia}R0kW#:a/vk@T8Y)^C0g]#y_,wIzu;-7#R_:ixqWOnn@xx.X');
define('SECURE_AUTH_SALT', 'sD<rL;Ofc%y;&R$qDF)B{[BS^/(YV]{aY^G&l9p4|u;S4MsiXzs{w/[ A::CaC+I');
define('LOGGED_IN_SALT',   'f3G2SBN9T/=basH_Lx4^OL~n~VwnNX%d[SSj{qz.RlxPiIS<qpp&gl3Og~&fkDJ=');
define('NONCE_SALT',       'Y*b2<j19t #r[Um?,6H:]sbrjmLz72D[!9,W7Ns}5!|/qv>u<7|n<{<OVUP{$Mdg');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('FS_METHOD', 'direct');