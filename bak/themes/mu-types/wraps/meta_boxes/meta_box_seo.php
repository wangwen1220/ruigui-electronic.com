<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Metaboxes for seo
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$config = array(
	'title' => esc_html__('SEO Settings','HK'),
	'id' => 'seo_meta_boxes',
	'pages' => array('post', 'page', 'portfolio', 'product', 'download', 'event', 'team'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);


$options = array(

	array(
			'name' => '',
			'type' => 'title',
			'desc' => esc_html__('You can make links from this post/page followable by search engines, and custom the title, add meta keywords and meta description.','HK'),
	),

	array(
			'name' => esc_html__('SEO - Set follow','HK'),
			'desc' => esc_html__('Make links from this post/page followable by search engines.','HK'),
			'id' => 'seo_follow',
			'std' => 0,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('SEO - Noindex','HK'),
			'desc' => esc_html__('Set the Page/Post to not be indexed by a search engines.','HK'),
			'id' => 'seo_noindex',
			'std' => 0,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('SEO - Title Tags','HK'),
			'desc' => esc_html__('Enter in the title as you would like to be displayed. Ex:<title>Your title ends up here</title>','HK'),
			'id' => 'seo_title_tags',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('SEO - Keywords','HK'),
			'desc' => esc_html__('Enter a comma-separated list of keywords you would like to associate with this page. Ex:<meta name="keywords" content="keyword1, keyword2, keyword3" />','HK'),
			'id' => 'seo_keywords',
			'std' => '',
			'rows' => '2',
			'type' => 'textarea',
	),

	array(
			'name' => esc_html__('SEO - Description','HK'),
			'desc' => esc_html__('Enter a comma-separated list of description you would like to associate with this page. Ex:<meta name="description" content="This is your seo description of your site." />','HK'),
			'id' => 'seo_description',
			'std' => '',
			'rows' => '2',
			'class' => 'noborder',
			'type' => 'textarea',
	),

);

new meta_boxes_generator($config,$options);

?>