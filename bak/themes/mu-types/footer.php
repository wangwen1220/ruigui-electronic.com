<?php
/*
* ----------------------------------------------------------------------------------------------------
* Footer
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
?>
<footer>

<?php theme_footer_widgets(); ?>

<div class="footer-message">
<?php 
	$copyright = stripslashes(get_theme_option('footer','copyright'));
	$wordpress_link = get_theme_option('footer','wordpress_link');
	if (has_nav_menu('bottom menu')) { theme_bottom_wp_nav(); }
	if($copyright) 
	{ 
		echo '<p>'."\n";
		echo $copyright; 
		if($wordpress_link == true) { _e(' Powered by <a href="http://www.54ux.com/">WordPress.</a> ', 'HK'); }
		echo '</p>'."\n";
	}
?>
</div>
<!--end # footer message-->

<!--End Footer-->
</footer>

</div>
<!-- # page -->
<?php 
	if(get_theme_option('footer','go_top') == true)
	{
	echo '<div id="toTop">Back to top</div>'."\n";
	}
?>

<?php wp_footer(); ?>
<!--End Body-->
</body>

<!--End Html-->
</html>