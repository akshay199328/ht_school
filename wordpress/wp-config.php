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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'F}V^AgP6FU44Fk1<]<G-*L#zP2Y 3Rw@uJQOU?DQnw+~GT<USHY4,0DkBpe aRzF' );
define( 'SECURE_AUTH_KEY',  '>Hmf}7[P> Z${h8kns,3PZ*v@lxvY697prEO]JH.iOo1dELPQlkD44C6CSa46$!?' );
define( 'LOGGED_IN_KEY',    '9at/ucFpqW+|x;}dQr4< }Q><Wn%R<-uJ(E`B_dnRY.pP?X1susil8lyk]}vl`;*' );
define( 'NONCE_KEY',        'Y2Lq}kk<fZgto^F8l5F+zmVDz%Rw]RDS)5F`0*7P>T}GC5.{3-^qt`n1_d[D|Lt/' );
define( 'AUTH_SALT',        'O[|A,+HY@T_0]lz3+8AiXyO*&e#T~uCBRx/OZVAWL1:Da?.i+jCt4v7|DTf|d6@6' );
define( 'SECURE_AUTH_SALT', '4Q7I+q(fvC]BB:8(E*6|Z|@r0=x#x+~TLowDchN?x{^2dqEhE7?MAKQR;Bi<Fl}6' );
define( 'LOGGED_IN_SALT',   '%fe*W&7ueZ<eJ| HE4RAbU$>SsZU;,OyI``YXfM$+JeZ+qLs02-Q[*gbBhCQ,O@Y' );
define( 'NONCE_SALT',       'of7/x[!o58PQM7&/ZfXajEqbUCUcHs$k%n*M<DZ J8Z]0nQ}B1tcFE2(QUR &tt&' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
