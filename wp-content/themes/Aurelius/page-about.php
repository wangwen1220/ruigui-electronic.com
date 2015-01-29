<?php
get_header();
?>


<!-- Caption Line -->
<h2 class="grid_12 caption">Learn <span>about us</span> and what we do best.</h2>

<div class="hr grid_12 clearfix">&nbsp;</div>

<!-- Column 1 / Content -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="grid_8">        
    <?php the_content(); ?>
    </div>    
<?php endwhile;
    else: ?>
        <p>Sorry, no page found</p>        
<?php endif; ?>
        <!-- Column 2 / Sidebar -->        
        <!-- Column 2 / Sidebar -->        
        <div class="grid_4">        
<?php get_sidebar(); ?>
    </div>    
    
    <div class="hr grid_12 clearfix">&nbsp;</div>    
    
<?php get_footer(); ?>