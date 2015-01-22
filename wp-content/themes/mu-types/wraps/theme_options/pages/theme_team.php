<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Team Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Team Settings', 'HK'),
			'type' => 'title'
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Posts per page','HK'),
			'desc' => esc_html__('Set the item per page to show.','HK'),
			'id' => 'list_posts_per_page',
			'std' => '12',
			'size' => '5',
			'unit' => 'items per page.',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Single items slug','HK'),
			'desc' => __("Enter a page slug that should be used for your team single items.<br /> For example if you enter <span>'team-item'</span> the link to the item will be <span>http://yourweb.com/team-item/post-name</span>. <br />Don't use characters that are not allowed in urls and make sure that this slug is not used anywere else on your site <span>(for example as a category or a page)</span>.",'HK'),
			'id' => 'single_item_slug',
			'std' => 'team-item',
			'size' => '30',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Assign page for team','HK'),
			'desc' => esc_html__('This will be used for get all the team url or id.','HK'),
			'id' => 'page_for_team',
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

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'team', 'options' => $options );

?>