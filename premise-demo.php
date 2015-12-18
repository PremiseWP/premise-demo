<?php
/*
Plugin Name: Premise Demo
Plugin URI:  http://premise.dev
Description: Plugin used to test and demo Premise WP
Version:     1.0.0
Author:      Mario Vallejo
Author URI:  http://premisewp.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/




/**
 * Start our plugin
 */
if ( is_admin() ) {
    new Premise_Demo();
}




/**
 * The plugin's main class
 *
 * Loads our plugin and registers the plugin options page.
 *
 * @package Premise Demo
 */
class Premise_Demo {

    /**
     * Display cntent before fields
     * 
     * @return [type] [description]
     */
    public function bef_fields() {

        // Write any code here to display before the fields.
        // This is very helpful if you just want to create your own
        // page, or just play with some code before adding to your
        // plugin. 
        // Also helpful to dump data and test it's being saved properly.

    }




    /**
     * Holds the title for this page
     *
     * Change this to change the page title.
     * use an array to have more control.
     * array(
     *     'post_type_name' => 'car_cpt',
     *     'singular' => 'Car',
     *     'plural' => 'Cars',
     *     'slug' => 'car-cpt',
     * )
     * 
     * @var array
     */
    public $title = 'Premise Demo';




    /**
     * Holds the fields to display on page
     *
     * Change these fields to display something else.
     * Display a hidden field if you want nothing to show
     * 
     * @var array
     */
    public $fields = array(
        array() // Every field goes int their own array
    );





    /**
     * registers hooks and filters needed for our plugin to run
     */
    function __construct() {

        add_filter( 'premise_options_before_fields', array( $this, 'bef_fields' ) );

        add_action( 'init', array( $this, 'init' ) );
    }




    /**
     * Instantiates Premise_Options class
     *
     * This builds our page in the backend
     *
     * @see https://github.com/PremiseWP/Premise-WP#create-an-option-page-in-one-function for more information about Premise_Options class
     */
    public function init() {
        new Premise_Options( $this->title, $this->fields );
    }


}

?>