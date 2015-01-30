<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

<div class="pagebox mb15">
<div class="pagebox_hd"></div>
<div class="pagebox_bd">
<div class="index_flash fl" id="INDEX_FLASH_BOX">
<ul class="btns clearfix" id="BTNS"><li class="cur">
<a href="<?php echo get_option('focus1_url');?>"><img src="<?php echo substr(get_option('focus1'),0,-4).'-150x150'.strrchr(get_option('focus1'),".");?>" alt="<?php echo get_option('focus1_txt');?>"></a>
<h3><a href="<?php echo get_option('focus1_url');?>"><?php echo get_option('focus1_txt');?></a></h3>
</li>
<li class="">
<a href="<?php echo get_option('focus2_url');?>"><img src="<?php echo substr(get_option('focus2'),0,-4).'-150x150'.strrchr(get_option('focus2'),".");?>" alt="<?php echo get_option('focus2_txt');?>"></a>
<h3><a href="<?php echo get_option('focus2_url');?>"><?php echo get_option('focus2_txt');?></a></h3>
</li>
<li class="">
<a href="<?php echo get_option('focus3_url');?>"><img src="<?php echo substr(get_option('focus3'),0,-4).'-150x150'.strrchr(get_option('focus3'),".");?>" alt="<?php echo get_option('focus3_txt');?>"></a>
<h3><a href="<?php echo get_option('focus3_url');?>"><?php echo get_option('focus3_txt');?></a></h3>
</li>
<li class="">
<a href="<?php echo get_option('focus4_url');?>"><img src="<?php echo substr(get_option('focus4'),0,-4).'-150x150'.strrchr(get_option('focus4'),".");?>" alt="<?php echo get_option('focus4_txt');?>"></a>
<h3><a href="<?php echo get_option('focus4_url');?>"><?php echo get_option('focus4_txt');?></a></h3>

</li>
</ul>
<ul class="box clearifx" id="LIST">
<li style="display: list-item;"><a href="<?php echo get_option('focus1_url');?>" target="_blank"><img src="<?php echo get_option('focus1');?>" width="715" height="283"></a></li>
<li style="display: none;"><a href="<?php echo get_option('focus2_url');?>" target="_blank"><img src="<?php echo get_option('focus2');?>" width="715" height="283"></a></li>
<li style="display: none;"><a href="<?php echo get_option('focus3_url');?>" target="_blank"><img src="<?php echo get_option('focus3');?>" width="715" height="283"></a></li>
<li style="display: none;"><a href="<?php echo get_option('focus4_url');?>" target="_blank"><img src="<?php echo get_option('focus4');?>" width="715" height="283"></a></li>
</ul>

</div>
<script>
var bannerNavItem = $("#BTNS").find("li");
var bannerShowBox = $("#LIST");
var _bannerNAvItemNum = bannerNavItem.length;

bannerNavItem.hover(function(){
var index=bannerNavItem.index(this);
if(bannerSlideTime){
clearInterval(bannerSlideTime);
}
slide(index);
},function(){
bannerSlideTime = setInterval(function(){
index++;
if(index>=_bannerNAvItemNum){
index=0;
}
slide(index);
},4000);
})
bannerShowBox.hover(function(){
if(bannerSlideTime){
clearInterval(bannerSlideTime);
}
},function(){
var index=bannerShowBox.find("li").index(this);
bannerSlideTime = setInterval(function(){
index++;
if(index>=_bannerNAvItemNum){
index=0;
}
slide(index);
},4000);
})

var index=0;
var bannerSlideTime = setInterval(function(){

index++;
if (index>=_bannerNAvItemNum){
index=0;
}
slide(index);
},4000);

function slide(i){
bannerNavItem.eq(i).addClass("cur").siblings().removeClass("cur");
bannerShowBox.find("li").eq(i).show().siblings("li").hide();

}

</script>

</div>            
<div class="pagebox_ft"></div>
</div>


<?php
$catno = get_option('nocatid');
if(strlen($catno)>1){
$catno = explode(",",$catno);
}
$cat_args=array(
  'orderby' => 'ID',
  'order' => 'ASC',
  'hide_empty' => false,
  'exclude' => $catno //首页排除分类的id
  //'exclude' => array(3,4,5)  排除多个分类
   );
$categories = get_categories($cat_args);
foreach ($categories as $cat) {
$catid = $cat->cat_ID;
query_posts("showposts=9&cat=$catid&orderby=date"); ?>
<div class="pagebox mb15">
<div class="pagebox_hd"></div>
<div class="pagebox_bd">
<div class="box_title clearfix"><em><?php single_cat_title(); ?></em><ul class="the_tags">
<?php wp_list_categories('orderby=id&style=list&title_li=&use_desc_for_title=0&child_of='.$catid); ?>
</ul><a href="<?php echo get_category_link($catid);?>" title="<?php echo strip_tags(category_description($catid)); ?>">更多>></a></div>
<div class="box_cont">
<ul class="box_ul clearfix">
<?php while (have_posts()) : the_post(); ?>
<li>
<?php $price = get_post_meta($post->ID, "haikuo_tb_price", true);
if(empty($price)){}else{?>
<h4 class="price_bg"><b>￥<?php echo $price; ?></b></h4>
<?php }?>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">

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
$img_url = get_bloginfo("template_url").'/timthumb.php?src='.$img_url.'&amp;q=90&amp;w=270';
}
}elseif(!empty($picurl)){
$img_url = get_bloginfo("template_url").'/timthumb.php?src='.$picurl.'&amp;q=90&amp;w=270';
}else{
$img_url = get_post_img( '', 270, '' );
}
echo '<img src="'.$img_url.'" alt="'.$post->post_title.'" width="270" />'
?>


</a>
</li>
<?php endwhile; ?>

</ul>
</div>
</div>            
<div class="pagebox_ft"></div>
</div>
<?php } ?>


<?php
$shop_cat = get_option('index_shop_id');
if(get_option('index_shop_show')) { ?>
<div class="pagebox mb15">
<div class="pagebox_hd"></div>
<div class="pagebox_bd">
<div class="box_title"><em>好店推荐</em><p class="the_tags"></p><a href="<?php echo get_category_link($shop_cat);?>">更多>></a></div>
<div class="box_cont">
<div class="list clearfix">
<ul>
<?php 
query_posts("showposts=30&cat=".$shop_cat);
while (have_posts()) : the_post();
?>
<li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img width="50" height="50" src="<?php echo get_post_meta($post->ID, "haikuo_pic_url", true);?>" alt="<?php the_title() ?>" style="display: block;"></a> </li>
<?php endwhile; ?>
</ul>
</div>
</div>
</div>            
<div class="pagebox_ft"></div>
</div>
<?php } ?>
	

<?php get_footer(); ?>