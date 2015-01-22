<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Contact Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$options = array(

	array(
			'name' => esc_html__('Contact Options', 'HK'),
			'type' => 'title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Contact Email','HK'),
			'desc' => esc_html__('Enter your email for the contact form.','HK'),
			'id' => 'email',
			'std' => get_option('admin_email'),
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Google Map','HK'),
			'desc' => __('Paste your google map code here. The max width is 480px;','HK'),
			'id' => 'google_map',
			'rows' => '6',
			'std' => '<iframe width="480" height="330" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.hk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=Envato+Level+5,+140+Bourke+St,+Melbourne+Victoria+3000+Australia.&amp;ie=UTF8&amp;hq=Envato+Level+5,+140+Bourke+St,+Melbourne+Victoria+3000+Australia.&amp;hnear=&amp;radius=15000&amp;t=m&amp;vpsrc=0&amp;brcurrent=3,0x0:0x0,0&amp;z=16&amp;output=embed"></iframe>',
			'type' => 'textarea',
	),

	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'contact', 'options' => $options );

?>