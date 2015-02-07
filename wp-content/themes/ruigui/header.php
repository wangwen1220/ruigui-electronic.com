<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up until id="main-core".
 *
 * @package Steven
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php thinkup_hook_header(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/lib/scripts/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
	<!--<script src="<?php bloginfo('template_url'); ?>/lib/scripts/cssrefresh.js"></script>-->
</head>

<body <?php body_class(); ?><?php thinkup_bodystyle(); ?>>
<!--[if lt IE 9]>
<div class="browsehappy">似乎您正在使用一个旧版本的 Internet Explorer。为了获得最佳的浏览体验，我们建议您<a href="http://browsehappy.com/" target="_blank">升级你的浏览器</a>。</div>
<![endif]-->
<div id="body-core" class="hfeed site">

	<header id="site-header">
		<?php if ( get_header_image() ) : ?>
			<div class="custom-header"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""></div>
		<?php endif; // End header image check. ?>

		<div id="pre-header">
		<div class="wrap-safari">
		<div id="pre-header-core" class="main-navigation">

			<?php if ( has_nav_menu( 'pre_header_menu' ) ) : ?>
			<?php wp_nav_menu( array( 'container_class' => 'header-links', 'container_id' => 'pre-header-links-inner', 'theme_location' => 'pre_header_menu' ) ); ?>
			<?php endif; ?>

			<?php /* Header Search */ thinkup_input_headersearch(); ?>

			<?php /* Social Media Icons */ thinkup_input_socialmedia(); ?>

		</div>
		</div>
		</div>
		<!-- #pre-header -->

		<div id="header">
		<div id="header-core">

			<div id="logo">
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php /* Custom Logo */ thinkup_custom_logo(); ?></a>
			</div>

			<?php /* Add responsive header menu */ thinkup_input_responsivehtml(); ?>

		</div>
		</div>
		<!-- #header -->

		<nav id="nav">
		  <div class="wrapper">
		    <?php get_wp_menu('nav'); ?>
		    <!-- <?php get_search_form(); ?> -->
		  </div>
		</nav>

		<?php /* Custom Slider */ thinkup_input_sliderhome(); ?>
	</header>
	<!-- header -->

	<!-- showcase -->
	<?php if (is_home()) : ?>
	<div class="showcase">
	<?php
		// $showcase = get_post(86);
		echo get_post(86) -> post_content;
		?>
	</div>
	<?php endif; ?>
	<!-- /showcase -->

	<?php /*  Call To Action - Intro */ thinkup_input_ctaintro(); ?>
	<?php /*  Pre-Designed HomePage Content */ thinkup_input_homepagesection(); ?>
	<?php /* Custom Slider */ thinkup_input_sliderpage(); ?>

	<div id="content">
	<div id="content-core">

		<div id="main">
		<?php /* Custom Intro */ thinkup_custom_intro(); ?>

		<div id="main-core">
		<?php the_post('hello-world'); ?>
		<?php the_content(); ?>