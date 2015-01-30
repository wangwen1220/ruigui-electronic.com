<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Metaboxes for slidershow
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$config = array(
	'title' => esc_html__('Slidershow Settings','HK'),
	'id' => 'slidershow_meta_boxes',
	'pages' => array('slidershow'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);


$options = array(

	array(
			'name' => esc_html__('Enable Title','HK'),
			'desc' => esc_html__('Enable the title in the slidershow.','HK'),
			'id' => 'enable_slidershow_title',
			'std' => 0,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Enable Description','HK'),
			'desc' => esc_html__('Enable the description in the slidershow.','HK'),
			'id' => 'enable_slidershow_desc',
			'std' => 0,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Description','HK'),
			'desc' => esc_html__('This the description in the slidershow." />','HK'),
			'id' => 'slidershow_desc',
			'std' => '',
			'rows' => '3',
			'type' => 'textarea',
	),

	array(
			'name' => esc_html__('External Link','HK'),
			'desc' => esc_html__('Enter a url for you custom link, Ex: http://google.com. If you do not want to use this, just leave it blank.','HK'),
			'id' => 'slidershow_external_link',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Enable Video','HK'),
			'desc' => esc_html__('Enable the video in the slidershow.','HK'),
			'id' => 'enable_slidershow_video',
			'std' => 0,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Embedded Code','HK'),
			'desc' => __('If you are using something other than self hosted video such as Youtube or Vimeo, paste the embed code here. Width is best at 990px with any height.','HK'),
			'id' => 'slidershow_video_embed_code',
			'rows' => '6',
			'std' => '',
			'class' => 'noborder',
			'type' => 'textarea',
	),
);

new meta_boxes_generator($config,$options);

?>