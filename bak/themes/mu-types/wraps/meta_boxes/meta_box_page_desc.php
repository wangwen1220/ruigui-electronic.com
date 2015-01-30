<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Metaboxes for seo
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$config = array(
	'title' => esc_html__('Page Header Desc','HK'),
	'id' => 'page-desc_meta_boxes',
	'pages' => array('page'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);


$options = array(

	array(
			'name' => esc_html__('Description','HK'),
			'desc' => esc_html__('Enter a comma-separated list of description you would like to associate with this page. This will display in the page header.','HK'),
			'id' => 'page_header_desc',
			'std' => '',
			'rows' => '4',
			'class' => 'noborder',
			'type' => 'textarea',
	),

);

new meta_boxes_generator($config,$options);

?>