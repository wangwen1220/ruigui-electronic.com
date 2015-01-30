<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Style Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$repeat_options = array(
		'no-repeat' => esc_html__('No Repeat','HK'),
		'repeat-x' => esc_html__('Repeat only Horizontally','HK'),
		'repeat-y' => esc_html__('Repeat only Vertically','HK'),
		'repeat' => esc_html__('Repeat both Vertically and Horizontally','HK')
);

$horizontal_options = array(
		'left' => esc_html__('Left','HK'),
		'right' => esc_html__('Right','HK'),
		'center' => esc_html__('Center','HK')
);

$vertical_options = array(
		'top' => esc_html__('Top','HK'),
		'bottom' => esc_html__('Bottom','HK'),
		'center' => esc_html__('Center','HK')
);

$attachment_options = array(
		'fixed' => esc_html__('Fixed','HK'),
		'scroll' => esc_html__('Scroll','HK'),
);

$options = array(

	array(
			'name' => esc_html__('Style Settings', 'HK'),
			'type' => 'title'
	),

	array(
			'name' => esc_html__('Custom Color', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Text Color','HK'),
			'desc' => esc_html__('If you want to custom the colors, you can select the color with colorpicker. If not, you can leave it blank.','HK'),
			'id' => 'text_color',
			'std' => '454545',
			'size' => '10',
			'type' => 'color',
	),

	array(
			'name' => esc_html__('Link Color','HK'),
			'desc' => esc_html__('If you want to custom the colors, you can select the color with colorpicker. If not, you can leave it blank.','HK'),
			'id' => 'link_color',
			'std' => '212121',
			'size' => '10',
			'type' => 'color',
	),

	array(
			'name' => esc_html__('Hover Color','HK'),
			'desc' => esc_html__('If you want to custom the colors, you can select the color with colorpicker. If not, you can leave it blank.','HK'),
			'id' => 'hover_color',
			'std' => 'FF4E00',
			'size' => '10',
			'type' => 'color',
	),
	
	array('type' => 'foot'),

	array(
			'name' => esc_html__('Custom Background', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Color','HK'),
			'desc' => esc_html__('If you want to custom the colors, you can select the color with colorpicker. If not, you can leave it blank.','HK'),
			'id' => 'body_bg_color',
			'std' => 'FFFFFF',
			'size' => '10',
			'type' => 'color',
	),

	array(
			'name' => esc_html__('Image','HK'),
			'desc' => 'Upload an image as the background. ',
			'id' => 'body_bg_image',
			'std' => ASSETS_URI.'/images/bodybg.png',
			'title' => 'Enter a URL or upload an image:',
			'size' => '70',
			'button' => esc_html__('Upload Image','HK'),
			'type' => 'upload',
	),

	array(
			'name' => esc_html__('Properties','HK'),
			'desc' => '',
			'id' => 'body_bg_properties',
			'std' => 'repeat',
			'options' => $repeat_options,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Horizontal','HK'),
			'desc' => '',
			'id' => 'body_bg_horizontal',
			'std' => 'left',
			'options' => $horizontal_options,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Vertical','HK'),
			'desc' => '',
			'id' => 'body_bg_vertical',
			'std' => 'top',
			'options' => $vertical_options,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Attachment','HK'),
			'desc' => '',
			'id' => 'body_bg_attachment',
			'std' => 'scroll',
			'options' => $attachment_options,
			'type' => 'select',
	),

	array('type' => 'foot'),

	array(
			'name' => esc_html__('Custom Css', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('CSS','HAWK_ADMIN'),
			'desc' => esc_html__("Add only the css code without <style></style> style blocks. They are auto added.",'HAWK_ADMIN'),
			'id' => 'custom_css',
			'std' => '',
			'rows' => '10',
			'type' => 'textarea',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'style', 'options' => $options );

?>