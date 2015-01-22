<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Slidershow
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

add_shortcode('slidershow', 'theme_sc_slidershow');

function theme_sc_slidershow( $atts, $content = null)
{

	global $post;
	extract(shortcode_atts(
        array(
            'order' => 'ASC',
            'orderby' => 'menu_order',
			'id' => $post->ID,
			'posts_per_page' => -1,
			'size' => 'size-shortcode-slider',
			'show_caption' => 'yes',
			'show_desc' => 'yes',
			'include' => '',
			'exclude' => ''
    ), $atts));	

	if ( !empty($include) ) 
	{
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$args = array(
			'post_parent' => $id,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'post_status' => 'inherit',
			'order' => $order,
			'orderby' => $orderby,
			'include' => $include,
			'posts_per_page' => $posts_per_page
		);	
	}
	elseif ( !empty($exclude) )
	{
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$args = array(
			'post_parent' => $id,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'post_status' => 'inherit',
			'order' => $order,
			'orderby' => $orderby,
			'exclude' => $exclude,
			'posts_per_page' => $posts_per_page
		);	
	}
	else
	{
		$args = array(
			'post_parent' => $id,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'post_status' => 'inherit',
			'order' => $order,
			'orderby' => $orderby,
			'posts_per_page' => $posts_per_page
		);	
	}

	$attachments = get_posts( $args );

	$slidershow_control_nav = (990 - (count($attachments) * 16 - 2))/2;
	$slidershow_pauseplay = (430 - 40)/2;
	$slidershow_loader_height = 430 + 25;

	if ($attachments)
	{
		$output = '<div class="flex-container sc-flex-container">'."\n";
		$output .= '<div class="flexslider">'."\n";
		$output .= '<ul class="slides clearfix">'."\n";
		foreach($attachments as $attachment)
		{
			$full_image = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$size_image = wp_get_attachment_image_src( $attachment->ID, $size );
			$title = trim(strip_tags(apply_filters( 'the_title', $attachment->post_title )));
			$caption = trim(strip_tags(apply_filters( 'the_excerpt', $attachment->post_excerpt )));
			$desc = trim(strip_tags(apply_filters( 'the_content', $attachment->post_content )));
			$alt = trim(strip_tags(get_meta_option('_wp_attachment_image_alt', $attachment->ID)));

			$output .= '<li>';
			$output .= '<a href="'.$full_image[0].'" rel="prettyPhoto[Slider]" title="'.$title.'">';
			$output .= '<img width="'.$size_image[1].'" height="'.$size_image[2].'" src="'.$size_image[0].'" class="wp-post-image" alt="'.$alt.'" />';
			$output .= '</a>';

			if(($caption && $show_caption == 'yes') || ($desc && $show_desc == 'yes'))
			{
				$output .='<div class="flex-caption">';
				if($caption && $show_caption == 'yes') { $output .='<h3>'.$caption.'</h3>'; }
				if($desc && $show_desc == 'yes') { $output .='<p>'.$desc.'</p>'; }
				$output .='</div>';
			}

			$output .= '</li>'."\n";
		}
		wp_reset_postdata();
		$output .= '</ul>'."\n";
		$output .= '</div>'."\n";
		$output .= '<div class="loader"></div>'."\n";
		$output .= '</div>'."\n";

		$output .= "\n";
		$output .= '<!--Extend CSS-->'."\n";
		$output .= '<style type="text/css">'."\n";
		$output .= '.sc-flex-container .flex-control-nav { left: '.$slidershow_control_nav.'px; }'."\n";
		$output .= '.sc-flex-container .flex-pauseplay, .sc-flex-container .flex-direction-nav li a { top: '.$slidershow_pauseplay.'px; }'."\n";
		$output .= '.sc-flex-container .flex-container .loader { height: '.$slidershow_loader_height.'px; }'."\n";	
		$output .= '</style>'."\n";
	}
	

	return $output;

}

?>