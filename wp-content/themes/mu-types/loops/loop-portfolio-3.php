<?php
/*
* ----------------------------------------------------------------------------------------------------
* Portfolio Loop 3
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>
<?php
#
#Category Nav
#
$cat_args = array(	
	'taxonomy'	=> 'portfolio-types',
	'hide_empty'=> 0
);

?>
<nav class="sortable-menu portfolio-sortable-menu">
<ul class="filter clearfix">
<li class="active all-items" ><a href="?filter=all"><?php esc_html_e('All','HK'); ?></a></li>
<?php
	$terms = get_categories($cat_args); 
	foreach ($terms as $term) {
		echo '<li class="cat-item '.$term->slug.'"><a href="?filter='.$term->slug.'" data-value="'.$term->slug.'" >'.$term->name.'</a>';
	}
?>
</ul>
</nav>

<ul class="portfolio-sortable-grid portfolio-lists portfolio-lists-2 clearfix">
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

#
#Get cats
#
$item_categories = get_the_terms ($post->ID, 'portfolio-types');
foreach ($item_categories as $key => $cat) 
{
	$item_categories[$key] = $cat->slug;
}
$sort_classes = implode( ' ',$item_categories);
$post_class = 'class="post item col-4-1 '.$sort_classes.'"';
###
?>

<!--Begin Item-->
<li <?php echo $post_class; ?> data-id="post-<?php echo $loop_count; ?>">

	<div class="post-entry clearfix">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</div>

	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

</li>
<!--End Item-->

<?php endwhile; ?>
</ul>