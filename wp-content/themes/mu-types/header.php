<?php
/*
* ----------------------------------------------------------------------------------------------------
* Header
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>
<!doctype html>

<!--Begin Html-->
<html <?php language_attributes(); ?>>

<!--Begin Head-->
<head>

<!--Meta Tags-->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php do_action('wp_seo'); ?>

<!--RSS Feeds & Pingbacks-->
<?php $feed = get_theme_option('general','feed'); ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php if($feed) { echo $feed; } else { bloginfo('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--Styles And JavaSrcipts-->
<?php wp_head(); //wp-head hook, needed for plugins, do not delete?>

<!--End head-->
</head>

<!--Begin Body-->
<body <?php body_class(); ?>>

<div id="page" class="hfeed">

<!--Begin Header-->
<header id="site-head" class="col-width">
<?php
	echo '<div class="site-head-info clearfix">'."\n";

	theme_site_name();
	$tel = stripslashes(get_theme_option('header','tel'));
	$email = stripslashes(get_theme_option('header','email'));

	echo '<div class="site-info-menu">'."\n";
	echo '<div class="top-info clearfix">'."\n";
	if($tel) { echo '<span class="tel">'.$tel.'</span>'."\n"; }
	if($email) { echo '<span class="email">'.$email.'</span>'."\n"; }
	echo '</div>'."\n";
	theme_top_wp_nav();
	echo '</div>'."\n";

	echo '</div>'."\n";

	theme_page_header();
?>
<!--End Header-->
</header>

