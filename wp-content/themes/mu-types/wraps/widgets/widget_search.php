<?php
/*---------------------------------------------------------------------------------*/
/* Search widget */
/*---------------------------------------------------------------------------------*/
class Widget_Search extends WP_Widget{

	#
	#Construction function
	#
	function Widget_Search()
	{
		$title_ops = esc_html__(THEME_NAME.'&raquo; Search','HK');
		$widget_ops = array('classname'=>'widget-search','description'=>esc_html__('This widget will display a search section. ','HK'));
		$control_ops = array('width'=>250);
		$this->WP_Widget(THEME_SLUG. '_search',$title_ops,$widget_ops,$control_ops);
	}


	#
	#Function defined form
	#
	function form($instance)
	{
		$instance = wp_parse_args((array)$instance,array(
			'title'=> esc_html__('Search','HK')		
		));

		$title = htmlspecialchars($instance['title']);

		?>
		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</div>
		<?php
	}


	#
	#Function defined update
	#
	function update($new_instance,$old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}


	#
	#Definition of widget function that displays a web page
	#
	function widget($args,$instance)
	{
		extract($args);
		$title = $instance['title'];

		echo $before_widget; 
		if($title) { echo $before_title . $title . $after_title; }
		?>
		<div class="searchbox">
		<form action="<?php echo home_url('/'); ?>" method="get">
		<dl class="clearfix">
		<dt><input type="text" id="widget-search-input" name="s" size="24" value="" placeholder="Enter the keywords..." /></dt>
		<dd><input type="submit"  id="widget-search-button" name="widget-search-button" value="" /></dd>
		</dl>
		</form>
		</div>
		<?php
		echo $after_widget; 
	}
}

register_widget( 'Widget_Search' );

?>