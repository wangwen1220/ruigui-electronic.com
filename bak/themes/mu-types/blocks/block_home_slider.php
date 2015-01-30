<?php 
/*
* ----------------------------------------------------------------------------------------------------
* Home Slider
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/


#
#Home slider
#
function theme_home_slider($type)
{
	switch($type)
	{
		case 'slidershow':
		theme_home_slidershow();
		break;

		case 'image':
		theme_home_special_image();
		break;

		case 'video':
		theme_home_video();
		break;
	}
}


#
#Home slidershow
#
function theme_home_slidershow()
{
	if (have_posts()) 
	{
		$posts_per_page = get_theme_option('slidershow','slidershow_posts_per_page');
		$args = array( 
			'post_type' => 'slidershow',
			'posts_per_page' => $posts_per_page,
			'orderby' => 'menu_order',
			'order' => 'ASC',
		); 
		$query = new WP_Query( $args );
		?>
		<div class="flex-container">
		<div class="flexslider">
		<ul class="slides clearfix">
		<?php 
			while ($query->have_posts()) : $query->the_post();		
			#
			#Custom Files
			#
			$enable_title = get_meta_option('enable_slidershow_title');
			$enable_desc = get_meta_option('enable_slidershow_desc');
			$external_link = get_meta_option('slidershow_external_link');
			$enable_video = get_meta_option('enable_slidershow_video');
			$embed_code = get_meta_option('slidershow_video_embed_code');
			#
			#Get the title and desc
			#
			$title = get_the_title();
			$desc = get_meta_option('slidershow_desc');
		?>
		<li>
		<?php
		if($enable_video && $embed_code)
		{
			echo $embed_code;
		}
		elseif(has_post_thumbnail())
		{
			if($external_link)
			{
				echo '<a href="'.$external_link.'" title="'.$title.'">';
				the_post_thumbnail('size-home-slider');
				echo '</a>';
			}
			else
			{
				the_post_thumbnail('size-home-slider'); 
			}

			if(($title && $enable_title == true) || ($desc && $enable_desc == true))
			{
				echo '<div class="flex-caption">';
				if($title && $enable_title == true) { echo '<h3>'.$title.'</h3>'; }
				if($desc && $enable_desc == true) { echo '<p>'.$desc.'</p>'; }
				echo '</div>';
			}
		}
		?>
		</li>
		<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		</div>
		<div class="loader"></div>
		</div>
		<?php
	}//End If
}



#
#Home special image
#
function theme_home_special_image()
{
	$special_image = get_theme_option('slidershow','slidershow_special_image');
	$external_link = get_theme_option('slidershow','slidershow_external_link');
	if($special_image) {
		echo '<div class="home-special-image">';
		if($external_link)
		{
			echo '<a href="'.$external_link.'"><img width="990" src="'.$special_image.'" alt="" /></a>';
		}
		else
		{
			echo '<img width="990" src="'.$special_image.'" alt="" />';
		}
		echo '</div>';
	}
}



#
#Home video
#
function theme_home_video()
{
	$video_height = get_theme_option('slidershow','slidershow_video_height');
	$video_m4v = get_theme_option('slidershow','slidershow_video_m4v');
	$video_ogv = get_theme_option('slidershow','slidershow_video_ogv');
	$video_webm = get_theme_option('slidershow','slidershow_video_webm');
	$video_preview = get_theme_option('slidershow','slidershow_video_preview');
	$video_embed_code = stripslashes(get_theme_option('slidershow','slidershow_video_embed_code'));
?>
<?php if($video_embed_code): ?>
<div class="embed-code-home-container">
	<?php echo $video_embed_code; ?>
</div>
<?php else: ?>
<?php
	//JS
	echo '<script type="text/javascript">'."\n";
	echo '//<![CDATA['."\n";
	echo 'jQuery(document).ready(function(){		'."\n";
	echo '		jQuery("#jquery_jplayer_1").jPlayer({'."\n";
	echo '			ready: function () {'."\n";
	echo '				jQuery(this).jPlayer("setMedia", {'."\n";
	if($video_m4v) { echo '					m4v: "'.$video_m4v.'",'."\n"; }
	if($video_ogv) { echo '					ogv: "'.$video_ogv.'",'."\n"; }
	if($video_webm) { echo '					webmv: "'.$video_webm.'",'."\n"; }
	echo '					poster: "'.$video_preview.'"'."\n";
	echo '				});'."\n";
	echo '			},'."\n";
	echo '			size: {'."\n";
	echo '				width: "990px",'."\n";
	echo '				height: "'.$video_height.'px"'."\n";
	echo '			},'."\n";
	echo '		    swfPath: "'.ASSETS_URI.'/flash",'."\n";
	echo '			cssSelectorAncestor: "#jp_interface_1",'."\n";
	echo '			supplied: "webmv, ogv, m4v"'."\n";
	echo '		});'."\n";
	echo '});'."\n";
	echo '//]]>'."\n";
	echo '</script>'."\n";
?>
<div class="jp-video jp-video-home-container">
<div class="jp-type-single">
	<div id="jquery_jplayer_1" class="jp-jplayer"></div>
	<div id="jp_interface_1" class="jp-interface">
		<div class="jp-video-play"></div>
		<ul class="jp-controls">
		<li class="jp-controls-li"><a href="#" class="jp-play" tabindex="1">play</a></li>
		<li class="jp-controls-li"><a href="#" class="jp-pause" tabindex="1">pause</a></li>
		<li class="jp-controls-li"><a href="#" class="jp-stop" tabindex="1">stop</a></li>
		<li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
		<li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
		</ul>
		<div class="jp-progress">
		<div class="jp-seek-bar">
			<div class="jp-play-bar"></div>
		</div>
		</div>
		<div class="jp-volume-bar">
			<div class="jp-volume-bar-value"></div>
		</div>
	</div>
</div>
</div>
<?php endif; ?>
<?php
}

?>