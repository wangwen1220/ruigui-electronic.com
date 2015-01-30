<?php 
/*
* ----------------------------------------------------------------------------------------------------
* THUMB FUNCTIONS
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
function theme_list_thumb($link, $rel, $thumb_size) 
{
?>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-thumb post-thumb-preload post-thumb-fade">
		<a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>" class="image-link" <?php echo $rel; ?>>
		<?php the_post_thumbnail($thumb_size); ?>
		</a>
	</div>
	<?php endif; ?>
<?php
}

?>