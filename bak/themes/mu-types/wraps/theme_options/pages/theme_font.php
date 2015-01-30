<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Font Page
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
$font_stacks = array(
		'arial' => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
		'baskerville' => 'Baskerville, "Times New Roman", Times, serif',
		'cambria' => 'Cambria, Georgia, Times, "Times New Roman", serif',
		'century-gothic' => '"Century Gothic", "Apple Gothic", sans-serif',
		'consolas' => 'Consolas, "Lucida Console", Monaco, monospace',
		'copperplate-light' => '"Copperplate Light", "Copperplate Gothic Light", serif',
		'courier-new' => '"Courier New", Courier, monospace',
		'franklin' => '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif',
		'futura' => 'Futura, "Century Gothic", AppleGothic, sans-serif',
		'garamond' => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
		'geneva' => 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif',
		'georgia' => 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif',
		'gill-sans' => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
		'helvetica' => '"Helvetica Neue", Arial, Helvetica, sans-serif',
		'impact' => 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif',
		'lucida' => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
		'metrophobic' => 'MetrophobicRegular, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
		'palatino' => 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif',
		'tahoma' => 'Tahoma, Geneva, Verdana',
		'times' => 'Times, "Times New Roman", Georgia, serif',
		'trebuchet' => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
		'verdana' => 'Verdana, Geneva, Tahoma, sans-serif'
);


$font_size = array(
		'8' => '8px',
		'9' => '9px',
		'10' => '10px',
		'11' => '11px',
		'12' => '12px',
		'13' => '13px',
		'14' => '14px',
		'15' => '15px',
		'16' => '16px',
		'17' => '17px',
		'18' => '18px',
		'19' => '19px',
		'20' => '20px',
		'21' => '21px',
		'22' => '22px',
		'23' => '23px',
		'24' => '24px',
		'25' => '25px',
		'26' => '26px',
		'27' => '27px',
		'28' => '28px',
		'29' => '29px',
		'30' => '30px',
		'31' => '31px',
		'32' => '32px',
		'33' => '33px',
		'34' => '34px',
		'35' => '35px',
		'36' => '36px'
);


$font_weight = array(
		'bold' => 'Bold',
		'normal' => 'Normal'
);


$options = array(

	array(
			'name' => esc_html__('Font Settings', 'HK'),
			'type' => 'title'
	),

	array(
			'name' => esc_html__('Font Family', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('General','HK'),
			'desc' => esc_html__('Choose a font family for the general font settings.','HK'),
			'id' => 'body_font_family',
			'std' => 'helvetica',
			'options' => $font_stacks,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Menu','HK'),
			'desc' => esc_html__('Choose a font family for the nav menu font settings.','HK'),
			'id' => 'nav_font_family',
			'std' => 'helvetica',
			'options' => $font_stacks,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Headings','HK'),
			'desc' => esc_html__('Choose a font family for the headings font settings.','HK'),
			'id' => 'headings_font_family',
			'std' => 'helvetica',
			'options' => $font_stacks,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Headings Font Weight','HK'),
			'desc' => esc_html__('Set the font weight for headings.','HK'),
			'id' => 'headings_font_weight',
			'std' => 'bold',
			'options' => $font_weight,
			'type' => 'radio',
	),
	
	array('type' => 'foot'),

	array(
			'name' => esc_html__('Font Size', 'HK'),
			'type' => 'sub_title',
	),

	array('type' => 'head'),

	array(
			'name' => esc_html__('Menu','HK'),
			'id' => 'menu_font_size',
			'std' => '14',
			'options' => $font_size,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('Sub Menu','HK'),
			'id' => 'sub_menu_font_size',
			'std' => '12',
			'options' => $font_size,
			'type' => 'select',
	),


	array(
			'name' => esc_html__('H1','HK'),
			'id' => 'h1_font_size',
			'std' => '24',
			'options' => $font_size,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('H2','HK'),
			'id' => 'h2_font_size',
			'std' => '20',
			'options' => $font_size,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('H3','Hk'),
			'id' => 'h3_font_size',
			'std' => '16',
			'options' => $font_size,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('H4','Hk'),
			'id' => 'h4_font_size',
			'std' => '14',
			'options' => $font_size,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('H5','Hk'),
			'id' => 'h5_font_size',
			'std' => '12',
			'options' => $font_size,
			'type' => 'select',
	),

	array(
			'name' => esc_html__('H6','Hk'),
			'id' => 'h6_font_size',
			'std' => '10',
			'options' => $font_size,
			'type' => 'select',
	),
	
	array('type' => 'foot'),

);

return array('auto' => true, 'name' => 'font', 'options' => $options );

?>