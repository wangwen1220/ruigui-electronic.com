<?php
/*
* ----------------------------------------------------------------------------------------------------
* Template Name: Archive
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

<div class="post post-single post-archives-page" id="post-<?php the_ID(); ?>">

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

<div class="latest-posts">
<h3><?php esc_html_e('The 20 latest news','HK'); ?></h3>
<ul>
	<?php 
		$args = array( 
			'post_type' => array('post'),
			'posts_per_page' => 20
		); 
		$posts_query = new WP_Query( $args );
		while ($posts_query->have_posts()) : $posts_query->the_post();
	?>
	<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></li>
	<?php endwhile; wp_reset_postdata(); ?>
</ul>
</div>
<!--end latest posts-->

<div class="page-lists sc-col-3-1">
<h3><?php esc_html_e('Available Pages','HK'); ?></h3>
<ul>
<?php wp_list_pages('title_li=&depth=-1' ); ?>
</ul>
</div>

<div class="category-lists sc-col-3-1">
<h3><?php esc_html_e('Archives by Subject:','HK'); ?></h3>
<ul>
<?php
	$args =  array( 
		'orderby' => 'name',
		'show_count' => 0,
		'hide_empty' => 0,
		'title_li' => '',
		'taxonomy' => 'category'
	); 
	wp_list_categories($args ); 
	?>
</ul>
</div>

<div class="archive-lists sc-col-3-1 sc-last">
<h3><?php esc_html_e('Archives by Month','HK'); ?></h3>
<ul>
	<?php wp_get_archives('type=monthly'); ?>
</ul>
</div>

<div class="clear"></div>

</div>
<!--end post page-->

</article>
<!--End Content-->
</div>
<!--End Primary-->

<!--Begin Secondary-->
<div id="secondary" class="widgets-area">
<?php theme_side_widgets('archive'); ?>
</div>
<!--End Secondary-->

</div>
<!-- #main -->
<?php get_footer(); ?>