<?php get_header(); ?>

<div class="grid_8">
    <div class="post">
        <h3>Oops.... </h3>
        <p>We seem to have lost that file.</p><?php //http://codex.wordpress.org/Creating_an_Error_404_Page  ?>

        <p>You should try <a href="<?php echo get_option('home'); ?>">our homepage</a> instead.<br/><br />
					You could go back to <a href="javascript:history.go(-1)">where you were</a> or use your back button.</p>


        <p>Feel free to <a href="mailto:<?php echo get_bloginfo('admin_email') ?>">ask the webmasters</a> for assistance.</p>
    </div><!-- #error -->
</div>

<!-- Column 2 / Sidebar -->
<div class="grid_4">
    <?php get_sidebar(); ?>
</div>
<div class="hr grid_12 clearfix">&nbsp;</div>

<?php get_footer(); ?>