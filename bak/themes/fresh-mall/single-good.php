<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _s
 */

get_header(); ?>
<div class="pagebox mb15">
<div class="pagebox_hd"></div>
<div class="pagebox_bd">
<div class="place"><?php if (function_exists('wp_bac_breadcrumb')) {wp_bac_breadcrumb();}?></div>
</div>            
<div class="pagebox_ft"></div>
</div>

<div class="mainbox w960 clearfix">
<?php while ( have_posts() ) : the_post(); ?>
<?php $akeyword = get_post_meta($post->ID,'haikuo_keyword',true);
if($akeyword !=''){
?>
<div class="article_left">
<div class="article_info keywordinfo clearfix">
<div class="click_buy">
<div class="like_keyword">
<span>你是否正在找：</span>
<?php
$post = $wp_query->post; 
$num = get_option('keywordnum');
if(empty($num)){$num = 20;}
$querystr = "
SELECT $wpdb->posts.*
FROM $wpdb->posts, $wpdb->postmeta
WHERE $wpdb->posts.ID != ".$post->ID."
AND $wpdb->posts.ID = $wpdb->postmeta.post_id
AND $wpdb->postmeta.meta_key = 'haikuo_keyword'
AND $wpdb->postmeta.meta_value != ''
AND $wpdb->posts.post_status = 'publish'
AND $wpdb->posts.post_type = 'post'
AND $wpdb->posts.post_date < NOW()
ORDER BY $wpdb->posts.post_date DESC
LIMIT ".$num."
";
$pageposts = $wpdb->get_results($querystr, OBJECT);
?>
<?php
if ($pageposts) {
    global $post;
    foreach ($pageposts as $post){
        setup_postdata($post);
            //main loop...
			echo '<a href="'.get_permalink().'">'.get_post_meta($post->ID,"haikuo_keyword",true).'</a>';
    }
} else {
   echo '没有相关文章';
}
wp_reset_query();
?>
</div>
<h2><?php the_title();?></h2>
<!--<h5>宝贝详情：</h5>-->
<div class="article_body" style="padding-top:0;">
<?php the_content(); ?>
</div>
<div class="clearfix">
<em>分享给好友：</em>
<!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
<a class="bds_qzone"></a>
<a class="bds_tsina"></a>
<a class="bds_tqq"></a>
<a class="bds_renren"></a>
<a class="bds_t163"></a>
<span class="bds_more">更多</span>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6716224" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
</div>
<div class="arc_tags clearfix"><?php the_tags('<em>标签：</em>','','' );?></div>
<div class="pre_next">
<?php if (get_previous_post()) { ?>
<div class="nav-previous"><span class="gray">下一篇：</span>&nbsp;
<?php 
previous_post_link('%link','%title',TRUE);
?>
</div>
<?php }
if (get_next_post()) { ?>
<div class="nav-next"><span class="gray">上一篇：</span>&nbsp;
<?php 
next_post_link('%link','%title',TRUE);
?>
</div>
<?php }?>
</div>
</div>
</div>
<br class="clear" />




<a id="combook" name="combook"></a>
<div id="comments">
<?php comments_template(); ?>
</div>
</div>
<?php }else {?>

<div class="article_left">
<div class="article_img">
<?php
if( has_post_thumbnail() ){
$img_id = get_post_thumbnail_id();
$img_url = wp_get_attachment_image_src($img_id);
$img_url = $img_url[0];
$img_url_full = $img_url.'_full.jpg';
$array1 = get_headers($img_url_full);
if ($array1[0] == 'HTTP/1.1 200 OK') { 
}else{
$img_url_full = $img_url;
}
}else{
$img_url_full = get_post_meta($post->ID, 'haikuo_pic_url', true );
}
echo '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$img_url_full.'&amp;q=90&amp;w=350" alt="'.$post->post_title.'" />'
?>
</div>
<div class="article_info clearfix">
<div class="clearfix">
<em>分享给好友：</em>
<!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
<a class="bds_qzone"></a>
<a class="bds_tsina"></a>
<a class="bds_tqq"></a>
<a class="bds_renren"></a>
<a class="bds_t163"></a>
<span class="bds_more">更多</span>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6716224" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
</div>
<div class="click_buy">
<h2><?php the_title();?></h2>
<?php 
$gurl = get_post_meta($post->ID,'haikuo_tb_url',true);
$user_go_url = get_post_meta($post->ID,'good_gourl',true);
$gprice = get_post_meta($post->ID, "haikuo_tb_price", true);
if(empty($gprice)){
$gprice = '0.00';
}
if(!empty($user_go_url)){ ?>
<a href="<?php echo $user_go_url;?>" class="gobuy_btn" id="ihaikuo_go" rel="nofollow" target="_blank"><span>¥<?php echo $gprice; ?></span></a>
<?php }elseif(strstr($gurl,'jin.php')){ ?>					
<a href="javascript:void(0);" class="gobuy_btn" id="ihaikuo_go" rel="nofollow"><span>¥<?php echo $gprice; ?></span></a>
<?php }elseif(strstr($gurl,'go.php')){ ?>
<a href="<?php echo $gurl; ?>" class="gobuy_btn" target="_blank" rel="nofollow"><span>¥<?php echo $gprice; ?></span></a>
<?php }else{ ?>
<a href="" data-itemid='<?php echo $gurl; ?>' class="gobuy_btn" target="_blank" rel="nofollow"><span>¥<?php echo $gprice; ?></span></a>
<?php }?>
<br class="clear" />
<div class="arc_tags clearfix"><?php the_tags('<em>标签：</em>','','' );?></div>
<div class="comment clearfix">
<div class="more_comment clearfix"><a href="#combook">查看用户评论>></a></div>
</div>
<div class="pre_next">
<?php if (get_previous_post()) { ?>
<div class="nav-previous"><span class="gray">下一篇：</span>&nbsp;
<?php 
previous_post_link('%link','%title',TRUE);
?>
</div>
<?php }
if (get_next_post()) { ?>
<div class="nav-next"><span class="gray">上一篇：</span>&nbsp;
<?php 
next_post_link('%link','%title',TRUE);
?>
</div>
<?php }?>
</div>
</div>
</div>
<br class="clear" />
<div>

</div>

<!--<h5>宝贝详情：</h5>-->
<div class="article_body">
<?php the_content(); ?>
</div>

<a id="combook" name="combook"></a>
<div id="comments">
<?php comments_template(); ?>
</div>
</div>
<?php }?>

<?php endwhile; // end of the loop. ?>
<?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>