<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Blog Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Blog Settings', 'HK'),
			'type' => 'title'
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('List Styles','HK'),
			'desc' => esc_html__('Select a list style for your posts, it will change the display for the posts.','HK'),
			'id' => 'list_style',
			'std' => '1',
			'options' => array(
				'1' => esc_html__('List style one','HK'),
				'2' => esc_html__('List style two','HK'),
			),
			'type' => 'select',
	),

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
			'name' => esc_html__('Assign page for blog','HK'),
			'desc' => esc_html__('This will be used for get all the blog url or id.','HK'),
			'id' => 'page_for_blog',
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
			'name' => esc_html__('Enable Time','HK'),
			'desc' => esc_html__('Display the lists with time?','HK'),
			'id' => 'enable_time',
			'std' => 1,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Enable Comment','HK'),
			'desc' => esc_html__('Display the lists with comment?','HK'),
			'id' => 'enable_comment',
			'std' => 1,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Enable Author','HK'),
			'desc' => esc_html__('Display the lists with Author?','HK'),
			'id' => 'enable_author',
			'std' => 1,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Enable Category','HK'),
			'desc' => esc_html__('Display the lists with category?','HK'),
			'id' => 'enable_category',
			'std' => 1,
			'type' => 'checkbox',
	),

	array(
			'name' => esc_html__('Excerpt Length','HK'),
			'desc' => esc_html__('This number refers to the number of words to show.','HK'),
			'id' => 'excerpt_length',
			'std' => '300',
			'size' => '5',
			'unit' => 'character',
			'type' => 'text',
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
			'name' => esc_html__('Enable Author Info','HK'),
			'desc' => esc_html__('Display the author info in single page?','HK'),
			'id' => 'enable_author_info',
			'std' => 1,
			'type' => 'checkbox',
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

return array('auto' => true, 'name' => 'blog', 'options' => $options );

?>