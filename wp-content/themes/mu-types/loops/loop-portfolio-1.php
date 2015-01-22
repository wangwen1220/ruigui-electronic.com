<?php
/*
* ----------------------------------------------------------------------------------------------------
* Portfolio Loop 1
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>
<?php
#
#Category Nav
#
$menu_args = array(
	'taxonomy' => 'portfolio-types',
	'orderby' => 'name',
	'show_count' => 0, // 1 for yes, 0 for no
	'hierarchical' => 1, // 1 for yes, 0 for no
	'hide_empty' => 0, // 1 for yes, 0 for no
	'title_li' => '',
	'depth' => 1
);

#
#Get page id
#
$portfolio_page_id = get_theme_option('portfolio','page_for_portfolio');
?>
<nav class="sortable-menu">
<ul class="clearfix">
<?php
	if(get_the_ID() == $portfolio_page_id ) {
		$current_class = ' class="current-cat"';
	}else{
		$current_class = '';
	}

	if($portfolio_page_id) {
		echo '<li'.$current_class.'><a href="'.get_page_link($portfolio_page_id).'">';
		esc_html_e('All','HK');
		echo '</a></li>';
	}

	wp_list_categories( $menu_args ); 
?>
</ul>
</nav>

<ul class="portfolio-lists portfolio-lists-1">
<?php 
while (have_posts()) : the_post();

###
#
#Get theme options
#
$excerpt_length = get_theme_option('portfolio','excerpt_length');
$read_more = get_theme_option('portfolio','read_more');
###
?>

<!--Begin Item-->
<li class="post clearfix">	

	<div class="post-entry clearfix">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="post-time"><b><?php esc_html_e('Posted On:','HK'); ?></b><div class="date"><?php the_time( get_option('date_format') ); ?></div></div>
		<div class="post-cats"><b><?php esc_html_e('Categories:','HK'); ?></b><?php echo get_the_term_list( $post->ID, 'portfolio-types', '<div class="cats clearfix">', '', '</div>' ); ?></div>
		<div class="post-excerpt"><?php echo theme_description($excerpt_length); ?></div>
		<?php if($read_more): ?><div class="post-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo $read_more; ?></a></div><?php endif; ?>
	</div>

	<?php theme_single_slider('portfolio-list'); ?>

</li>
<!--End Item-->

<?php endwhile; ?>
</ul>