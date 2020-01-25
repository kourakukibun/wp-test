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
define('AUTH_KEY',         'TaqRK2aFTqjq0oAshC6fhSHUUG4zxmAkEcS84T7qgtbRM7CBQZ3tQGikts4DRkOvuZ4HCWNt32DM3KM76VnxTw==');
define('SECURE_AUTH_KEY',  'QDe6V869qLQsnYgJTWw8Bh6Ej9xyE3e/htMbO0uU4nnnZtGqH/+8MRqwUgVslULZfNtZdDI7Cj/WyE3Wjuermw==');
define('LOGGED_IN_KEY',    'ffYBS24e0xMPeQrrJp6zKOfAtnNjP26T8DyWS4i8Be6Uvjlxwk7gzYbR4+4iQj12z44eVSTs2PbJWId8XVrcgA==');
define('NONCE_KEY',        'dseBVl/kIaWuvKWRcUeR+0t5hwnSYNQI40EQA7AVq/G2Xfgv4Dpf3Qb2Jqx33QN+tpLSDEpAyBURvhexVHw4MA==');
define('AUTH_SALT',        'tKrPbVGjX7Wx32mrazk5ZdhG/l3XpXxgffPgBJ1aoKNY+Z+z4vW71FEcjd+eA9GBC1U5PS8L4HJHQjY/5Hm3pA==');
define('SECURE_AUTH_SALT', 'TIi7R1ATFEktnLgg7gTkqVY+uq58iZKbOh+xeiVVHaX/9yU+FWJ+LGis+8fwX6zjn5Os/1imQDVyvHfVP7e3jQ==');
define('LOGGED_IN_SALT',   '4K3Q3gi/GvPfUZYoazlLt9oXxdgv1K5/p13OhCLnLQtREgZ4mlU9iosC4XH6bRejnDMdbP8np+peAefCWUeI0w==');
define('NONCE_SALT',       'qi+nHrc+FZ87qB1AmKsZRAdXLLpxFBZ1emppWnO9rcMyfVH+yZddZoXiwZgmXOcHbpPiAFuLXdIZ8XlXpW/6+Q==');

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
