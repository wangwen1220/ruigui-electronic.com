<?php
//Cloumns shortcode
$dot_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => esc_html__('Insert Columns Shortcode', 'HK'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => esc_html__('Column Type', 'HK'),
				'desc' => esc_html__('Select the type, ie width of the column.', 'HK'),
				'options' => array(
					'one_half' => 'One Half (1/2)',
					'one_half_last' => 'One Half Last (1/2 last)',
					'one_third' => 'One Third (1/3)',
					'one_third_last' => 'One Third Last (1/3 last)',
					'two_third' => 'Two Third (2/3)',
					'two_third_last' => 'Two Third Last (2/3 last)',
					'one_fourth' => 'One Fourth (1/4)',
					'one_fourth_last' => 'One Fourth Last (1/4 last)',
					'three_fourth' => 'Three Fourth (3/4)',
					'three_fourth_last' => 'Three Fourth Last (3/4 last)',
					'one_fifth' => 'One Fifth (1/5)',
					'one_fifth_last' => 'One Fifth Last (1/5 last)',
					'two_fifth' => 'Two Fifth (2/5)',
					'two_fifth_last' => 'One Fifth Last (2/5 last)',
					'three_fifth' => 'Three Fifth (3/5)',
					'three_fifth_last' => 'Three Fifth Last (3/5 last)',
					'four_fifth' => 'Four Fifth (4/5)',
					'four_fifth_last' => 'Four Fifth Last (4/5 last)',
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => esc_html__('Column Content', 'HK'),
				'desc' => esc_html__('Add the column content.', 'HK'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => esc_html__('Add Column', 'HK')
	)
);


// Buttons shortcode
$dot_shortcodes['button'] = array(
	'params' => array(
			'url' => array(
				'std' => '',
				'type' => 'text',
				'label' => esc_html__('Button URL', 'HK'),
				'desc' => esc_html__('Add the button\'s url eg http://example.com', 'HK')
			),
			'style' => array(
				'type' => 'select',
				'label' => esc_html__('Button\'s Style', 'HK'),
				'desc' => esc_html__('Select the button\'s style, ie the buttons colour', 'HK'),
				'options' => array(
					'white' => 'White',
					'grey' => 'Grey',
					'black' => 'Black',
					'yellow' => 'Yellow',
					'orange' => 'Orange',
					'red' => 'Red',
					'green' => 'Green',
					'blue' => 'Blue',
					'coffee' => 'Coffee',
					'purple' => 'Purple'
				)
			),
			'open_type' => array(
				'type' => 'select',
				'label' => esc_html__('Open Type', 'HK'),
				'desc' => esc_html__('Select the open type: in blank or self.', 'HK'),
				'options' => array(
					'self' => 'Self',
					'blank' => 'Blank'
				)
			),
			'content' => array(
				'std' => 'Button Text',
				'type' => 'text',
				'label' => esc_html__('Button\'s Text', 'HK'),
				'desc' => esc_html__('Add the button\'s text', 'HK'),
			)
	),
	'shortcode' => '[button url="{{url}}" style="{{style}}" open_type="{{open_type}}"] {{content}} [/button]',
	'popup_title' => esc_html__('Insert Button Shortcode', 'HK')
);


//Tabs shortcode
$dot_shortcodes['tabs'] = array(
	'params' => array(),
	'shortcode' => '[tabs] {{child_shortcode}}[/tabs]',
	'popup_title' => esc_html__('Insert Tabbed Content Shortcode', 'HK'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => esc_html__('Tab Title', 'HK'),
				'desc' => esc_html__('Add the title for this tab', 'HK'),
				'std' => ''
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => esc_html__('Tab Content', 'HK'),
				'desc' => esc_html__('Add the tab content.', 'HK'),
			)
		),
		'shortcode' => '[tab title="{{title}}"] {{content}} [/tab] ',
		'clone_button' => esc_html__('Add Tab', 'HK')
	)
);


//Toggle shortcode
$dot_shortcodes['toggles'] = array(
	'params' => array(),
	'shortcode' => '[toggles] {{child_shortcode}}[/toggles]',
	'popup_title' => esc_html__('Insert Toggle Content Shortcode', 'HK'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => esc_html__('Toggle Title', 'HK'),
				'desc' => esc_html__('Add the title for this toggle', 'HK'),
				'std' => ''
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => esc_html__('Toggle Content', 'HK'),
				'desc' => esc_html__('Add the toggle content.', 'HK'),
			)
		),
		'shortcode' => '[toggle title="{{title}}"] {{content}} [/toggle] ',
		'clone_button' => esc_html__('Add Toggle', 'HK')
	)
);


//Icon List shortcode
$dot_shortcodes['icon_list'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => esc_html__('Style', 'HK'),
			'desc' => esc_html__('Select the style for list.', 'HK'),
			'options' => array(
				'download' => 'Download',
				'image' => 'Image',
				'settings' => 'Settings',
				'people' => 'People',
				'favicon' => 'Favicon',
				'arrow' => 'Arrow',
				'love' => 'Love',
				'check' => 'Check',
				'light' => 'Light',
				'time' => 'Time'
			)
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => esc_html__('List Content', 'HK'),
			'desc' => esc_html__('Add the list content with ul, li.', 'HK'),
		)
		
	),
	'no_preview' => true,
	'shortcode' => '[icon_list style="{{style}}"] {{content}} [/icon_list]',
	'popup_title' => esc_html__('Insert Icon List Content Shortcode', 'HK')
);


//Icon Box shortcode
$dot_shortcodes['icon_box'] = array(
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => esc_html__('Title', 'HK'),
			'desc' => esc_html__('Add the title for boxes', 'HK'),
			'std' => 'Title'
		),
		'sub_title' => array(
			'type' => 'text',
			'label' => esc_html__('Sub Title', 'HK'),
			'desc' => esc_html__('Add the sub title for boxes', 'HK'),
			'std' => 'Sub Title'
		),
		'icon' => array(
			'type' => 'select',
			'label' => esc_html__('Icon', 'HK'),
			'desc' => esc_html__('Select icons for the box.', 'HK'),
			'options' => array(
				'icon-calculater.png' => 'Calculater',
				'icon-computer.png' => 'Computer',
				'icon-email.png' => 'Email',
				'icon-music.png' => 'Music',
				'icon-network.png' => 'Network',
				'icon-note.png' => 'Note',
				'icon-people.png' => 'People',
				'icon-printer.png' => 'Printer',
				'icon-settings.png' => 'Settings',
				'icon-time.png' => 'Time'
			)
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => esc_html__('Content', 'HK'),
			'desc' => esc_html__('Add the content for boxes.', 'HK'),
		),
		'color' => array(
			'type' => 'select',
			'label' => esc_html__('Color', 'HK'),
			'desc' => esc_html__('Select color for the box.', 'HK'),
			'options' => array(
				'blue' => 'Blue',
				'coffee' => 'Coffee',
				'green' => 'Green',
				'orange' => 'Orange',
				'purple' => 'Purple',
				'red' => 'Red'
			)
		)		
	),
	'no_preview' => true,
	'shortcode' => '[icon_box title="{{title}}" sub_title="{{sub_title}}" icon="{{icon}}" color="{{color}}"] {{content}} [/icon_box]',
	'popup_title' => esc_html__('Insert Icon Box Content Shortcode', 'HK')
);


//Message box shortcode
$dot_shortcodes['message_box'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => esc_html__('Style', 'HK'),
			'desc' => esc_html__('Select the style for message box.', 'HK'),
			'options' => array(
				'error' => 'Error',
				'info' => 'Info',
				'success' => 'Success',
				'warning' => 'Warning'
			)
		),
		'icon' => array(
				'type' => 'select',
				'label' => esc_html__('Display Icon', 'HK'),
				'desc' => esc_html__('Disable or enable the icon.', 'HK'),
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
			)
		),
		'hide' => array(
				'type' => 'select',
				'label' => esc_html__('Hide Link', 'HK'),
				'desc' => esc_html__('You can click the hide link to disable message box.', 'HK'),
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
			)
		),
		'width' => array(
			'type' => 'text',
			'label' => esc_html__('Width', 'HK'),
			'desc' => esc_html__('Set the width for message box. The unit is px.', 'HK'),
			'std' => '500'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => esc_html__('List Content', 'HK'),
			'desc' => esc_html__('Add the list content with ul, li.', 'HK'),
		)
	),
	'shortcode' => '[message_box style="{{style}}" icon="{{icon}}" hide="{{hide}}" width="{{width}}"] {{content}} [/message_box]',
	'popup_title' => esc_html__('Insert Message Box Content Shortcode', 'HK')
);


//Highlight Text shortcode
$dot_shortcodes['highlight_text'] = array(
	'params' => array(
		'text_color' => array(
			'type' => 'text',
			'label' => esc_html__('Text Color', 'HK'),
			'desc' => esc_html__('Set the text color.', 'HK'),
			'std' => '#FFFFFF'
		),
		'bg_color' => array(
			'type' => 'text',
			'label' => esc_html__('Background Color', 'HK'),
			'desc' => esc_html__('Set the background color.', 'HK'),
			'std' => '#333333'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => esc_html__('Content', 'HK'),
			'desc' => esc_html__('Add the content for highlight text.', 'HK'),
		)
	),
	'shortcode' => '[highlight_text text_color="{{text_color}}" bg_color="{{bg_color}}"] {{content}} [/highlight_text]',
	'popup_title' => esc_html__('Insert Highlight Content Shortcode', 'HK')
);



//Style image shortcode
$dot_shortcodes['style_image'] = array(
	'params' => array(
		'width' => array(
			'type' => 'text',
			'label' => esc_html__('Width', 'HK'),
			'desc' => esc_html__('Set the width for the image.', 'HK'),
			'std' => ''
		),
		'height' => array(
			'type' => 'text',
			'label' => esc_html__('Height', 'HK'),
			'desc' => esc_html__('Set the height for the image.', 'HK'),
			'std' => ''
		),
		'image' => array(
			'type' => 'text',
			'label' => esc_html__('Image', 'HK'),
			'desc' => esc_html__('Enter your image file url here.', 'HK'),
			'std' => ''
		),
		'alt' => array(
			'type' => 'text',
			'label' => esc_html__('Alt', 'HK'),
			'desc' => esc_html__('Image description or alternate text.', 'HK'),
			'std' => 'Image description or alternate text.'
		),
		'url' => array(
			'type' => 'text',
			'label' => esc_html__('Url', 'HK'),
			'desc' => esc_html__('URL for the image link.', 'HK'),
			'std' => 'http://yourwebsite.com/'
		),
		'align' => array(
			'type' => 'select',
			'label' => esc_html__('Align', 'HK'),
			'desc' => esc_html__('Set the align for the image.', 'HK'),
			'options' => array(
				'alignleft' => 'AlignLeft',
				'aligncenter' => 'AlignCenter',
				'alignright' => 'AlignRight'
			)
		),
		'lightbox' => array(
			'type' => 'select',
			'label' => esc_html__('Lightbox', 'HK'),
			'desc' => esc_html__('Open link to image in a lightbox.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'fade' => array(
			'type' => 'select',
			'label' => esc_html__('Fade', 'HK'),
			'desc' => esc_html__('Show the image with fade effect.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'no_preview' => true,
	'shortcode' => '[style_image width="{{width}}" height="{{height}}" image="{{image}}" align="{{align}}" alt="{{alt}}" url="{{url}}" border="{{border}}" lightbox="{{lightbox}}" fade="{{fade}}"]',
	'popup_title' => esc_html__('Insert Style Image Content Shortcode', 'HK')
);


//Portfolio slider shortcode
$dot_shortcodes['portfolio_slider_list'] = array(
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => esc_html__('Title', 'HK'),
			'desc' => esc_html__('Add the title for portfolio slider list.', 'HK'),
			'std' => 'Latest Works'
		),
		'category_slug_name' => array(
			'type' => 'text',
			'label' => esc_html__('Category Slug', 'HK'),
			'desc' => esc_html__('Enter the slug name of portfolio categories here. Separate categories with commas.', 'HK'),
			'std' => ''
		),
		'posts_per_page' => array(
			'type' => 'text',
			'label' => esc_html__('Show Posts', 'HK'),
			'desc' => esc_html__('Enter the posts number that you want to display.', 'HK'),
			'std' => '8'
		),
		'show_title' => array(
			'type' => 'select',
			'label' => esc_html__('Show Title', 'HK'),
			'desc' => esc_html__('Enable the title for lists.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'show_desc' => array(
			'type' => 'select',
			'label' => esc_html__('Show Description', 'HK'),
			'desc' => esc_html__('Enable the description for lists.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'desc_length' => array(
			'type' => 'text',
			'label' => esc_html__('Description Length', 'HK'),
			'desc' => esc_html__('Enter the number for the desc length.', 'HK'),
			'std' => '60'
		),
		'lightbox' => array(
			'type' => 'select',
			'label' => esc_html__('Lightbox', 'HK'),
			'desc' => esc_html__('Open link to image in a lightbox.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'no_preview' => true,
	'shortcode' => '[portfolio_slider_list title="{{title}}" category_slug_name="{{category_slug_name}}" posts_per_page="{{posts_per_page}}" show_title="{{show_title}}" show_desc="{{show_desc}}" desc_length="{{desc_length}}" lightbox="{{lightbox}}"]',
	'popup_title' => esc_html__('Insert a portfolio slider list Shortcode', 'HK')
);


//Blog slider shortcode
$dot_shortcodes['blog_slider_list'] = array(
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => esc_html__('Title', 'HK'),
			'desc' => esc_html__('Add the title for blog slider list.', 'HK'),
			'std' => 'Latest News'
		),
		'category_slug_name' => array(
			'type' => 'text',
			'label' => esc_html__('Category Slug', 'HK'),
			'desc' => esc_html__('Enter the slug name of portfolio categories here. Separate categories with commas.', 'HK'),
			'std' => ''
		),
		'posts_per_page' => array(
			'type' => 'text',
			'label' => esc_html__('Show Posts', 'HK'),
			'desc' => esc_html__('Enter the posts number that you want to display.', 'HK'),
			'std' => '8'
		),
		'show_title' => array(
			'type' => 'select',
			'label' => esc_html__('Show Title', 'HK'),
			'desc' => esc_html__('Enable the title for lists.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'show_meta' => array(
			'type' => 'select',
			'label' => esc_html__('Show Meta', 'HK'),
			'desc' => esc_html__('Enable the meta for lists.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'show_desc' => array(
			'type' => 'select',
			'label' => esc_html__('Show Description', 'HK'),
			'desc' => esc_html__('Enable the description for lists.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'desc_length' => array(
			'type' => 'text',
			'label' => esc_html__('Description Length', 'HK'),
			'desc' => esc_html__('Enter the number for the desc length.', 'HK'),
			'std' => '60'
		),
		'lightbox' => array(
			'type' => 'select',
			'label' => esc_html__('Lightbox', 'HK'),
			'desc' => esc_html__('Open link to image in a lightbox.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'no_preview' => true,
	'shortcode' => '[blog_slider_list title="{{title}}" category_slug_name="{{category_slug_name}}" posts_per_page="{{posts_per_page}}" show_title="{{show_title}}" show_title="{{show_title}}" show_meta="{{show_meta}}" desc_length="{{desc_length}}" lightbox="{{lightbox}}"]',
	'popup_title' => esc_html__('Insert a blog slider list Shortcode', 'HK')
);


//Product slider shortcode
$dot_shortcodes['product_slider_list'] = array(
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => esc_html__('Title', 'HK'),
			'desc' => esc_html__('Add the title for product slider list.', 'HK'),
			'std' => 'Latest Products'
		),
		'category_slug_name' => array(
			'type' => 'text',
			'label' => esc_html__('Category Slug', 'HK'),
			'desc' => esc_html__('Enter the slug name of product categories here. Separate categories with commas.', 'HK'),
			'std' => ''
		),
		'posts_per_page' => array(
			'type' => 'text',
			'label' => esc_html__('Show Posts', 'HK'),
			'desc' => esc_html__('Enter the posts number that you want to display.', 'HK'),
			'std' => '8'
		),
		'show_title' => array(
			'type' => 'select',
			'label' => esc_html__('Show Title', 'HK'),
			'desc' => esc_html__('Enable the title for lists.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'show_desc' => array(
			'type' => 'select',
			'label' => esc_html__('Show Description', 'HK'),
			'desc' => esc_html__('Enable the description for lists.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'desc_length' => array(
			'type' => 'text',
			'label' => esc_html__('Description Length', 'HK'),
			'desc' => esc_html__('Enter the number for the desc length.', 'HK'),
			'std' => '60'
		),
		'show_price' => array(
			'type' => 'select',
			'label' => esc_html__('Show Price', 'HK'),
			'desc' => esc_html__('Enable the price for lists.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'lightbox' => array(
			'type' => 'select',
			'label' => esc_html__('Lightbox', 'HK'),
			'desc' => esc_html__('Open link to image in a lightbox.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'no_preview' => true,
	'shortcode' => '[product_slider_list title="{{title}}" category_slug_name="{{category_slug_name}}" posts_per_page="{{posts_per_page}}" show_title="{{show_title}}" show_desc="{{show_desc}}" desc_length="{{desc_length}}" show_price="{{show_price}}" lightbox="{{lightbox}}"]',
	'popup_title' => esc_html__('Insert a product slider list Shortcode', 'HK')
);


//Gallery shortcode
$dot_shortcodes['gallery'] = array(
	'params' => array(
		'columns' => array(
			'type' => 'text',
			'label' => esc_html__('Columns', 'HK'),
			'desc' => esc_html__('Specify the number of columns. The gallery will include a break tag at the end of each row, and calculate the column width as appropriate. The default value is 4.', 'HK'),
			'std' => '4'
		),
		'order' => array(
			'type' => 'select',
			'label' => esc_html__('Order', 'HK'),
			'desc' => esc_html__('Specify the sort order used to display thumbnails. ASC or DESC.', 'HK'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => esc_html__('Order', 'HK'),
			'desc' => esc_html__('Specify the sort order used to display thumbnails. ASC or DESC.', 'HK'),
			'options' => array(
				'menu_order' => 'Menu Order',
				'random' => 'Rand'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => esc_html__('Size', 'HK'),
			'desc' => esc_html__('Specify the image size to use for the thumbnail display. The default size is "size-90-90".', 'HK'),
			'options' => array(
				'size-50-50' => 'size-50-50',
				'size-90-90' => 'size-90-90',
				'size-125-125' => 'size-125-125',
				'size-225-130' => 'size-225-130',
				'size-225-160' => 'size-225-160'
			)
		)
	),
	'no_preview' => true,
	'shortcode' => '[gallery columns="{{columns}}" order="{{order}}" orderby="{{orderby}}" size="{{size}}"]',
	'popup_title' => esc_html__('Insert a gallery list Shortcode', 'HK')
);


//Slidershow shortcode
$dot_shortcodes['slidershow'] = array(
	'params' => array(
		'order' => array(
			'type' => 'select',
			'label' => esc_html__('Order', 'HK'),
			'desc' => esc_html__('Specify the sort order used to display thumbnails. ASC or DESC.', 'HK'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => esc_html__('Order', 'HK'),
			'desc' => esc_html__('Specify the sort order used to display thumbnails. ASC or DESC.', 'HK'),
			'options' => array(
				'menu_order' => 'Menu Order',
				'random' => 'Rand'
			)
		),
		'show_caption' => array(
			'type' => 'select',
			'label' => esc_html__('Show Caption', 'HK'),
			'desc' => esc_html__('Enable the caption for slidershow.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'show_desc' => array(
			'type' => 'select',
			'label' => esc_html__('Show Description', 'HK'),
			'desc' => esc_html__('Enable the description for slidershow.', 'HK'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'no_preview' => true,
	'shortcode' => '[slidershow order="{{order}}" orderby="{{orderby}}" show_caption="{{show_caption}}" show_desc="{{show_desc}}"]',
	'popup_title' => esc_html__('Insert a slidershow Shortcode', 'HK')
);

?>