<?php 
/*
* ----------------------------------------------------------------------------------------------------
* SHORTCODE FOR TOGGLE
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
add_shortcode('toggle', 'theme_sc_toggle');
add_shortcode('toggles', 'theme_sc_toggles');


/***************************************************************************
 * Add shortcode [toggle] [/toggle]
***************************************************************************/
function theme_sc_toggle($atts, $content=null)
{	
	global $toggles_array;
	
	extract(shortcode_atts(array(
		'title' => 'Title goes here'
	), $atts));
	
	$toggles_array[] = array(
		'title' => $title,
		'content' => do_shortcode( $content )
	);
}


/***************************************************************************
 * Add shortcode [toggles] [/toggles]
***************************************************************************/
function theme_sc_toggles( $atts, $content = null)
{

	global $toggles_array;
	do_shortcode( $content );

	if( is_array( $toggles_array ) )
	{

		$output = '<div class="sc-toggles-wrap">';
		
		foreach( $toggles_array as $toggle )
		{
			$output .= '<div class="sc-toggle">';
			$output .= '<div class="title"><span>'.$toggle['title'].'</span></div>';
			$output .= '<div class="inner clearfix">';
			$output .= theme_remove_autop( $toggle['content'] )."\n";
			$output .= '</div>';
			$output .= '</div>';
		}

		$output .= '</div>';		
		
		return $output;
	}

}

?>