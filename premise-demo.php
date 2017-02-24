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
	 * option name to use to retrieve data from db when using demo plugin
	 *
	 * @var string
	 */
	protected $opt_name = 'pwp_demo';




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
	 * require classes
	 */
	function __construct() {
			require 'includes/test/premise-test.php';
			require 'includes/test/class.form-test.php';
	}




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
		$demo_options = array(
			'title'      => 'Premise Demo Page',
			'menu_title' => 'Premise Demo',
			'capability' => 'manage_options',
			'menu_slug'  => 'premise_demo_page',
			'callback'   => array( $this, 'display_code' ),
			'icon'       => '',
			'position'   => '59.2',
		);

		new PWP_Admin_Page( $demo_options, '', $this->opt_name );

/**
 * First we create the fields that we want to add to our page
 *
 * @var array
 */
$theme_options = array(
	'action'      => 'options.php',
	'name_prefix' => 'our_options_name', // notice that by placing the 'name' attribute here we avoid having to do it for each field
	array(
		'type' => 'wp_media',
		'name' => '[theme-logo]',
		'label' => 'Logo',
		'preview' => true,
	),
	array(
		'type' => 'select',
		'name' => '[theme-layout]',
		'label' => 'Layout',
		'options' => array(
			'Boxed' => 'boxed',
			'Full Width' => 'full-width',
		),
	),
	array(
		'type' => 'textarea',
		'name' => '[theme-copyright]',
		'label' => 'Copyright',
	),
	array( 'type' => 'submit' ),
);

/**
 * Title: Theme Options
 * Fields: $theme_options
 * Option Names: same as name attribute for fields
 */
// new PWP_Admin_Page( 'Theme Options', $theme_options, $theme_options['name_prefix'] );
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
		echo '<h1>Premise Demo Page</h1>
		<div class="span10">';


			// test a form with all possible fields.
			// pass your own arguments if you'd like.
			// new PWP_Demo_Form();

			// Premise_test::fields();
			// Premise_test::fields_hooks();
			// Premise_test::fields_demo();
			// Premise_test::videos_embed();
			// Premise_test::fields_duplicate();
			// Premise_test::google_map();
			Premise_test::grids();

		echo '</div>';
	}
}