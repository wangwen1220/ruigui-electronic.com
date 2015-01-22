<?php
/*
* ----------------------------------------------------------------------------------------------------
* Download Single
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
$license = get_meta_option('download_license');
$version = get_meta_option('download_version');
$lang = get_meta_option('download_lang');
$size = get_meta_option('download_size');
$format = get_meta_option('download_format');
$file_link = get_meta_option('download_file_link');
$link = get_image_url();
$rel = 'rel="prettyPhoto"';
$thumb_size = 'size-225-160';
$download = get_theme_option('download','download_text');

if (have_posts()) : the_post();
?>

<div class="post post-single post-download-single download-post" id="post-<?php the_ID(); ?>">	

	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

	<div class="post-entry clearfix">
		<h2><?php the_title(); ?></h2>
		<ul class="clear-fixed">
		<li><b><?php esc_html_e('Date added:','HK'); ?></b><?php the_time( get_option('date_format') ); ?></li>
		<?php if($license) : ?><li><b><?php esc_html_e('License:','HK'); ?></b><?php echo $license; ?></li><?php endif; ?>
		<?php if($version) : ?><li><b><?php esc_html_e('Version:','HK'); ?></b><?php echo $version; ?></li><?php endif; ?>
		<?php if($lang) : ?><li><b><?php esc_html_e('Language:','HK'); ?></b><?php echo $lang; ?></li><?php endif; ?>
		<?php if($size) : ?><li><b><?php esc_html_e('File size:','HK'); ?></b><?php echo $size; ?></li><?php endif; ?>
		<?php if($format) : ?><li><b><?php esc_html_e('Format:','HK'); ?></b><?php echo $format; ?></li><?php endif; ?>
		</ul>
		<?php if($download): ?><p class="post-more"><a href="<?php echo $file_link; ?>" title="<?php echo $download; ?>"><?php echo $download; ?></a></p><?php endif; ?>
	</div>

	<div class="clear"></div>
	<div class="post-content"><?php the_content(); ?></div>
	<!--end post content-->
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'HK' ), 'after' => '</div>' ) ); //end link page ?>

</div>
<!--end post page-->

<?php comments_template( '', true ); ?>

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
<?php theme_side_widgets('download'); ?>
</div>
<!--End Secondary-->

</div>
<!-- #main -->
<?php get_footer(); ?>