<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Create Post Type For Event
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

add_action('init', 'theme_create_post_type_event');
add_filter("manage_edit-event_columns", "prod_edit_columns_event");
add_action("manage_posts_custom_column",  "prod_custom_columns_event");


/*Create post type for event*/
function theme_create_post_type_event() 
{

	$item_slug = get_theme_option('event','single_item_slug');

	$labels = array(
		'name' => esc_html__( 'Events','HK'),
		'singular_name' => esc_html__( 'Event','HK' ),
		'add_new' => esc_html__('Add New','HK'),
		'add_new_item' => esc_html__('Add New Event','HK'),
		'edit_item' => esc_html__('Edit Event','HK'),
		'new_item' => esc_html__('New Event','HK'),
		'view_item' => esc_html__('View Event','HK'),
		'search_items' => esc_html__('Search Event','HK'),
		'not_found' => esc_html__('No event found','HK'),
		'not_found_in_trash' => esc_html__('No event found in Trash','HK'), 
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
		//'menu_icon' => WRAPS_URI . '/assets/images/icon-event.png',
		'supports' => array('title', 'editor', 'thumbnail', 'comments')
	); 

	register_post_type( 'event' , $args );
	
}


/*Prod edit columns*/
function prod_edit_columns_event($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"event_thumbnail" => esc_html__('Thumbnail', 'HK'),
		"title" => "Title",
		"event_starting_time" => "Starting Time",
		"event_ending_time" => "Ending Time",
		"event_costs" => "Costs"
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}


/*Prod custom columns*/
function prod_custom_columns_event($column)
{
	global $post;
	$starting_date = get_meta_option('event_starting_date');
	$starting_time = get_meta_option('event_starting_time');
	$ending_date = get_meta_option('event_ending_date');
	$ending_time = get_meta_option('event_ending_time');
	$costs = get_meta_option('event_costs');
	switch ($column)
	{

		case "event_thumbnail":
		 if ( has_post_thumbnail() ) { the_post_thumbnail('size-50-50'); }
		break;
		
		case "event_starting_time":
		if($starting_date && $starting_time) { echo $starting_date.' '.$starting_time; }
		break;

		case "event_ending_time":
		if($ending_date && $ending_time) { echo $ending_date.' '.$ending_time; }
		break;

		case "event_costs":
		if($costs) { echo $costs; }
		break;
	}
}

?>