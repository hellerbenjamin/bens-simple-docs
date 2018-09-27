<?php

class Simple_Docs_Activator {

	public static function install() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . Simple_Docs::$table_name;

		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				  id mediumint(9) NOT NULL AUTO_INCREMENT,
				  name tinytext NOT NULL,
				  content text NOT NULL,
				  PRIMARY KEY  (id)
				) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

}