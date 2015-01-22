<?php
/*
* ----------------------------------------------------------------------------------------------------
* Include Wraps
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

//LOAD THEME OPTIONS
require_once(WRAPS_DIR.'/theme_options/options_config.php');
require_once(WRAPS_DIR.'/theme_options/options_generator.php');
require_once(WRAPS_DIR.'/wrap_wp_check.php');
require_once(WRAPS_DIR.'/wrap_get_options.php');
$load_theme_options = new Theme_Options();
$load_theme_options->theme_default_options();


//LOAD WRAPS
require_once(WRAPS_DIR.'/wrap_common.php');
require_once(WRAPS_DIR.'/wrap_header.php');
require_once(WRAPS_DIR.'/wrap_excerpt.php');
require_once(WRAPS_DIR.'/wrap_pagination.php');


//LOAD POST TYPES
require_once(WRAPS_DIR.'/types/type_slider.php');


//LOAD WIDGETS
require_once(WRAPS_DIR.'/widgets/widget_ads.php');
require_once(WRAPS_DIR.'/widgets/widget_comments.php');
require_once(WRAPS_DIR.'/widgets/widget_flickr.php');
require_once(WRAPS_DIR.'/widgets/widget_post.php');
require_once(WRAPS_DIR.'/widgets/widget_search.php');
require_once(WRAPS_DIR.'/widgets/widget_social.php');
require_once(WRAPS_DIR.'/widgets/widget_tweets.php');


//LOAD META BOXES
require_once(WRAPS_DIR.'/meta_boxes/meta_box_generator.php');
require_once(WRAPS_DIR.'/meta_boxes/meta_box_slider.php');
require_once(WRAPS_DIR.'/meta_boxes/meta_box_page_desc.php');


//LOAD SHORTCODES
require_once(WRAPS_DIR.'/shortcodes/tinymce/tinymce_loader.php');
require_once(WRAPS_DIR.'/shortcodes/sc_blog_slider_list.php');
require_once(WRAPS_DIR.'/shortcodes/sc_button.php');
require_once(WRAPS_DIR.'/shortcodes/sc_column.php');
require_once(WRAPS_DIR.'/shortcodes/sc_gallery.php');
require_once(WRAPS_DIR.'/shortcodes/sc_highlight_text.php');
require_once(WRAPS_DIR.'/shortcodes/sc_html.php');
require_once(WRAPS_DIR.'/shortcodes/sc_icon_box.php');
require_once(WRAPS_DIR.'/shortcodes/sc_icon_list.php');
require_once(WRAPS_DIR.'/shortcodes/sc_message_box.php');
require_once(WRAPS_DIR.'/shortcodes/sc_slidershow.php');
require_once(WRAPS_DIR.'/shortcodes/sc_style_image.php');
require_once(WRAPS_DIR.'/shortcodes/sc_tab.php');
require_once(WRAPS_DIR.'/shortcodes/sc_toggle.php');


//GET THEME OPTIONS & LOAD POST TYPES
$enable_theme_panel = get_theme_option('general','enable_theme_panel');
$enable_seo = get_theme_option('general', 'enable_seo');
$enable_portfolio = get_theme_option('type','enable_portfolio');
$enable_product = get_theme_option('type','enable_product');
$enable_download = get_theme_option('type','enable_download');
$enable_event = get_theme_option('type','enable_event');
$enable_team = get_theme_option('type','enable_team');

if($enable_theme_panel == 'yes')
{
	require_once(WRAPS_DIR.'/wrap_admin_bar.php');
}

if($enable_portfolio == 'yes')
{
	require_once(WRAPS_DIR.'/types/type_portfolio.php');
	require_once(WRAPS_DIR.'/meta_boxes/meta_box_portfolio.php');
	require_once(WRAPS_DIR.'/shortcodes/sc_portfolio_slider_list.php');
}

if($enable_product == 'yes')
{
	require_once(WRAPS_DIR.'/types/type_product.php');
	require_once(WRAPS_DIR.'/meta_boxes/meta_box_product.php');
	require_once(WRAPS_DIR.'/shortcodes/sc_product_slider_list.php');
}

if($enable_download == 'yes')
{
	require_once(WRAPS_DIR.'/types/type_download.php');
	require_once(WRAPS_DIR.'/meta_boxes/meta_box_download.php');
	require_once(WRAPS_DIR.'/widgets/widget_download.php');
}

if($enable_event == 'yes')
{
	require_once(WRAPS_DIR.'/types/type_event.php');
	require_once(WRAPS_DIR.'/meta_boxes/meta_box_event.php');
	require_once(WRAPS_DIR.'/widgets/widget_event.php');
}

if($enable_team == 'yes')
{
	require_once(WRAPS_DIR.'/types/type_team.php');
	require_once(WRAPS_DIR.'/meta_boxes/meta_box_team.php');
}

if($enable_seo == 'yes')
{
	require_once(WRAPS_DIR.'/meta_boxes/meta_box_seo.php');
}

?>