<?php get_header(); ?>

	<?php if (have_posts()) : ?>
	
<div class="pagebox mb15">
<div class="pagebox_hd"></div>
<div class="pagebox_bd">
<div class="place"><a href="/">首页</a> > <a href="<?php $my_id = 911;echo get_post($my_id)->guid;?>">标签</a> > <span><?php printf( __( '标签:“ %s ”的文章' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></span></div>
</div>            
<div class="pagebox_ft"></div>
</div>

<div class="w960" style="width:980px;">
<div class="list_content clearfix" id="list_content">

		<?php while (have_posts()) : the_post(); ?>

			<div class="item">
<div class="list_item">
<ul class="pic">
<li><a style="width:200px;" href="<?php the_permalink() ?>" target="_blank">
<?php
$picurl = get_post_meta($post->ID,'haikuo_pic_url',true);
if( has_post_thumbnail() ){
$img_id = get_post_thumbnail_id();
$img_url = wp_get_attachment_image_src($img_id);
$img_url = $img_url[0];
$img_url_full = $img_url.'_full.jpg';
$array1 = get_headers($img_url_full);
if ($array1[0] == 'HTTP/1.1 200 OK') {
}else{
$img_url = get_bloginfo("template_url").'/timthumb.php?src='.$img_url.'&amp;q=90&amp;w=200';
}
}elseif(!empty($picurl)){
$img_url = get_bloginfo("template_url").'/timthumb.php?src='.$picurl.'&amp;q=90&amp;w=200';
}else{
$img_url = get_post_img( '', 200, '' );
}
echo '<img src="'.$img_url.'" alt="'.$post->post_title.'" width="200" />'
?>
</a>
<?php if($cat != 5) {?>
<p>￥<?php echo substr(get_post_meta($post->ID, "haikuo_tb_price", true),0,strlen(get_post_meta($post->ID, "haikuo_tb_price", true))-3); ?></p>
<?php }?>
</li>
</ul>
<div class="t_l">
<div class="tl">
<a href="<?php the_permalink() ?>#combook" class="cmt ed">评论(<span class="SHARE_CMT_COUNT"><?php $id=$post->ID; echo get_post($id)->comment_count;?></span>)</a>
</div>
</div>
<div class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>

<?php
    global $withcomments;
    $withcomments = true;
    comments_template("/inline-comments.php");
?>
</div>
</div>

			<?php endwhile; ?>

</div>
<div class="page">
<?php pagenavi();?></div>
</div>

	<?php else : ?>

			<div class="no-result">
				<h1> <?php _e( 'No Results Found', 'PhotoBroad' ); ?></h1>
				<p><?php _e( 'The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.', 'PhotoBroad' ); ?></p>
			</div>

	<?php endif; ?>

	<div class="navigation" id="navigation"><?php next_posts_link( '' ) ?></div>
	<script>
  window.onload = function() {
    var wall = new Masonry( document.getElementById('list_content') );
  };
</script>
<?php get_footer(); ?>