<?php
/**
 * Premise Test
 *
 * @package Premise Demo
 */

// Block direct access to this file.
defined( 'ABSPATH' ) or die();

/**
 * The Test class
 *
 * You can display tests
 * by calling this class methods inside `Premise_Demo::display_code()`
 *
 * @example echo Premise_Test::fields();
 */
class Premise_Test {

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
	 * get all possible fields
	 *
	 * @return array fields
	 */
	public static function get_fields() {
		return pwp_form( self::$html_fields, false );
	}

	/**
	 * get all possible grids
	 *
	 * @return string girds
	 */
	public static function get_grids() {
		ob_start();
		self::grids();
		return ob_get_clean();
	}

	/**
	 * get maps
	 *
	 * @return string maps
	 */
	public static function get_maps() {
		ob_start();
		self::google_map();
		return ob_get_clean();
	}

	/**
	 * Fields tests
	 *
	 * @see Premise_Fields class
	 *
	 * `Premise_test::fields()`
	 *
	 * @return string Fields.
	 */
	public static function fields() {

		// 1. Text input.
		premise_field(
			'text',
			array(
				'name' => 'input1',
				'label' => 'Text input',
			)
		);
		echo PHP_EOL;

		// 2. Textarea input.
		premise_field( 'textarea',
			array(
				'name' => 'input2',
				'label' => 'Textarea input',
			)
		);
		echo PHP_EOL;

		// 3. Select input.
		premise_field( 'select',
			array(
				'name' => 'input3',
				'label' => 'Select input',
				'options' => array( 'Option 1' => 'option1', 'Option 2' => 'option2' ),
			)
		);
		echo PHP_EOL;

		// 4. Multiple select input.
		premise_field( 'select',
			array(
				'name' => 'input4',
				'label' => 'Multiple select input',
				'multiple' => 'multiple',
				'options' => array( 'Option 1' => 'option1', 'Option 2' => 'option2' ),
			)
		);
		echo PHP_EOL;

		// 5. Radio input.
		premise_field( 'radio',
			array(
				'value'  => 'a',
				'name' => 'input5',
				'id' => 'input5a',
				'label' => 'Radio input a',
				'value_att'  => 'c',
			)
		);
		echo PHP_EOL;

		premise_field( 'radio',
			array(
				'value'  => 'b',
				'name' => 'input5',
				'id' => 'input5b',
				'label' => 'Radio input b',
				'value_att'  => 'c',
			)
		);
		echo PHP_EOL;

		premise_field( 'radio',
			array(
				'value'  => 'c',
				'name' => 'input5',
				'id' => 'input5c',
				'label' => 'Radio input c (should be selected)',
				'value_att'  => 'c',
			)
		);
		echo PHP_EOL;

		// 6. Checkbox input.
		premise_field( 'checkbox',
			array(
				'value'  => 'a',
				'name' => 'input6a',
				'label' => 'Checkbox input (should be unchecked)',
				'value_att'  => 'b',
			)
		);
		echo PHP_EOL;

		premise_field( 'checkbox',
			array(
				'value'  => 'b',
				'name' => 'input6b',
				'label' => 'Checkbox input (should be checked)',
				'value_att'  => 'b',
			)
		);
		echo PHP_EOL;

		// 7. Color picker input.
		premise_field( 'wp_color',
			array(
				'name' => 'input7',
				'label' => 'Color picker input',
			)
		);
		echo PHP_EOL;

		// 8. Video input.
		premise_field( 'video',
			array(
				'name' => 'input8',
				'label' => 'Video input',
			)
		);
		echo PHP_EOL;

		// 9. Number input.
		premise_field( 'number',
			array(
				'name' => 'input9',
				'label' => 'Number input (min: 0; max: 10; range: 1)',
				'min' => '0',
				'max' => '10',
				'range' => '1',
			)
		);
		echo PHP_EOL;

		// 10. Required text input.
		premise_field( 'text',
			array(
				'name' => 'input10',
				'label' => 'Required text input',
				'required' => true,
			)
		);
		echo PHP_EOL;

		// 11. Maxlength text input.
		premise_field( 'text',
			array(
				'name' => 'input11',
				'label' => 'Text input, maxlength: 10',
				'maxlength' => '10',
			)
		);
		echo PHP_EOL;

		// 12. Text input with tooltip.
		premise_field( 'text',
			array(
				'name' => 'input12',
				'label' => 'Text input with tooltip',
				'tooltip' => 'This is the tooltip text!',
			)
		);
		echo PHP_EOL;

		// 13. Text input with default value.
		premise_field( 'text',
			array(
				'name' => 'input13',
				'label' => 'Text input with default value',
				'default' => 'Default value',
			)
		);
		echo PHP_EOL;

		// 14. Text input with placeholder.
		premise_field( 'text',
			array(
				'name' => 'input14',
				'label' => 'Text input with placeholder',
				'placeholder' => 'Placeholder',
			)
		);
		echo PHP_EOL;

		// 15. Custom attribute input.
		premise_field( 'text',
			array(
				'name' => 'input15',
				'label' => 'Text input with custom attribute (onclick)',
				'attribute' => 'onclick="alert(\'Dont you click me!\');" onload="suck my dick"',
			)
		);
		echo PHP_EOL;

		// 16. Onclick input.
		premise_field( 'text',
			array(
				'name' => 'input16',
				'label' => 'Text input with onclick',
				'onclick' => 'alert(\'Dont you click me!\');',
			)
		);
		echo PHP_EOL;

		// 17. Input with forbidden characters for name.
		premise_field( 'text',
			array(
				'name' => 'input17\'"',
				'label' => 'Text input with forbidden characters for name (quote and double quote)',
			)
		);
		echo PHP_EOL;

		// 18. Text input without label.
		premise_field( 'text',
			array(
				'name' => 'input18',
				'placeholder' => 'Text input without label',
			)
		);
		echo PHP_EOL;

		// 19. WP Media upload button.
		premise_field( 'wp_media',
			array(
				'name' => 'input19',
				'label' => 'WP Media upload button',
				'multiple' => true,
				'preview' => true,
			)
		);

		// 20. fa Icon upload button.
		premise_field( 'fa_icon',
			array(
				'name' => 'input20',
				'label' => 'FA Icon field',
			)
		);
		echo PHP_EOL;
	}


	/**
	 * Fields hooks tests
	 *
	 * @see Premise_Fields class
	 *
	 * `Premise_test::fields_hooks()`
	 *
	 * @return string Fields hooked.
	 */
	public static function fields_hooks() {

		// 1. Label HTML.
		premise_field( 'text',
			array(
				'name' => 'hook1',
				'label' => 'Label HTML hook',
				'add_filter' => array(
					array(
						'premise_field_label_html',
						function( $label ) {
							return $label . ' (hooked indeed!)';
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 2. Raw HTML.
		premise_field( 'text',
			array(
				'name' => 'hook2',
				'label' => 'Raw HTML hook',
				'add_filter' => array(
					array(
						'premise_field_raw_html',
						function( $raw ) {
							return $raw . ' (hooked indeed!)';
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 3. HTML after wrapper.
		premise_field( 'text',
			array(
				'name' => 'hook3',
				'label' => 'HTML after wrapper hook',
				'add_filter' => array(
					array(
						'premise_field_html_after_wrapper',
						function() {
							return ' (hooked indeed!)';
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 4. HTML after wrapper.
		premise_field( 'text',
			array(
				'name' => 'hook3',
				'label' => 'HTML after wrapper hook',
				'add_filter' => array(
					array(
						'premise_field_html_after_wrapper',
						function() {
							return ' (hooked indeed!)';
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 4. Field HTML.
		premise_field( 'text',
			array(
				'name' => 'hook4',
				'label' => 'Field HTML hook',
				'add_filter' => array(
					array(
						'premise_field_html',
						function( $field ) {
							return $field . ' (hooked indeed!)';
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 5. Input Field HTML.
		premise_field( 'text',
			array(
				'name' => 'hook5',
				'label' => 'Input Field HTML hook',
				'add_filter' => array(
					array(
						'premise_field_input',
						function( $field ) {
							return $field . ' (hooked indeed!)';
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 6. Textarea Field HTML.
		premise_field( 'textarea',
			array(
				'name' => 'hook6',
				'label' => 'Textarea Field HTML hook',
				'add_filter' => array(
					array(
						'premise_field_textarea',
						function( $field ) {
							return $field . ' (hooked indeed!)';
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 7. WP Media upload button.
		premise_field( 'wp_media',
			array(
				'name' => 'hook7',
				'label' => 'WP Media upload button hook',
				'add_filter' => array(
					array(
						'premise_field_upload_btn',
						function( $button ) {
							return str_replace( 'fa-upload', 'fa-spin fa-spinner', $button );
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 8. WP Media remove button.
		premise_field( 'wp_media',
			array(
				'name' => 'hook8',
				'label' => 'WP Media remove button hook',
				'add_filter' => array(
					array(
						'premise_field_remove_btn',
						function( $button ) {
							return str_replace( 'fa-times', 'fa-spin fa-spinner', $button );
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 10. Button to show Font-Awesome icon.
		premise_field( 'fa_icon',
			array(
				'name' => 'hook10',
				'label' => 'Button to show Font-Awesome icon hook',
				'add_filter' => array(
					array(
						'premise_field_fa_icon_html',
						function( $fa_icon ) {
							return str_replace( 'fa-th', 'fa-spin fa-spinner', $fa_icon );
						},
					),
				),
			)
		);
		echo PHP_EOL;

		// 11. After PremiseField object inits.
		premise_field( 'text',
			array(
				'name' => 'hook11',
				'label' => 'After PremiseField object inits JS trigger (see console log for params)',
			)
		);
		echo PHP_EOL;

		?>
		<script>
			jQuery(document).on("premiseFieldAfterInit", function(evt, obj) {
				jQuery("#hook11").attr("value", "premiseFieldAfterInit hooked!");
				console.log("premiseFieldAfterInit params: ", obj);
			});
		</script>
		<?php

		// 12. After icons box opens.
		premise_field( 'fa_icon',
			array(
				'name' => 'hook12',
				'label' => 'After icons box opens JS trigger (see console log for params)',
			)
		);
		echo PHP_EOL;

		?>
		<script>
			jQuery(document).on("premiseFieldAfterFaIconsOpen", function(evt, icons, parent) {
				jQuery("#hook12").attr("value", "premiseFieldAfterFaIconsOpen hooked!");
				console.log("premiseFieldAfterFaIconsOpen params: ", icons, parent);
			});
		</script>
		<?php

		// 13. After icons box close.
		premise_field( 'fa_icon',
			array(
				'name' => 'hook13',
				'label' => 'After icons box close JS trigger (see console log for params)',
			)
		);
		echo PHP_EOL;

		?>
		<script>
			jQuery(document).on("premiseFieldAfterFaIconsClose", function(evt, icons, parent) {
				jQuery("#hook13").attr("value", "premiseFieldAfterFaIconsClose hooked!");
				console.log("premiseFieldAfterFaIconsClose params: ", icons, parent);
			});
		</script>
		<?php

		// 14. Wrapper class.
		premise_field( 'text',
			array(
				'name' => 'hook14',
				'label' => 'Wrapper class hook (should have .pwp-align-center)',
				'add_filter' => array(
					array(
						'premise_field_wrapper_class',
						function( $wrapper_class ) {
							return $wrapper_class . ' pwp-align-center';
						},
					),
				),
			)
		);
		echo PHP_EOL;


		// TODO: finish.
	}







	/**
	 * Premise WP framework
	 * Fields demo
	 */
	public static function fields_demo_backup() {
		?>
		<h2>Premise WP framework</h2>
		<h3>Fields demo</h3><br />
		<div class="pwp-row">
		<?php
		// Premise Fields.
		// 1. Text input.
		premise_field(
			'text',
			array(
				'name' => 'input1',
				'label' => 'Text input',
				'onclick' => 'alert("Don\'t you click me!");',
				'wrapper_class' => 'col2',
			)
		);

		// 2. Select input.
		premise_field( 'select',
			array(
				'name' => 'input2',
				'label' => 'Select input',
				'options' => array(
					'Option 1' => 'option1',
					'Option 2' => 'option2'
				),
				'wrapper_class' => 'col2',
			)
		);

		// 3. WP Media input.
		premise_field( 'wp_media',
			array(
				'name' => 'input3',
				'label' => 'WP Media input',
				'wrapper_class' => 'col2',
				'multiple' => true,
				'preview' => true,
			)
		);

		// 4. WP Color Picker input.
		premise_field( 'wp_color',
			array(
				'name' => 'input4',
				'label' => 'WP Color Picker input',
				'wrapper_class' => 'col2',
			)
		);

		// 5. Font-Awesome icons.
		premise_field( 'fa_icon',
			array(
				'name' => 'input5',
				'label' => 'Font-Awesome icons',
				'wrapper_class' => 'span12',
			)
		);
		?>
		</div><!-- /.pwp-row -->
		<?php
	}







	/**
	 * Premise WP framework
	 * Fields demo
	 */
	public static function fields_demo() {
		?>
		<h2>Premise WP framework</h2>
		<h3>Fields demo</h3><br />
		<div class="pwp-row">
		<?php
		// Premise Fields.
		premise_field(
			'text',
			array(
				'name' => '1',
				'label' => 'Text input',
				'onclick' => 'alert("Click me!");',
				'wrapper_class' => 'col2',
			)
		);
		premise_field(
			'select',
			array(
				'name' => '2',
				'label' => 'Select input',
				'options' => array(
					'Option 1' => 'option1',
					'Option 2' => 'option2',
				),
				'wrapper_class' => 'col2',
			)
		);
		premise_field(
			'wp_media',
			array(
				'name' => '3',
				'label' => 'WP Media input',
				'wrapper_class' => 'col2',
				'multiple' => true,
				'preview' => true,
			)
		);
		premise_field(
			'wp_color',
			array(
				'name' => '4',
				'label' => 'WP Color Picker input',
				'wrapper_class' => 'col2',
			)
		);
		premise_field(
			'fa_icon',
			array(
				'name' => '5',
				'label' => 'Font-Awesome icons input',
				'wrapper_class' => 'span12',
			)
		);
		?>
		</div>
		<?php
	}



	/**
	 * Videos embed tests
	 *
	 * @see premise_output_video()
	 */
	public static function videos_embed() {

		?>
		<h2>Premise WP framework</h2>
		<h3>Videos embed</h3><br />
		<?php
		// 1. Youtube URL.
		echo '<h4>Youtube URL: https://youtu.be/Vl9T4KjS15s</h4>';
		echo premise_output_video( 'https://youtu.be/Vl9T4KjS15s' );
		echo PHP_EOL;

		// 2. Youtube ID.
		echo '<h4>Youtube ID: tTik3qfotQw</h4>';
		echo premise_output_video( 'tTik3qfotQw' );
		echo PHP_EOL;

		// 3. Vimeo URL.
		echo '<h4>Vimeo URL: http://vimeo.com/155365911</h4>';
		echo premise_output_video( 'http://vimeo.com/155365911' );
		echo PHP_EOL;

		// 4. Vimeo ID.
		echo '<h4>Vimeo ID: 180209925</h4>';
		echo premise_output_video( '180209925' );
		echo PHP_EOL;

		// 5. Wistia URL.
		echo '<h4>Wistia URL: //fast.wistia.net/embed/iframe/avk9twrrbn</h4>';
		echo premise_output_video( '//fast.wistia.net/embed/iframe/avk9twrrbn' );
		echo PHP_EOL;

		// 6. Wistia ID.
		echo '<h4>Wistia ID: j38ihh83m5</h4>';
		echo premise_output_video( 'j38ihh83m5' );
		echo PHP_EOL;
	}



	/**
	 * Fields duplicate tests
	 *
	 * @see premiseFieldDuplicate jQuery plugin.
	 *
	 * `$('.my-fields').premiseFieldDuplicate()`
	 *
	 * @return string Fields to duplicate.
	 */
	public static function fields_duplicate() {

		?>
		<h2>Premise WP framework</h2>
		<h3>Fields demo</h3><br />
		<div class="pwp-row">
		<?php
		// 1. Text input.
		premise_field(
			'text',
			array(
				'name' => 'input1',
				'label' => 'Text input <span class="increment">1</span>',
				'wrapper_class' => 'premise-field-duplicate-text',
			)
		);
		echo PHP_EOL;

		// 2. Select input.
		premise_field( 'select',
			array(
				'name' => 'input3',
				'label' => 'Select input <span class="increment">2</span>',
				'options' => array( 'Option 1' => 'option1', 'Option 2' => 'option2' ),
				'wrapper_class' => 'premise-field-duplicate-select',
			)
		);
		echo PHP_EOL;

		// 2b. Selected input.
		premise_field( 'select',
			array(
				'value' => 'option2',
				'name' => 'inputb3',
				'label' => 'Selected input <span class="increment">3</span>',
				'options' => array( 'Option 1' => 'option1', 'Option 2' => 'option2' ),
				'wrapper_class' => 'premise-field-duplicate-selected',
			)
		);
		echo PHP_EOL;

		// 3. Multiple select input.
		premise_field( 'select',
			array(
				'name' => 'input4',
				'label' => 'Multiple select input <span class="increment">4</span>',
				'multiple' => 'multiple',
				'options' => array( 'Option 1' => 'option1', 'Option 2' => 'option2' ),
				'wrapper_class' => 'premise-field-duplicate-select-multiple',
			)
		);
		echo PHP_EOL;

		// 4. Radio input.
		echo '<div class="premise-field-duplicate-radio"> <span class="increment">5</span>';
		premise_field( 'radio',
			array(
				'value'  => 'a',
				'name' => 'input5',
				'id' => 'input5a',
				'label' => 'Radio input a',
				'value_att'  => 'c',
			)
		);
		echo PHP_EOL;

		premise_field( 'radio',
			array(
				'value'  => 'b',
				'name' => 'input5',
				'id' => 'input5b',
				'label' => 'Radio input b',
				'value_att'  => 'c',
			)
		);
		echo PHP_EOL;

		premise_field( 'radio',
			array(
				'value'  => 'c',
				'name' => 'input5',
				'id' => 'input5c',
				'label' => 'Radio input c (should be selected)',
				'value_att'  => 'c',
			)
		);
		echo PHP_EOL;
		echo '</div>';

		// 5. Checkbox input.
		premise_field( 'checkbox',
			array(
				'value'  => 'a',
				'name' => 'input6a',
				'label' => 'Checkbox input (should be unchecked) <span class="increment">6</span>',
				'value_att'  => 'b',
				'wrapper_class' => 'premise-field-duplicate-checkbox1',
			)
		);
		echo PHP_EOL;

		premise_field( 'checkbox',
			array(
				'value'  => 'b',
				'name' => 'input6b',
				'label' => 'Checkbox input (should be checked) <span class="increment">7</span>',
				'value_att'  => 'b',
				'wrapper_class' => 'premise-field-duplicate-checkbox2',
			)
		);
		echo PHP_EOL;
		?>
		</div>
		<script>

			jQuery('.premise-field-duplicate-checkbox1').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-checkbox2').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-select').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-selected').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-radio').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-select-multiple').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-text').premiseFieldDuplicate();
		</script>
		<?php
	}



	/**
	 * Google Map tests
	 *
	 * @see premiseGoogleMap jQuery plugin.
	 *
	 * `$('.my-google-map').premiseGoogleMap()`
	 */
	public static function google_map() {

		?>
		<script>// Declare it globally as a default
			jQuery.fn.roamiGmap.defaults.key = 'AIzaSyBT4NE75feyuFYEhik3JbyAKl0mYwkEt3o';
		</script>

		<h3>Google maps demo</h3>
		<p>Below are a few examples of the options that can be passed to Google maps plugin roamiGmap. For a complete list of options visit <a href="https://github.com/mvallejo3/roamiGmap" target="_blank">the plugin's GitHub page</a>.</p>

		<h4>Default height</h4>
		<p><pre>
$('.el_selector').roamiGmap({
  center: 'Chicago, IL',
  infowindow: {
    content: 'This is Chicago!',
  }
});</pre></p>

		<div class="premise-google-map-default"></div>
		<script>var map = jQuery('.premise-google-map-default').roamiGmap({
			center: 'Chicago, IL',
			infowindow: {
				content: 'This is Chicago!',
			}
		});</script>

		<br><hr><br>

		<h4>No marker and 500px height</h4>
		<p><pre>
$('.el_selector').roamiGmap({
  center: 'Miami, FL',
  marker: false,
  minHeight: 500,
});</pre></p>
		<div class="premise-google-map-no-marker"></div>
		<script>var map = jQuery('.premise-google-map-no-marker').roamiGmap({
			center: 'Miami, FL',
			marker: false,
			minHeight: 500,
		});</script>

		<br><hr><br>

		<h4>Zoom 5 and size based on aspect ratio (16:9)</h4>
		<p><pre>
&lt;!-- The HTML --&gt;
&lt;div class="pwp-aspect-ratio-16-9"&gt;
  &lt;div class="map_class"&gt;&lt;/div&gt;
&lt;/div&gt;
// The JS
$('.map_class').roamiGmap({
  center: 'Boston, MA',
  zoom: 5,
});</pre></p>
		<div class="pwp-aspect-ratio-16-9">
			<div class="premise-google-map-ar"></div>
		</div>
		<script>var map = jQuery('.premise-google-map-ar').roamiGmap({
			center: 'Boston, MA',
			zoom: 5,
		});</script>
		<?php

	}

	/**
	 * Print all possible grids
	 *
	 * @return string grids
	 */
	public static function grids() {

		?>
		<h2>Premise Row</h2>
		<p>Using the class <code>pwp-row</code> you can create both Column Grids and Fluid Grids.</p>

		<h3>Column Grid</h3>
		<p>3 columns</p>
		<div class="pwp-row">
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
		</div>

		<p>4 columns</p>
		<div class="pwp-row">
			<div class="col4 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col4</div>
			<div class="col4 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col4</div>
			<div class="col4 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col4</div>
			<div class="col4 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col4</div>
		</div>

		<p>6 columns</p>
		<div class="pwp-row">
			<div class="col6 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="margin-bottom: 2%; background: #ccc; padding: 20px;">col6</div>
		</div>

		<hr>

		<h3>Fluid Grids</h3>
		<p>With fluid grids you can have columns with different widths.</p>
		<div class="pwp-row">
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span9 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span9</div>
			<div class="span8 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span8</div>
			<div class="span2 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span2</div>
			<div class="span2 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span2</div>
			<div class="span5 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span5</div>
			<div class="span2 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span2</div>
			<div class="span5 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span5</div>
		</div>

		<h3>More Control</h3>
		<p>To have more control over how your grids behave, here are some very helpful classes that you can add to 'pwp-row'.</p>

		<h4>Float Right</h4>
		<p>Make elements float to the right instead of the left (default) using the class <code>float-right</code>. Helpful when you need the column on the right to stack over the left one when on a mobile device.</p>
		<div class="pwp-row float-right">
			<div class="span8 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">This will stack on top when responding down</div>
			<div class="span4 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span4</div>
		</div>

		<hr>

		<h4>Not Responsive</h4>
		<p>Adding the class <code>not-responsive</code> will force the desktop view of the grid regrdless of the screen size.</p>
		<div class="pwp-row not-responsive">
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span6 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span6</div>
		</div>

		<hr>

		<h4>Flush Columns (Applies ONLY to column grids)</h4>
		<p>The class <code>flush-columns</code> will remove the space between the columns and expand the columns width evenly to fill in the gap. <b>Important:</b> This class does not apply to the fluid grids at the moment.</p>
		<div class="pwp-row flush-columns not-responsive">
			<div class="col6 pwp-align-center" style="background: #ccc;border: 1px solid #888; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="background: #ccc;border: 1px solid #888; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="background: #ccc;border: 1px solid #888; padding: 20px;">col6</div>

			<div class="col6 pwp-align-center" style="background: #ccc;border: 1px solid #888; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="background: #ccc;border: 1px solid #888; padding: 20px;">col6</div>
			<div class="col6 pwp-align-center" style="background: #ccc;border: 1px solid #888; padding: 20px;">col6</div>
		</div>

		<hr>

		<h4>Force Columns</h4>
		<p>Use <code>force-columns</code> to remove floating issues when one element in the grid is taller than the rest. Also works with class <code>float-right</code>.</p>
		<div class="pwp-row force-columns">
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">I don't understand the question, and I won't respond to it. As you may or may not know, Lindsay and I have hit a bit of a rough patch. Well, what do you expect, mother? Did you enjoy your meal, Mom? You drank it fast enough.

			Oh, you're gonna be in a coma, all right. Army had half a day. Guy's a pro. We just call it a sausage. I've opened a door here that I regret. Whoa, this guy's straight?</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">Did you enjoy your meal, Mom? You drank it fast enough. That's why you always leave a note! I hear the jury's still out on science. I don't understand the question, and I won't respond to it.</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">Well, what do you expect, mother? But I bought a yearbook ad from you, doesn't that mean anything anymore? Not tricks, Michael, illusions. We just call it a sausage. That's why you always leave a note!

			Michael! It's called 'taking advantage. ' It's what gets you ahead in life. I don't criticize you! And if you're worried about criticism, sometimes a diet is the best defense. That's why you always leave a note!</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
		</div>

		<h4>Without Forcing Columns</h4>
		<p>Here is an example of how the same grid above would look like without the <code>force-columns</code> class.</p>
		<div class="pwp-row">
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">I don't understand the question, and I won't respond to it. As you may or may not know, Lindsay and I have hit a bit of a rough patch. Well, what do you expect, mother? Did you enjoy your meal, Mom? You drank it fast enough.

			Oh, you're gonna be in a coma, all right. Army had half a day. Guy's a pro. We just call it a sausage. I've opened a door here that I regret. Whoa, this guy's straight?</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">Did you enjoy your meal, Mom? You drank it fast enough. That's why you always leave a note! I hear the jury's still out on science. I don't understand the question, and I won't respond to it.</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">Well, what do you expect, mother? But I bought a yearbook ad from you, doesn't that mean anything anymore? Not tricks, Michael, illusions. We just call it a sausage. That's why you always leave a note!

			Michael! It's called 'taking advantage. ' It's what gets you ahead in life. I don't criticize you! And if you're worried about criticism, sometimes a diet is the best defense. That's why you always leave a note!</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
			<div class="col3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">col3</div>
		</div>

		<hr>

		<h2>Premise Inline</h2>
		<p>Using class <code>pwp-inline</code> instead of 'pwp-row' will not float the elements. They elements have the <code>display</code> property set to <code>inline-block</code>. This is useful when you want to align the elements vertically or horizontally.</p>
		<div class="pwp-inline">
			<div class="span4 pwp-align-center pwp-vertical-align-middle" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px; box-sizing: border-box;">span4</div>
			<div class="span3 pwp-align-center pwp-vertical-align-middle" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 30px 2px; box-sizing: border-box;">span3<br>These are vertically aligned in the middle</div>
			<div class="span5 pwp-align-center pwp-vertical-align-middle" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px; box-sizing: border-box;">span5</div>
		</div>

		<hr>

		<h2>Premise Scroll</h2>
		<p>If you want to add a row that does not wrap its content but rather,
			lets you sroll left and right to see the entore row use the class pwp-scroller.</p>
		<div class="pwp-scroller">
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
			<div class="span3 pwp-align-center" style="margin-bottom: 2%; margin-bottom: 2%; background: #ccc; padding: 20px;">span3</div>
		</div>

		<hr>

		<h1>Width of actual classes without 'pwp-row' or pwp-inline wrappers</h1>

		<h3>span 1</h3>
		<div class="span1" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 2</h3>
		<div class="span2" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 3</h3>
		<div class="span3" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 4</h3>
		<div class="span4" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 5</h3>
		<div class="span5" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 6</h3>
		<div class="span6" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 7</h3>
		<div class="span7" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 8</h3>
		<div class="span8" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 9</h3>
		<div class="span9" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 10</h3>
		<div class="span10" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 11</h3>
		<div class="span11" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>
		<h3>span 12</h3>
		<div class="span12" style="border-top: 10px solid #fff; border-bottom: 10px solid #fff; margin-bottom: 2%; background: #ccc; height: 1px; border-right: 1px solid #444; border-left: 1px solid #444;">&nbsp;</div>

		<hr>

		<h3>col2</h3>
		<div class="col2" style="background: #ccc;">&nbsp;</div>
		<h3>col3</h3>
		<div class="col3" style="background: #ccc;">&nbsp;</div>
		<h3>col4</h3>
		<div class="col4" style="background: #ccc;">&nbsp;</div>
		<h3>col5</h3>
		<div class="col5" style="background: #ccc;">&nbsp;</div>
		<h3>col6</h3>
		<div class="col6" style="background: #ccc;">&nbsp;</div><?php

		// Test PWP_Field.
		$f = new PWP_Field_Controller( array( 'options' => array( '0' => '1', 'value2' => '2', 'value3' => '3' ), 'type' => 'select' ) );
		echo $f->html;
	}

	// moved to the bottom for better class readability
	/**
	 * holds all different types of html_fields
	 *
	 * @var array
	 */
	private static $html_fields = array(
		array(
			'type' => 'wp_media',
			'name' => '[wp_media]',
			'label' => 'wp_media',
			'class' => 'wp_media',
		),
		array(
			'type' => 'fa_icon',
			'name' => '[fa_icon]',
			'label' => 'fa_icon',
			'class' => 'fa_icon',
		),
		array(
			'type' => 'video',
			'name' => '[video]',
			'label' => 'video',
			'class' => 'video',
		),
		array(
			'type' => 'wp_color',
			'name' => '[wp_color]',
			'label' => 'wp_color',
			'class' => 'wp_color',
		),
		array(
			'type' => 'text',
			'name' => '[text]',
			'label' => 'text',
			'class' => 'text-field',
		),
		array(
			'type' => 'textarea',
			'name' => '[textarea]',
			'label' => 'textarea',
			'class' => 'textarea-field',
		),
		array(
			'type' => 'select',
			'name' => '[select]',
			'label' => 'select',
			'options' => array(
				'Select an option' => '',
				'option 1' => 'option1',
				'option 2' => 'option2',
				'option 3' => 'option3',
			),
			'class' => 'select-field',
		),
		array(
			'type' => 'radio',
			'name' => '[radio]',
			'label' => 'radio',
			'class' => 'radio-field',
		),
		array(
			'type' => 'checkbox',
			'name' => '[checkbox]',
			'label' => 'checkbox',
			'class' => 'checkbox-field',
		),
		array(
			'type' => 'button',
			'name' => '[button]',
			// 'label' => 'button', // no label needed for buttons
			'class' => 'button-field',
			'value' => 'Button',
		),
		array(
			'type' => 'reset',
			'name' => '[reset]',
			// 'label' => 'reset', // no label needed for buttons
			'class' => 'reset-field',
		),
		array(
			'type' => 'submit',
			'name' => '[submit]',
			// 'label' => 'submit', // no label needed for buttons
			'class' => 'reset-field',
		),
		array(
			'type' => 'color',
			'name' => '[color]',
			'label' => 'color',
			'class' => 'color-field',
		),
		array(
			'type' => 'number',
			'name' => '[number]',
			'label' => 'number',
			'class' => 'number-field',
		),
		array(
			'type' => 'date',
			'name' => '[date]',
			'label' => 'date',
			'class' => 'date-field',
		),
		array(
			'type' => 'datetime',
			'name' => '[datetime]',
			'label' => 'datetime',
			'class' => 'datetime-field',
		),
		array(
			'type' => 'datetime-local',
			'name' => '[datetime-local]',
			'label' => 'datetime-local',
			'class' => 'datetime-field',
		),
		array(
			'type' => 'email',
			'name' => '[email]',
			'label' => 'email',
			'class' => 'email-field',
		),
		array(
			'type' => 'month',
			'name' => '[month]',
			'label' => 'month',
			'class' => 'month-field',
		),
		array(
			'type' => 'range',
			'name' => '[range]',
			'label' => 'range',
			'class' => 'range-field',
		),
		array(
			'type' => 'search',
			'name' => '[search]',
			'label' => 'search',
			'class' => 'search-field',
		),
		array(
			'type' => 'tel',
			'name' => '[tel]',
			'label' => 'tel',
			'class' => 'tel-field',
		),
		array(
			'type' => 'time',
			'name' => '[time]',
			'label' => 'time',
			'class' => 'time-field',
		),
		array(
			'type' => 'url',
			'name' => '[url]',
			'label' => 'url',
			'class' => 'url-field',
		),
		array(
			'type' => 'week',
			'name' => '[week]',
			'label' => 'week',
			'class' => 'week-field',
		),
		array(
			'tag' => 'div',
			'id' => 'div_id',
			'class' => 'div_class',
			'value' => 'This div says fuck you!',
		),
	);
}
