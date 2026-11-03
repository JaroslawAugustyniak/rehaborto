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
define( 'DB_NAME', 'rehaborto' );

/** Database username */
define( 'DB_USER', 'wp' );

/** Database password */
define( 'DB_PASSWORD', 'wp' );

/** Database hostname */
define( 'DB_HOST', 'mysql:3309' );

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
define( 'AUTH_KEY',          'BtT4%NOP`doa%yM =@mk[t7zJL8DZt7<p^{uvBn;Ki]%qziE8l&{P8V<s+b.| Q/' );
define( 'SECURE_AUTH_KEY',   'g+QweA,=xm%hT<:<68V?-|S*%w%?A!Z ALanG,>@&(_YK/DMDFMP&Wgj6m>4ddI?' );
define( 'LOGGED_IN_KEY',     'P `QK (%IZq;4Uh=eND<:sQ15]B@5^tPXT9@I%k`}DbU6:uMo j%-`&eje,y>IAJ' );
define( 'NONCE_KEY',         '{BW_A_e%@YVpZrvNA2MR(G}e]@jz gAj:_V}NRR!~a92DtS~<*Mo+jHG^~#c^#Mf' );
define( 'AUTH_SALT',         'Xz}N2;31]7/tZfBy`N/e{)V:ur19iR<EEoaY7QiSw,vv/78n!Ay0UqojYUqnx=CE' );
define( 'SECURE_AUTH_SALT',  '56gA*<(5bHmSC{onr87p2&Z{8*7B,bXK&Z(*(tQX{~4vokq sbHDQ4vX`Iq(h/Vx' );
define( 'LOGGED_IN_SALT',    'MFC]u*x;_CrK}j{rO>`a`&B^@WHHAZ$:S& Kl,Fs]%Cx#2r6KI=BtTxu4s{KW =R' );
define( 'NONCE_SALT',        'f/|OF!H)qFi342Nj+jwBxRJcYdv-BLUU-_3|^QM$9A9yU3+1F&6|GhDNO6T1bzhW' );
define( 'WP_CACHE_KEY_SALT', 'H69Xl{s,|U8b1OL>0PCNZ:,x^RMdM^R+Yx<2|LjY8]:if?NsBtoS*HmeI%2E/OY4' );


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
	define( 'WP_DEBUG', true );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
