<?php
/**
 * Plugin Name: MRS Elementor Addon
 * Description: Simple addons widgets for Elementor.
 * Version:     1.0.0
 * Author:      Abdullah Nahian
 * Author URI:  https://developers.elementor.com/
 * Text Domain: mrs-elementor-addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

function register_mrs_elementor_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/blog-widget.php' );
	require_once( __DIR__ . '/widgets/slider-widget.php' );

	$widgets_manager->register( new \Elementor_Blog_Widget() );
	$widgets_manager->register( new \Elementor_Slider_Widget() );

}
add_action( 'elementor/widgets/register', 'register_mrs_elementor_widget' );

function my_custom_theme_assets() {
    wp_enqueue_style('mrs-elementor-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
    wp_enqueue_script('mrs-elementor-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_custom_theme_assets');

