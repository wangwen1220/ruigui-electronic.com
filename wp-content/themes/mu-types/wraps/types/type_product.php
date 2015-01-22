<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Create Post Type For Product
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

add_action('init', 'theme_create_post_type_product');
add_filter("manage_edit-product_columns", "prod_edit_columns_product");
add_action("manage_posts_custom_column",  "prod_custom_columns_product");


/*Create post type for product*/
function theme_create_post_type_product() 
{

	$item_slug = get_theme_option('product','single_item_slug');

	$labels = array(
		'name' => esc_html__( 'Products','HK'),
		'singular_name' => esc_html__( 'Product','HK' ),
		'add_new' => esc_html__('Add New','HK'),
		'add_new_item' => esc_html__('Add New Product','HK'),
		'edit_item' => esc_html__('Edit Product','HK'),
		'new_item' => esc_html__('New Product','HK'),
		'view_item' => esc_html__('View Product','HK'),
		'search_items' => esc_html__('Search Product','HK'),
		'not_found' => esc_html__('No product found','HK'),
		'not_found_in_trash' => esc_html__('No product found in Trash','HK'), 
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
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
	); 

	register_post_type( 'product' , $args );
	
	register_taxonomy('product-types','product',array(
		'hierarchical' => true, 
		'label' => 'Product Types', 
		'singular_label' => 'Product Types', 
		'rewrite' => true,
		'query_var' => true
	));

}


/*Prod edit columns*/
function prod_edit_columns_product($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"product_thumbnail" => esc_html__('Thumbnail', 'HK'),
		"title" => esc_html__('Title', 'HK'),
		"product_types" => esc_html__('Categories', 'HK'),
		"original_price" => esc_html__('Original Price', 'HK'),
		"discount_price" => esc_html__('Discount Price', 'HK')
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}


/*Prod custom columns*/
function prod_custom_columns_product($column)
{
	global $post;
	$original_price = get_meta_option('product_original_price');
	$discount_price = get_meta_option('product_discount_price');
	$currency = get_theme_option('product','currency');
	switch ($column)
	{
		case "product_types":
		$terms = get_the_terms($post->ID, 'product-types');
				
		if (! empty($terms)) {
			foreach($terms as $t)
				$output[] = '<a href="edit.php?post_type=product&product-types='.$t->slug.'">'. esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'product-types', 'display')) . '</a>';
			$output = implode(', ', $output);
		} else {
			$t = get_taxonomy('product-types');
			$output = 'No '.$t->label;
		}
		
		echo $output;
		break;

		case "original_price":
		if($original_price) { echo '<s>'.$currency.$original_price.' 00</s>'; }
		break;

		case "discount_price":
		if($discount_price) { echo $currency.$discount_price.' 00'; }
		break;

		case "product_thumbnail":
		 if ( has_post_thumbnail() ) { the_post_thumbnail('size-50-50'); }
		break;	
	}
}

?>