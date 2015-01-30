<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Metaboxes for product
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$config = array(
	'title' => esc_html__('Product Settings','HK'),
	'id' => 'product_meta_boxes',
	'pages' => array('product'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);


$options = array(

	array(
			'name' => esc_html__('Product Details', 'HK'),
			'type' => 'title',
			'desc' => esc_html__('Set the product details here, you can set the price and external link url.','HK'),
	),

	array(
			'name' => esc_html__('Original Price','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'product_original_price',
			'std' => '',
			'size' => '20',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Discount Price','HK'),
			'id' => 'product_discount_price',
			'std' => '',
			'size' => '20',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('External Link','HK'),
			'desc' => esc_html__('Enter a url for your custom link, Ex: http://google.com. If you do not want to use this, just leave it blank.','HK'),
			'id' => 'product_external_link',
			'std' => '#',
			'size' => '80',
			'type' => 'text',
			'class' => 'noborder',
	),

);

new meta_boxes_generator($config,$options);

?>