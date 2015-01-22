<?php
/*
* ----------------------------------------------------------------------------------------------------
* Blog Loop 1
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>

<ul class="blog-lists blog-lists-2">
<?php 
while (have_posts()) : the_post();

###
#
#Get theme options
#
$lightbox = get_theme_option('blog','list_lightbox');
$time = get_theme_option('blog','enable_time');
$comment = get_theme_option('blog','enable_comment');
$author = get_theme_option('blog','enable_author');
$category = get_theme_option('blog','enable_category');
$excerpt_length = get_theme_option('blog','excerpt_length');
$read_more = get_theme_option('blog','read_more');


#
#Get the $x
#
if($lightbox == true) 
{
	$link = get_image_url();
	$rel = 'rel="prettyPhoto[Blog]"';
}else{
	$link = get_permalink();
	$rel = 'rel="bookmark"';
}

$thumb_size = 'size-225-160';
###
?>

<!--Begin Item-->
<li class="post clearfix">
	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

	<div class="post-entry<?php if ( !has_post_thumbnail() ) { echo ' no-post-thumb'; } ?>">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<p class="post-meta">
		<?php if($author == true): ?><?php esc_html_e('Written by ','HK'); the_author_posts_link(); ?><span>//</span><?php endif; ?>
		<?php if($time == true): ?><?php the_time( get_option('date_format') ); ?><span>//</span><?php endif; ?>
		<?php if($category == true): ?><?php the_category(', '); ?><span>//</span><?php endif; ?>
		<?php if($comment == true): ?><?php comments_popup_link(__('No Comment', 'HK'), __('1Comment', 'HK'), __('%Comments', 'HK'), '', __('Comment Off', 'HK')); ?><span>//</span><?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'HK' ), '', '<span>//</span>' ); ?>
		</p>
		<p class="post-excerpt"><?php echo theme_description($excerpt_length); ?></p>
		<?php if($read_more): ?><p class="post-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo $read_more; ?></a></p><?php endif; ?>
	</div>
</li>
<!--End Item-->

<?php endwhile; ?>
</ul>