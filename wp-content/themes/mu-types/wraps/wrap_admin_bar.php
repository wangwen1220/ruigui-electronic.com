<?php
/*
* ----------------------------------------------------------------------------------------------------
*  Add link to the admin bar
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

class theme_options_admin_bar {

	function theme_options_admin_bar()
	{
		add_action('admin_bar_menu', array($this, 'theme_option_links'));
	}


	/**
	* Add's new global menu, if $href is false menu is added but registred as submenuable
	*
	* $name String
	* $id String
	* $href Bool/String
	*
	* @return void
	* @author Janez Troha
	**/
	function add_root_menu($name, $id, $href = false)
	{
		global $wp_admin_bar;
		if ( !is_super_admin() || !is_admin_bar_showing() )
		  return;

		$href = admin_url('admin.php?page=theme_general.php');
		$wp_admin_bar->add_menu( array(
			'id' => $id,
			'title' => $name,
			'href' => $href 
		));
	}


	/**
   * Add's new submenu where additinal $meta specifies class, id, target or onclick parameters
   *
   * $name String
   * $link String
   * $root_menu String
   * $meta Array
   *
   * @return void
   * @author Janez Troha
   **/
	function add_sub_menu($name, $link, $id, $root_menu, $meta = FALSE)
	{
		global $wp_admin_bar;
		if ( !is_super_admin() || !is_admin_bar_showing() )
		  return;

		$wp_admin_bar->add_menu( array(
		'parent' => $root_menu,
		'id' => $id,
		'title' => $name,
		'href' => $link,
		'meta' => $meta) );
	}


	/*
	* Add theme option links
	*/
	 function theme_option_links() {
		 $enable_portfolio = get_theme_option('type','enable_portfolio');
		$enable_product = get_theme_option('type','enable_product');
		$enable_download = get_theme_option('type','enable_download');
		$enable_event = get_theme_option('type','enable_event');
		$enable_team = get_theme_option('type','enable_team');

		$this->add_root_menu('Theme Panel', 'HK');
		$this->add_sub_menu('General', admin_url('admin.php?page=theme_general.php'), 'theme_general', 'HK');
		$this->add_sub_menu('Header', admin_url('admin.php?page=theme_header.php'), 'theme_header', 'HK');
		$this->add_sub_menu('Footer', admin_url('admin.php?page=theme_footer.php'), 'theme_footer', 'HK');
		$this->add_sub_menu('Slidershow', admin_url('admin.php?page=theme_slidershow.php'), 'theme_slidershow', 'HK');
		$this->add_sub_menu('Blog', admin_url('admin.php?page=theme_blog.php'), 'theme_blog', 'HK');
		if($enable_portfolio == 'yes') { $this->add_sub_menu('Portfolio', admin_url('admin.php?page=theme_portfolio.php'), 'theme_portfolio', 'HK'); }
		if($enable_product == 'yes') { $this->add_sub_menu('Product', admin_url('admin.php?page=theme_product.php'), 'theme_product', 'HK'); }
		if($enable_download == 'yes') { $this->add_sub_menu('Download', admin_url('admin.php?page=theme_download.php'), 'theme_download', 'HK'); }
		if($enable_event == 'yes') { $this->add_sub_menu('Event', admin_url('admin.php?page=theme_event.php'), 'theme_event', 'HK'); }
		if($enable_team == 'yes') { $this->add_sub_menu('Team', admin_url('admin.php?page=theme_team.php'), 'theme_team', 'HK'); }
		$this->add_sub_menu('Contact', admin_url('admin.php?page=theme_contact.php'), 'theme_contact', 'HK');
		$this->add_sub_menu('Font', admin_url('admin.php?page=theme_font.php'), 'theme_font', 'HK');
		$this->add_sub_menu('Style', admin_url('admin.php?page=theme_style.php'), 'theme_style', 'HK');
		$this->add_sub_menu('Types', admin_url('admin.php?page=theme_types.php'), 'theme_types', 'HK');
	}

}


function theme_options_admin_bar_init() {
    global $theme_options_admin_bar; $theme_options_admin_bar = new theme_options_admin_bar();
}

add_action('init', 'theme_options_admin_bar_init');

?>