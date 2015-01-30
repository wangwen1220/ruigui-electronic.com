<?php
/*
* ----------------------------------------------------------------------------------------------------
* Portfolio Single
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
if (have_posts()) : the_post();
?>

<div class="post post-single post-portfolio-single" id="post-<?php the_ID(); ?>">

	<div class="post-entry"><h2><?php the_title(); ?></h2></div>

	<?php
		$portfolio_type = get_meta_option('portfolio_type');
		if($portfolio_type == '2') 
		{
			theme_single_video();
		}
		else
		{
			theme_single_slider('portfolio'); 
		}
	?>

	<div class="post-entry post-project-info">
		<h5><?php esc_html_e('Project Info','HK'); ?></h5>
		<div class="post-time"><b><?php esc_html_e('Posted On:','HK'); ?></b><div class="date"><?php the_time( get_option('date_format') ); ?></div></div>
		<div class="post-cats"><b><?php esc_html_e('Categories:','HK'); ?></b><?php echo get_the_term_list( $post->ID, 'portfolio-types', '<div class="cats clearfix">', '', '</div>' ); ?></div>
	</div>

	<div class="post-content"><?php the_content(); ?></div>
	<div class="clear"></div>
	<!--end post content-->

	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'HK' ), 'after' => '</div>' ) ); //end link page ?>

</div>
<!--end post page-->

<?php
	$lightbox = get_theme_option('portfolio','related_posts_lightbox');
	$posts_per_page = get_theme_option('portfolio','related_posts_per_page');
	theme_related_post('portfolio-types', $lightbox, $posts_per_page); 
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