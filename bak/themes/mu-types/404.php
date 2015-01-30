<?php
/*
* ----------------------------------------------------------------------------------------------------
* 404
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

<div class="page-error">
<h1><?php esc_html_e('404 Error','HK'); ?></h1>
<h3><?php esc_html_e('Oops! Page Not Found.','HK'); ?></h3>
<p><?php esc_html_e('Sorry, but the page you are looking for does not exist. You can try to go to the Homepage and find your way.','HK'); ?></p>
<div class="searchbox">
	<form action="<?php echo home_url('/'); ?>" method="get">
	<dl class="clearfix">
	<dt><input type="text" id="widget-search-input" name="s" size="24" value="" placeholder="Enter the keywords..." /></dt>
	<dd><input type="submit"  id="search-button" name="search-button" value="" /></dd>
	</dl>
	</form>
</div>
</div>

</article>
<!--End Content-->
</div>
<!--End Primary-->

</div>
<!-- #main -->
<?php get_footer(); ?>