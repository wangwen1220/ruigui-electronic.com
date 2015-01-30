<?php 
/*
* ----------------------------------------------------------------------------------------------------
* General Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('General Options', 'HK'),
			'type' => 'title',
			'desc' => theme_check_message(),
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Feedburner','HK'),
			'desc' => esc_html__('Enter your feedburner url, if you do not want to display this, just leave it blank.','HK'),
			'id' => 'feed',
			'std' => get_bloginfo('rss2_url'),
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Custom Favicon','HK'),
			'desc' => esc_html__('To upload an image click on "Upload favicon" button. Once the image is as custom favicon.','HK'),
			'id' => 'favicon',
			'std' => '',
			'title' => 'Enter a URL or upload an image for your favicon:',
			'size' => '100',
			'button' => esc_html__('Upload Favicon','HK'),
			'type' => 'upload',
	),

	array(
			'name' => esc_html__('Enable SEO','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable the seo feature.",'HK'),
			'id' => 'enable_seo',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Enable Breadcrumbs','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable your website's breadcrumb navigation.",'HK'),
			'id' => 'enable_breadcrumbs',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Breadcrumbs Delimiter','HK'),
			'desc' => esc_html__('You can enter the a special characters for the delimiter. Such as "&raquo;"','HK'),
			'id' => 'breadcrumbs_delimiter',
			'std' => '&raquo;',
			'size' => '30',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Pagination','HK'),
			'desc' => esc_html__('If you want to use wp-pagenavi plug-in, you should install it.','HK'),
			'id' => 'pagination',
			'std' => '1',
			'options' => array(
				'1' => esc_html__('Page-Navi','HK'),
				'2' => esc_html__('Prev-Next','HK'),
				'3' => esc_html__('WP-Pagenavi','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Enable Theme Panel','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable theme panel in admin bar.",'HK'),
			'id' => 'enable_theme_panel',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Google Analytics Code','HK'),
			'desc' => __('Paste your <a href="http://www.google.com/analytics/" target="_blank">analytics code</a> here, it will get applied to each page.','HK'),
			'id' => 'analytics',
			'rows' => '6',
			'std' => '',
			'type' => 'textarea',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'general', 'options' => $options );

?>