<?php
/*
 * Plugin Name: Ben's Simple Docs
 * Description: A Simple plugin for adding editing docs to the WP Dashboard
 * Author: Benjamin Heller
 * Author URI: https://benjaminheller.net
 * Version: 0.6
 * text-domain: bens-simple-docs
 */

if ( !defined( 'ABSPATH' ) ) die();

if ( !class_exists( 'Simple_Docs' ) ) {

	require_once dirname( __FILE__ ) . '/class-simple-docs.php';
	include_once dirname( __FILE__ ) . '/class-simple-docs-activator.php';
	register_activation_hook( __FILE__, array( 'Simple_Docs_Activator', 'install' ) );


	$simple_docs = Simple_Docs::init();
	$simple_docs->run();
}

