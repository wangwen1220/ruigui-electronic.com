<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Gallery
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

add_shortcode('gallery', 'theme_sc_gallery');

function theme_sc_gallery( $atts, $content = null)
{
	global $post;
	extract(shortcode_atts(
        array(
			'order' => 'ASC',
            'orderby' => 'menu_order',
			'id' => $post->ID,
			'columns' => 4,
			'size' => 'size-90-90',
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
			'posts_per_page' => -1
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
			'posts_per_page' => -1
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
			'posts_per_page' => -1
		);	
	}

	$attachments = get_posts( $args );

	if ($attachments)
	{
		$output = "\n";
		$output .= '<ul class="sc-gallery clearfix">'."\n";
		$loop_count = 0;
		foreach($attachments as $attachment)
		{
			$loop_count++; 
			if (($loop_count -1) % $columns == 0) 
			{
				$post_class = 'class="post post-thumb post-thumb-preload post-thumb-fade col-first"';
			}else{
				$post_class = 'class="post post-thumb post-thumb-preload post-thumb-fade"';
			}
			$full_image = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$size_image = wp_get_attachment_image_src( $attachment->ID, $size );
			$title = apply_filters( 'the_title', $attachment->post_title );
			$output .= '<li '.$post_class.'>';
			$output .= '<a href="'.$full_image[0].'" rel="prettyPhoto[Gallery]" title="'.$title.'" alt="'.$title.'" class="image-link">';
			$output .= '<img width="'.$size_image[1].'" height="'.$size_image[2].'" src="'.$size_image[0].'" class="wp-post-image" />';
			$output .= '</a>';
			$output .= '</li>'."\n";
		}
		wp_reset_postdata();
		$output .= '</ul>'."\n";
	}

	return $output;

}

?>