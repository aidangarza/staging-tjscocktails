<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'disneyqu_wo6337');

/** MySQL database username */
define('DB_USER', 'disneyqu_wo6337');

/** MySQL database password */
define('DB_PASSWORD', 'YVbeJ2Qzft5E');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY', 'l/nE_&CovqMY]sIHZN%b(gtnGqjZlq)W(}W%SPBKe[gW^lkNEhM*{w}yjxiMt$Ig^%A-Uo!n&G|]scDwr)r&md![vH}EQ{IRp;;LDhEZPm>W(k!jp>j-QlyjaEM{q<xh');
define('SECURE_AUTH_KEY', 'gT{)fF!_HOkLu!w>F%lPVPaLRnCm{sVwAWag*EqZHO{X%*?)]eEJbu|OgHCW|*[l(fwVI-kuuO|T^l{dQ_{nJNay(g}W^i_P%u]}dQ|VyKtdG+(@GnxVfGgHvTAMj=o<');
define('LOGGED_IN_KEY', 'gt%jF<IQyvfW/L>_G;<xo@p|+yc;nkehlbX!w>{!cY;lQX$kM+$qTjoji{%>a>ieSNqu+hMLxWEc=n)mJ@]fLBOsm|<&@bmDgM&IvE@=^ff@M}HtHFgSxsxYZTZ%jM>!');
define('NONCE_KEY', 'R+=!uS^Ufa*cIe^Kc|[y]R@Rr|rqT(rIcUDG>>I}ifZV&jDgu=Z]slKoSPZ)um)Xb{$mYTco;)t-O=n[&Hb+pG@(F)_zl@yp]&JZJhonETZE|gMG!!*(akNmTufX*v*u');
define('AUTH_SALT', 'cm&mftX)fdGj$-qdhEaCX]W_tDNOllbdLcIbI?sZ@{=jYTeu^w)Ao;>K>EcIjKE<%c+c@RFCogjN];nUD^Rvng;oKACJFMcr^+TCfmgp/a+w-dQo{CzDAVfwLRY}i}dM');
define('SECURE_AUTH_SALT', 'DO[uTPx>O*=_XmgKN}^Tix)N(psZ}o^}@fvD;AinXGDKuTiH)Yn{&;-lA(!*oPmJ)!iqlkIF$ak$D_>j-SGZN|Gx$?wZ[P-nOn}|l[KsOZgJw(ZxdiGr/_gkjxrAcMAd');
define('LOGGED_IN_SALT', 'KRTH!TbutyXKCy@aQ{rvwvS{SIndmDqAymyK]FlAEKtS!_J?PSE?A+Mlo?a>pHg})KAil<V=rvx=xER-/^JaG;O?^>HKHgPlzG>hy-VA]Lnbr*D!lwc=^;g_Vs]B?hK%');
define('NONCE_SALT', 'tllVP@p/!+!&oDr/%QcZCgU<]eq+_gF%z]peLQw/ncqtXT}kcm=<IQ_qzO@yT-v!dHNGkJOiSfSl^trcWx+E^-fMAmbl^YvTQUSuM-Y@qCEydAZL$/bSIdT]W+=Jg?qW');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_rhbc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
