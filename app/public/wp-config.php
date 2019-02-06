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
define('AUTH_KEY',         'om7j/hFeHVckIf83AibXa+/e+391PnA/8njmnVOURkSQZ2X6puOJI1aA0n88MfH7amcEdmBCy2sjIkxdTM1UVA==');
define('SECURE_AUTH_KEY',  'Hcl+Lll3apUSCn5LlS7h6cx7jVNuQq19BPGwnDscku8ZwbSYQIDKRcJI80irYnglC/Sirdc5c9DJ3hYqqpoqsg==');
define('LOGGED_IN_KEY',    'w3kDpjoylpq+eEdSytmF7HMvxYOc32gb2jIRD1Hz4yPBaMyV2rBWFzdf2tc8Ncz/FDD+zg4sPPikDXMcIFhlfw==');
define('NONCE_KEY',        'ZF5lmkqEZOg3krH4bxcrc59OIykmXxqsvLbso3HlU4u+webND0ZTIkWzi67yU6BTm0+kNgUXt/OtZwgUjTD7vw==');
define('AUTH_SALT',        'A98ligRW3kQjtDFHNzgA/lV7Pkf5vjb5/NmemHCYaHsLMz12EvBQz1RQZ9mVdOadf7ek7wZa1KvM+i2ITofibA==');
define('SECURE_AUTH_SALT', '+GVCYCTkOiAcYB0UgWz3klFbS+/2ZJIk5ynedNpvl6rD8KAl14AoeByZbZvCy0/P7xPsVGP6FvygL1z/trZM7Q==');
define('LOGGED_IN_SALT',   'az7P3DlOoMeXTX9tTTnrRE1KY2dPqcGWT4SdgJ1d3xY0j9pA2heWk9obE3PCTY3hmpa8T468kehJXmEBstA2Mg==');
define('NONCE_SALT',       'NrVBGDO3vEq62yFiXm6Q8RQPBP6iwFNJge4hbub6rlFdjOJX/WIA1Oj0PAg0b9lEt5kLChNmm34i/z9LKdixuA==');

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
