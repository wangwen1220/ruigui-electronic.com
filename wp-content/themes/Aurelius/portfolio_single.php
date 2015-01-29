<?php
get_header();
?>
   <script type="text/javascript">		            
                jQuery(document).ready(function($) {    
                    var interval;   
                    $('ul#folio_scroller').roundabout({        
                        easing: 'easeOutInCirc',        
                        shape: 'waterWheel',        
                        duration: 600        
                    }).hover(    
                    function() {    
                        // oh no, it's the cops!    
                        clearInterval(interval);    
                    },    
                    function() {    
                        // false alarm: PARTY!    
                        interval = startAutoPlay();    
                    }    
                );                                 
                    // let's get this party started    
                    interval = startAutoPlay();    
                });    
    			    
                function startAutoPlay() {    
                    return setInterval(function() {    
                        jQuery('ul#folio_scroller').roundabout_animateToNextChild();    
                    }, 5000);    
                }    
            
            </script>          

<!-- Caption Line -->
<h2 class="grid_12 caption clearfix">Our <span>portfolio</span>, home to our latest, and greatest work.</h2>

<div class="hr grid_12 clearfix">&nbsp;</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
        $project_name = get_post_meta($post->ID, "my_project_name", true);

        $website_url = get_post_meta($post->ID, "my_web_url", true);

?>
        <!-- Column 1 / Project Information -->                
        <div class="grid_4">                
            <a class="meta" href="<?php echo $website_url; ?>"><?php echo $website_url; ?></a>
            <h4 class="title"><?php echo $project_name; ?></h4>
            <div class="hr dotted clearfix">&nbsp;</div>                
            <p><?php the_content(); ?></p>	
            <p class="clearfix">                
                <a href="<?php echo get_option('home'); ?>/category/portfolio/" class="button float" >&lt;&lt; Back to Portfolio</a>
                <a href="<?php echo $website_url; ?>" class="button float right">Visit Site</a>        
            </p>                
        </div>                
        
        <!-- Column 2 / Image Carosuel -->                
        <div id="folio_scroller_container" class="grid_8 cleafix">                
            <ul id="folio_scroller">                 
        
        <?php
         for ($i = 0; $i<6; $i++) {
            if(get_post_meta($post->ID, "my_portfolio_image_$i", true))
                $value = get_post_meta($post->ID, "my_portfolio_image_$i", true);
            else
                continue;
        ?>
    
            <li><span><?php echo $project_name; ?></span><a href="<?php echo $website_url; ?>"><img alt="" src="<?php echo $value; ?>" /></a></li> 
        <?php
        }
        ?>
    </ul> 
</div>

<div class="hr grid_12 clearfix">&nbsp;</div>

<!-- Client pickup line -->
<h2 class="grid_12 caption">Like this project? We can do something similar for you. <a href="<?php echo get_option('home'); ?>/contact-us"><span>Get in touch...</span></a></h2>


<?php endwhile;
    else: ?>
        
        <h2>Woops...</h2>        
        
        <p>Sorry, no posts we're found.</p>        
        
<?php endif; ?>
        <div class="hr grid_12 clearfix">&nbsp;</div>                
        
        
<?php get_footer(); ?>                