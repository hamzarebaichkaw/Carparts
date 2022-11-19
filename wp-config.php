<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'EPartsDB' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9&9X9l>kjO@Wwv4sM6VA>t7%dJ-=+?BrPM5 wTCT|pw=RvgBW+ewDmAjWw)<eF(N' );
define( 'SECURE_AUTH_KEY',  'eem*i;8IOXd|vRH&,HRB5hZEL@=: V?MuD|o0=lXI)FH)xnKUz1(Ghl+A@+t/N6m' );
define( 'LOGGED_IN_KEY',    '[L2Imx%1USGW5 WD )qkdq)#KHO-4YY-ypugaprV$CNc;RE;W?-Q~>;3_inI~Qmk' );
define( 'NONCE_KEY',        'Z1.nL]&&$GbB;c0t eGThjwu`}S^W3?D-a1kxKV-BeSlk/q7~g0nCphVW>QRzFPo' );
define( 'AUTH_SALT',        'v#+5|fVJdRFE!J:dK=Q;eo`RUfx_UvQiMOE+e:XVWJBync*@^Tf2E[lCQL$*$Gf2' );
define( 'SECURE_AUTH_SALT', 'C!R&x+d*I||wt=UXUrBU]2<:#g@T4eQtWuwyGLMT@gWF*bxr0SAsB11$ G2>-|J,' );
define( 'LOGGED_IN_SALT',   '/XxQ%IE*bOZ)P .t<sC@xl@a~8v??#JGgC.OJzsnClIn0wN3IrZ^>{[[KZ`PIvC3' );
define( 'NONCE_SALT',       '4gh2?[The,SF&X!1#0XU2X.=1hY{G_d9vH}<+J2F$fGLlY[]Pb*~E;!%&]:L|uW)' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
