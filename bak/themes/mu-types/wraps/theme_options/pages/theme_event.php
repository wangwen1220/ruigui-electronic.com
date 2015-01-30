<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Event Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Event Settings', 'HK'),
			'type' => 'title'
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Posts per page','HK'),
			'desc' => esc_html__('Set the item per page to show.','HK'),
			'id' => 'list_posts_per_page',
			'std' => '5',
			'size' => '5',
			'unit' => 'items per page.',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Single items slug','HK'),
			'desc' => __("Enter a page slug that should be used for your event single items.<br /> For example if you enter <span>'event-item'</span> the link to the item will be <span>http://yourweb.com/event-item/post-name</span>. <br />Don't use characters that are not allowed in urls and make sure that this slug is not used anywere else on your site <span>(for example as a category or a page)</span>.",'HK'),
			'id' => 'single_item_slug',
			'std' => 'event-item',
			'size' => '30',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Assign page for event','HK'),
			'desc' => esc_html__('This will be used for get all the event url or id.','HK'),
			'id' => 'page_for_event',
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
			'name' => esc_html__('Enable Single Page Slider','HK'),
			'desc' => esc_html__("If this option is yes, you'll globally enable the single page slider.",'HK'),
			'id' => 'enable_single_slider',
			'std' => 'yes',
			'options' => array(
				'yes' => esc_html__('Yes','HK'),
				'no' => esc_html__('No','HK'),
			),
			'type' => 'radio',
	),

	array(
			'name' => esc_html__('Single Page Slider','HK'),
			'desc' => esc_html__('Set the items nunber to show.','HK'),
			'id' => 'single_slider_posts_per_page',
			'std' => '20',
			'size' => '5',
			'unit' => 'items',
			'type' => 'text',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'event', 'options' => $options );

?>