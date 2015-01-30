<?php
/*
* ----------------------------------------------------------------------------------------------------
* Template Name: Gallery
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
get_header(); 
?>

<div id="main" class="clearfix fullwidth">

<!--Begin Primary-->
<div id="primary">
<!--Begin Content-->
<article id="content">

<div class="post post-single post-gallery-single clearfix" id="post-<?php the_ID(); ?>">

<?php 
	if (have_posts()) : the_post();  
	$content = get_the_content(); 
?>
<?php if($content) : ?>
	<div class="post-content">
	<?php the_content(); ?>
	</div>
<?php endif; ?>
<?php endif; ?>

<?php 
global $post;
$args = array(
	'post_parent' => $post->ID,
	'post_type' => 'attachment',
	'post_mime_type' => 'image',
	'post_status' => 'inherit',
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'posts_per_page' => -1
);
$attachments = get_posts( $args );
if($attachments)
{
	$loop_count = 0;

	echo '<ul class="clearfix">'."\n";
	foreach($attachments as $attachment)
	{
		$loop_count++; 
		if (($loop_count -1) % 10 == 0) 
		{
			$post_class = 'class="post post-thumb post-thumb-preload post-thumb-fade col-first"';
		}else{
			$post_class = 'class="post post-thumb post-thumb-preload post-thumb-fade"';
		}
		$full_image = wp_get_attachment_image_src( $attachment->ID, 'full' );
		$size_image = wp_get_attachment_image_src( $attachment->ID, 'size-90-90' );
		$title = apply_filters( 'the_title', $attachment->post_title );
		echo '<li '.$post_class.'>';
		echo '<a href="'.$full_image[0].'" rel="prettyPhoto[Gallery]" title="'.$title.'" alt="'.$title.'" class="image-link">';
		echo '<img width="'.$size_image[1].'" height="'.$size_image[2].'" src="'.$size_image[0].'" class="wp-post-image" />';
		echo '</a>';
		echo '</li>'."\n";
	}
	wp_reset_postdata();
	echo '</ul>'."\n";
}
?>
</div>
<!--end gallery page-->

</article>
<!--End Content-->
</div>
<!--End Primary-->

</div>
<!-- #main -->
<?php get_footer(); ?>