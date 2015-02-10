<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

  <?php query_posts('category_name=about-us&showposts=5'); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php echo the_content(); ?>
    <?php endwhile; ?>
  <?php else : ?>
    <?php echo "No Content."; ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>

  <div class="menu">
    <?php wp_list_categories(); ?>
  </div>

<?php get_footer(); ?>