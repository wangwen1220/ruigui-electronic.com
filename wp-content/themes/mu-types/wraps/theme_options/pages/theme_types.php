<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Types Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Types Settings', 'HK'),
			'type' => 'title',
			'desc' => theme_check_message(),
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Enable Portfolio','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable the portfolio posttype.",'HK'),
			'id' => 'enable_portfolio',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Enable Product','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable the product posttype.",'HK'),
			'id' => 'enable_product',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Enable Download','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable the download posttype.",'HK'),
			'id' => 'enable_download',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Enable Event','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable the event posttype.",'HK'),
			'id' => 'enable_event',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Enable Team','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable the team posttype.",'HK'),
			'id' => 'enable_team',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'type', 'options' => $options );

?>