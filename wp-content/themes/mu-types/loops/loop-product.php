<?php
/*
* ----------------------------------------------------------------------------------------------------
* Product Loop
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>
<?php
#
#Category Nav
#
$menu_args = array(
	'taxonomy' => 'product-types',
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
$product_page_id = get_theme_option('product','page_for_product');
?>
<nav class="sortable-menu">
<ul class="clearfix">
<?php
	if(get_the_ID() == $product_page_id ) {
		$current_class = ' class="current-cat"';
	}else{
		$current_class = '';
	}

	if($product_page_id) {
		echo '<li'.$current_class.'><a href="'.get_page_link($product_page_id).'">';
		esc_html_e('All','HK');
		echo '</a></li>';
	}

	wp_list_categories( $menu_args ); 
?>
</ul>
</nav>

<ul class="product-lists clearfix">
<?php
#
#Default count
#
$loop_count = 0;

while (have_posts()) : the_post();

###
#
#Custom Files
#
$original_price = get_meta_option('product_original_price');
$discount_price = get_meta_option('product_discount_price');
$external_link = get_meta_option('product_external_link');


#
#Get theme options
#
$lightbox = get_theme_option('product','list_lightbox');
$currency = get_theme_option('product','currency');
$excerpt_length = get_theme_option('product','excerpt_length');
$read_more = get_theme_option('product','read_more');
$buy_now = get_theme_option('product','buy_now');


#
#Get the $x
#
if($lightbox == true) 
{
	$link = get_image_url();
	$rel = 'rel="prettyPhoto[Product]"';
}else{
	$link = get_permalink();
	$rel = 'rel="bookmark"';
}

$thumb_size = 'size-225-160';

#
#Get post class
#
$loop_count++; 

if (($loop_count -1) % 2 == 0) {
	$post_class = 'class="post post-'.$loop_count.' col-2-1 col-first"';
}else{
	$post_class = 'class="post post-'.$loop_count.' col-2-1"';
}
###
?>

<!--Begin Item-->
<li <?php echo $post_class; ?>>	

	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

	<div class="post-entry clearfix">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php if($original_price || $discount_price) : ?>
		<p class="post-price">
		<?php if($original_price) : ?><s><?php echo $currency.$original_price; ?> .00</s><?php endif; ?>
		<?php if($discount_price) : ?><span><?php echo $currency.$discount_price; ?> .00</span><?php endif; ?>
		</p>
		<?php endif; ?>
		<p class="post-excerpt"><?php echo theme_description($excerpt_length); ?></p>
		<?php if($read_more) :?><p class="post-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo $read_more; ?></a></p><?php endif; ?>
		<?php if($external_link && $buy_now) :?><p class="post-more"><a href="<?php echo $external_link; ?>" title=""><?php echo $buy_now; ?></a></p><?php endif; ?>
	</div>

</li>
<!--End Item-->

<?php endwhile; ?>
</ul>