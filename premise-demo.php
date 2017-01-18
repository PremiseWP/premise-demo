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
			require 'includes/test/class.user-fields.php';
	}




	/**
	 * Hook our page to be created on init
	 */
	public function init() {
		add_action( 'init', array( $this, 'new_page' ) );

		new PWP_Demo_User_fields( array(
			'title' => 'The fucking title',
			'description' => 'The description',
			'fields' => array(
				array(
					'type' => 'text',
					'name' => 'my_name',
					'context' => 'user',
					'label' => 'Test Field',
				),
			),
		), 'my_name' );

		$fields = array(
			array(
				'type' => 'text',
				'name' => '[text]',
				'context' => 'post',
			),
			array(
				'type' => 'textarea',
				'name' => '[textarea]',
				'context' => 'post',
			),
			array(
				'type' => 'wp_media',
				'name' => '[wp_media]',
				'context' => 'post',
			),
			array(
				'type' => 'fa_icon',
				'name' => '[wp_media]',
				'context' => 'post',
			),
		);

		// Test Meta Box
		$fields['name_prefix']  = 'tmb';
		pwp_add_metabox( 'Test Meta Box', array( 'post', 'page' ), $fields, $fields['name_prefix'] );
		// Test Meta Box 2 - only on posts
		$fields['name_prefix']  = 'tmb2';
		pwp_add_metabox( 'Test Meta Box 2', array( 'post' ), $fields, $fields['name_prefix'] );
		// Test Meta Box 3
		$fields['name_prefix']  = 'tmb3';
		$the_metabox = array(
			'id'            => 'tmb-id-3',
			'title'         => 'Test Meta Box 3',
			'callback'      => 'test_mb3_cb',
			'screen'        => array( 'post', 'page' ),
			'context'       => 'advanced',
			// 'priority'      => 'default',
			// 'callback_args' => '',
		);
		pwp_add_metabox( $the_metabox, '', '', $fields['name_prefix'] );
	}



	/**
	 * Registsters the new page in the admin side for Premise Demo
	 * if the Premise_Options class is available.
	 */
	public function new_page() {
		if ( class_exists( 'Premise_options' ) ) {

			$demo_options = array(
				'title'      => 'Premise Demo Page',
				'menu_title' => 'Premise Demo',
				'capability' => 'manage_options',
				'menu_slug'  => 'premise_demo_page',
				'callback'   => array( $this, 'display_code' ),
				'icon'       => '',
				'position'   => '59.2',
			);

			new Premise_options( $demo_options, '', $this->opt_name );
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



			// test a form with all possible fields.
			// pass your own arguments if you'd like.
			// new PWP_Demo_Form();

			// Premise_test::fields();
			// Premise_test::fields_hooks();
			// Premise_test::fields_demo();
			// Premise_test::videos_embed();
			// Premise_test::fields_duplicate();
			// Premise_test::google_map();
			// Premise_test::grids();

		echo '</div>';
	}
}


function test_mb3_cb( $p ) {
	?><pre>
		<? var_dump($p); ?>
	</pre><?
}