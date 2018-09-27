<?php
/*
 * Plugin Name: Simple Docs
 * Description: Simple Plugin for adding editing docs to the WP Dashboard
 * Author: Benjamin Heller
 * Author URI: https://benjaminheller.net
 * Version: .6
 */

if ( !defined( 'ABSPATH' ) ) die();

require_once dirname( __FILE__ ) . '/class-simple_docs.php';
include_once dirname( __FILE__ ) . '/class-simple_docs_activator.php';
register_activation_hook( __FILE__, array( 'Simple_Docs_Activator', 'install' ) );


$simple_docs = new Simple_Docs();
$simple_docs->actions();
