<?php
/*
* ----------------------------------------------------------------------------------------------------
* Single
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
get_header(); 
?>
<div id="main" class="clearfix side-right">

<!--Begin Primary-->
<div id="primary">
<!--Begin Content-->
<article id="content">

<?php 
if (have_posts()) : the_post();

#
#Get theme options
#
$time = get_theme_option('blog','enable_time');
$comment = get_theme_option('blog','enable_comment');
$author = get_theme_option('blog','enable_author');
$category = get_theme_option('blog','enable_category');
?>

<div class="post post-single post-blog-single" id="post-<?php the_ID(); ?>">

	<?php theme_single_slider('blog'); ?>

	<div class="post-entry">
		<?php if($time == true): ?><h5><?php printf( __('%1$s', 'HK'), get_the_time('d/m/Y') ); ?></h5><?php endif; ?>
		<h2><?php the_title(); ?></h2>
		<p class="post-meta">
		<?php if($author == true): ?><?php esc_html_e('Written by ','HK'); the_author_posts_link(); ?><span>//</span><?php endif; ?>
		<?php if($category == true): ?><?php the_category(', '); ?><span>//</span><?php endif; ?>
		<?php if($comment == true): ?><?php comments_popup_link(__('No Comment', 'HK'), __('1Comment', 'HK'), __('%Comments', 'HK'), '', __('Comment Off', 'HK')); ?><span>//</span><?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'HK' ), '', '<span>//</span>' ); ?>
		</p>
	</div>

	<div class="post-content"><?php the_content(); ?></div>
	<!--end post content-->

	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'HK' ), 'after' => '</div>' ) ); //end link page ?>

	<?php echo get_the_term_list( $post->ID, 'post_tag', '<div class="tags">'. __('<span>Tagged:</span> ','HK'), ' , ', '</div>' ); ?>

</div>
<!--end post page-->

<?php theme_post_author(); ?>

<?php comments_template( '', true ); ?>

<?php else : ?>

<!--Begin No Post-->
<div class="no-post">
	<h2><?php esc_html_e('Not Found', 'HK'); ?></h2>
	<p><?php esc_html_e("Sorry, but you are looking for something that isn't here.", 'HK'); ?></p>
</div>
<!--End No Post-->

<?php endif; ?>

</article>
<!--End Content-->
</div>
<!--End Primary-->

<!--Begin Secondary-->
<div id="secondary" class="widgets-area">
<?php theme_side_widgets('blog'); ?>
</div>
<!--End Secondary-->

</div>
<!-- #main -->
<?php get_footer(); ?>