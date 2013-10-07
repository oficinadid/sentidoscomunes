<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'plantit1_sc2013');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'michelle');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '!3rw%TR@ZZV$Ulg6g>;y0DW8UmL9oK*d-{Ao2]h72vnvQ^SLt[fs>:laaw{$YB_$');
define('SECURE_AUTH_KEY',  '|(hAGGw%XijF).4%1SDo-N!Lwtvay+]m-Z8&t@Ah09KpVm_XOn7byZp|n^$]w6-b');
define('LOGGED_IN_KEY',    'Un*N-Ns9_Haya |uM_$&#p{f|gQ:6Cn$-98_ca mv/a[Vi(P;,1JrI57!XTg}d~R');
define('NONCE_KEY',        'F%i|Xq-r0*$vD;atJ4-=5|?7;(;0b&kEGNI.:@T7=vCK#.^a}4@Vwx%+4N!<a2tL');
define('AUTH_SALT',        'U:MPnUV8i]E+).=2kXVD~1gQ]U%%f.x+n|Vj?[mKIl$j#i(l-j{7D.GE]-ej85PA');
define('SECURE_AUTH_SALT', 'G&;8y3|0[bMAE`kwQS=RD1-J8:RZ;R@pnO^~B=d> I  CnNOvZ|%i?WV)ZOu6)z9');
define('LOGGED_IN_SALT',   '<A^Bo%6Q(>mmU+XF&nbT5-.C=fkfp?9kqIIY8_NyWuUU3QsH-]vM;Nw]#sACSk/l');
define('NONCE_SALT',       'Pu1ZEe:uf#C=k[&-0aDQuy2UAT*eH4p1 pO.*3tX8=oW3!rXw:b=V*Y+[`gtPoU7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'es_ES');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
