<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Download Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Download Settings', 'HK'),
			'type' => 'title'
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Posts per page','HK'),
			'desc' => esc_html__('Set the item per page to show.','HK'),
			'id' => 'list_posts_per_page',
			'std' => '10',
			'size' => '5',
			'unit' => 'items per page.',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Single items slug','HK'),
			'desc' => __("Enter a page slug that should be used for your download single items.<br /> For example if you enter <span>'download-item'</span> the link to the item will be <span>http://yourweb.com/download-item/post-name</span>. <br />Don't use characters that are not allowed in urls and make sure that this slug is not used anywere else on your site <span>(for example as a category or a page)</span>.",'HK'),
			'id' => 'single_item_slug',
			'std' => 'download-item',
			'size' => '30',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Assign page for download','HK'),
			'desc' => esc_html__('This will be used for get all the download url or id.','HK'),
			'id' => 'page_for_download',
			'std' => '',
			'prompt' => esc_html__('Choose page..','HK'),
			'target' => 'page',
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Lightbox For Image','HK'),
			'desc' => esc_html__('Show the list image of posts with lightbox?','HK'),
			'id' => 'list_lightbox',
			'std' => 1,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('"Read more" Link','HK'),
			'desc' => esc_html__("Enter the text for the post's 'Read more' link, if you don't want to display this, just leave it blank.",'HK'),
			'id' => 'read_more',
			'std' => 'Read More',
			'size' => '30',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('"Download" Link','HK'),
			'desc' => esc_html__("Enter the text for the post's 'Download' link, if you don't want to display this, just leave it blank.",'HK'),
			'id' => 'download_text',
			'std' => 'Download',
			'size' => '30',
			'type' => 'text',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'download', 'options' => $options );

?>