<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Single Slider
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

function theme_single_slider($type)
{
	$enable_slider_type = get_theme_option($type, 'enable_single_slider');
	$posts_per_page_type = get_theme_option($type, 'single_slider_posts_per_page');

	switch($type)
	{
		case 'blog': 
			$size = 'size-blog-single';
			$enable_slider = $enable_slider_type;
			$posts_per_page = $posts_per_page_type;
		break;

		case 'portfolio': 
			$size = 'size-portfolio-single';
			$enable_slider = $enable_slider_type;
			$posts_per_page = $posts_per_page_type;
		break;

		case 'product': 
			$size = 'size-product-single';
			$enable_slider = $enable_slider_type;
			$posts_per_page = $posts_per_page_type;
		break;

		case 'event': 
			$size = 'size-event-single';
			$enable_slider = $enable_slider_type;
			$posts_per_page = $posts_per_page_type;
		break;

		case 'portfolio-list': 
			$size = 'size-600-400';
			$enable_slider = 'yes';
			$posts_per_page = -1;
		break;
	}

	global $post;
	$args = array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_status' => 'inherit',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => $posts_per_page
	);
	$attachments = get_posts( $args );
	
	if ($attachments && $enable_slider == 'yes') 
	{
		if(count($attachments) > 1)
		{
			echo '<div class="'.$type.'-slider-wrap clearfix">'."\n";

			if($type == 'portfolio-list')
			{
				echo '<div id="portfolio-list-slider-'.get_the_id().'" class="post-'.$type.'-single-slider portfolio-list-slider post-single-slider">'."\n";
			}
			else
			{
				echo '<div id="single-slider" class="post-'.$type.'-single-slider post-single-slider">'."\n";
			}

			echo '<div class="slides_container">'."\n";
			foreach($attachments as $attachment)
			{
				$full_image = wp_get_attachment_image_src( $attachment->ID, 'full' );
				$size_image = wp_get_attachment_image_src( $attachment->ID, $size );
				$title = apply_filters( 'the_title', $attachment->post_title );
				echo '<div class="slide">';
				echo '<a href="'.$full_image[0].'" rel="prettyPhoto[Slider]" title="'.$title.'">';
				echo '<img width="'.$size_image[1].'" height="'.$size_image[2].'" src="'.$size_image[0].'" class="wp-post-image" alt="'.$title.'" />';
				echo '</a>';
				echo '</div>'."\n";
			}
			wp_reset_postdata();
			echo '</div>'."\n";
			echo '<div class="loader"></div>'."\n";
			echo '</div>'."\n";
			echo '</div>'."\n";

			if($type == 'portfolio-list')
			{
				echo '<script type="text/javascript">'."\n";
				echo '//<![CDATA['."\n";
				echo 'jQuery(document).ready(function(){'."\n";
				echo '	jQuery(".slides_container").fadeIn(1000);'."\n";
				echo '	jQuery(".portfolio-list-slider .loader").css({display: "none"});'."\n";
				echo '	jQuery("#portfolio-list-slider-'.get_the_id().'").slides({'."\n";
				echo '		preload: false,'."\n";
				echo '		generatePagination: true,'."\n";
				echo '		generateNextPrev: true,'."\n";
				echo '		paginationClass: "single-slider-pagination",'."\n";
				echo '		next: "single-slider-next",'."\n";
				echo '		prev: "single-slider-prev",'."\n";
				echo '		effect: "fade",'."\n";
				//echo '		play: 3000,'."\n";
				//echo '		pause: 800,'."\n";
				//echo '		bigTarget: true,'."\n";
				echo '		autoHeight: true,'."\n";
				echo '		bigTarget: true'."\n";
				echo '	});'."\n";
				echo '});'."\n";
				echo '//]]>'."\n";
				echo '</script>'."\n";
			}
		}//End Slider
		else
		{
			echo '<div class="post-single-slider post-thumb post-thumb-preload post-thumb-fade">';
			foreach($attachments as $attachment)
			{
				$full_image = wp_get_attachment_image_src( $attachment->ID, 'full' );
				$size_image = wp_get_attachment_image_src( $attachment->ID, $size );
				$title = apply_filters( 'the_title', $attachment->post_title );
				echo '<a href="'.$full_image[0].'" rel="prettyPhoto" title="'.$title.'" class="image-link">';
				echo '<img width="'.$size_image[1].'" height="'.$size_image[2].'" src="'.$size_image[0].'" class="wp-post-image" alt="'.$title.'"  />';
				echo '</a>';
			}
			wp_reset_postdata();
			echo '</div>'."\n";
		}//End Image
	}
}

?>