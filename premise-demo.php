<?php
/*
Plugin Name: Premise Demo
Plugin URI:  http://premise.dev
Description: Use this plugin as a start for your new project or simply an easy way to try out Premise WP
Version:     1.0.0
Author:      Mario Vallejo
Author URI:  http://premisewp.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/




// Block direct access to this file.
defined( 'ABSPATH' ) or die();




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
     * Require premise and begin your code
     */
    public function init() {

        $this->require_premise_wp();

        # your code here..
    }




    public function require_premise_wp() {
        include 'includes/require-premise-wp.php';
    }

}

?>