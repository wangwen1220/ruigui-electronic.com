<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head>
        <title>
            <?php
            if (is_home()) {
                echo bloginfo('name');
            } elseif (is_404()) {
                echo '404 Not Found';
            } elseif (is_category()) {
                echo bloginfo('name');
                wp_title('');
            } elseif (is_search()) {
                echo 'Search Results';
            } elseif (is_day() || is_month() || is_year()) {
                echo 'Archives:';
                wp_title('');
            } else {
                echo wp_title('');
            }
            ?>
        </title>
        <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
        <meta name="description" content="<?php bloginfo('description') ?>" />
        <meta name="theme_template_dir" content="<?php bloginfo('template_directory'); ?>" />

        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

        <?php
            wp_enqueue_script('jquery', '1.3.2');
        ?> 
        <?php wp_head(); ?>
            <!-- Scripts -->        
            <script src="<?php bloginfo('template_url'); ?>/js/jquery.roundabout-1.1.min.js" type="text/javascript" charset="utf-8"></script>
            <script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
            <script src="<?php bloginfo('template_url'); ?>/js/jquery.roundabout-shapes-1.1.js"  type="text/javascript"  charset="utf-8"></script>
            <script src="<?php bloginfo('template_url'); ?>/js/tooltip.js"  type="text/javascript"  charset="utf-8"></script>
            <script src="<?php bloginfo('template_url'); ?>/js/contact.js"  type="text/javascript" charset="utf-8"></script>

            <!--[if IE 6]>        
            <script src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
            <script>        
        	  /* EXAMPLE */        
        	  DD_belatedPNG.fix('.button');        
        	  /* string argument can be any CSS selector */        
        	  /* .png_bg example is unnecessary */        
        	  /* change it to what suits you! */        
        	</script>        
        	<![endif]-->        
        </head>        
    
        <body>        
            <div id="wrapper" class="container_12 clearfix">        
                <!-- Text Logo -->        
                <h1 id="logo" class="grid_4"><?php bloginfo('name'); ?></h1>
    
    
                <!-- Navigation Menu -->        
                <ul id="navigation" class="grid_8">        
                    <li><a <?php if (is_page('contact-us')) { ?> class="current"<?php } ?> href="<?php echo get_option('home'); ?>/contact-us"><span class="meta">Get in touch</span><br />Contact Us</a></li>
                    <li><a <?php if (is_category("blog")) { ?> class="current"<?php } ?> href="<?php echo get_option('home'); ?>/category/blog/" title="Go to the Blog page"><span class="meta">Latest news</span><br />Blog</a></li>
                    <li><a <?php if (is_category("portfolio")) { ?> class="current"<?php } ?> href="<?php echo get_option('home'); ?>/category/portfolio/" title="Go to the Work page"><span class="meta">Our latest work</span><br />Portfolio</a></li>
                    <li><a <?php if (is_page('about')) { ?> class="current"<?php } ?> href="<?php echo get_option('home'); ?>/about" title="Go to the About page"><span class="meta">Who are we?</span><br />About</a></li>
                    <li><a <?php if (is_home()): ?>class="current" <?php endif; ?> href="<?php echo get_settings('home'); ?>" title="Home"><span class="meta">Homepage</span><br />Home</a></li> 
            </ul>
            <!-- NAVIGATION -->

            <div class="hr grid_12">&nbsp;</div>
            <div class="clear"></div>