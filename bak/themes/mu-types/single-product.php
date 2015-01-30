<?php
/*
* ----------------------------------------------------------------------------------------------------
* Product Single
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

<?php
$original_price = get_meta_option('product_original_price');
$discount_price = get_meta_option('product_discount_price');
$external_link = get_meta_option('product_external_link');
$currency = get_theme_option('product','currency');
$buy_now = get_theme_option('product','buy_now');
$desc = get_the_excerpt();

if (have_posts()) : the_post();
?>

<div class="post post-single post-product-single" id="post-<?php the_ID(); ?>">

	<?php theme_single_slider('product'); ?>

	<div class="post-entry clearfix">
	<h2><?php the_title(); ?></h2>
	<?php if($original_price || $discount_price) : ?>
	<p class="post-price">
	<?php if($original_price) : ?><s><?php echo $currency.$original_price; ?> .00</s><?php endif; ?>
	<?php if($discount_price) : ?><span><?php echo $currency.$discount_price; ?> .00</span><?php endif; ?>
	</p>
	<?php endif; ?>
	<?php if($desc) : ?><p class="post-excerpt"><?php echo theme_excerpt(500); ?></p><?php endif; ?>
	<?php if($external_link && $buy_now) :?><p class="post-more"><a href="<?php echo $external_link; ?>" title=""><?php echo $buy_now; ?></a></p><?php endif; ?>
	</div>

	<div class="clear"></div>
	<!--end post content-->

	<div class="post-content"><?php the_content(); ?></div>

	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'HK' ), 'after' => '</div>' ) ); //end link page ?>

</div>
<!--end post page-->

<?php
	$lightbox = get_theme_option('product','related_posts_lightbox');
	$posts_per_page = get_theme_option('product','related_posts_per_page');
	theme_related_post('product-types', $lightbox, $posts_per_page); 
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