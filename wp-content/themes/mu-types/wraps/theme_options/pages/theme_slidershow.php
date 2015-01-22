<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Slidershow Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Slidershow Settings', 'HK'),
			'type' => 'title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('The type to show','HK'),
			'desc' => esc_html__('Set the display type for homepage.','HK'),
			'id' => 'slider_type',
			'std' => 'slidershow',
			'options' => array(
				'disable' => esc_html__('Disable','HK'),
				'slidershow' => esc_html__('Show it as a slider.','HK'),
				'image' => esc_html__('Show it as an image.','HK'),
				'video' => esc_html__('Show it as the video.','HK'),
			),
			'type' => 'radio',
	),

	array('type' => 'foot'),

	array(
			'name' => esc_html__('Slidershow', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Showposts','HK'),
			'desc' => esc_html__('Set the items to show.','HK'),
			'id' => 'slidershow_posts_per_page',
			'std' => '5',
			'size' => '5',
			'unit' => 'items.',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Slider Image Height','HK'),
			'desc' => esc_html__('Enter the number for the image height. When you resize the height, you need to upload the image again.','HK'),
			'id' => 'slidershow_image_height',
			'std' => '430',
			'size' => '5',
			'unit' => 'pixel',
			'type' => 'text',
	),

	array('type' => 'foot'),

	array(
			'name' => esc_html__('Image', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Special Image','HK'),
			'desc' => esc_html__('If you want to display a special image in homepage, you can upload it here.','HK'),
			'id' => 'slidershow_special_image',
			'std' => '',
			'title' => 'Enter a URL or upload an image for Special Image:',
			'size' => '80',
			'button' => esc_html__('Upload Image','HK'),
			'type' => 'upload',
	),

	array(
			'name' => esc_html__('External Link','HK'),
			'desc' => esc_html__('Enter a url for you custom link, Ex: http://google.com. If you do not want to use this, just leave it blank.','HK'),
			'id' => 'slidershow_external_link',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array('type' => 'foot'),

	array(
			'name' => esc_html__('Video', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Video Height','HK'),
			'desc' => esc_html__('The video height. (e.g. 500)','HK'),
			'id' => 'slidershow_video_height',
			'std' => '557',
			'size' => '5',
			'unit' => 'pixel',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('M4V File URL','HK'),
			'desc' => esc_html__('The URL to the .m4v video file.','HK'),
			'id' => 'slidershow_video_m4v',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('OGV File URL','HK'),
			'desc' => esc_html__('The URL to the .ogv video file.','HK'),
			'id' => 'slidershow_video_ogv',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('WEBMV File URL','HK'),
			'desc' => esc_html__('The URL to the .webm video file.','HK'),
			'id' => 'slidershow_video_webm',
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
			'id' => 'slidershow_video_embed_code',
			'rows' => '6',
			'std' => '',
			'type' => 'textarea',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'slidershow', 'options' => $options );

?>