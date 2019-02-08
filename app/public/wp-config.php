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
define('AUTH_KEY',         '28YAIoARuQ1NsS7dU05xOGtMBCwICHri6sCr8vhfGpurM5PTJP2WgFtg0HnSHhanWTOiLRyOL41HGNi7baKkjw==');
define('SECURE_AUTH_KEY',  '93JMrFh9AjqRj6ulWnlsm9v1aa9l7vI9sKCEOYTrabOHBfogDKqVdOX5ah5O+rR90kt8ntih+Nv68jLAlO1mOQ==');
define('LOGGED_IN_KEY',    'Y6LMsE7idNvA7A1nYjJMM9jT8YjnQbu+UHQsHoX7KJugzNi4auK4OZAT6MrnkMOp+31HvxiY//ruf7fGg+HYig==');
define('NONCE_KEY',        'CmhGQEkN7K46TWNQRKujHGpY2OtUXtUo7EbjAvmspeBB+PKthRhBXDg7Qopzyvs7FDPDXmxGm+rTsch/ELLZUA==');
define('AUTH_SALT',        'WsJmY7Kj2GOZiX76Tdf0V8UVmu1QzTE4a74uz6vTnfKbuAfMKdxLqyJAuNCe5MoOO7tHc6jvDMk4fO7N9nYKsA==');
define('SECURE_AUTH_SALT', 'J0qt2UjmiNA4+df80KKOl7vQPVpXn4pjJ2AKQZ5wq50UDERHSGz9fdv/iSAVmiCl8uOExAWDoeJr4riM9UkFKQ==');
define('LOGGED_IN_SALT',   'ax3YqvdrsVFmhXQJvI4Du0tN35K/edKoJRM36G5CBWpjhbq1EW4qbITJim5K1fDIXkL5+hd7I2KWfwM7lvDd9Q==');
define('NONCE_SALT',       '5ELgvRV9ZMEzLiM+hmdUF6SRoyI4d/62five+NHSr+/K91d2PAdmHu64FkF8VFGl6uJh/B6lLv7U1+q48gMa7Q==');

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
