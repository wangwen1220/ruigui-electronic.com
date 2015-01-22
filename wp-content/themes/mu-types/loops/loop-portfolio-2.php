<?php
/*
* ----------------------------------------------------------------------------------------------------
* Portfolio Loop 2
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

<ul class="portfolio-lists portfolio-lists-2 clearfix">
<?php
#
#Default count
#
$loop_count = 0;

while (have_posts()) : the_post();

###
#
#Get theme options
#
$lightbox = get_theme_option('portfolio','list_lightbox');


#
#Get the $x
#
if($lightbox == true) 
{
	$link = get_image_url();
	$rel = 'rel="prettyPhoto[Portfolio]"';
}else{
	$link = get_permalink();
	$rel = 'rel="bookmark"';
}

$thumb_size = 'size-225-130';

#
#Get post class
#
$loop_count++; 

if (($loop_count -1) % 4 == 0) {
	$post_class = 'class="post post-'.$loop_count.' col-4-1 col-first"';
}else{
	$post_class = 'class="post post-'.$loop_count.' col-4-1"';
}
###
?>

<!--Begin Item-->
<li <?php echo $post_class; ?>>	

	<div class="post-entry clearfix">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</div>

	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

</li>
<!--End Item-->

<?php endwhile; ?>
</ul>