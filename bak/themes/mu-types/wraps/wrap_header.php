<?php
/*
* ----------------------------------------------------------------------------------------------------
*  Add assets to admin
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/


/*
* Add scripts and styles to backend
*/
if( is_admin() ){
	add_action('admin_init', 'theme_backend_load_styles');
	add_action('admin_init', 'theme_backend_load_scripts');
}


/*------------------------------------------------------------------------
*Add styles to backend
------------------------------------------------------------------------*/
function theme_backend_load_styles() {

		// Load Styles
		wp_enqueue_style('thickbox');
		wp_register_style('theme-options', WRAPS_URI.'/assets/css/theme-options.css', false, THEME_VERSION, 'screen');
		wp_register_style('theme-colorpicker', WRAPS_URI.'/assets/css/theme-colorpicker.css', false, THEME_VERSION, 'screen');
		wp_register_style('theme-widget', WRAPS_URI.'/assets/css/theme-widget.css', false, THEME_VERSION, 'screen');
		wp_register_style('theme-metabox', WRAPS_URI.'/assets/css/theme-metabox.css', false, THEME_VERSION, 'screen');
		wp_enqueue_style('theme-options');
		wp_enqueue_style('theme-colorpicker');
		wp_enqueue_style('theme-widget');
		wp_enqueue_style('theme-metabox');

}



/*------------------------------------------------------------------------
*Add scripts to backend
------------------------------------------------------------------------*/
function theme_backend_load_scripts() {

		// Load jQuery scripts
		wp_enqueue_script('thickbox');
		wp_enqueue_script('media-upload');
		wp_register_script('jquery-upload', WRAPS_URI.'/assets/js/jquery-upload.js', array('jquery','media-upload','thickbox'), THEME_VERSION, false );
		wp_register_script('jquery-colorpicker', WRAPS_URI.'/assets/js/jquery-colorpicker.js', array('jquery'), THEME_VERSION, false );
		wp_enqueue_script('jquery-upload');
		wp_enqueue_script('jquery-colorpicker');

}

?>