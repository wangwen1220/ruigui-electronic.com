<?php get_header(); ?>
   <script type="text/javascript">		        
                jQuery(document).ready(function($) {    
                    var interval;    
                    $('#featured ul')    
                    .roundabout({    
                        easing: 'easeOutInCirc',        
                        duration: 600 }       
                )    
                    .hover(    
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
                     $('#lastestblog a[title]').tooltip();
                });    
    			    
                function startAutoPlay() {    
                    return setInterval(function() {    
                        jQuery('#featured ul').roundabout_animateToNextChild();     
                    }, 3000);    
                }    
            
            </script>          
<!-- Featured Image Slider -->
<div id="featured" class="clearfix grid_12">
    <ul> 
        <?php
        $the_query = new WP_Query('category_name=featured');
        while ($the_query->have_posts()) : $the_query->the_post();
        ?>
            <li>    
                <a href="<?php the_permalink() ?>">
                    <span><?php the_title_attribute(); ?></span>
                    <?php if(get_post_meta($post->ID, 'my_post_image', true)): ?>
                        <img src="<?php echo get_post_meta($post->ID, 'my_post_image', true); ?>" alt=""/>
                     <?php else: ?>
                        <img src="<?php bloginfo('template_url'); ?>/images/600x300.gif" alt=""/>
                      <?php endif; ?>
                </a>    
            </li>      
        <?php endwhile; ?>
        </ul>     
    </div>    
    <div class="hr grid_12 clearfix">&nbsp;</div>    
    
    <!-- Caption Line -->
    <div id="lastestblog" class="grid_12">    
             <?php
                $count = 0;
                $the_query = new WP_Query('category_name=blog&posts_per_page=4');
                while ($the_query->have_posts()) : $the_query->the_post();
                $item_class = "";
                if ($count == 0)
                    $item_class = "alpha";
        ?>
    
        <a class="quicknavgrid_3 blog_item <?php echo $item_class; ?>" href="<?php the_permalink(); ?>" title="<?php the_title()?> more...">
                 <?php  if(get_post_meta($post->ID, "my_post_image", true)):?>
                    <p style="text-align:center;"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo get_post_meta($post->ID, "my_post_image", true) ?>&amp;h=153&amp;w=205&amp;zc=1" alt="<?php the_title(); ?>"/></p>
                 <?php else:?>
                   <p style="text-align:center;"><img src="<?php bloginfo('template_url'); ?>/images/blog.png" class="png"/></p>
                 <?php endif; ?>
                <p style="text-align:center;"> <?php the_title();?></p>
            </a>    
       
    
        <?php
            $count++;
            endwhile; ?>
      </div>

    
    <div class="hr grid_12 clearfix quicknavhr">&nbsp;</div>    
    
    <div id="quicknav" class="grid_12">    
        <a class="quicknavgrid_3 quicknav alpha" href="<?php echo get_option('home'); ?>/category/portfolio/">
            <h4 class="title ">Recent Work</h4>    
            <p>Our portfolio, home to our latest, and greatest work. </p>    
            <p style="text-align:center;"><img alt="" src="<?php bloginfo('template_url'); ?>/images/Art_Artdesigner.lv.png" /></p>
    
        </a>    
        <a class="quicknavgrid_3 quicknav" href="<?php echo get_option('home'); ?>/about">
            <h4 class="title ">Learn about us</h4>    
            <p>Learn about us and what we do best.</p>    
            <p style="text-align:center;"><img alt="" src="<?php bloginfo('template_url'); ?>/images/info.png" /></p>
    
        </a>    
        <a class="quicknavgrid_3 quicknav" href="<?php echo get_option('home'); ?>/category/blog/">
            <h4 class="title ">Read our blog</h4>    
            <p>Our blog, keeping you up-to-date on our latest news.</p>    
            <p style="text-align:center;"><img alt="" src="<?php bloginfo('template_url'); ?>/images/Blog_Artdesigner.lv.png" /></p>
    
        </a>    
        <a class="quicknavgrid_3 quicknav" href="<?php echo get_option('home'); ?>/contact-us">
            <h4 class="title ">Follow on Twitter</h4>    
            <p>Enjoyed looking at our work? Don't hesitate to contact us! </p>    
            <p style="text-align:center;"><img alt="" src="<?php bloginfo('template_url'); ?>/images/hungry_bird.png" /></p>
        </a>    
    </div>    
    <div class="hr grid_12 clearfix">&nbsp;</div>    
    
<?php get_footer(); ?>