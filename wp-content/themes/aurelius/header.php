<?php
$description = '';
$keywords = '';
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php wp_title('-', true, 'right'); ?></title>
  <!-- <title><?php
  /*if (is_home()) {
    bloginfo('name'); echo '-'; bloginfo('description');
  } elseif (is_category()) {
    single_cat_title(); echo '-'; bloginfo('name');
  } elseif (is_single() || is_page()) {
    single_post_title();
  } elseif (is_search()) {
    echo '搜索结果'; echo '-'; bloginfo('name');
  } elseif (is_404()) {
    echo '页面未找到'; echo '-'; bloginfo('name');
  } else {
    wp_title('', true);
  }*/
  ?></title> -->
  <meta name="description" content="<?php echo $description; ?>" />
  <meta name="keywords" content="<?php echo $keywords; ?>" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="所有文章" href="<?php echo $feed; ?>" />
  <link rel="alternate" type="application/rss+xml" title="所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->
  <?php //wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="wrapper" class="container_12 clearfix">
    <!-- Text Logo -->
    <h1 id="logo" class="grid_4"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>

    <!-- Navigation Menu -->
    <ul id="navigation" class="grid_8">
      <?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order'); ?>
      <li <?php if (is_home()) { echo 'class="current"';} ?>><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>">主页</a></li>

      <li><a href="contact.html"><span class="meta">Get in touch</span><br />
        Contact Us</a></li>
      <li><a href="index.html"><span class="meta">Homepage</span><br />
        Home</a></li>
    </ul>
    <div class="hr grid_12 clearfix">&nbsp;</div>

    <!-- Caption Line -->
    <h2 class="grid_12 caption clearfix"><?php bloginfo('description'); ?></h2>
    <div class="hr grid_12 clearfix">&nbsp;</div>
