<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package Ruigui
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php //get_template_part( 'content', 'page' ); ?>
		<?php the_content(); ?>

	<?php endwhile; ?>

	<?php
	  if ($post->post_parent) :
	    $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	  else :
	    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	  endif;

	  if ($children) :
	    echo '<ul>'.$children.'</ul>';
	  endif;
	?>

<?php get_footer(); ?>