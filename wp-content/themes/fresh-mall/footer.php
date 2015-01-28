<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _s
 */
?>

<div class="footer">
<?php wp_reset_query(); if ( is_home() ) { ?>
<div class="w960 flink">
<h2>友情链接</h2>
<ul class="clearfix">
<?php wp_list_bookmarks('title_li=&categorize=0&category_before=&category_after='); ?></ul>
</div>
<?php } ?>

<div class="copyright w960">
Copyright ©2013 haikuo.me All rights reserved.<?php echo get_option('beian_textarea');?>
</div>
</div>
<div id="shangxia"><div id="shang" title="返回顶部"></div><div id="xia" title="页面底部"></div></div>
<div class="none">
<?php echo get_option('tongji_textarea');?>
</div>
<?php wp_footer(); ?>
</body>
</html>