<?php 
/*
* ----------------------------------------------------------------------------------------------------
* PAGE HEADER FUNCTIONS
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

function theme_page_header() 
{
	if(!is_front_page()) {
		global $wp_query, $wp_rewrite, $post, $page, $paged;

		$page_desc = stripslashes(get_meta_option('page_header_desc'));
		$breadcrumbs = get_theme_option('general','enable_breadcrumbs');

		$blog_page_id = get_theme_option('blog','page_for_blog');
		$portfolio_page_id = get_theme_option('portfolio','page_for_portfolio');
		$product_page_id = get_theme_option('product','page_for_product');
		$download_page_id = get_theme_option('download','page_for_download');
		$event_page_id = get_theme_option('event','page_for_event');
		$team_page_id = get_theme_option('team','page_for_team');

		$blog_desc = stripslashes(get_meta_option('page_header_desc', $blog_page_id));
		$portfolio_desc = stripslashes(get_meta_option('page_header_desc', $portfolio_page_id));
		$product_desc = stripslashes(get_meta_option('page_header_desc', $product_page_id));
		$download_desc = stripslashes(get_meta_option('page_header_desc', $download_page_id));
		$event_desc = stripslashes(get_meta_option('page_header_desc', $event_page_id));
		$team_desc = stripslashes(get_meta_option('page_header_desc', $team_page_id));


		echo '<div class="site-page-header">';

		echo '<h3>';

		if ( is_category() ) 
		{ 		
			single_term_title();
		} 
		elseif (is_day()) 
		{
			echo get_the_time('F jS, Y');
		} 
		elseif (is_month())
		{ 
			echo get_the_time('F, Y'); 
		} 
		elseif (is_year()) 
		{ 
			echo get_the_time('Y'); 
		} 
		elseif (is_search()) 
		{
			echo __('Search results','HK'); 
		} 
		elseif (is_author()) 
		{ 
			echo __('Author','HK');

		} 
		elseif (is_tag()) 
		{
			echo __('Tags','HK'); 
		} 
		elseif(is_tax())
		{
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo $term->name;
		}
		elseif(is_page())
		{
			echo get_the_title();
		}
		elseif ( is_home() ) 
		{
			$home_page = get_page( $wp_query->get_queried_object_id() );
			echo get_the_title( $home_page->ID );
		}
		elseif( is_single()) 
		{
			if( get_post_type( $post ) == 'post' ) {
				echo __('Blog','HK');
			}elseif( get_post_type( $post ) == 'portfolio' ) {
				echo __('Portfolio','HK');
			}elseif( get_post_type( $post ) == 'product' ) {
				echo __('Product','HK');
			}elseif( get_post_type( $post ) == 'download' ) {
				echo __('Download','HK');
			}
			elseif( get_post_type( $post ) == 'event' ) {
				echo __('Event','HK');
			}
			elseif( get_post_type( $post ) == 'team' ) {
				echo __('Team','HK');
			}
		}
		elseif(is_404())
		{
			echo __('404','HK');
		}
		else
		{
			echo __('Archives','HK');
		}

		echo '</h3>';

		if((is_archive() || is_singular('post')) && $blog_desc)
		{
			echo '<div class="page-header-desc">'.$blog_desc.'</div>';
		}
		elseif((is_tax('portfolio-types') || is_singular('portfolio')) && $portfolio_desc)
		{
			echo '<div class="page-header-desc">'.$portfolio_desc.'</div>';
		}
		elseif((is_tax('product-types') || is_singular('product')) && $product_desc)
		{
			echo '<div class="page-header-desc">'.$product_desc.'</div>';
		}
		elseif(is_page() && $page_desc) 
		{
			echo '<div class="page-header-desc">'.$page_desc.'</div>';
		}
		elseif( is_single()) 
		{
			if( get_post_type( $post ) == 'download' && $download_desc) {
				echo '<div class="page-header-desc">'.$download_desc.'</div>';
			}
			elseif( get_post_type( $post ) == 'event' && $event_desc ) {
				echo '<div class="page-header-desc">'.$event_desc.'</div>';
			}
			elseif( get_post_type( $post ) == 'team' && $team_desc ) {
				echo '<div class="page-header-desc">'.$team_desc.'</div>';
			}
		}

		if($breadcrumbs == 'yes')
		{
			new theme_breadcrumbs();
		}	
		echo '</div>';

		//Single pagenation
		if(is_single())
		{
		echo '<nav class="single-post-pagenation">';
		echo '<ul class="clearfix">';
		previous_post_link( '<li class="single-previous">%link</li>', __( 'Previous', 'HK' ) );
		
		if($blog_page_id && is_singular('post')) 
		{
			echo '<li class="single-link"><a href="'.get_page_link($blog_page_id).'">';
			esc_html_e('All','HK');
			echo '</a></li>';
		}
		elseif($portfolio_page_id && is_singular('portfolio')) 
		{
			echo '<li class="single-link"><a href="'.get_page_link($portfolio_page_id).'">';
			esc_html_e('All','HK');
			echo '</a></li>';
		}
		elseif($product_page_id && is_singular('product')) 
		{
			echo '<li class="single-link"><a href="'.get_page_link($product_page_id).'">';
			esc_html_e('All','HK');
			echo '</a></li>';
		}
		elseif($download_page_id && is_singular('download')) 
		{
			echo '<li class="single-link"><a href="'.get_page_link($download_page_id).'">';
			esc_html_e('All','HK');
			echo '</a></li>';
		}
		elseif($event_page_id && is_singular('event')) 
		{
			echo '<li class="single-link"><a href="'.get_page_link($event_page_id).'">';
			esc_html_e('All','HK');
			echo '</a></li>';
		}
		elseif($team_page_id && is_singular('team')) 
		{
			echo '<li class="single-link"><a href="'.get_page_link($team_page_id).'">';
			esc_html_e('All','HK');
			echo '</a></li>';
		}

		next_post_link( '<li class="single-next">%link</li>', __( 'Next', 'HK' )); 
		echo '</ul>';
		echo '</nav>';
		}
	}
}

?>