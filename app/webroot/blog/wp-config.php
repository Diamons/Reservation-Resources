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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '58XDzz12%^');

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
define('AUTH_KEY',         '!#4${z1t,QmJ/a4|zFm#X;z@F-H5z)0OOM4ihu|5DD3eO;cfBdal;Z2v3^ln_-Ps');
define('SECURE_AUTH_KEY',  'DQQw0db<y3M;j&EMVO/<HvL+(|Xt-?Oq-E<ci,2.=I|xTx/V43<?wf)e6+Mn 9D]');
define('LOGGED_IN_KEY',    'hYkEBU4we-b`iFW^!i/YjbP+@C@c,:5r$sFt!cxs;mh{*|Q$bh7|*O06VC ZPo|)');
define('NONCE_KEY',        'H;`-*RB,6M%qP[>=Qx=.VJ 8*|q<yzy~P*z8~dH#*#X{r6i8V/y]GtpEkDx6M<3<');
define('AUTH_SALT',        'BC)N@?d+C^R^;_kg:()1`I>@?O&q<iT}&=B5f,o4|.pkW`r,8XI%E<k`pWqWLsUo');
define('SECURE_AUTH_SALT', 'Jw#TvuWW[8hpvwW<OGZ@hb:1>]Ea$b1-8baKi?Up=[oxc|LPnB|3F|*g]8t]|lde');
define('LOGGED_IN_SALT',   '6gHi?+<sx}jT_w]}.:b3.3|_@Kn9b1BIb+h3&5b<]Tzb#ce <FIP.1J-d8a<{}Fb');
define('NONCE_SALT',       '62&$_1Jx.EqXNAIBw|c.`=Y-7^-d,>4,4wj6u(R6{zi/-l}CDfQqQ/=O5ZBrJVb2');

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
define('WPLANG', '');

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
