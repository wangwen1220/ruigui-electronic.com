<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

  <?php the_title(); ?>
  <?php the_category(', ') ?>
  <?php query_posts('category_name=showcase&showposts=4'); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <?php endwhile; ?>
  <?php else: ?>
    <?php get_template_part( 'no-results', 'archive' ); ?>
  <?php endif; ?>

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
<br>
  <?php
  $output = 'xxx';
  $page = $post->ID;
  if ($post->post_parent) {
    $page = $post->post_parent;
  }
  $children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );
  if ($children) {
    $output = wp_list_pages ('echo=0&child_of=' . $page . '&title_li=<h2>Child Pages</h2>');
  }
  echo $children;
  ?>
<?php get_footer(); ?>