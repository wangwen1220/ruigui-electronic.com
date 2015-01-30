<?php
/*
* ----------------------------------------------------------------------------------------------------
* Event Single
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
$starting_date = get_meta_option('event_starting_date');
$ending_date = get_meta_option('event_ending_date');
$starting_time = get_meta_option('event_starting_time');
$ending_time = get_meta_option('event_ending_time');
$address = get_meta_option('event_address');
$phone = get_meta_option('event_phone');
$costs = get_meta_option('event_costs');

if (have_posts()) : the_post();
?>

<div class="post post-single post-event-single" id="post-<?php the_ID(); ?>">	

	<?php theme_single_slider('event'); ?>

	<div class="post-entry clearfix">
		<h2><?php the_title(); ?></h2>
		<ul>
		<?php if($starting_date): ?><li><b><?php esc_html_e('Starting Date:','HK'); ?></b><?php echo $starting_date; ?></li><?php endif; ?>
		<?php if($ending_date): ?><li><b><?php esc_html_e('Ending Date:','HK'); ?></b><?php echo $ending_date; ?></li><?php endif; ?>
		<?php if($starting_time): ?><li><b><?php esc_html_e('Starting Time:','HK'); ?></b><?php echo $starting_time; ?></li><?php endif; ?>
		<?php if($ending_time): ?><li><b><?php esc_html_e('Ending Time:','HK'); ?></b><?php echo $ending_time; ?></li><?php endif; ?>
		<?php if($address): ?><li><b><?php esc_html_e('Address:','HK'); ?></b><?php echo $address; ?></li><?php endif; ?>
		<?php if($phone): ?><li><b><?php esc_html_e('Phone:','HK'); ?></b><?php echo $phone; ?></li><?php endif; ?>
		<?php if($costs): ?><li><b><?php esc_html_e('Costs:','HK'); ?></b><?php echo $costs; ?></li><?php endif; ?>
		</ul>
	</div>

	<div class="clear"></div>
	<div class="post-content"><?php the_content(); ?></div>
	<!--end post content-->
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'HK' ), 'after' => '</div>' ) ); //end link page ?>

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