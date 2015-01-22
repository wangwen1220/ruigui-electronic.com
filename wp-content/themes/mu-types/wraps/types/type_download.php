<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Create Post Type For Download
* @PACKAGE BY HAWKTHEME
*
* menu_position
* 5 - below Posts 
*10 - below Media 
*15 - below Links 
*20 - below Pages 
*25 - below comments 
*60 - below first separator 
*65 - below Plugins 
*70 - below Users 
*75 - below Tools 
*80 - below Settings 
*100 - below second separator 
*
* ----------------------------------------------------------------------------------------------------
*/

add_action('init', 'theme_create_post_type_download');
add_filter("manage_edit-download_columns", "prod_edit_columns_download");
add_action("manage_posts_custom_column",  "prod_custom_columns_download");


/*Create post type for download*/
function theme_create_post_type_download() 
{

	$item_slug = get_theme_option('download','single_item_slug');

	$labels = array(
		'name' => esc_html__( 'Downloads','HK'),
		'singular_name' => esc_html__( 'Download','HK' ),
		'add_new' => esc_html__('Add New','HK'),
		'add_new_item' => esc_html__('Add New Download','HK'),
		'edit_item' => esc_html__('Edit Download','HK'),
		'new_item' => esc_html__('New Download','HK'),
		'view_item' => esc_html__('View Download','HK'),
		'search_items' => esc_html__('Search Download','HK'),
		'not_found' => esc_html__('No download found','HK'),
		'not_found_in_trash' => esc_html__('No download found in Trash','HK'), 
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug'=>$item_slug,'with_front'=>true),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 25,
		//'menu_icon' => WRAPS_URI . '/assets/images/icon-download.png',
		'supports' => array('title', 'editor', 'thumbnail', 'comments')
	); 

	register_post_type( 'download' , $args );
	
}


/*Prod edit columns*/
function prod_edit_columns_download($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"download_thumbnail" => esc_html__('Thumbnail', 'HK'),
		"title" => "Title",
		"version" => "Version",
		"size" => "File Size",
		"format" => "Format"
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}


/*Prod custom columns*/
function prod_custom_columns_download($column)
{
	global $post;
	$version = get_meta_option('download_version');
	$size = get_meta_option('download_size');
	$format = get_meta_option('download_format');
	switch ($column)
	{

		case "download_thumbnail":
		 if ( has_post_thumbnail() ) { the_post_thumbnail('size-50-50'); }
		break;
		
		case "version":
		if($version) { echo $version; }
		break;

		case "size":
		if($size) { echo $size; }
		break;

		case "format":
		if($format) { echo $format; }
		break;
	}
}

?>