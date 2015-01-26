<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Steven
 *
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="Steven">
  <?php do_action('wp_seo'); ?>
  <!-- <meta name="keywords" content="<?php echo '$keywords'; ?>"> -->
  <!-- <meta name="description" content="<?php echo '$description'; ?>"> -->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"> -->
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v=<?php echo time(); ?>">
  <!-- <script src="<?php bloginfo('template_url'); ?>/js/cssrefresh.js"></script> -->
  <script src="<?php bloginfo('template_url'); ?>/js/head.js"></script>
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
      <!-- <?php get_search_form(); ?> -->
    </div>
  </nav>
