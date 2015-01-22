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
<div class="place"><a href="/">首页</a> &gt; <?php the_category(','); ?> &gt; <span><?php the_title(); ?></span></div>
</div>            
<div class="pagebox_ft"></div>
</div>

<div class="mainbox w960 dianpu clearfix">
<?php while ( have_posts() ) : the_post(); ?>
<div class="article_left">
<div class="clearfix">
<i>分享给好友：</i>
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
<?php the_content(); ?>
<br class="clear" />
<div class="shop_tags">
<?php the_tags('<em>标签：</em>','','' );?>
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

<a id="combook" name="combook"></a>
<div id="comments">
<?php comments_template(); ?>
</div>
</div>
<?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>