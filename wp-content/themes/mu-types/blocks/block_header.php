<?php
/*
* ----------------------------------------------------------------------------------------------------
* Block of header
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

#
#Styles For The Front
#
function  theme_load_styles() 
{	
	if(!is_admin())
	{
		wp_register_style('common', ASSETS_URI.'/css/common.css', false, THEME_VERSION, 'screen');
		wp_register_style('style', THEME_URI.'/style.css', false, THEME_VERSION, 'screen');
		wp_register_style('slider', ASSETS_URI.'/css/slider.css', false, THEME_VERSION, 'screen');
		wp_register_style('jplayer', ASSETS_URI.'/css/jplayer.css', false, THEME_VERSION, 'screen');
		wp_register_style('shortcodes', ASSETS_URI.'/css/shortcodes.css', false, THEME_VERSION, 'screen');
		wp_register_style('widgets', ASSETS_URI.'/css/widgets.css', false, THEME_VERSION, 'screen');
		wp_register_style('prettyPhoto', ASSETS_URI.'/css/prettyPhoto.css', false, THEME_VERSION, 'screen');
		wp_enqueue_style('common');
		wp_enqueue_style('style');
		wp_enqueue_style('slider');
		wp_enqueue_style('jplayer');
		wp_enqueue_style('shortcodes');
		wp_enqueue_style('widgets');
		wp_enqueue_style('prettyPhoto');
	}
}

add_action('wp_print_styles', 'theme_load_styles');



#
# JavaSrcipts For The Front
#
function  theme_load_scripts() 
{	
	if(!is_admin())
	{
		global $wp_version;	
		$check_WP   = '3.2';
		$is_ok  =  version_compare($wp_version, $check_WP, '<');	
		if ( ($is_ok == TRUE) ) {
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', ASSETS_URI. '/js/jquery.min.js', false, THEME_VERSION );
		}
		wp_register_script( 'jquery.scripts', ASSETS_URI. '/js/jquery.scripts.js', false, THEME_VERSION );
		wp_register_script( 'jquery.easing', ASSETS_URI. '/js/jquery.easing.js', false, THEME_VERSION );
		wp_register_script( 'custom', ASSETS_URI. '/js/custom.js', false, THEME_VERSION );
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery.scripts');
		wp_enqueue_script('jquery.easing');
		wp_enqueue_script('custom');
		if ( is_singular() && !is_front_page() && get_option( 'thread_comments' ) == true ) 
		{ 
			wp_enqueue_script( 'comment-reply' ); 
		}
	}
}

add_action('wp_print_scripts', 'theme_load_scripts');



#
# JavaSrcipts For IE
#
function theme_load_ie_srcipts() 
{
	echo ''."\n";
	echo '<!--[if lt IE 9]>'."\n";
	echo '<script type="text/javascript" src="'.ASSETS_URI.'/js/ie.min.js?ver='.THEME_VERSION.'"></script>'."\n";
	echo '<![endif]-->'."\n";
}

add_action('wp_head', 'theme_load_ie_srcipts');



#
# Add favicon icon
#
function theme_load_favicon_icon() 
{
	$favicon = get_theme_option('general','favicon');
	if ($favicon) { echo '<link rel="shortcut icon" href="'.$favicon.'" />',"\n"; }
}

add_action('wp_head', 'theme_load_favicon_icon');



#
# Load custom styles
#
function theme_load_custom_styles() 
{
	###
	#
	//Custom CSS
	$header_from_top = get_theme_option('header','header_from_top');
	$header_from_bottom = get_theme_option('header','header_from_bottom');
	$header_logo_top = get_theme_option('header','logo_top');
	$header_logo_left = get_theme_option('header','logo_left');
	$menu_top = get_theme_option('header','menu_top');
	$sub_menu_width = get_theme_option('header','sub_menu_width');

	//Slidershow
	$slidershow_count = get_theme_option('slidershow','slidershow_posts_per_page');
	$slidershow_height = get_theme_option('slidershow','slidershow_image_height');
	$slidershow_control_nav = (990 - ($slidershow_count * 16 - 2))/2;
	$slidershow_pauseplay = ($slidershow_height - 40)/2;
	$slidershow_loader_height = $slidershow_height + 25;
	$slidershow_video_height = get_theme_option('slidershow','slidershow_video_height');

	//Custom Fonts
	$font_stacks = array(
		'arial' => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
		'baskerville' => 'Baskerville, "Times New Roman", Times, serif',
		'cambria' => 'Cambria, Georgia, Times, "Times New Roman", serif',
		'century-gothic' => '"Century Gothic", "Apple Gothic", sans-serif',
		'consolas' => 'Consolas, "Lucida Console", Monaco, monospace',
		'copperplate-light' => '"Copperplate Light", "Copperplate Gothic Light", serif',
		'courier-new' => '"Courier New", Courier, monospace',
		'franklin' => '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif',
		'futura' => 'Futura, "Century Gothic", AppleGothic, sans-serif',
		'garamond' => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
		'geneva' => 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif',
		'georgia' => 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif',
		'gill-sans' => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
		'helvetica' => '"Helvetica Neue", Arial, Helvetica, sans-serif',
		'impact' => 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif',
		'lucida' => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
		'metrophobic' => 'MetrophobicRegular, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
		'palatino' => 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif',
		'tahoma' => 'Tahoma, Geneva, Verdana',
		'times' => 'Times, "Times New Roman", Georgia, serif',
		'trebuchet' => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
		'verdana' => 'Verdana, Geneva, Tahoma, sans-serif'
	);

	$body_font_family = get_theme_option('font','body_font_family');
	$nav_font_family = get_theme_option('font','nav_font_family');
	$headings_font_family = get_theme_option('font','headings_font_family');

	$body_family  = $font_stacks[$body_font_family]; 
	$nav_family  = $font_stacks[$nav_font_family]; 
	$headings_family  = $font_stacks[$headings_font_family]; 

	$headings_font_weight = get_theme_option('font','headings_font_weight');
	$menu_font_size = get_theme_option('font','menu_font_size');
	$sub_menu_font_size = get_theme_option('font','sub_menu_font_size');
	$h1_font_size = get_theme_option('font','h1_font_size');
	$h2_font_size = get_theme_option('font','h2_font_size');
	$h3_font_size = get_theme_option('font','h3_font_size');
	$h4_font_size = get_theme_option('font','h4_font_size');
	$h5_font_size = get_theme_option('font','h5_font_size');
	$h6_font_size = get_theme_option('font','h6_font_size');

	//Custom Styles
	$text_color = get_theme_option('style','text_color');
	$link_color = get_theme_option('style','link_color');
	$hover_color = get_theme_option('style','hover_color');
	$custom_css = get_theme_option('style','custom_css');

	//Background
	$body_bg_color = get_theme_option('style','body_bg_color');
	$body_bg_img = get_theme_option('style','body_bg_image');
	$body_bg_p = get_theme_option('style','body_bg_properties');
	$body_bg_h = get_theme_option('style','body_bg_horizontal');
	$body_bg_v = get_theme_option('style','body_bg_vertical');
	$body_bg_a = get_theme_option('style','body_bg_attachment');
	#
	###

	$output = '';

	if($body_bg_img != ''){
		$output .= 'body { background: url('.$body_bg_img.') '.$body_bg_p.' '.$body_bg_h.' '.$body_bg_v.' '.$body_bg_a.' #'.$body_bg_color.';} '."\n";
	}else{
		$output .= 'body { background-color: #'.$body_bg_color.';} '."\n";
	}

	if($text_color) {
		$output .= 'body { color: #'.$text_color.'; } '."\n";
	}

	if($link_color) {
		$output .= 'a { color: #'.$link_color.'; } '."\n";
	}

	if($hover_color) {
		$output .= '
		a:hover, 
		.post-meta a:hover, 
		#top-menu ul.drop-menu li a:hover, 
		#top-menu ul.drop-menu li a.selected,
		.page-header-breadcrumbs a:hover { color: #'.$hover_color.'; } '."\n";

		$output .= '
		#top-menu ul.drop-menu li ul li a:hover,
		#top-menu ul.drop-menu li ul li a.selected,
		.portfolio-lists-1 .post-cats .cats a:hover,
		.post-portfolio-single .post-cats a:hover,
		.pagination a:hover,
		.normal-pagination span a:hover,
		.comment-pagination a:hover,
		.sortable-menu li a:hover,
		#respond input[type="submit"]:hover,
		.searchbox input[type="submit"]:hover,
		.contact-form-wrap #send-message:hover,
		.widget_tag_cloud a:hover,
		.jcarousel-skin .jcarousel-next-horizontal:hover,
		.jcarousel-skin .jcarousel-next-horizontal:focus,
		.jcarousel-skin .jcarousel-prev-horizontal:hover, 
		.jcarousel-skin .jcarousel-prev-horizontal:focus,
		.jcarousel-skin .jcarousel-next-horizontal:active,
		.jcarousel-skin .jcarousel-prev-horizontal:active,
		.flex-control-nav li a.active { background-color: #'.$hover_color.'; } '."\n";
	}

	$output .= '.site-head-info { padding-top: '.$header_from_top.'px; padding-bottom: '.$header_from_bottom.'px; }'."\n";
	$output .= '.site-head-info .site-logo, .site-head-info .site-name { margin-top: '.$header_logo_top.'px;  margin-left: '.$header_logo_left.'px; }'."\n";
	$output .= '.site-head-info #top-menu { margin-top: '.$menu_top.'px; }'."\n";
	$output .= '.hk-menu ul li ul li { width: '.$sub_menu_width.'px; }'."\n";
	$output .= '.hk-menu ul li ul li a { width: '.($sub_menu_width - 40).'px; }'."\n";

	$output .= '.flex-control-nav { left: '.$slidershow_control_nav.'px; }'."\n";
	$output .= '.flex-pauseplay, .flex-direction-nav li a { top: '.$slidershow_pauseplay.'px; }'."\n";
	$output .= '.flex-container .loader { height: '.$slidershow_loader_height.'px; }'."\n";	

	$output .= '.jp-video-home-container .jp-jplayer, .jp-video-home-container .jp-video-play { height: '.$slidershow_video_height.'px; }'."\n";
	$output .= '.jp-video-home-container .jp-video-play { top: -'.$slidershow_video_height.'px; }'."\n";

	$output .= 'body { font-family: '.$body_family.'; } '."\n";
	$output .= 'header #top-menu { font-family: '.$nav_family.'; } '."\n";
	$output .= 'h1, h2, h3, h4, h5, h6 { font-family: '.$headings_family.'; font-weight: '.$headings_font_weight.';} '."\n";
	$output .= 'header #top-menu ul li { font-size: '.$menu_font_size.'px; } '."\n";
	$output .= 'header #top-menu ul li ul li { font-size: '.$sub_menu_font_size.'px; } '."\n";
	$output .= '.post-content h1 { font-size: '.$h1_font_size.'px; } '."\n";
	$output .= '.post-content h2 { font-size: '.$h2_font_size.'px; } '."\n";
	$output .= '.post-content h3 { font-size: '.$h3_font_size.'px; } '."\n";
	$output .= '.post-content h4 { font-size: '.$h4_font_size.'px; } '."\n";
	$output .= '.post-content h5 { font-size: '.$h5_font_size.'px; } '."\n";
	$output .= '.post-content h6 { font-size: '.$h6_font_size.'px; } '."\n";

	if($custom_css) {
		$output .= $custom_css."\n";
	}

	echo "\n";
	echo '<!--Extend CSS-->'."\n";
	echo '<style type="text/css">'."\n";
	echo $output;
	echo '</style>'."\n";
}

add_action('wp_head', 'theme_load_custom_styles');



#
#Theme load drop menu js
#
function  theme_load_menu_js() 
{	
	echo '<script type="text/javascript">'."\n";
	echo '//<![CDATA['."\n";
	echo 'ddsmoothmenu.init({'."\n";
	echo 'mainmenuid: "top-menu", '."\n";
	echo 'orientation: "h", '."\n";
	echo 'classname: "hk-menu", '."\n";
	echo 'contentsource: "markup" '."\n";
	echo '});'."\n";
	echo '//]]>'."\n";
	echo '</script>'."\n";
}

add_action('wp_footer', 'theme_load_menu_js');



#
#Theme load google analytics
#
function  theme_load_google_analytics() 
{	
	$google_analytics = get_theme_option('general','analytics');
	if($google_analytics) { echo stripslashes($google_analytics) ."\n"; }
}

add_action('wp_footer', 'theme_load_google_analytics');



#
#Add SEO meta
#
function theme_add_seo_meta() 
{
	$enable_seo = get_theme_option('general', 'enable_seo');
	$seo_follow = get_meta_option('seo_follow');
	$seo_noindex = get_meta_option('seo_noindex');
	$seo_keywords = get_meta_option('seo_keywords');
	$seo_description = get_meta_option('seo_description');
	$seo_title_tags = get_meta_option('seo_title_tags');

	if( is_singular() && $enable_seo == 'yes' )
	{
		if($seo_follow == true) { $seo_follow = 'follow'; } else { $seo_follow = 'nofollow'; }
		if($seo_noindex == true) { $seo_noindex = 'noindex'; } else { $seo_noindex = 'index'; }

		echo '<meta name="robots" content="'.$seo_noindex.', '.$seo_follow.'" />'."\n";

		if($seo_keywords) 
		{
		echo '<meta name="keywords" content="'.stripslashes($seo_keywords).'" />'."\n";
		}

		if($seo_description)
		{
		echo '<meta name="description" content="'.stripslashes($seo_description).'" />'."\n";
		}
	}

	echo ''."\n";
	echo '<!--Title-->'."\n";
	if( is_singular() && $seo_title_tags != '' && $enable_seo == 'yes' ) 
	{
		echo '<title>'.stripslashes($seo_title_tags).'</title>'."\n";
	}
	else
	{
		echo '<title>';
		wp_title('&laquo;', true, 'right');
		echo '</title>'."\n";
	}
}

add_action('wp_seo', 'theme_add_seo_meta');

?>