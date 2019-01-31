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
define('AUTH_KEY',         'Yg6HcGBC66Z7Rm7q/FXfBiL0WbIB0pn5HJ5J8KkjiGcBuNFxEe5cKMLZ1i9vv5v6kMOa2wGKJ3lMOiNzwdm6ow==');
define('SECURE_AUTH_KEY',  'hSzK7HWjh/t1+T5p9fueovgZcdZzRL50xLGR9ZoMr1qnNA1dwSYMJivlAEaOwGiQmZVFXOIPnyJTNm2sFKXJeA==');
define('LOGGED_IN_KEY',    'GpbUBiKs+7O13r2s3AIa0wYbkd5cZ+VzeLB/9OG5KRu7KOlL2y9u/hStDSx6qvunc0Mn9kJxhrCBuyBsRI5q5g==');
define('NONCE_KEY',        'WpEyDPYTIUS69u6aA6yDq5C1GJsvPZXo8rDzCS9Krf1TdawA/bJ4Kgqwq11oMcK4RTyKY6nOkJ/fCQFMrsr/DQ==');
define('AUTH_SALT',        'O4fnCcyviSpklx+mVerHHsL1V4zLRLwhZ03Kl559TeCnRUESxt6QbiDvoSzKJMXPVqSrYMf4AFJ4JdNEcRuzUQ==');
define('SECURE_AUTH_SALT', 'Vaqyrp8CRhrYqTnR4wg1W6WMwcm75DSqYiffDAPfAeZSJ+DPmVWAVkPBmet7cshj1MGsQlzATB4gtuK9wgE5Wg==');
define('LOGGED_IN_SALT',   '4tcsZKM4oblye06IMJk7uQCEOkokhB31N3myrPx9sxLAHXccPBi4Hq+EDQ3qiOaPTNrtxbA22TRSWKwOuWXugw==');
define('NONCE_SALT',       'qCr6mKB+JywOOP1WUBYP5+2fBoc9yFCagqpnZANthObGlcVVYT00zIssMJRgIIJCJyDI9Pb+s+lcTsrR7xGnmg==');

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
