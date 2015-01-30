<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>
<div class="pagebox mb15">
<div class="pagebox_hd"></div>
<div class="pagebox_bd">
<div class="place"><?php if (function_exists('wp_bac_breadcrumb')) {wp_bac_breadcrumb();}?></div>
<div class="arc_tags"><em>标签：</em>


<?php
$limit = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('cat='.$cat.'&paged=' . $paged);
  if (have_posts()) : while (have_posts()) : the_post();
          $posttags = get_the_tags();
		  
          if ($posttags) {
              foreach($posttags as $tag) {
                  $all_tags[] = $tag->term_id;
              }
          }
      endwhile;
endif; 
wp_reset_query();
if($all_tags){
$tags_arr = array_unique($all_tags);
$tags_str = implode(",", $tags_arr); 
$args = array(
  'smallest'  => 12,
  'largest'   => 12,
  'unit'      => 'px',
  'number'    => 15,
  'orderby'   => '',
  'order'     => DESC,
  'format'    => 'flat',
  'include'   => $tags_str
  );
  wp_tag_cloud($args);
}else{
echo '该分类下暂无标签';
}
?>
</div>
</div>            
<div class="pagebox_ft"></div>
</div>


<div class="w960" style="width:980px;">
<div class="list_content clearfix" id="list_content">
<?php 
if( have_posts() ){
while( have_posts() ) : the_post();?>
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
<?php $price = get_post_meta($post->ID, "haikuo_tb_price", true);
if(empty($price)){}else{?>
<p>￥<?php echo $price; ?></p>
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
<?php endwhile; }else{echo '<div style="padding:20px;color:#777;">本分类暂无内容!</div>';}?>


</div>
<div class="page">
<?php pagenavi();?>
</div>
</div>

<script>
  window.onload = function() {
    var wall = new Masonry( document.getElementById('list_content') );
  };
</script>
<?php get_footer(); ?>