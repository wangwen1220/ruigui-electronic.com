<?php
/*
* ----------------------------------------------------------------------------------------------------
* Template Name: Event
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

<?php if(is_page()) : ?>
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
<?php endif; ?>

<?php
###
#
# Get theme options
#
$posts_per_page = get_theme_option('event','list_posts_per_page');

#
#Get Paged
#
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) { 
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

#
#Args
#
$args = array( 
	'post_type' => 'event',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged 
);

query_posts($args);
?>

<?php if (have_posts()): ?>

<?php 
	get_template_part('loops/loop', 'event');
	theme_pagination(); 
?>

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
<?php theme_side_widgets('event'); ?>
</div>
<!--End Secondary-->

</div>
<!-- #main -->
<?php get_footer(); ?>