<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Sidebars
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/


/*------------------------------------------------------------------------
*Sidebar Widgets
------------------------------------------------------------------------*/
function theme_side_widgets($type) 
{
	echo '<!--BEGIN SIDE-->'."\n";
	echo '<aside id="sidebar">'."\n";

	if ( !dynamic_sidebar($type.'-widget-area') ) {
		theme_no_sidebar();				
	}

	echo '</aside>'."\n";
	echo '<!--END SIDE-->'."\n";
}



/*------------------------------------------------------------------------
*Footer Widgets
------------------------------------------------------------------------*/
function theme_footer_widgets() 
{
	$enable_footer_widgets = get_theme_option('footer','enable_footer_widgets');
	$columns = get_theme_option('footer','widget_columns');
	$first_col = ' col-first';
	switch($columns)
	{
		case 1: $class = 'col-1-1'; break;
		case 2: $class = 'col-2-1'; break;
		case 3: $class = 'col-3-1'; break;
		case 4: $class = 'col-4-1'; break;
	}

	if($enable_footer_widgets == 'yes')
	{
		echo '<div class="footer-widgets-area clearfix">'."\n";
		for ($i = 1; $i <= $columns; $i++)
		{
			echo '<div class="'.$class.$first_col.'">'."\n";
			dynamic_sidebar('footer-widget-area-'.$i);
			echo '</div>'."\n";
			$first_col = '';
		}
		echo '</div><!--end # footer widgets area-->'."\n";
	}
}



/*------------------------------------------------------------------------
*No Sidebar Notice
------------------------------------------------------------------------*/
function theme_no_sidebar() 
{
	echo '<div class="notice-sidebar">'."\n";
	echo 'Oops, you need to add the widgets. <b><a href="'.home_url().'/wp-admin/widgets.php">Do it now!</a></b>';
	echo '</div>'."\n";
}

?>