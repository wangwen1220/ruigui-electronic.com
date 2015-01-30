<?php 
/*
* ----------------------------------------------------------------------------------------------------
* SHORTCODE FOR ICONBOX
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
add_shortcode('icon_box', 'theme_sc_icon_box');

function theme_sc_icon_box($atts, $content = null) 
{
	extract(shortcode_atts(
        array(
			'title' => 'Icon Box Title',
			'sub_title' => 'Here is the sub title of the box.',
     		'icon' => '',
			'color' => ''
    ), $atts));

	if($icon != "") { $icon_url = THEME_URI . '/assets/images/shortcode/'.$icon; }
	if($icon != "") { $icon_img = '<img src="'.$icon_url.'" alt="" />'; }

	$output = '<div class="sc-iconbox sc-iconbox-'.$color.'">'."\n";
	$output .= '<div class="iconbox-head clearfix">'."\n";
	$output .= '<div class="iconbox-img">'.$icon_img.'</div>';
	$output .= '<h3 class="iconbox-title">'.$title.'</h3>';
	$output .= '<h5 class="iconbox-sub-title">'.$sub_title.'</h5>';
	$output .= '</div>'."\n";
	$output .= '<div class="iconbox-desc">'.theme_remove_autop($content) .'</div>'."\n";
	$output .= '</div>'."\n";

	return $output;

}

?>