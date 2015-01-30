<?php
/*
* ----------------------------------------------------------------------------------------------------
* Team Loop
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>
<div class="team-lists clearfix">
<?php
#
#Default count
#
$loop_count = 0;

while (have_posts()) : the_post();

###
#
#Custom Files
#
$position = get_meta_option('team_position');
$delicious = get_meta_option('team_delicious');
$facebook = get_meta_option('team_facebook');
$flickr = get_meta_option('team_flickr');
$google = get_meta_option('team_google');
$linkedin = get_meta_option('team_linkedin');
$myspace = get_meta_option('team_myspace');
$rss = get_meta_option('team_rss');
$stumble = get_meta_option('team_stumble');
$twitter = get_meta_option('team_twitter');
$yahoo = get_meta_option('team_yahoo');


#
#Get theme options
#
$lightbox = get_theme_option('team','list_lightbox');


#
#Get the $x
#
if($lightbox == true) 
{
	$link = get_image_url();
	$rel = 'rel="prettyPhoto[Team]"';
}else{
	$link = get_permalink();
	$rel = 'rel="bookmark"';
}

$thumb_size = 'size-225-130';
###


#
#Get post class
#
$loop_count++; 


if (($loop_count -1) % 4 == 0) {
	$post_class = 'class="post post-'.$loop_count.' col-4-1 col-first"';
}else{
	$post_class = 'class="post post-'.$loop_count.' col-4-1"';
}
?>

<!--Begin Item-->
<div <?php echo $post_class; ?>>	

	<div class="post-entry">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php if($position) : ?><p class="position"><?php echo $position; ?></p><?php endif; ?>
		<ul class="clearfix">
		<?php if($delicious) : ?><li class="delicious"><a href="<?php echo $delicious; ?>">Delicious</a></li><?php endif; ?>
		<?php if($facebook) : ?><li class="facebook"><a href="<?php echo $facebook; ?>">Facebook</a></li><?php endif; ?>
		<?php if($flickr) : ?><li class="flickr"><a href="<?php echo $flickr; ?>">Flickr</a></li><?php endif; ?>
		<?php if($google) : ?><li class="google"><a href="<?php echo $google; ?>">Google</a></li><?php endif; ?>
		<?php if($linkedin) : ?><li class="linkedin"><a href="<?php echo $linkedin; ?>">Linkedin</a></li><?php endif; ?>
		<?php if($myspace) : ?><li class="myspace"><a href="<?php echo $myspace; ?>">Myspace</a></li><?php endif; ?>
		<?php if($rss) : ?><li class="rss"><a href="<?php echo $rss; ?>">Rss</a></li><?php endif; ?>
		<?php if($stumble) : ?><li class="stumble"><a href="<?php echo $stumble; ?>">Stumble</a></li><?php endif; ?>
		<?php if($twitter) : ?><li class="twitter"><a href="<?php echo $twitter; ?>">Twitter</a></li><?php endif; ?>
		<?php if($yahoo) : ?><li class="yahoo"><a href="<?php echo $yahoo; ?>">Yahoo</a></li><?php endif; ?>
		</ul>
	</div>

	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

</div>
<!--End Item-->

<?php endwhile; ?>
</div>