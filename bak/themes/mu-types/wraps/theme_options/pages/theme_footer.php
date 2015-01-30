<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Footer Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Footer Options', 'HK'),
			'type' => 'title'
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Copyright Message','HK'),
			'desc' => __('Copyright message displayed in the footer.','HK'),
			'id' => 'copyright',
			'std' => 'Copyright &copy; <a href="'. home_url( '/' ) . '">' .esc_attr( get_bloginfo('name') ).'</a>, Privacy Statement Terms and Conditions.',
			'rows' => '3',
			'type' => 'textarea',
	),

	array(
			'name' => esc_html__('WordPress credits link','HK'),
			'desc' => esc_html__('Show "Powered by WordPress" in footer? ','HK'),
			'id' => 'wordpress_link',
			'std' => 1,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Go Top','HK'),
			'desc' => esc_html__('Show go top button in footer? ','HK'),
			'id' => 'go_top',
			'std' => 1,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Enable Foot Widgets','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable the footer widgets area.",'HK'),
			'id' => 'enable_footer_widgets',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Footer Widgets Columns','HK'),
			'desc' => esc_html__('Choose a column for your footer widgets area.','HK'),
			'id' => 'widget_columns',
			'std' => '3',
			'options' => array(
				'1' => esc_html__('1 Column','HK'),
				'2' => esc_html__('2 Column','HK'),
				'3' => esc_html__('3 Column','HK'),
				'4' => esc_html__('4 Column','HK'),
			),
			'type' => 'select',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'footer', 'options' => $options );

?>