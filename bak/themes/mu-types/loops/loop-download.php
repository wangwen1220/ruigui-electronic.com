<?php
/*
* ----------------------------------------------------------------------------------------------------
* Download Loop
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>
<div class="download-lists clearfix">
<?php
while (have_posts()) : the_post();

###
#
#Custom Files
#
$license = get_meta_option('download_license');
$version = get_meta_option('download_version');
$lang = get_meta_option('download_lang');
$size = get_meta_option('download_size');
$format = get_meta_option('download_format');
$file_link = get_meta_option('download_file_link');


#
#Get theme options
#
$lightbox = get_theme_option('download','list_lightbox');
$read_more = get_theme_option('download','read_more');
$download = get_theme_option('download','download_text');


#
#Get the $x
#
if($lightbox == true) 
{
	$link = get_image_url();
	$rel = 'rel="prettyPhoto[Download]"';
}else{
	$link = get_permalink();
	$rel = 'rel="bookmark"';
}

$thumb_size = 'size-225-160';
###
?>

<!--Begin Item-->
<div class="download-post clearfix">	

	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

	<div class="post-entry clearfix<?php if ( !has_post_thumbnail() ) { echo ' no-post-thumb'; } ?>">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<ul class="clear-fixed">
		<li><b><?php esc_html_e('Date added:','HK'); ?></b><?php the_time( get_option('date_format') ); ?></li>
		<?php if($license) : ?><li><b><?php esc_html_e('License:','HK'); ?></b><?php echo $license; ?></li><?php endif; ?>
		<?php if($version) : ?><li><b><?php esc_html_e('Version:','HK'); ?></b><?php echo $version; ?></li><?php endif; ?>
		<?php if($lang) : ?><li><b><?php esc_html_e('Language:','HK'); ?></b><?php echo $lang; ?></li><?php endif; ?>
		<?php if($size) : ?><li><b><?php esc_html_e('File size:','HK'); ?></b><?php echo $size; ?></li><?php endif; ?>
		<?php if($format) : ?><li><b><?php esc_html_e('Format:','HK'); ?></b><?php echo $format; ?></li><?php endif; ?>
		</ul>
		<?php if($read_more): ?><p class="post-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo $read_more; ?></a></p><?php endif; ?>
		<?php if($download): ?><p class="post-more"><a href="<?php echo $file_link; ?>" title="<?php echo $download; ?>"><?php echo $download; ?></a></p><?php endif; ?>
	</div>

</div>
<!--End Item-->

<?php endwhile; ?>
</div>