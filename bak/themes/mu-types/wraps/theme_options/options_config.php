<?php
/*
* ----------------------------------------------------------------------------------------------------
* Options Config
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

/**
* This function be used for add theme options menu.
*/
function theme_options_menu ()
{
	$m = 'add_menu_page';
	$s = 'add_submenu_page';
	$enable_portfolio = get_theme_option('type','enable_portfolio');
	$enable_product = get_theme_option('type','enable_product');
	$enable_download = get_theme_option('type','enable_download');
	$enable_event = get_theme_option('type','enable_event');
	$enable_team = get_theme_option('type','enable_team');

	$m(THEME_NAME, THEME_NAME, 'administrator', 'theme_general.php', 'theme_load_theme_pages', WRAPS_URI . '/assets/images/icon-options.png', 58);
	$s('theme_general.php', 'General', 'General', 'administrator', 'theme_general.php', 'theme_load_theme_pages');
	$s('theme_general.php', 'Header', 'Header', 'administrator', 'theme_header.php', 'theme_load_theme_pages');
	$s('theme_general.php', 'Footer', 'Footer', 'administrator', 'theme_footer.php', 'theme_load_theme_pages');
	$s('theme_general.php', 'Slidershow', 'Slidershow', 'administrator', 'theme_slidershow.php', 'theme_load_theme_pages');
	$s('theme_general.php', 'Blog', 'Blog', 'administrator', 'theme_blog.php', 'theme_load_theme_pages');
	if($enable_portfolio == 'yes') { $s('theme_general.php', 'Portfolio', 'Portfolio', 'administrator', 'theme_portfolio.php', 'theme_load_theme_pages'); }
	if($enable_product == 'yes') { $s('theme_general.php', 'Product', 'Product', 'administrator', 'theme_product.php', 'theme_load_theme_pages'); }
	if($enable_download == 'yes') { $s('theme_general.php', 'Download', 'Download', 'administrator', 'theme_download.php', 'theme_load_theme_pages'); }
	if($enable_event == 'yes') { $s('theme_general.php', 'Event', 'Event', 'administrator', 'theme_event.php', 'theme_load_theme_pages'); }
	if($enable_team == 'yes') { $s('theme_general.php', 'Team', 'Team', 'administrator', 'theme_team.php', 'theme_load_theme_pages'); }
	$s('theme_general.php', 'Contact', 'Contact', 'administrator', 'theme_contact.php', 'theme_load_theme_pages');
	$s('theme_general.php', 'Font', 'Font', 'administrator', 'theme_font.php', 'theme_load_theme_pages');
	$s('theme_general.php', 'Style', 'Style', 'administrator', 'theme_style.php', 'theme_load_theme_pages');
	$s('theme_general.php', 'Types', 'Types', 'administrator', 'theme_types.php', 'theme_load_theme_pages');
}

add_action('admin_menu', 'theme_options_menu');



/**
* This function be used for load theme pages.
*/
function theme_load_theme_pages() 
{

	$page = include(WRAPS_DIR . '/theme_options/pages/' . $_GET['page']);

	if($page['auto'])
	{
		new theme_options_generator($page['name'],$page['options']);
	}

}



/**
* Loads the default theme options.
*/

class Theme_Options
{
	function theme_default_options() {
		global $theme_options;
		$theme_options = array();
		$option_files = array(
			'theme_general',
			'theme_header',
			'theme_footer',
			'theme_slidershow',
			'theme_blog',
			'theme_portfolio',
			'theme_product',
			'theme_download',
			'theme_event',
			'theme_team',
			'theme_contact',
			'theme_font',
			'theme_style',
			'theme_types'
		);
		foreach($option_files as $file){
			$page = include (WRAPS_DIR . '/theme_options/pages/' . $file.'.php');
			$theme_options[$page['name']] = array();
			foreach($page['options'] as $option) {
				if (isset($option['std'])) {
					$theme_options[$page['name']][$option['id']] = $option['std'];
				}
			}
			$theme_options[$page['name']] = array_merge((array) $theme_options[$page['name']], (array) get_option('theme_' .THEME_SLUG . '_' . $page['name']));
		}
	}
}
?>