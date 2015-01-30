<?php
/*---------------------------------------------------------------------------------*/
/* Flickr widget */
/*---------------------------------------------------------------------------------*/
class Widget_Flickr extends WP_Widget{

	#
	#Construction function
	#
	function Widget_Flickr()
	{
		$title_ops = esc_html__(THEME_NAME.'&raquo; Flickr','HK');
		$widget_ops = array('classname'=>'widget-flickr','description'=>esc_html__('This widget will display a flickr section. ','HK'));
		$control_ops = array('width'=>250);
		$this->WP_Widget(THEME_SLUG. '_flickr',$title_ops,$widget_ops,$control_ops);
	}


	#
	#Function defined form
	#
	function form($instance)
	{
		$instance = wp_parse_args((array)$instance,array(
			'title'=> esc_html__('Flickr','HK'),
			'account' => '',
			'showposts'=> 10,
			'display' => 'latest'			
		));

		$title = htmlspecialchars($instance['title']);
		$account = htmlspecialchars($instance['account']);
		$showposts = htmlspecialchars($instance['showposts']);
		$display = htmlspecialchars($instance['display']);

		?>
		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'account' ); ?>"><?php esc_html_e('Account:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'account' ); ?>" name="<?php echo $this->get_field_name( 'account' ); ?>" type="text" value="<?php echo esc_attr( $account ); ?>" />
		<p class="theme-description"><a href="http://idgettr.com/" target="_blank">Get your flickr account.</a></p>
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'showposts' ); ?>"><?php esc_html_e('Showposts:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'showposts' ); ?>" name="<?php echo $this->get_field_name( 'showposts' ); ?>" type="text" value="<?php echo esc_attr( $showposts ); ?>" />
		</div>
		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php esc_html_e('Display:','HK'); ?></label>
		<select name="<?php echo $this->get_field_name('display'); ?>">
		<option value="latest" <?php selected('latest', $display); ?>><?php esc_html_e('Latest','HK'); ?></option>
		<option value="random" <?php selected('random', $display); ?>><?php esc_html_e('Random','HK'); ?></option>
		</select>
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
		$instance['account'] = strip_tags($new_instance['account']);
		$instance['showposts'] = strip_tags($new_instance['showposts']);
		$instance['display'] = strip_tags($new_instance['display']);
		return $instance;
	}


	#
	#Definition of widget function that displays a web page
	#
	function widget($args,$instance)
	{
		extract($args);
		$title = $instance['title'];
		$account = $instance['account'];
		$showposts = $instance['showposts'];
		$display = $instance['display'];

		echo $before_widget; 
		echo $before_title . $title . '<span><a href="http://www.flickr.com/photos/'.$account.'">View All</a></span>' . $after_title;
		echo '<div id="flickr_badge_wrapper" class="clearfix">';
		echo '<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$showposts.'&amp;display='.$display.'&amp;size=s&amp;layout=x&amp;source=user&amp;user='.$account.'"></script>';
		echo '</div>';
		echo $after_widget; 
	}
}

register_widget( 'Widget_Flickr' );

?>