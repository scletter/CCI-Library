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
define('DB_NAME', 'cciwordpress');

/** MySQL database username */
define('DB_USER', 'cciwpadmin');

/** MySQL database password */
define('DB_PASSWORD', 'clown4kids');

/** MySQL hostname */
define('DB_HOST', 'mysql.caringclownsinternational.org');

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
define('AUTH_KEY',         ';@mvmy(ehnP|KBQ2d5VY2e@u)_{ktm<,*oYnDy>kRvfktvmDYAR^zw>Cs!h_W?r_');
define('SECURE_AUTH_KEY',  'J#Db]Zk%Y*m(/0=4dD#b,x&*`2A3Y3]2>*8[-PM|T/$)7`2_VwQke>|Uv(<>?2/J');
define('LOGGED_IN_KEY',    'cN#]x0V;L+&EIfUB%pk`xf[[48N4fLEe7X|`^H]d|~-1E8*yf@5s@]3oLG-F:v- ');
define('NONCE_KEY',        'zsjp]D(-b@Z_Cz%VCM/FF^D,wfG)[F$!_x;:nxCXm~5nBp0WHTfJ %3|q{NsICtG');
define('AUTH_SALT',        '$/MPsx7bIpetgssVAZKAjNJ<^aRIfUzm=eHg:|oGfkStSTNc%Je5n.WeHVr2BY0V');
define('SECURE_AUTH_SALT', 'n6:5lHI6-Gc8z/WLi1`Bv:879,um<ac~vr@-Ewe 9m$DaEC?IC+#<C]Jkp[8QG[#');
define('LOGGED_IN_SALT',   'O?y+z)d>Ms (E~@fC^5AG3/%8d51# 77k8W~-5-b`Dh>C/R$XW+EwD|+]O$%tqb{');
define('NONCE_SALT',       'ON]XI=7W 0bFgtd;67j[z*+s(i~?ccrU9+8e,}1+f6=vyN:#(g?L<>z`jBdm?oz[');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

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
?>