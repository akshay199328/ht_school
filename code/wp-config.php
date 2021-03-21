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
define( 'DB_NAME', 'htschools' );

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
define( 'AUTH_KEY',         'pI>{jA]wK`b^RUOB)x4GEUJ)ss-zNNLpc:h(-CMcm+HC4u~^G-MLjT+=R>@?nNCu' );
define( 'SECURE_AUTH_KEY',  ')yL)P`=^M`4EQ~:|kbxg99X_No*/DaKAv$i<i5@=GB-d8lp,.W90(#Dr407pV!,R' );
define( 'LOGGED_IN_KEY',    '0G[@qnoW?8TR|qzeQ&vb*@-!J)3c?Z<F6FKnF?Akx~2/mCNjSc%,[LS{6_%>!@}.' );
define( 'NONCE_KEY',        '+;N1Qj,+dvZ8o-M)*vf~{@lhQw#gbC)C8mo&%hE07!%1WWEsHx<tCMKH.W_uRMdD' );
define( 'AUTH_SALT',        'T#d(EwN0B5._J!w01z[LQ?Fb*wP^>U(m ;bNHd!&19FXF$cIUc6:v7B~ch{yI+ik' );
define( 'SECURE_AUTH_SALT', '<l(KKAo JLw0*YZRu=8l}Q$55?_ojoD<[*z+i7fr~<Jf-rMaXLpE@Q%O9:5z;k;O' );
define( 'LOGGED_IN_SALT',   'L/A?|sA{^jeK(@Z*Y|P`#@JC5=] IS0G2p8+zP#s9lTL*z(gON6=4pC3zXgHy%jJ' );
define( 'NONCE_SALT',       'jD.3CsLLsT1D7GW^Uml-megjJH|mT34lFPD_z4fprLZ{S;)rUpVp:g+=+/T3W^}t' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ht_';

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
