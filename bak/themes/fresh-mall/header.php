<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _s
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php if(is_home()){
$keywords = get_option('index_key');
$description = get_option('desc_textarea');
}elseif(is_single() || is_page()){
$keywords = tagtext();
$description = get_the_title();
}elseif(is_category()){
$description = category_description();
if (!empty($description) && get_query_var('paged')) {
    $description .= '(第'.get_query_var('paged').'页)';
    }
$keywords = single_cat_title('', false);
}elseif (is_tag())
{
$description = tag_description();
if (!empty($description) && get_query_var('paged')) {
$description .= '(第'.get_query_var('paged').'页)';
}
$keywords = single_tag_title('', false);
}
?>
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $description; ?>">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/atooltip.jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/site.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.lazyload.js"></script>
<script type="text/javascript">
jQuery(document).ready(
function($){
$("img").lazyload({
     placeholder : <?php bloginfo('template_url'); ?>/images/grey.gif,
     effect      : "fadeIn"
});
});
</script>
<?php wp_head(); ?>
</head>

<body>
<div class="header">
<div class="logo_bar clearfix">
<div class="w960">
<div class="logo fl"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
<?php if (get_option('logo_upload')!=='') { ?>
<img src="<?php echo get_option('logo_upload') ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
<?php }else{ ?>
<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
<?php }?>
</a></div>
<div class="fr">
<span class="listenButton">关注我们：</span>
<iframe src="http://widget.weibo.com/relationship/followbutton.php?language=zh_cn&amp;width=63&amp;height=24&amp;uid=<?php if(get_option('sinaid_text') != ''){echo get_option('sinaid_text');}else{echo '2249466175';}?>&amp;style=1&amp;btn=red&amp;dpc=1" width="70" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" border="0"></iframe>
</div>
</div>
</div>
<div class="nav_bar">
<div class="w960 clearfix">
<div class="fl">
<ul class="menu">
<?php wp_nav_menu(array( 'container_class' => 'menu-header', 'theme_location' => 'primary','container' => 'false','items_wrap' => '%3$s'));?>
</ul>
</div>
<div class="fr top_search">                                    
<?php get_search_form(); ?>
</div>
</div>
</div>
</div>
