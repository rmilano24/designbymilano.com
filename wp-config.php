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
define('DB_NAME', 'designbymilano');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'Q[K:jEA23q#XB)VAfq awqfhT%w{CrOGSQwUM.0SW5nmo(@gq!w{fd?I3ep%VGg?');
define('SECURE_AUTH_KEY',  'c]_T?jQB+7){^WmilSH#roxOPfT<D& W(R)m`&qmLTaxS}w5VxUu|z4JeM6b_5 }');
define('LOGGED_IN_KEY',    'FkMQA7a^g@o-|qL_S>gG:aSNsz`Xi?%+2(C$ca2C`BRIbbXu*HY}I%B<!85pPUy_');
define('NONCE_KEY',        ')p4PI)p{1KNav&)or|)gern3@Z$gWq||D@0sY_{sHe`}I?f*HLdSpvjMGB67@gJF');
define('AUTH_SALT',        'ey(x5V1(+/#L7dQ/#FuTQBXlee`eL5;9f>Zct4KE0C&j3&5t4O7$-_AXF&!7BQBL');
define('SECURE_AUTH_SALT', 'p?Z&~kDe{k1,X%a8#3lq[f_5qhVyrqHAlUMnYiqKbtCwpVd 2-ot77HtrNn83WQg');
define('LOGGED_IN_SALT',   'j$)^O)yEz~_eyq/!L;]!%5|be-U]_PEqW EBY`)bm(@<C/=d%+pb)CMtd)^4~;Bl');
define('NONCE_SALT',       'B{^ *H2i=W,q@3=Wse~[> MB%*ldJ@I9Ce@4=m?}kU1%Ni{LdIv:m0|M4]Zi;SEs');

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
