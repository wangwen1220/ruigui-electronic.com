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

add_action('init', 'theme_create_post_type_portfolio');
add_filter("manage_edit-portfolio_columns", "prod_edit_columns_portfolio");
add_action("manage_posts_custom_column",  "prod_custom_columns_portfolio");


/*Create post type for portfolio*/
function theme_create_post_type_portfolio() 
{

	$item_slug = get_theme_option('portfolio','single_item_slug');

	$labels = array(
		'name' => esc_html__( 'Portfolios','HK'),
		'singular_name' => esc_html__( 'Portfolio','HK' ),
		'add_new' => esc_html__('Add New','HK'),
		'add_new_item' => esc_html__('Add New Portfolio','HK'),
		'edit_item' => esc_html__('Edit Portfolio','HK'),
		'new_item' => esc_html__('New Portfolio','HK'),
		'view_item' => esc_html__('View Portfolio','HK'),
		'search_items' => esc_html__('Search Portfolio','HK'),
		'not_found' => esc_html__('No portfolio found','HK'),
		'not_found_in_trash' => esc_html__('No portfolio found in Trash','HK'), 
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
		'menu_icon' => WRAPS_URI . '/assets/images/icon-portfolio.png',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
	); 

	register_post_type( 'portfolio' , $args );
	
	register_taxonomy('portfolio-types','portfolio',array(
		'hierarchical' => true, 
		'label' => 'Portfolio Types', 
		'singular_label' => 'Portfolio Types', 
		'rewrite' => true,
		'query_var' => true
	));

}


/*Prod edit columns*/
function prod_edit_columns_portfolio($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"portfolio_thumbnail" => esc_html__('Thumbnail', 'HK'),
		"title" => "Title",
		"portfolio_types" => esc_html__('Categories', 'HK')
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}


/*Prod custom columns*/
function prod_custom_columns_portfolio($column)
{
	global $post;
	switch ($column)
	{
		case "portfolio_types":
		$terms = get_the_terms($post->ID, 'portfolio-types');
				
		if (! empty($terms)) {
			foreach($terms as $t)
				$output[] = '<a href="edit.php?post_type=portfolio&portfolio-types='.$t->slug.'">'. esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'portfolio-types', 'display')) . '</a>';
			$output = implode(', ', $output);
		} else {
			$t = get_taxonomy('portfolio-types');
			$output = 'No '.$t->label;
		}

		echo $output;
		break;

		case "portfolio_thumbnail":
		 if ( has_post_thumbnail() ) { the_post_thumbnail('size-50-50'); }
		break;	
	}
}

?>