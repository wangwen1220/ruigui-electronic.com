<?php
/*
* ------------------------------------------------------------------------------------------------------------------------
* WIDGET FOR COMMENTS
* @PACKAGE BY HAWKTHEME
* ------------------------------------------------------------------------------------------------------------------------
*/

class Comments_Widget extends WP_Widget{

	/** Construction function**/
	function Comments_Widget(){
		$title_ops = esc_html__(THEME_NAME.'&raquo; Comments','HK');
		$widget_ops = array('classname'=>'widget-comments widget-posts','description'=>esc_html__('This is a comments list.','HK'));
		$control_ops = array('width'=>250);
		$this->WP_Widget(THEME_SLUG. '_comments',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			'title' => esc_html__('Comments','HK'),
			'showposts' => 3,
			'avatar' => 'true',
		));

		$title = htmlspecialchars($instance['title']);
		$showposts = htmlspecialchars($instance['showposts']);
		$avatar = htmlspecialchars($instance['avatar']);

		?>
		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</div>

		<div class="theme-widget-wrap theme-shorttext">
		<label for="<?php echo $this->get_field_id('showposts'); ?>"><?php esc_html_e('Showposts:','HK'); ?> </label>
		<input  id="<?php echo $this->get_field_id('showposts'); ?>" name="<?php echo $this->get_field_name('showposts'); ?>" type="text" value="<?php echo esc_attr( $showposts ); ?>" />
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id('avatar'); ?>">
		<input type="checkbox" name="<?php echo $this->get_field_name('avatar'); ?>" <?php checked('true', $avatar); ?> value="true" />
		<em><?php esc_html_e('Display with avatar.','HK'); ?></em>
		</label>
		</div>
		<?php

	}


	/** Function defined update**/
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['showposts'] = strip_tags($new_instance['showposts']);
		$instance['avatar'] = strip_tags($new_instance['avatar']);

		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);
		$title = $instance['title'];
		$showposts = $instance['showposts'];
		$avatar = $instance['avatar'];

		$show_comments = $showposts+1; 
		$my_email = get_option('admin_email'); 
		$comments = get_comments('number='.$show_comments.'&status=approve&type=comment'); 

		echo $before_widget; 
		echo $before_title . $title . $after_title;
		?>
		<ul>
		<?php foreach ($comments as $rc_comment) : ?>
		<?php if ($rc_comment->comment_author_email != $my_email) : ?>
		<li class="clearfix">
		<?php if($avatar == 'true') : ?>
		<figure class="alignleft">
		<a href="<?php echo get_permalink($rc_comment->comment_post_ID).'#comment-'.$rc_comment->comment_ID; ?>">
		<?php echo get_avatar($rc_comment->comment_author_email,50); ?>
		</a>
		</figure>
		<?php endif; ?>
		<section<?php if($avatar != 'true') { echo ' class="no-avatar"';} ?>>
		<h5>
		<a href="<?php echo get_permalink($rc_comment->comment_post_ID).'#comment-'.$rc_comment->comment_ID; ?>">
		<?php echo theme_max_char($rc_comment->comment_content, 54," "); ?>
		</a>
		</h5>
		<p class="post-meta">
		<?php esc_html_e('Post: ','HK'); ?><?php echo $rc_comment->comment_date; ?>
		</p>
		</section>
		</li>
		<?php endif; ?>
		<?php endforeach; wp_reset_postdata(); ?>
		</ul>
		<?php
		echo $after_widget; 

	}

}

register_widget( 'Comments_Widget' );

?>