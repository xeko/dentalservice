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
define('AUTH_KEY',         '_4Hp3 1/K{@e]J8xWzj<<~(H/5szAcjLn4g]*nAEf+i4Cgr$uf8X9@uH;iC`.Gv+');
define('SECURE_AUTH_KEY',  't1E*@&>@u[KWA,r:bHp@yUx]B%+Oc{II6!!v*iI8F/D6Akn|1>Ly$+V|Y1_9d6wC');
define('LOGGED_IN_KEY',    'q$}K^l>d~ua_v#bOLJUU%bW[6~@Gj61P]D!L$LNh(_M30Ju %vbZ=KB+AG72Lt0K');
define('NONCE_KEY',        '.J_VG{%=HD0&X)y ^xdy-to;hV.)S93X$ =hZuRtU?-ik80hPIU&G54/)YV9=7B6');
define('AUTH_SALT',        'cYpGFsE9hUb9;.M8mVN4O`8r[lpGwN(3umx)YcZ;rB75;4M7[bswISkkt,(u+lx5');
define('SECURE_AUTH_SALT', 'B{{ 6Sw}DE_[p%8k#7D(hlBaT:APK9F!>pt7V2<uTB3~cjF@AkYXA#[k@nNGI:`_');
define('LOGGED_IN_SALT',   'zNVjKm:ID1F(|{M(#W{h9a`s|#<?]~k$r*9*} N9!Z0^CMjSTf-!PLFuUiF=A.r6');
define('NONCE_SALT',       '|r/;J,NT$g($k[0_ion@zuEVML2{eJP*#9xMmP`4 iI.SA9-S|XoCrR.,N5Ab&1)');

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