<?php
/*
* ----------------------------------------------------------------------------------------------------
* Download Loop
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>
<div class="event-lists clearfix">
<?php
while (have_posts()) : the_post();

###
#
#Custom Files
#
$starting_date = get_meta_option('event_starting_date');
$ending_date = get_meta_option('event_ending_date');
$starting_time = get_meta_option('event_starting_time');
$ending_time = get_meta_option('event_ending_time');
$address = get_meta_option('event_address');
$phone = get_meta_option('event_phone');
$costs = get_meta_option('event_costs');


#
#Get theme options
#
$lightbox = get_theme_option('event','list_lightbox');
$read_more = get_theme_option('event','read_more');


#
#Get the $x
#
if($lightbox == true) 
{
	$link = get_image_url();
	$rel = 'rel="prettyPhoto[Event]"';
}else{
	$link = get_permalink();
	$rel = 'rel="bookmark"';
}

$thumb_size = 'size-400-230';
###
?>

<!--Begin Item-->
<div class="event-post clearfix">	

	<div class="post-entry clearfix">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<ul>
		<?php if($starting_date): ?><li><b><?php esc_html_e('Starting Date:','HK'); ?></b><?php echo $starting_date; ?></li><?php endif; ?>
		<?php if($ending_date): ?><li><b><?php esc_html_e('Ending Date:','HK'); ?></b><?php echo $ending_date; ?></li><?php endif; ?>
		<?php if($phone): ?><li><b><?php esc_html_e('Phone:','HK'); ?></b><?php echo $phone; ?></li><?php endif; ?>
		<?php if($costs): ?><li><b><?php esc_html_e('Costs:','HK'); ?></b><?php echo $costs; ?></li><?php endif; ?>
		</ul>
		<?php if($read_more): ?><p class="post-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo $read_more; ?></a></p><?php endif; ?>
	</div>

	<?php theme_list_thumb($link, $rel, $thumb_size); ?>

</div>
<!--End Item-->

<?php endwhile; ?>
</div>