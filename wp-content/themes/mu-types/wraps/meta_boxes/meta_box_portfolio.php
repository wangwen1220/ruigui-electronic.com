<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Metaboxes for Portfolio
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$config = array(
	'title' => esc_html__('Portfolio Settings','HK'),
	'id' => 'portfolio_meta_boxes',
	'pages' => array('portfolio'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);


$options = array(

	array(
			'name' => esc_html__('Portfolio Type', 'HK'),
			'type' => 'title',
			'desc' => esc_html__('Choose the type of portfolio post you wish to display.','HK'),
	),

	array(
			'name' => esc_html__('Types','HK'),
			'id' => 'portfolio_type',
			'std' => '1',
			'options' => array(
				'1' => esc_html__('Slidershow','HK'),
				'2' => esc_html__('Video','HK'),
			),
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Video', 'HK'),
			'type' => 'title',
			'desc' => esc_html__('If you choose the portfolio type as video, you should set the video options here.','HK'),
	),

	array(
			'name' => esc_html__('Video Height','HK'),
			'desc' => esc_html__('The video height. (e.g. 500)','HK'),
			'id' => 'video_height',
			'std' => '557',
			'size' => '5',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('M4V File URL','HK'),
			'desc' => esc_html__('The URL to the .m4v video file.','HK'),
			'id' => 'video_m4v',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('OGV File URL','HK'),
			'desc' => esc_html__('The URL to the .ogv video file.','HK'),
			'id' => 'video_ogv',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('WEBMV File URL','HK'),
			'desc' => esc_html__('The URL to the .webm video file.','HK'),
			'id' => 'video_webm',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Poster Image','HK'),
			'desc' => esc_html__('The preview image for video.','HK'),
			'id' => 'slidershow_video_preview',
			'std' => '',
			'title' => 'Enter a URL or upload an image for Special Image:',
			'size' => '80',
			'button' => esc_html__('Upload Image','HK'),
			'type' => 'upload',
	),

	array(
			'name' => esc_html__('Embedded Code','HK'),
			'desc' => __('If you are using something other than self hosted video such as Youtube or Vimeo, paste the embed code here. Width is best at 990px with any height.','HK'),
			'id' => 'video_embed_code',
			'rows' => '6',
			'std' => '',
			'class' => 'noborder',
			'type' => 'textarea',
	),

);

new meta_boxes_generator($config,$options);

?>