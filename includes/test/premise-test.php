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
				'required' => 'required',
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
				'attribute' => 'onclick="alert(\'Dont you click me!\');"',
			)
		);
		echo PHP_EOL;

		// 16. Onclick input.
		premise_field( 'text',
			array(
				'name' => 'input16',
				'label' => 'Text input with onclick',
				'onclick' => 'alert(\'Don\'t you click me!\');',
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
				'label' => 'Wrapper class hook (should have .premise-align-center)',
				'add_filter' => array(
					array(
						'premise_field_wrapper_class',
						function( $wrapper_class ) {
							return $wrapper_class . ' premise-align-center';
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
		<div class="premise-row">
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
		</div><!-- /.premise-row -->
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
		<div class="premise-row">
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
		<div class="premise-row">
		<?php
		// 1. Text input.
		premise_field(
			'text',
			array(
				'name' => 'input1',
				'label' => 'Text input',
				'wrapper_class' => 'premise-field-duplicate-text',
			)
		);
		echo PHP_EOL;

		// 2. Select input.
		premise_field( 'select',
			array(
				'name' => 'input3',
				'label' => 'Select input',
				'options' => array( 'Option 1' => 'option1', 'Option 2' => 'option2' ),
				'wrapper_class' => 'premise-field-duplicate-select',
			)
		);
		echo PHP_EOL;

		// 3. Multiple select input.
		premise_field( 'select',
			array(
				'name' => 'input4',
				'label' => 'Multiple select input',
				'multiple' => 'multiple',
				'options' => array( 'Option 1' => 'option1', 'Option 2' => 'option2' ),
				'wrapper_class' => 'premise-field-duplicate-select-multiple',
			)
		);
		echo PHP_EOL;

		// 4. Radio input.
		echo '<div class="premise-field-duplicate-radio">';
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
				'label' => 'Checkbox input (should be unchecked)',
				'value_att'  => 'b',
				'wrapper_class' => 'premise-field-duplicate-checkbox',
			)
		);
		echo PHP_EOL;

		premise_field( 'checkbox',
			array(
				'value'  => 'b',
				'name' => 'input6b',
				'label' => 'Checkbox input (should be checked)',
				'value_att'  => 'b',
				'wrapper_class' => 'premise-field-duplicate-checkbox',
			)
		);
		echo PHP_EOL;
		?>
		</div>
		<script>

			jQuery('.premise-field-duplicate-checkbox').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-select').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-radio').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-select-multiple').premiseFieldDuplicate();
			jQuery('.premise-field-duplicate-text').premiseFieldDuplicate();
		</script>
		<?php
	}
}
