<?php
/**
 * Plugin Name: MRS Elementor Addon
 * Description: Simple addons widgets for Elementor.
 * Version:     1.0.0
 * Author:      Abdullah Nahian
 * Author URI:  https://developers.elementor.com/
 * Text Domain: mrs-elementor-addon
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load widgets only if Elementor is active.
function mrs_register_elementor_widgets( $widgets_manager ) {
    require_once __DIR__ . '/widgets/blog-widget.php';
    require_once __DIR__ . '/widgets/slider-widget.php';

    // Make sure classes exist before registering
    if ( class_exists( '\Elementor_Blog_Widget' ) ) {
        $widgets_manager->register( new \Elementor_Blog_Widget() );
    }

    if ( class_exists( '\Elementor_Slider_Widget' ) ) {
        $widgets_manager->register( new \Elementor_Slider_Widget() );
    }
}
add_action( 'elementor/widgets/register', 'mrs_register_elementor_widgets' );

// Load styles/scripts for frontend
function mrs_enqueue_assets() {
    wp_enqueue_style(
        'mrs-elementor-style',
        plugin_dir_url( __FILE__ ) . 'assets/css/style.css',
        array(),
        '1.0.0',
        'all'
    );

    wp_enqueue_script(
        'mrs-elementor-script',
        plugin_dir_url( __FILE__ ) . 'assets/js/main.js',
        array( 'jquery' ),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'mrs_enqueue_assets' );
