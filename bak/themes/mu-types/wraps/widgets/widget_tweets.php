<?php
/*---------------------------------------------------------------------------------*/
/* Tweets widget */
/*---------------------------------------------------------------------------------*/
class Widget_Tweets extends WP_Widget{

	#
	#Construction function
	#
	function Widget_Tweets()
	{
		$title_ops = esc_html__(THEME_NAME.'&raquo; Tweets','HK');
		$widget_ops = array('classname'=>'widget-tweets widget-posts','description'=>esc_html__('This widget will display a tweets section. ','HK'));
		$control_ops = array('width'=>250);
		$this->WP_Widget(THEME_SLUG. '_tweets',$title_ops,$widget_ops,$control_ops);
	}


	#
	#Function defined form
	#
	function form($instance)
	{
		$instance = wp_parse_args((array)$instance,array(
			'title' => esc_html__('Tweets','HK'),
			'user_name' => 'twitter',
			'cache_time' => 30,
			'posts_per_page' => 3,
			'avatar' => 'true'	
		));

		$title = htmlspecialchars($instance['title']);
		$user_name = htmlspecialchars($instance['user_name']);
		$cache_time = htmlspecialchars($instance['cache_time']);
		$posts_per_page = htmlspecialchars($instance['posts_per_page']);
		$avatar = htmlspecialchars($instance['avatar']);

		?>
		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'user_name' ); ?>"><?php esc_html_e('User Name:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'user_name' ); ?>" name="<?php echo $this->get_field_name( 'user_name' ); ?>" type="text" value="<?php echo esc_attr( $user_name ); ?>" />
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>"><?php esc_html_e('Showposts:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo esc_attr( $posts_per_page ); ?>" />
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id( 'cache_time' ); ?>"><?php esc_html_e('Cache Time:','HK'); ?></label>
		<input  id="<?php echo $this->get_field_id( 'cache_time' ); ?>" name="<?php echo $this->get_field_name( 'cache_time' ); ?>" type="text" value="<?php echo esc_attr( $cache_time ); ?>" />
		</div>

		<div class="theme-widget-wrap">
		<label for="<?php echo $this->get_field_id('avatar'); ?>">
		<input type="checkbox" name="<?php echo $this->get_field_name('avatar'); ?>" <?php checked('true', $avatar); ?> value="true" />
		<em><?php esc_html_e('Display with avatar.','HK'); ?></em>
		</label>
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
		$instance['user_name'] = strip_tags($new_instance['user_name']);
		$instance['cache_time'] = strip_tags($new_instance['cache_time']);
		$instance['posts_per_page'] = strip_tags($new_instance['posts_per_page']);
		$instance['avatar'] = strip_tags($new_instance['avatar']);
		return $instance;
	}


	#
	#Definition of widget function that displays a web page
	#
	function widget($args,$instance)
	{
		extract($args);
		$title = $instance['title'];
		$posts_per_page = $instance['posts_per_page'];
		$user_name = $instance['user_name'];
		$cache_time = $instance['cache_time'];
		$avatar = $instance['avatar'];

		if($avatar == 'true')
		{
			$li_class = ' class="clearfix avatar"';
		}
		else
		{
			$li_class = ' class="clearfix no-avatar"';
		}

		echo $before_widget; 
		echo $before_title . $title . $after_title;
		?>
		<?php
		/*
		* Get tweets
		* JSON list of tweets using:
		* http://dev.twitter.com/doc/get/statuses/user_timeline
		* Cached using WP transient API.
		* $posts_per_page, $user_name, $cache_time
		*/
		// Configuration.
		$numTweets = $posts_per_page;
		$name = $user_name;
		$transName = THEME_SLUG.'_list_tweets'; // Name of value in database.
		$cacheTime = $cache_time; // Time in minutes between updates.

		if(false === ($tweets = get_transient($transName) ) )
		{
			 // Get the tweets from Twitter.
			$json = wp_remote_get('http://api.twitter.com/1/statuses/user_timeline.json?screen_name='.$name.'&count='.$numTweets);

			 // Get tweets into an array.
			$twitterData = json_decode($json['body'], true);

			// Now update the array to store just what we need. (Done here instead of PHP doing this for every page load)
			foreach ($twitterData as $tweet)
			{
				 // Core info.
				$name = $tweet['user']['name'];
				$permalink = 'http://twitter.com/#!/'. $name .'/status/'. $tweet['id_str'];
				$image = $tweet['user']['profile_image_url'];

				// Message. Convert links to real links.
				$pattern = '/http:(\S)+/';
				$replace = '<a href="${0}" target="_blank" rel="nofollow">${0}</a>';
				$text = preg_replace($pattern, $replace, $tweet['text']);

				// Need to get time in Unix format.
				$time = $tweet['created_at'];
				$time = date_parse($time);
				$uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);

				// Now make the new array.
				$tweets[] = array(
					'text' => $text,
					'name' => $name,
					'permalink' => $permalink,
					'image' => $image,
					'time' => $uTime
				);

				// Save our new transient.
				set_transient($transName, $tweets, 60 * $cacheTime);
			}
		}
		?>
		<ul>
		<?php foreach($tweets as $t) : ?>
		<li<?php echo $li_class; ?>>
			<?php if($avatar == 'true') : ?>
			<figure class="alignleft post-thumb">
			<img src="<?php echo $t['image']; ?>" width="50" height="50" alt="" />
			</figure>
			<?php endif; ?>
			<section>
			<p class="tweet-text"><?php echo '<b>'.$t['name'].':</b> '. $t['text']; ?></p>
			<p class="post-meta tweet-time"><?php echo human_time_diff($t['time'], current_time('timestamp')); ?> <?php esc_html_e('ago', 'HK'); ?></p>
			</section>
		</li>
		<?php endforeach; wp_reset_postdata(); ?>
		</ul>
		<?php
		echo $after_widget; 
	}
}

register_widget( 'Widget_Tweets' );

?>