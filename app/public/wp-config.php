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
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define('AUTH_KEY',         'cCgVRU85igem4PZnKvHeOls6eQO+hQhRk26B3Xi5oJIgqXlmtEh/kXOAZ2/5t7MDMeRlLVigCa8gA9iiazGggg==');
define('SECURE_AUTH_KEY',  '9LYp2puKq/AtLDPNurRzkm1MtJJy5Twdk4UFjGjAADMRHUWpB2SoSznWJsN2nFlQb9hodigV6+Z5u2MMsdD0tQ==');
define('LOGGED_IN_KEY',    'uUkLo6uYYVGfkDUd6f89bvaP68yrWstTqPRwYoCQzl5a1woMiOB23RTstHCKcJpNoyN+g6SeRB/GCch/4uz1yg==');
define('NONCE_KEY',        'omWYahHVrCp0e6DHqekTher/HBpFHS//z2gka58CI0r6NUuEdw3B8SuyapHbBJc5OQkzyHs1xRlwXtQ3Gii6GQ==');
define('AUTH_SALT',        'mswoMkLqoxcw44Cl/ez/Ron80WBvBeQusqNJb6GKZspP0IXScyPuSsS/OTvz0t8nSxKdebHlYbr5hbEBU4sm8Q==');
define('SECURE_AUTH_SALT', 'wjf8tyjX8WX7q/wogBUCyJh+bX9SP9gn/YgQDiprRPyp1CqfrdDipfklb8Rm8Ufu0WmUdvxFspjnFmSV3LdPEA==');
define('LOGGED_IN_SALT',   'm8qf09t1OZXl8k7LOFE/5P0LJABiqCZxrUuFccBsXhEv852TALdmf4Hra/HNuIDJEkao0LnpR4OTe0BZvE/sBA==');
define('NONCE_SALT',       'BarQ2HhGsrD4vw41tHtb9U/zni7l9ooDHZNOof6xnWAwQc2wU6wg/QGqUeKwghcna+CMAzFjFDitURBZJ6W7Hw==');

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
