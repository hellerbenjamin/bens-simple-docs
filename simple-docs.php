<?php
/*
 * Plugin Name: Ben's Simple Docs
 * Description: A Simple plugin for adding editing docs to the WP Dashboard
 * Author: Benjamin Heller
 * Author URI: https://benjaminheller.net
 * Version: .6
 * text-domain: bens-simple-docs
 */

if ( !defined( 'ABSPATH' ) ) die();

require_once dirname( __FILE__ ) . '/class-simple-docs.php';
include_once dirname( __FILE__ ) . '/class-simple-docs-activator.php';
register_activation_hook( __FILE__, array( 'Simple_Docs_Activator', 'install' ) );


$simple_docs = new Simple_Docs();
$simple_docs->actions();
