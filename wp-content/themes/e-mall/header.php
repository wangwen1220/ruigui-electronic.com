<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Steven
 */

// 设置 keywords 和 description
if (is_home()) {
  $keywords = get_option('index_key');
  $description = get_option('desc_textarea');
} elseif (is_single() || is_page()) {
  $keywords = tagtext();
  $description = get_the_title();
} elseif (is_category()) {
  $description = category_description();
  if (!empty($description) && get_query_var('paged')) {
    $description .= '(page'.get_query_var('paged').
    ')';
  }
  $keywords = single_cat_title('', false);
} elseif (is_tag()) {
  $description = tag_description();
  if (!empty($description) && get_query_var('paged')) {
    $description .= '(page'.get_query_var('paged').
    ')';
  }
  $keywords = single_tag_title('', false);
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="Steven">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <meta name="description" content="<?php echo $description; ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <script src="<?php bloginfo('template_url'); ?>/js/cssrefresh.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/head.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.3.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/atooltip.jquery.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.masonry.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.lazyload.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/site.js"></script>
  <!--[if lt IE 9]>
  <script src="<?php bloginfo('template_url'); ?>/js/ie/respond.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/ie/nwmatcher.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/ie/selectivizr.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!--[if lt IE 9]>
  <div class="browsehappy">似乎您正在使用一个旧版本的 Internet Explorer。为了获得最佳的浏览体验，我们建议您<a href="http://browsehappy.com/" target="_blank">升级你的浏览器</a>。</div>
  <![endif]-->

  <header id="header">
    <div class="wrapper">
      <h1 class="logo">
        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
        <?php if (get_option('logo_upload') !== '') : ?>
          <img src="<?php echo get_option('logo_upload') ?>" alt="<?php bloginfo('name'); ?>">
        <?php else : ?>
          <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>">
        <?php endif; ?>
        </a>
      </h1>
    </div>
  </header>

  <nav id="nav">
    <div class="wrapper">
      <?php get_nav_menu(); ?>
      <div class="fr top_search"><?php get_search_form(); ?></div>
    </div>
  </nav>
