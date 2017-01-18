<?php
/**
* Premise Demo Fields Test
*
* @package Premise Demo\Test
*/
class PWP_Demo_Form {

	/**
	 * holds params needed to build a form
	 *
	 * @var array
	 */
	protected $test_form = array(
		'name_prefix' => '',
		'action'      => '',
		'method'      => '',
		'enctype'     => '',
		'fields'      => array(),
	);

	function __construct( $form_args = '' ) {
		if ( ! empty( $form_args ) ) {
			parent::__construct( $form_args );
		}
		else {
			$this->test_form['fields'] = $this->html_fields;
			parent::__construct( $this->test_form );
		}
		echo $this->form;
	}

	// moved to the bottom for better class readability
	/**
	 * holds all different types of html_fields
	 *
	 * @var array
	 */
	protected $html_fields = array(
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