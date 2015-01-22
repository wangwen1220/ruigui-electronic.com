<?php 
/*
* ----------------------------------------------------------------------------------------------------
* RELATED POSTS FUNCTIONS
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

function theme_related_post($taxonomy, $lightbox, $posts_per_page) 
{
?>
	<div class="related-post-lists">
	<ul class="clearfix">
	<?php
		$loop_count = 0;
		$related_posts = get_posts_related_by_taxonomy($taxonomy, $posts_per_page);
		while ($related_posts->have_posts()) : $related_posts->the_post();
		
		$loop_count ++;
		$thumb_size = 'size-225-130';

		if (($loop_count -1) % 4 == 0) 
		{
			$post_class = ' class="col-4-1 col-first"';
		}else{
			$post_class = ' class="col-4-1"';
		}

		if($lightbox == true) 
		{
			$link = get_image_url();
			$rel = 'rel="prettyPhoto[Related Post]"';
		}else{
			$link = get_permalink();
			$rel = 'rel="bookmark"';
		}
	?>
	<li<?php echo $post_class; ?>>
	<div class="post-entry"><h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2></div>
	<?php theme_list_thumb($link, $rel, $thumb_size); ?>
	</li>
	<?php endwhile; wp_reset_postdata(); ?>
	</ul>
	</div>
<?php
}

?>