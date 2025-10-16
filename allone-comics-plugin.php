<?php
/**
 * Plugin Name: Allone Comics Plugin
 * Plugin URI: https://github.com/anonymous-ng/allone-comics-plugin
 * Description: A WordPress plugin for managing comics and webtoons, complete with series, collections, and navigation options.
 * Version: 1.0.0
 * Author: anonymous-ng
 * Author URI: https://github.com/anonymous-ng
 * License: GPL2
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define constants.
define( 'ALLONE_COMICS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ALLONE_COMICS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include necessary files.
require_once ALLONE_COMICS_PLUGIN_DIR . 'includes/custom-post-types.php';
require_once ALLONE_COMICS_PLUGIN_DIR . 'includes/taxonomies.php';
require_once ALLONE_COMICS_PLUGIN_DIR . 'includes/template-loader.php';
require_once ALLONE_COMICS_PLUGIN_DIR . 'includes/shortcodes.php';
require_once ALLONE_COMICS_PLUGIN_DIR . 'includes/navigation.php';
require_once ALLONE_COMICS_PLUGIN_DIR . 'includes/admin-meta-boxes.php';

// Activation hook.
register_activation_hook( __FILE__, 'allone_comics_activate_plugin' );
function allone_comics_activate_plugin() {
    // Flush rewrite rules on activation.
    allone_comics_register_post_types();
    flush_rewrite_rules();
}

// Deactivation hook.
register_deactivation_hook( __FILE__, 'allone_comics_deactivate_plugin' );
function allone_comics_deactivate_plugin() {
    // Flush rewrite rules on deactivation.
    flush_rewrite_rules();
}