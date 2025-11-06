<?php
define( 'WP_CACHE', true );

define( 'WP_MEMORY_LIMIT', '512M' );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'd0444488' );
/** Database username */
define( 'DB_USER', 'd0444488' );
/** Database password */
define( 'DB_PASSWORD', '6rt2TNB7vSVkuLiJCHkx' );
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
define( 'AUTH_KEY',         'A#_KN@evb7VPn<jZi$y+F2W:aJ.,.,m1lwyk4J8U0zOHDhNo7gMizNQH$&}i?VOZ' );
define( 'SECURE_AUTH_KEY',  'e+;}HB?56=mhN<f}V}:D/+Al:TdJQI6&#5w[Rny|mUeq?]yF><E.Zk#c*Zo!8(jg' );
define( 'LOGGED_IN_KEY',    '*R%2cag}:aSi).,ZM(C3b{[xcva*V?bf`5QTV6!^7v1iT)9&-lRF;Ga9dsOW*H`p' );
define( 'NONCE_KEY',        'FF#DEZ.|T}@p/fZU><P|&!9g(>lJlH1X6)<%$U:]d?;RZS!f0ORAc/7p87<[Z9{q' );
define( 'AUTH_SALT',        '73H&f4DHn8<(!VaTxVGhnM@aViH6Hi?GGv,5(cJO^0c5o[T;D;x}F5:K=!Xm5p?m' );
define( 'SECURE_AUTH_SALT', 'Ifh2DBk_1KXL)QUF+=/h-6D)_<lU+[8h|/q!af{YB}j(F2nnSGm4tOzM0#X%2@{V' );
define( 'LOGGED_IN_SALT',   'D,`R2qH7)pTAc:?(6}bWLrplk[QdkK01GZ2+Hai[0%r5*}9^P6)aA093gc2uun*)' );
define( 'NONCE_SALT',       'ih4srV-zhfFCsV6Ab/oH[<i8y9(Ydwj5WHCs7$$lOx}M}.y5uqC3DCZc>Nia!q*>' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix  = 'jq7qy_';
define( 'WP_POST_REVISIONS', 10 );
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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