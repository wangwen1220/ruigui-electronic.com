<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Portfolio Slider List
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

add_shortcode('portfolio_slider_list', 'theme_sc_portfolio_slider_list');

function theme_sc_portfolio_slider_list( $atts, $content = null)
{

	extract(shortcode_atts(
        array(
			'title' => 'Latest Works',
            'category_slug_name' => '',
			'posts_per_page' => '8',
			'show_title' => 'yes',
			'show_desc' => 'yes',
			'desc_length' => '60',
			'lightbox' => 'yes',
			'fade' => 'yes'
    ), $atts));
	
	$output = '<div class="sc-slider-list sc-portfolio-slider-list">'."\n";
	$output .= '<h3 class="title">'.$title.'</h3>'."\n";
	$output .= theme_sc_portfolio_slider_list_loop($category_slug_name, $posts_per_page, $show_title, $show_desc, $desc_length, $lightbox);
	$output .= '</div>'."\n";

	return $output;

}



function theme_sc_portfolio_slider_list_loop($category_slug_name, $posts_per_page, $show_title, $show_desc, $desc_length, $lightbox)
{
	$args = array( 
				'post_type' => 'portfolio',
				'portfolio-types' => $category_slug_name,
				'posts_per_page' => $posts_per_page,
				'post_status' => 'publish'
				); 
	$query = new WP_Query( $args );

	$output = '<ul class="clearfix jcarousel-skin">'."\n";

	while ($query->have_posts()) { $query->the_post();

		$post_id = get_the_id();

		if($lightbox == 'yes') 
		{
			$link = get_image_url();
			$rel = 'rel="prettyPhoto"';
		}else{
			$link = get_permalink();
			$rel = 'rel="bookmark"';
		}

		$output .= '<li>'."\n";

		if ( has_post_thumbnail()) {
			$output .= '<figure class="post-thumb post-thumb-preload post-thumb-fade">';
			$output .= '<a href="'.$link.'" '.$rel.' class="image-link">'."\n";
			$output .= get_the_post_thumbnail($post_id,'size-225-130');
			$output .= '</a>'."\n";
			$output .= '</figure>';
		}

		if($show_title == 'yes' || $show_desc == 'yes') {

			$output .= '<section>'."\n";

			if($show_title == 'yes') { $output .= '<h5 class="topic-title"><a href="'.get_permalink().'"  rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a></h5>'."\n"; }
			if($show_desc == 'yes') { $output .= '<p class="topic-desc">'.theme_description($desc_length).'</p>'; }

			$output .= '</section>'."\n";

		}

		$output .= '</li>'."\n";

	}
	wp_reset_postdata();

	$output .= '</ul>'."\n";

	return $output;
}

?>