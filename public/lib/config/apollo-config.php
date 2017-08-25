<?php

/**
 * Setup root path directory
 * -------------------------
 *
 * @since  0.1.0
 */
$root_dir = dirname(dirname(__DIR__));


/**
 * Expose global env() function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
    $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL']);
}

/**
 * Apollo content directory defs
 * -----------------------------
 *
 * @since  0.1.0
 */
define ('CONTENT_DIR', '/app');
define ('WP_CONTENT_DIR', dirname( dirname( __DIR__ ) ) . CONTENT_DIR );
define ('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);
