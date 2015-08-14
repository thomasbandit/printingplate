<?php
// =========================================
// Load Composer autoload for extra packages
// =========================================
require_once( dirname( dirname( dirname( __FILE__ ) ) ) . '/vendor/autoload.php' );

if( class_exists( 'Dotenv\Dotenv' ) ) {
  $dotenv = new Dotenv\Dotenv( dirname( dirname( dirname( __FILE__ ) ) ) );
  $dotenv->load();
}
else {
  die( "PrintingPlate needs vlucas/phpdotenv." );
}

// ===================================================
// Load database info and local development parameters
// ===================================================
if( isset( $_ENV['PP_ENV'] ) ) {

  define( 'DB_NAME', $_ENV['PP_DBNAME'] );
  define( 'DB_USER', $_ENV['PP_DBUSER'] );
  define( 'DB_PASSWORD', $_ENV['PP_DBPASS'] );
  define( 'DB_HOST', $_ENV['PP_DBHOST'] );

  define( 'WP_DEBUG', $_ENV['PP_DEBUG'] );
  define( 'SAVEQUERIES', $_ENV['PP_SAVEQUERIES'] );

  define( 'WP_HOME', $_ENV['PP_HOME'] );
  define( 'WP_SITEURL', $_ENV['PP_SITEURL'] ); // Please don't forget the /wp at the end!

  // ===========
  // Don't use automatic updates
  // ===========
  define( 'WP_AUTO_UPDATE_CORE', $_ENV['PP_AUTO_UPDATE_CORE'] );
  define( 'AUTOMATIC_UPDATER_DISABLED', $_ENV['PP_AUTOMATIC_UPDATER_DISABLED'] );

  // We won't be needing the theme editor
  define( 'DISALLOW_FILE_EDIT', $_ENV['PP_DISALLOW_FILE_EDIT'] );

}
else {

  // Environment definition is mandatory
  die( "Env config not found or PP_ENV not set." );
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );


// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Set by PrintingPlate init script,
// or grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY', 'ZVu,`vi9e[ZW<{UN$@P!:h#P@*=K1fN@$8G4}URg_;H$B2QXJQUOl!&yAr5j8*pw'); define('SECURE_AUTH_KEY', '<5MqH;IL#>|=Ss6rf;N{kSgYI,DaL?;HozBkefw+#Lx) EuK52-+>|6<2$4zUv8R'); define('LOGGED_IN_KEY', '_-Pa4}h :Txb}+3PpozH!=^Q*O)sjVubY/l&_9 S&zYk5UPcbg].=Mkb/2TRZQ#e'); define('NONCE_KEY', ';ra9uJ+(al5xEIR}+vQP}+ssuKu#1 SjQ8Zlu{Wc]kR-F[!t#x}jsw0?tl57dszO'); define('AUTH_SALT', 'd[xbV-Q~RtB*;9a0tenLjCne&7.IRroNoZnbRte:2iwgV=c`;pNVFtZ,Wo=j+>F-'); define('SECURE_AUTH_SALT', 'E[7FJI*~c2G^Ls%[+ZR^+WRJLb,G&?JT`CGU~}9R8uuK<TF9@Hf-+1? G1c[,{d1'); define('LOGGED_IN_SALT', 'Y6M] vxvCfdm1q7LH>X;>r06SL,,pD1TF*Q{DJf?F`k|lQ1A.mOH{>]w!lHyQ&o^'); define('NONCE_SALT', '/QvF+2cPRv#6=RkUWrx<C%c|W*0i8sZiBg4M/:o)WE@~+#aIpL6+hS8Fw=5vy(Fg');

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'pp_';

// ===========
// Miscellaneous settings
// =========== 
 

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
