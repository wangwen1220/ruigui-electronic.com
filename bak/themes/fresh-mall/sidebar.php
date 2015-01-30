<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package _s
 */
?>
<div id="secondary" class="sidebar_right">

<?php do_action( 'before_sidebar' ); ?>
<div class="sidebox">
<?php
$catid = get_option('shopcatid');
$catid = explode(',',$catid);
$args=array(
	'orderby'=>'rand',
	'showposts'=>9,
	'category__not_in' => $catid
);
query_posts($args);
if( have_posts() ) : ?>
<div class="sb_title">最热卖的宝贝</div>
<ul class="nine_box clearfix">
<?php while( have_posts() ) : the_post();?>
<li>
<a href="<?php the_permalink();?>" title="<?php the_title();?>" target="_blank">
<?php
	if( has_post_thumbnail() ){
		echo get_the_post_thumbnail( $post->ID, array(124, 124), array('alt'=>$post->post_title) );
	}else{
		echo '<img src="'.get_post_img( '', 124, 124 ).'" alt="'.$post->post_title .'" />';
	}
?>
</a>

</li>
<?php endwhile; ?>
</ul>
<?php endif; ?>

<?php
$catid = get_option('shopcatid');
$catid = explode(',',$catid);
$args=array(
	'orderby'=>'rand',
	'showposts'=>1,
	'category__in' => $catid
);
query_posts($args);
if( have_posts() ) : ?>
<div class="sb_title" style="margin-top:20px;">好店推荐</div>
<ul class="one_box clearfix">
<?php while( have_posts() ) : the_post();?>
<li>
<a href="<?php the_permalink();?>" title="<?php the_title();?>" target="_blank">
<?php
	if( has_post_thumbnail() ){
		echo get_the_post_thumbnail( $post->ID, array(124, 124), array('alt'=>$post->post_title) );
	}else{
		echo '<img src="'.get_post_img( '', 124, 124 ).'" alt="'.$post->post_title .'" />';
	}
?>
</a>

</li>
<?php endwhile; ?>
</ul>
<?php endif; ?>
</div>


<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/top.js"></script>
</div>


	
