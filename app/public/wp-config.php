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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'QTXE*)uKiK{Z#*[d~FH(n/nia/y|4#,I ML:eE?0-:5]iN>]Q4Mfn?&KO-aTL^1o' );
define( 'SECURE_AUTH_KEY',   'K_mquh-mts6L9?.!Tt:di6IUth~6&Iu@l~}lC]lM4sP9`UBN^cHSF>*/GP*Qvl ,' );
define( 'LOGGED_IN_KEY',     'lpQaBc,;X0!E4[E$i&ke 3v0/40)*yiJuJ!y4;bt4kr_s.#7XgAAEe_mUJP!2r*m' );
define( 'NONCE_KEY',         'z%)%Iwcr)zm5 sQ2RNOS/I,A8MmMdjTHm;NPm_m90tpg^5GV5GMo-TZV9:FA_)S-' );
define( 'AUTH_SALT',         '.gt#,d[:4n+(J~r@7C/},)gq;x6Wduzv5AZV#^OP?c15SJZT9Dv!4iG+<QkGy(Uo' );
define( 'SECURE_AUTH_SALT',  'rDP!H#8 R2tG5sLymS*)~{M`ZO?cuV?Q7+m%-p*An..*R ;dLbHga/i,p4[Z%f&:' );
define( 'LOGGED_IN_SALT',    'Njb98$#Vorur&T_n1#bAy$6RClJr=stm8p.!+mZ`/@WC1C{U%.^KuapGTd19ossy' );
define( 'NONCE_SALT',        'KrTVU!q{:)$~b):D?7VD0=SJqB}wcKgbnT`sy84*I6Rr7AjE,ZUc-^9;])(XIVS[' );
define( 'WP_CACHE_KEY_SALT', '6#,A_EA$g_QLjdHu<zKKE6rnQFW3H[vQi6 N{=qY*bMdid_]%Ye>=wdIQ<5OYOc)' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
