<?php
if ( !defined( 'ABSPATH' ) ) die();

/**
 * Class Simple_Docs
 */
Class Simple_Docs {

	/**
	 * @var null
	 */
	protected static $instance = null;


	/**
	 * @var string
	 */
	public static $table_name = 'simple_docs';

	public static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Woocommerce_Add_To_Quote();
		}

		return self::$instance;
	}


	/**
	 * load hooks
	 */
	public function run() {
		add_action( 'admin_menu', array( $this, 'add_page' ) );
	}

	/**
	 * add menu pages
	 */
	public function add_page() {
		add_dashboard_page( 'Documentation', 'Documentation', 'edit_posts', 'documentation', array( $this, 'documentation_page' ) );
		add_dashboard_page( 'Add Documentation', 'Add Documentation', 'manage_options', 'add_documentation', array( $this, 'add_documentation_page' ) );
		add_dashboard_page( 'Edit Documentation', 'Edit Documentation', 'manage_options', 'edit_documentation', array( $this, 'edit_documentation_page' ) );
	}

	/**
	 * Documentation Display callback
	 */
	public function documentation_page() {

		require dirname( __FILE__ ) . '/vendor/autoload.php';
		$parse = new Parsedown();

		global $wpdb;
		$docs = $wpdb->get_results( 'SELECT * FROM ' . self::$table_name );
		require_once 'views/documentation.php';
	}


	/**
	 * Add Documentation page callback
	 */
	public function add_documentation_page() {
		if ( isset( $_POST['name'] ) ) {
			global $wpdb;
			$name = $_POST['name'];
			$content = wp_unslash ( $_POST['content'] );

			$success = $wpdb->insert(
				self::$table_name,
				array(
					'name' => $name,
					'content' => $content
				),
				array(
					'%s',
					'%s'
				)
			);

			if ( $success === 1 ) {
				echo 'Documentation Added';
			} else {
				echo $success;
			}
		}

		require_once 'views/add-documentation.php';
	}

	/**
	 * Edit Documentation Page Callback
	 */
	public function edit_documentation_page() {
		global $wpdb;

		if ( isset( $_POST['doc'] ) ) {
			$doc = $wpdb->get_row( 'SELECT * FROM ' . self::$table_name . ' WHERE name = "' . $_POST['doc'] . '"');
			require_once 'views/edit-documentation.php';
		} else {
			if ( isset( $_POST['name'] ) ) {

				$name = $_POST['name'];
				$content = wp_unslash ( $_POST['content'] );
				$id = $_POST['id'];

				$success = $wpdb->update(
					self::$table_name,
					array(
						'name' => $name,
						'content' => $content
					),
					array(
						'ID' => $id
					),
					array(
						'%s',
						'%s'
					)
				);

				if ( $success === 1 ) {
					echo 'Document Updated';
				} else {
					echo $success;
				}

			}

			$docs = $wpdb->get_results( 'SELECT * FROM ' . self::$table_name );
			require_once 'views/choose-documentation.php';

		}

	}



}