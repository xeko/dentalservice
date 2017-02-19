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
define('DB_NAME', 'stories');

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
define('AUTH_KEY',         'd%/<-61nV~ B,mMi_XNT19pNxHXJUttq@/9QcY6W5XwaQ.39wIo3 h[ ]+5fS( M');
define('SECURE_AUTH_KEY',  'Tl?,?OliM!h|<&S]n<V@xP>MN:!Md%RH:/zkU!#Fn>C?&aaPC)rWw{I?LdK92]6x');
define('LOGGED_IN_KEY',    '-D5[QOX+mwB~*h/ZnUp>boQE7FRGZ>ukzq)g#%2w{l@~5)st.hWWA}D7VB6JqOen');
define('NONCE_KEY',        'jfr9`#jR!Wb,vpq*$)Ij)c$K7%>f]{Ed[mO(1f4HB742sqpLtRw6w(kUgiVc>)})');
define('AUTH_SALT',        'WuBS7`5Ay]i,B]ddIm1?[,hO4ziDR6&*sPyQUidaD3[5gjY+.t^Zy{p]@d.Okr:b');
define('SECURE_AUTH_SALT', 'boa&!LX(cvwJ_eJvw#yaP~a[NCL,::_NF<NlM<uNLjoW;m.ae{vOyTFd<zS}m0qN');
define('LOGGED_IN_SALT',   'Df(jZ[= *z/!h~Vyj<druT4-[833nSRCsHyRuII4Iw4>cs3^RmC+e|uKk)t:587T');
define('NONCE_SALT',       '@4HpCOw8 }6)LT^fU<9Cy^PWj#T^/tO/7d.F w8|cG?(1evDXJei<`9}{~`$,k>g');

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