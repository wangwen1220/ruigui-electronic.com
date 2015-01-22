<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Header Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Header Settings', 'HK'),
			'type' => 'title'
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('General', 'HK'),
			'type' => 'sub_title',
	),

	array(
			'name' => esc_html__('Header From Top','HK'),
			'desc' => esc_html__('Enter the number for the header padding top.','HK'),
			'id' => 'header_from_top',
			'std' => '40',
			'size' => '5',
			'unit' => 'pixel',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Header From Bottom','HK'),
			'desc' => esc_html__('Enter the number for the header padding bottom.','HK'),
			'id' => 'header_from_bottom',
			'std' => '40',
			'size' => '5',
			'unit' => 'pixel',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Phone number','HK'),
			'desc' => esc_html__('Enter the number for phone, if you do not want to display this, just leave it blank.','HK'),
			'id' => 'tel',
			'std' => 'Tel: 1-800-123-4567',
			'size' => '50',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Email','HK'),
			'desc' => esc_html__('Enter your email, if you do not want to display this, just leave it blank.','HK'),
			'id' => 'email',
			'std' => 'Email: '.get_option('admin_email'),
			'size' => '50',
			'type' => 'text',
	),

	array('type' => 'foot'),

	array(
			'name' => esc_html__('Logo', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Image','HK'),
			'desc' => esc_html__('To upload an image click on "Upload Image" button. Once the image is uploaded it will give you various options.','HK'),
			'id' => 'logo',
			'std' => ASSETS_URI.'/images/logo.png',
			'title' => 'Enter a URL or upload an image for your logo:',
			'size' => '80',
			'button' => esc_html__('Upload Logo','HK'),
			'type' => 'upload',
	),

	array(
			'name' => esc_html__('Position from the top','HK'),
			'id' => 'logo_top',
			'std' => '0',
			'size' => '5',
			'unit' => 'pixel',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Position from the left','HK'),
			'id' => 'logo_left',
			'std' => '0',
			'size' => '5',
			'unit' => 'pixel',
			'type' => 'text',
	),

	array('type' => 'foot'),

	array(
			'name' => esc_html__('Menu', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Position from the top','HK'),
			'id' => 'menu_top',
			'std' => '30',
			'size' => '5',
			'unit' => 'pixel',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Depth','HK'),
			'desc' => esc_html__('Set it to "0", the menu level will be unlimited.','HK'),
			'id' => 'menu_depth',
			'std' => '3',
			'size' => '5',
			'unit' => 'level',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Sub Menu Width','HK'),
			'id' => 'sub_menu_width',
			'std' => '180',
			'size' => '5',
			'unit' => 'pixel',
			'type' => 'text',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'header', 'options' => $options );

?>