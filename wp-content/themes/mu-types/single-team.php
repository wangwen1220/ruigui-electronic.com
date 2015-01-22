<?php
/*
* ----------------------------------------------------------------------------------------------------
* Team Single
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
get_header(); 
?>
<div id="main" class="clearfix fullwidth">

<!--Begin Primary-->
<div id="primary">
<!--Begin Content-->
<article id="content">

<?php
$department = get_meta_option('team_department');
$phone = get_meta_option('team_phone');
$position = get_meta_option('team_position');
$email = get_meta_option('team_email');
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
$link = get_image_url();
$rel = 'rel="prettyPhoto"';
$thumb_size = 'size-team-single';

if (have_posts()) : the_post();
?>

<div class="post post-single post-team-single" id="post-<?php the_ID(); ?>">	

	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

	<div class="post-entry clearfix">
		<h2><?php the_title(); ?></h2>
		<div class="post-entry-info">
			<ul class="clearfix">
			<?php if($department) : ?><li><b><?php esc_html_e('Department:','HK'); ?></b><?php echo $department; ?></li><?php endif; ?>
			<?php if($phone) : ?><li><b><?php esc_html_e('Phone:','HK'); ?></b><?php echo $phone; ?></li><?php endif; ?>
			<?php if($position) : ?><li><b><?php esc_html_e('Position:','HK'); ?></b><?php echo $position; ?></li><?php endif; ?>
			<?php if($email) : ?><li><b><?php esc_html_e('Email:','HK'); ?></b><?php echo $email; ?></li><?php endif; ?>
			</ul>
		</div>
		<div class="post-entry-media">
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
		<div class="post-content"><?php the_content(); ?></div>
	</div>

	<div class="clear"></div>

</div>
<!--end post page-->

<?php else : ?>

<!--Begin No Post-->
<div class="no-post">
	<h2><?php esc_html_e('Not Found', 'HK'); ?></h2>
	<p><?php esc_html_e("Sorry, but you are looking for something that isn't here.", 'HK'); ?></p>
</div>
<!--End No Post-->

<?php endif; ?>

</article>
<!--End Content-->
</div>
<!--End Primary-->

</div>
<!-- #main -->
<?php get_footer(); ?>