<?php
/*
* ----------------------------------------------------------------------------------------------------
* Template Name: Home
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
$slider_type = get_theme_option('slidershow','slider_type');
if($slider_type != 'disable')
{
	theme_home_slider($slider_type); 
}
?>

<?php if (have_posts()) : the_post(); ?>

<div class="post post-single" id="post-<?php the_ID(); ?>">

	<div class="post-content"><?php the_content(); ?></div>
	<!--end post content-->

</div>
<!--end post page-->

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