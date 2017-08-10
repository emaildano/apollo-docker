<?php

/**
 * APOLLO MODIFIED WP-CONFIG
 * =========================
 *
 */


/** Codebase Enviornment */
define("WP_ENV", "development");  // 'development', 'staging', or 'production'

/** Database */
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
$table_prefix = env('DB_PREFIX') ?: 'wp_';

/**
 * Salts - Via Composer Scripts
 * ----------------------------
 */
require_once( 'salts.php' );

/**
 * Enviornment based definitions
 * -----------------------------
 *
 * @since  0.1.0
 */
if ( WP_ENV === 'development' ) {

  define('SAVEQUERIES',  true);
  define('WP_DEBUG',     true);
  define('SCRIPT_DEBUG', true);

} else {

  /**
   * Add `?debug=true` to url to display errors in staging
   * or production enviornments
   *
   * @since  0.1.0
   */
  if ( isset( $_GET['debug'] ) && 'true' === $_GET['debug'] ) {

    define( 'WP_DEBUG',     true );
    define( 'SCRIPT_DEBUG', true );

  } else {

    ini_set( 'display_errors',    0 );
    define( 'WP_DEBUG_DISPLAY',   false );
    define( 'SCRIPT_DEBUG',       false );
    define( 'DISALLOW_FILE_EDIT', true );

  }

}


/**
 * Default WP Database definitions
 * -------------------------------
 *
 * @since  0.1.0
 */
$table_prefix = 'wp_';
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );
define( 'DB_PREFIX',  $table_prefix );



/** Start Apollo Config */

// Composer autoloads
require_once( __DIR__ . '/lib/vendor/autoload.php' ); // Composer autoloads

// Apollo settings & defs
require_once( 'lib/config/apollo-config.php' );

/** End Apollo Config */


/**
 * Absolute path to the WordPress directory.
 * -----------------------------------------
 * Setup for Apollo or Standard WP
 *
 * @since  0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  if ( ! defined( 'IS_APOLLO' ) ) {
    // Standard WP
    define('ABSPATH', dirname(__FILE__) . '/');
  } else {
    // Apollo WP
    define( 'ABSPATH', dirname(__FILE__) . '/wp/' );
  }
}

/**
 * Boot WP
 *
 */
require_once( ABSPATH . 'wp-settings.php');            // Boot WP
