<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Create Post Type For Portfolio
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

add_action('init', 'theme_create_post_type_slidershow');
add_filter("manage_edit-slidershow_columns", "prod_edit_columns_slidershow");
add_action("manage_posts_custom_column",  "prod_custom_columns_slidershow");


/*Create post type for slidershow*/
function theme_create_post_type_slidershow() 
{
	$labels = array(
		'name' => esc_html__( 'Slider Items','HK'),
		'singular_name' => esc_html__( 'Slider Item','HK' ),
		'add_new' => esc_html__('Add New','HK'),
		'add_new_item' => esc_html__('Add New Slider Item','HK'),
		'edit_item' => esc_html__('Edit Slider Item','HK'),
		'new_item' => esc_html__('New Slider Item','HK'),
		'view_item' => esc_html__('View Slider Item','HK'),
		'search_items' => esc_html__('Search Slider Item','HK'),
		'not_found' => esc_html__('No slider item found','HK'),
		'not_found_in_trash' => esc_html__('No Slider item found in Trash','HK'), 
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'hierarchical' => false,
		'supports' => array('title', 'thumbnail' , 'page-attributes'),
		'has_archive' => false,
		'rewrite' => false,
		'query_var' => false,
		'can_export' => true,
		'show_in_nav_menus' => false,
		'menu_position' => 25,
		'menu_icon' => WRAPS_URI . '/assets/images/icon-slider.png'
	); 

	register_post_type( 'slidershow' , $args );

}


/*Prod edit columns*/
function prod_edit_columns_slidershow($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"slidershow_thumbnail" => esc_html__('Thumbnail', 'HK'),
		"title" => "Title",
		"external_link" => "External Link",
		"enable_title" => "Enable Title",
		"enable_desc" => "Enable Description"
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}


/*Prod custom columns*/
function prod_custom_columns_slidershow($column)
{
	global $post;
	$external_link = get_meta_option('slidershow_external_link');
	$enable_title = get_meta_option('enable_slidershow_title');
	$enable_desc = get_meta_option('enable_slidershow_desc');
	switch ($column)
	{
		case "slidershow_thumbnail":
		if ( has_post_thumbnail() ) { the_post_thumbnail('size-50-50'); }
		break;
		
		case "external_link":
		if($external_link) { echo $external_link; } else { echo 'No link'; }
		break;

		case "enable_title":
		if($enable_title == true) { echo 'Yes'; } else { echo 'No'; }
		break;

		case "enable_desc":
		if($enable_desc == true) { echo 'Yes'; } else { echo 'No'; }
		break;
	}
}


function theme_slideshow_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'slidershow' ) {
		global $wp_query;
		$wp_query->is_home = false;
		$wp_query->is_404 = true;
		$wp_query->is_single = false;
		$wp_query->is_singular = false;
	}
}
add_action( 'template_redirect', 'theme_slideshow_context_fixer' );

?>