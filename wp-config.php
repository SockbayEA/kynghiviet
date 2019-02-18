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



// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define('DB_NAME', 'kynghiviet_demo');



/** MySQL database username */

define('DB_USER', 'kynghiviet_demo');



/** MySQL database password */

define('DB_PASSWORD', '6bpkDq9l');



/** MySQL hostname */

define('DB_HOST', 'localhost');



/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8mb4');



/** The Database Collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');



/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         'f2p[]~Ma=P@:Ti,Cjc20KG4kG,S]g3OuN;;-2*PWpVDTn[jsfV2w7GtH.Y*U_+nY');

define('SECURE_AUTH_KEY',  'l@.qA*t+8{/M9ME2TPN$|;e$J#wkVyV*jTI=,)(fhq91l>dyy,C&UYVHnU9QCAe%');

define('LOGGED_IN_KEY',    'i%+g$GLaDg/@`8)f^|SKlau<wy*s/HcjWM3 RxOiyY=aW&A3LMJW{SZ?xhphr[2t');

define('NONCE_KEY',        'L.F<Yi%mQ55`[~DyP[C%g5<mR0=!BEgV#@#RH97G&@Xxp}NVTJD@R:WtlN>ZiXWn');

define('AUTH_SALT',        'fLWlN&}|be*9(rR8:(%!:n:}xK;~YmOKkUONA+H<,hIk$X+N, r {)Q(1dY0)L|v');

define('SECURE_AUTH_SALT', '!s&Q.Iw(z6@6][q(T.ytI*!bHk}eebrP^9wQdphNsqz5iA)hll6@mRy2ei&#NkJb');

define('LOGGED_IN_SALT',   'b>lgAZ/vX25{{Fn=A+v)W5^>gd#HE#Nvw%k-_8A]gxNj9NDs=/s^-LU3-&JcxU(u');

define('NONCE_SALT',       'i/g$QnI.[lRdO`DZdfOP7[M*||M)k`qVs/H^L=]h:}{4VZepDjAMyk]O%uws6[D;');



/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'wp_';



/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 *

 * For information on other constants that can be used for debugging,

 * visit the Codex.

 *

 * @link https://codex.wordpress.org/Debugging_in_WordPress

 */

define('WP_DEBUG', false);



/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

