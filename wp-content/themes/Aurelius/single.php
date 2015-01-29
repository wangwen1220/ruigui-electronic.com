<?php
//portfolio fileds
$is_portfolio = get_post_meta($post->ID, 'my_portfolio_image_0', true);
$is_portfolio.=get_post_meta($post->ID, 'my_portfolio_image_1', true);
$is_portfolio.=get_post_meta($post->ID, 'my_portfolio_image_2', true);
$is_portfolio.=get_post_meta($post->ID, 'my_portfolio_image_3', true);
$is_portfolio.=get_post_meta($post->ID, 'my_portfolio_image_4', true);
$is_portfolio.=get_post_meta($post->ID, 'my_portfolio_image_5', true);
//if there is portfolio image, we take it as portfolio post
if (trim($is_portfolio)) {
    include(TEMPLATEPATH . "/portfolio_single.php");
} else {
    get_header();
?>
    
    
    <!-- Caption Line -->    
    <h2 class="grid_12 caption clearfix">Our <span>blog</span>, keeping you up-to-date on our latest news.</h2>    
    
    <div class="hr grid_12 clearfix">&nbsp;</div>    
    <!-- Blog Post -->    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Column 1 /Content -->            
            <div class="grid_8">            
            
            
                <div class="post">            
                    <!-- Post Title -->            
                    <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    <!-- Post Title -->            
                    <p class="sub"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> | <?php the_category(', '); ?> | <?php comments_number('No comment', '1 comment', '% comments'); ?></p>
                    <div class="hr dotted clearfix">&nbsp;</div>            
                    <!-- Post Title -->            
         <?php if( get_post_meta($post->ID, 'my_post_image', true)):?>
                <img src="<?php echo get_post_meta($post->ID, 'my_post_image', true); ?>" alt=""/>
           <?php endif;?>
                    <!-- Post Content -->            
        <?php the_content(); ?>
            <!-- Post Links -->    
            <p class="clearfix">    
                <a href="<?php echo get_option('home'); ?>/category/blog/" class="button float" >&lt;&lt; Back to Blog</a>
                <a href="#comment_form" class="button float right" >Discuss this post</a>    
            </p>    
        </div>    
        <div class="hr clearfix">&nbsp;</div>    
    
    <?php comments_template('', true); ?>
        
        
        </div>        
<?php endwhile;
        else: ?>
            <p>Sorry, no page found</p>            
<?php endif; ?>
            <!-- Column 2 / Sidebar -->            
            <div class="grid_4">            
<?php get_sidebar(); ?>
        </div>        
        
        <div class="hr grid_12 clearfix">&nbsp;</div>        
        
<?php
            get_footer();
        }
?>                