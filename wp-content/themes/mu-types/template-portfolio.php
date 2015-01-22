<?php
/*
* ----------------------------------------------------------------------------------------------------
* Template Name: Portfolio
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
$list_style = get_theme_option('portfolio','list_style');
$posts_per_page = get_theme_option('portfolio','list_posts_per_page');

#
#Get list style for archive
#
if(is_tax() && $list_style == '3') 
{
	$list_style = 2;
}


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
	'post_type' => 'portfolio',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged 
);

#
#End Query String
#
if(is_page())
{
	query_posts($args);
}
else
{
	global $wp_query;
	$query_args = array_merge( $wp_query->query, $args );
	query_posts($query_args);
}
###
?>

<?php if (have_posts()): ?>

<?php
	get_template_part('loops/loop', 'portfolio-'.$list_style.'');
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

</div>
<!-- #main -->
<?php get_footer(); ?>