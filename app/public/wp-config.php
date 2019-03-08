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

// ** MySQL settings ** //

// if(file_exists(dirname(__FILE__) . '/local.php')){
// 	//Local database settings
// 	define( 'DB_NAME', 'local' );
// 	define( 'DB_USER', 'root' );
// 	define( 'DB_PASSWORD', 'root' );
// 	define( 'DB_HOST', 'localhost' );

// }else{
// 	//Live database settings
// 	define( 'DB_NAME', 'paulov12_universitydata' );
// 	define( 'DB_USER', 'paulov12_wp403' );
// 	define( 'DB_PASSWORD', 'paulo@1970' );
// 	define( 'DB_HOST', 'us235.siteground.us' );
// }

define( 'DB_NAME', 'local' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );



/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|~Olk+,rOzpM+T-) :;E(-z,ky@nMHc?|-nOG3V.>a8mP-Y-URi^Pv%I,/Eqv)wc');
define('SECURE_AUTH_KEY',  'o$A(BUGR?O@sA,tk/or-f,sI<!6ZQXPeo}nQM%7AkV}9nsF%>n9.ur>X=_(q|GL>');
define('LOGGED_IN_KEY',    'If~dXnv1^8=Q7PL^((ugBuTiAnzIv:#iS+)5KugKR!j0c<N#L.b+~yL/E+NjD )H');
define('NONCE_KEY',        ';`mJ8cS-cO``K>CtcHsk02,I1KZ|TZE#S@K{L:T,e//0zU%)Q7Cc31in8;_`{*+6');
define('AUTH_SALT',        '76==Q]9&V&-Uu,K]jpyeGGx.aFU]+.;FcD9S#RT`3y3DXf?fC9(<C-zNa-`o&wgu');
define('SECURE_AUTH_SALT', '6E8JFqG*+yrs= U_uE-(hn</j[=CR^pcI=5H|m+LG-=AILj:-tViBJ%64ol4OpV#');
define('LOGGED_IN_SALT',   '.q$|}w`/0t?_!F/T+uK!D76-GD%J**7mp,I~S{&x$|e;(Bpua%|F&H`dH0*z&|tF');
define('NONCE_SALT',       'z|,*/WY)T}qs`I$+_<1A~O?]c>EQK+pje K[&oKtaQ#N<@vhvO7V__H!gg6o#vsm');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
