<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Create Post Type For Team
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

add_action('init', 'theme_create_post_type_team');
add_filter("manage_edit-team_columns", "prod_edit_columns_team");
add_action("manage_posts_custom_column",  "prod_custom_columns_team");


/*Create post type for team*/
function theme_create_post_type_team() 
{

	$item_slug = get_theme_option('team','single_item_slug');

	$labels = array(
		'name' => esc_html__( 'Teams','HK'),
		'singular_name' => esc_html__( 'Team','HK' ),
		'add_new' => esc_html__('Add New','HK'),
		'add_new_item' => esc_html__('Add New Team','HK'),
		'edit_item' => esc_html__('Edit Team','HK'),
		'new_item' => esc_html__('New Team','HK'),
		'view_item' => esc_html__('View Team','HK'),
		'search_items' => esc_html__('Search Team','HK'),
		'not_found' => esc_html__('No team found','HK'),
		'not_found_in_trash' => esc_html__('No team found in Trash','HK'), 
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
		//'menu_icon' => WRAPS_URI . '/assets/images/icon-team.png',
		'supports' => array('title', 'editor', 'thumbnail', 'comments')
	); 

	register_post_type( 'team' , $args );
	
}


/*Prod edit columns*/
function prod_edit_columns_team($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"team_thumbnail" => esc_html__('Thumbnail', 'HK'),
		"title" => "Title",
		"position" => "Position",
		"phone" => "Phone"
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}


/*Prod custom columns*/
function prod_custom_columns_team($column)
{
	global $post;
	$position = get_meta_option('team_position');
	$phone = get_meta_option('team_phone');
	switch ($column)
	{

		case "team_thumbnail":
		 if ( has_post_thumbnail() ) { the_post_thumbnail('size-50-50'); }
		break;
				
		case "position":
		if($position) { echo $position; }
		break;

		case "phone":
		if($phone) { echo $phone; }
		break;
	}
}

?>