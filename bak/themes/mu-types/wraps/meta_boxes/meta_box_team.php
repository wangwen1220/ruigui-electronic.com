<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Metaboxes for team
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$config = array(
	'title' => esc_html__('Team Settings','HK'),
	'id' => 'team_meta_boxes',
	'pages' => array('team'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);


$options = array(

	array(
			'name' => esc_html__('Team Options', 'HK'),
			'type' => 'title',
			'desc' => esc_html__('Set the below options for your team items.','HK'),
	),

	array(
			'name' => esc_html__('Department','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_department',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Phone','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_phone',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Position','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_position',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Email','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_email',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Media Options', 'HK'),
			'type' => 'title',
			'desc' => esc_html__('Set the media for your team.','HK'),
	),

	array(
			'name' => esc_html__('Delicious','HK'),
			'desc' => esc_html__('Enter your delicious link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_delicious',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Facebook','HK'),
			'desc' => esc_html__('Enter your facebook link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_facebook',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Flickr','HK'),
			'desc' => esc_html__('Enter your flickr link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_flickr',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Google','HK'),
			'desc' => esc_html__('Enter your google link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_google',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Linkedin','HK'),
			'desc' => esc_html__('Enter your linkedin link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_linkedin',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Myspace','HK'),
			'desc' => esc_html__('Enter your myspace link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_myspace',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Rss','HK'),
			'desc' => esc_html__('Enter your rss link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_rss',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Stumble','HK'),
			'desc' => esc_html__('Enter your stumbleupon link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_stumble',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Twitter','HK'),
			'desc' => esc_html__('Enter your twitter link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_twitter',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Yahoo','HK'),
			'desc' => esc_html__('Enter your yahoo link, If you do not want to display this, just leave it blank.','HK'),
			'id' => 'team_yahoo',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),
);

new meta_boxes_generator($config,$options);

?>