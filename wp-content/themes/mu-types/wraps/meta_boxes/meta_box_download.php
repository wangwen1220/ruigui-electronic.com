<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Metaboxes for download
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$config = array(
	'title' => esc_html__('Download Settings','HK'),
	'id' => 'download_meta_boxes',
	'pages' => array('download'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);


$options = array(

	array(
			'name' => esc_html__('Download Options', 'HK'),
			'type' => 'title',
			'desc' => esc_html__('Set the below options for your download items.','HK'),
	),

	array(
			'name' => esc_html__('License','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'download_license',
			'std' => '',
			'size' => '20',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Version','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'download_version',
			'std' => '',
			'size' => '20',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Language','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'download_lang',
			'std' => '',
			'size' => '20',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('File Size','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'download_size',
			'std' => '',
			'size' => '20',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Format','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'download_format',
			'std' => '',
			'size' => '20',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('File Link','HK'),
			'desc' => esc_html__('Enter a file url, so the people can download it, Ex: http://google.com/yourfile.zip. If you do not want to use this, just leave it blank.','HK'),
			'id' => 'download_file_link',
			'std' => '#',
			'size' => '80',
			'type' => 'text',
			'class' => 'noborder',
	),

);

new meta_boxes_generator($config,$options);

?>