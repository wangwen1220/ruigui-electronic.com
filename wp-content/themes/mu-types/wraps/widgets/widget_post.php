<?php
/*---------------------------------------------------------------------------------*/
/* Posts widget */
/*---------------------------------------------------------------------------------*/
class Widget_Posts extends WP_Widget{

	#
	#Construction function
	#
	function Widget_Posts()
	{
		$title_ops = esc_html__(THEME_NAME.'&raquo; Posts','HK');
		$widget_ops = array('classname'=>'widget-posts','description'=>esc_html__('This widget will display a posts section. ','HK'));
		$control_ops = array('width'=>250);
		$this->WP_Widget(THEME_SLUG. '_posts',$title_ops,$widget_ops,$control_ops);
	}


	#
	#Function defined form
	#
	function form($instance)
	{
		$instance = wp_parse_args((array)$instance,array(
			'title' => esc_html__('Posts','HK'),
			'showposts' => 3,
			'orderby' => 'date',
			'lightbox' => 'true'	
		));

		$title = htmlspecialchars($instance['title']);
		$showposts = htmlspecialchars($instance['showposts']);
		$orderby = htmlspecialchars($instance['orderby']);
		$lightbox = htmlspecialchars($instance['lightbox']);

		?>
		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'showposts' ); ?>"><?php esc_html_e('Showposts:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'showposts' ); ?>" name="<?php echo $this->get_field_name( 'showposts' ); ?>" type="text" value="<?php echo esc_attr( $showposts ); ?>" />
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php esc_html_e('Orderby:','HK'); ?></label>
		<select name="<?php echo $this->get_field_name('orderby'); ?>">
		<option value="date" <?php selected('date', $orderby); ?>><?php esc_html_e('Date','HK'); ?></option>
		<option value="comment_count" <?php selected('comment_count', $orderby); ?>><?php esc_html_e('Comment','HK'); ?></option>
		<option value="rand" <?php selected('rand', $orderby); ?>><?php esc_html_e('Rand','HK'); ?></option>
		</select>
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'lightbox' ); ?>"><?php esc_html_e('Lightbox:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'lightbox' ); ?>" name="<?php echo $this->get_field_name( 'lightbox' ); ?>" type="checkbox" <?php checked('true', $lightbox); ?> value="true" />
		<?php esc_html_e('Display the thumbnail with lightbox.','HK'); ?>
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
		$instance['showposts'] = strip_tags($new_instance['showposts']);
		$instance['orderby'] = strip_tags($new_instance['orderby']);
		$instance['lightbox'] = strip_tags($new_instance['lightbox']);
		return $instance;
	}


	#
	#Definition of widget function that displays a web page
	#
	function widget($args,$instance)
	{
		extract($args);
		$title = $instance['title'];
		$showposts = $instance['showposts'];
		$orderby = $instance['orderby'];
		$lightbox = $instance['lightbox'];
		$post_id = isset( $post->ID ) ? $post->ID: ''; 

		$args = array( 
				'post_type' => array('post'),
				'posts_per_page' => $showposts,
				'orderby' => $orderby,
				'post_status' => 'publish', 
				'ignore_sticky_posts' => 1, 
				'post__not_in' => array($post_id)
				); 
		$query = new WP_Query( $args );

		echo $before_widget; 
		echo $before_title . $title . $after_title;
		?>
		<ul>
		<?php 
			while ($query->have_posts()) : $query->the_post();

			if($lightbox == 'true') 
			{
				$link = get_image_url();
				$rel = 'rel="prettyPhoto"';
			}else{
				$link = get_permalink();
				$rel = 'rel="bookmark"';
			}
		?>
		<li class="clearfix">
			<?php if ( has_post_thumbnail() ): ?>
			<figure class="alignleft post-thumb post-thumb-preload post-thumb-fade">
			<a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>" <?php echo $rel; ?> class="image-link">
			<?php the_post_thumbnail('size-50-50'); ?>
			</a>
			</figure>
		<?php endif; ?>
		<section>
			<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
			<p class="post-meta">
			<?php the_time( get_option('date_format') ); ?>
			<span></span>
			<?php comments_popup_link(__('No Comment', 'HK'), __('1Comment', 'HK'), __('%Comments', 'HK'), '', __('Comment Off', 'HK')); ?>
			</p>
		</section>
		</li>
		<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<?php
		echo $after_widget; 
	}
}

register_widget( 'Widget_Posts' );

?>