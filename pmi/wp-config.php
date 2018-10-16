<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pmiaccount');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define(‘WP_MEMORY_LIMIT’, ’96M’);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'L` #o0wk:sR05!+s(vHHYx|zQk<jSQliICfZNUsib$+9B/q|Yo`W~KmnwRHcJEQI');
define('SECURE_AUTH_KEY',  '/!-15{Ja9M4Vw[=|^X; R|]TD?rr@/l<kZ[kC:~w4[Am)bEJ+T.q2{`=v;[Tam$u');
define('LOGGED_IN_KEY',    'Se=<#S[-)wI.t!MHiZf [o-YT)0@8{an<gsf~9,RVsu*+Rn,8J8y3M+DX?FDCMT8');
define('NONCE_KEY',        '0|(L55A`g5ya-%4b$p--4y>2@2T.<hLlLQ}{@Z,04,]Wuf4|V}^7|8n+NE^!]`8f');
define('AUTH_SALT',        'pa21x f%mN$nB-YA |;A.W)5)G0J)aA]Ov3J[(p^/=bP-Nw5Y^,m[w2x~$z<C:BY');
define('SECURE_AUTH_SALT', 'S$}=8R05=,50O68- eEoqE(#~fYT|s/}o,>H6j;A*kUzY5Z:(TbLcRFH&H8ZiXOT');
define('LOGGED_IN_SALT',   'i+=;)c`;FQ$b(-{9a3oGiuSIoy+S9hbip-(bYG{8&xajo2O86S*PGO]/((1#?UZJ');
define('NONCE_SALT',       'We N>!*ilCqAGGP fAZf^cCF(lar>wl9w^Yd` HwZ;!b;?g4ialy_;r&1LJ5U02C');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
