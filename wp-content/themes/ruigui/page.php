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

		<?php get_template_part( 'content', 'page' ); ?>

	<?php endwhile; ?>

	xx<?php
	global $post;
	if($post->post_parent){
	    $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	} else {
		echo 'parent';
	    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	}
	if ($children) {
	    echo '<ul>';
	        echo $children;
	    echo '</ul>';
	}
	?>

	ww<?php
	$output = wp_list_pages('echo=0&depth=1&title_li=<h2>Top Level Pages </h2>' );
	if (is_page()) {
		echo "sssssss";
	  $page = $post->ID;
	  if ($post->post_parent) {
	    $page = $post->post_parent;
	  }
	  $children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );
	  if ($children) {
	    $output = wp_list_pages ('echo=0&child_of=' . $page . '&title_li=<h2>Child Pages</h2>');
	  }
	}
	echo $output;
	?>

<?php get_footer(); ?>