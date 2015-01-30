<?php
/**
 * Displays the comments in listing pages (home, categories, etc).
 */
?>
	<?php if ( have_comments()  ) : ?>

	<?php wp_list_comments('page=1&per_page=2&callback=mytheme_comment'); ?>
		
	<?php endif; // have_comments() ?>


