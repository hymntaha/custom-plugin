<?php
/**
 * @package  plugin-x
 */
/*
Plugin Name: plugin-x
Description: custom plugin
Version: 1.0.0
Author: Taha Uygun
Text Domain: plugin-x
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( !class_exists( 'PluginX' ) ) {

	class PluginX
	{
		function register() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
		}

		protected function create_post_type() {
			add_action( 'init', array( $this, 'custom_post_type' ) );
		}

		function custom_post_type() {
			register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
		}

		function enqueue() {
			// enqueue all our scripts
			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
			wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
		}

		function activate() {
			require_once plugin_dir_path( __FILE__ ) . 'inc/plugin-x-activate.php';
			PluginXActivate::activate();
		}
	}

	$pluginX = new PluginX();
	$pluginX->register();

	// activation
	register_activation_hook( __FILE__, array( $pluginX, 'activate' ) );

	// deactivation
	require_once plugin_dir_path( __FILE__ ) . 'inc/plugin-x-deactivate.php';
	register_deactivation_hook( __FILE__, array( 'PluginXDeactivate', 'deactivate' ) );

}
