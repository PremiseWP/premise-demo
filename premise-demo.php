<?php
/**
 * Plugin Name: Premise Demo
 * Plugin URI:  http://premise.dev
 * Description: Use this plugin as a start for your new project or simply an easy way to try out Premise WP
 * Version:     1.0.0
 * Author:      Mario Vallejo
 * Author URI:  http://premisewp.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Premise Demo
 */

// Block direct access to this file.
defined( 'ABSPATH' ) or die();



/**
 * Require Premise WP
 */
include 'includes/require-premise-wp.php';




/**
 * Start our plugin
 */
add_action( 'plugins_loaded', array( Premise_Demo::get_instance(), 'init' ) );

/**
 * The plugin's main class
 *
 * Loads our plugin and registers the plugin options page.
 *
 * @package Premise Demo
 */
class Premise_Demo {

	/**
	 * Plugin instance.
	 *
	 * @see get_instance()
	 *
	 * @var object
	 */
	protected static $instance = null;




	/**
	 * Access this plugin’s working instance
	 *
	 * @return  object instance of this class
	 */
	public static function get_instance() {
		null === self::$instance and self::$instance = new self;

		return self::$instance;
	}




	/**
	 * Intentionally left empty
	 */
	function __construct() {}




	/**
	 * Hook our page to be created on init
	 */
	public function init() {

		add_action( 'init', array( $this, 'new_page' ) );
	}



	/**
	 * Registsters the new page in the admin side for Premise Demo
	 * if the Premise_Options class is available.
	 */
	public function new_page() {
		if ( class_exists( 'Premise_options' ) ) {
			$demo_options = array(
				'title' => 'Premise Options Page',
				'menu_title' => 'Premise Options',
				'capability' => 'manage_options',
				'menu_slug' => 'premise_options_page',
				'call_back' => array( $this, 'display_code' ),
				'icon' => '',
				'position' => '59.2',
			);
			new Premise_options( $demo_options );
		}
	}




	/**
	 * Display the code
	 *
	 * This function is supposed to run the code you are testing.
	 * Place your code in here, your code should echo content or print something.
	 *
	 * @return string is supposed to echo the html content for the demo page
	 */
	public function display_code() {
		echo '<div class="wrap">';

			require 'includes/test/premise-test.php';

			// Premise_test::fields();
			// Premise_test::fields_hooks();
			// Premise_test::fields_demo();

			// Enter your code here..

		echo '</div>';
	}
}
