<?php get_header(); ?>

<!-- Caption Line -->
<h2 class="grid_12 caption clearfix">Our <span>blog</span>, keeping you up-to-date on our latest news.</h2>

<div class="hr grid_12 clearfix">&nbsp;</div>

<!-- Column 1 /Content -->
<div class="grid_8">


    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Blog Post -->        
            <div class="post">        
                <!-- Post Title -->        
                <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <!-- Post Data -->        
                <p class="sub"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> | <?php the_category(', '); ?> | <?php comments_number('No comment', '1 comment', '% comments'); ?></p>
                <div class="hr dotted clearfix">&nbsp;</div>        
                <!-- Post Image -->        
         <?php if( get_post_meta($post->ID, 'my_post_image', true)):?>
                <img src="<?php echo get_post_meta($post->ID, 'my_post_image', true); ?>" alt=""/>
           <?php endif;?>
        <?php the_content(); ?>
    
        </div>    
        <div class="hr clearfix">&nbsp;</div>    
    <?php endwhile;
        else: ?>
        
            <h2>Woops...</h2>        
        
            <p>Sorry, no posts we're found.</p>        
        
<?php endif; ?>
        
            <!-- Blog Navigation -->        
            <p class="clearfix">        
            <?php wp_link_pages(array('next_or_number' => 'next', 'previouspagelink' => ' &laquo; ', 'nextpagelink' => ' &raquo;')); ?>
        </p>     
        </div>        
        
        <!-- Column 2 / Sidebar -->        
        <div class="grid_4">        
<?php get_sidebar(); ?>
        </div>        
        <div class="hr grid_12 clearfix">&nbsp;</div>       
<?php get_footer(); ?>

