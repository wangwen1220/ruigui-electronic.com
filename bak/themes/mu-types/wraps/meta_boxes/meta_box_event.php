<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Metaboxes for event
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$config = array(
	'title' => esc_html__('Event Settings','HK'),
	'id' => 'event_meta_boxes',
	'pages' => array('event'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);


$options = array(

	array(
			'name' => esc_html__('Event Options', 'HK'),
			'type' => 'title',
			'desc' => esc_html__('Set the below options for your event items.','HK'),
	),

	array(
			'name' => esc_html__('Starting Date','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'event_starting_date',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Ending Date','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'event_ending_date',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Starting Time','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'event_starting_time',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Ending Time','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'event_ending_time',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Address','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'event_address',
			'std' => '',
			'rows' => '2',
			'type' => 'textarea',
	),

	array(
			'name' => esc_html__('Phone','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'event_phone',
			'std' => '',
			'size' => '80',
			'type' => 'text',
	),

	array(
			'name' => esc_html__('Costs','HK'),
			'desc' => esc_html__('If you do not want to display this, just leave it blank.','HK'),
			'id' => 'event_costs',
			'std' => '',
			'size' => '80',
			'type' => 'text',
			'class' => 'noborder',
	),


);

new meta_boxes_generator($config,$options);

?>