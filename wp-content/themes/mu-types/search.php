<?php
/*
* ----------------------------------------------------------------------------------------------------
* Search
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
	'post_type' => array('post', 'page', 'portfolio', 'product', 'download', 'event', 'team'),
	'posts_per_page' => 10,
	'paged' => $paged 
);


#
#End Query String
#
global $wp_query;
$query_args = array_merge( $wp_query->query, $args );
query_posts($query_args);
?>

<?php if (have_posts()): ?>

<ul class="search-lists">

<?php while (have_posts()) : the_post(); ?>
<li>
<div class="post-entry clearfix">
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="post-excerpt"><?php echo theme_description(200); ?></p>
<p class="post-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html_e('Read More','dotheme'); ?></a></p>
</div>
</li>
<?php endwhile; ?>

</ul>

<?php theme_pagination(); ?>

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
<?php theme_side_widgets('search'); ?>
</div>
<!--End Secondary-->

</div>
<!-- #main -->
<?php get_footer(); ?>