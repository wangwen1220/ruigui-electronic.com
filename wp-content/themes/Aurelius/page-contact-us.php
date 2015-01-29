<?php
get_header();
?>

<!-- Caption Line -->
<h2 class="grid_12 caption clearfix">Enjoyed looking at our work? Don't hesitate to <span>contact us</span>!</h2>

<div class="hr grid_12 clearfix">&nbsp;</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- Column 1 / Content -->                
        <div class="grid_8">                
        
            <p><?php the_content(); ?></p>
            <!-- Contact Form -->                
            <form action="" method='post' id='contact_form'>                
                <h3>Contact Form</h3>                
                <div class="hr dotted clearfix">&nbsp;</div>                
                <ul>						                
                    <li class="clearfix">                 
                        <label for="name">Name</label>                
                        <input type='text' name='name' id='name' />                
                        <div class="clear"></div>                
                        <p id='name_error' class='error'>Insert a Name</p>                
                    </li>                 
                    <li class="clearfix">                 
                        <label for="email">Email Address</label>                
                        <input type='text' name='email' id='email' />                
                        <div class="clear"></div>                
                        <p id='email_error' class='error'>Enter a valid email address</p>                
                    </li>                 
                    <li class="clearfix">                 
                        <label for="subject">Subject</label>                
                        <input type='text' name='subject' id='subject' />                
                        <div class="clear"></div>                
                        <p id='subject_error' class='error'>Enter a message subject</p>                
                    </li>                 
                    <li class="clearfix">                 
                        <label for="message">Message</label>                
                        <textarea name='message' id='message' rows="30" cols="30"></textarea>                
                        <div class="clear"></div>                
                        <p id='message_error' class='error'>Enter a message</p>                
                    </li>                
                    <li>                
                        <input type="hidden" name="your_email" value="<?php echo get_option('admin_email'); ?>">
                        <input type="hidden" name="your_web_site_name" value="<?php echo get_bloginfo('name'); ?>">
        
                    </li>                
        
                    <li class="clearfix">                 
        
                        <p id='mail_success' class='success'>Thank you. We'll get back to you as soon as possible.</p>                
                        <p id='mail_fail' class='error'>Sorry, an error has occured. Please try again later.</p>                
                        <div id="button">                
                            <input type='submit' id='send_message' class="button" value='Submit' />                
                        </div>                
                    </li>                 
                </ul>                 
            </form>                  
        </div>                
        
        <!-- Column 2 / Sidebar -->                
        <div class="grid_4 contact">                
    <?php $company_name = get_post_meta($post->ID, "my_company_name", true); ?>
    <?php $company_description = get_post_meta($post->ID, "my_company_description", true); ?>
    <?php $contact_phone = get_post_meta($post->ID, "my_contact_phone", true); ?>
    <?php $email_owner = get_post_meta($post->ID, "my_email_owner", true); ?>
    <?php $contact_email = get_post_meta($post->ID, "my_contact_email", true); ?>
    
        <!-- Adress and Phone Details -->        
        <h4>Address and Phone</h4>         
        <div class="hr dotted clearfix">&nbsp;</div>        
        <ul>         
            <li>         
                <strong><?php echo $company_name; ?></strong><br /> <br />
            <?php echo $company_description; ?> <br /> <br />
        </li> 
        <li><?php echo $contact_phone; ?></li> 
    </ul> 

    <!-- Email Addresses -->
    <h4>Emails</h4> 
    <div class="hr dotted clearfix">&nbsp;</div>
    <ul> 
        <li><?php echo $email_owner; ?> - <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></li> 
    </ul> 

    <!-- Social Profile Links -->
    <h4>Social Profiles</h4> 
    <div class="hr dotted clearfix">&nbsp;</div>
    <ul> 
        <?php if (get_post_meta($post->ID, 'my_twitter', true)) : ?>
                <li class="float"><a href="<?php echo get_post_meta($post->ID, 'my_twitter', true) ?>"><img alt="" src="<?php bloginfo('template_url'); ?>/images/twitter.png" title="Twitter" /></a></li> 
        <?php endif; ?>	
        <?php if (get_post_meta($post->ID, 'my_facebook', true)) : ?>
                    <li class="float"><a href="<?php echo get_post_meta($post->ID, 'my_facebook', true) ?>"><img alt="" src="<?php bloginfo('template_url'); ?>/images/facebook.png" title="Facebook" /></a></li> 
        <?php endif; ?>
        <?php if (get_post_meta($post->ID, 'my_stumbleupon', true)) : ?>      
                        <li class="float"><a href="<?php echo get_post_meta($post->ID, 'my_stumbleupon', true) ?>"><img alt="" src="<?php bloginfo('template_url'); ?>/images/stumbleupon.png" title="StumbleUpon" /></a></li> 
        <?php endif; ?>
        <?php if (get_post_meta($post->ID, 'my_flickr', true)) : ?>      
                            <li class="float"><a href="<?php echo get_post_meta($post->ID, 'my_flickr', true) ?>"><img alt="" src="<?php bloginfo('template_url'); ?>/images/flickr.png" title="Flickr" /></a></li> 
        <?php endif; ?>	
        <?php if (get_post_meta($post->ID, 'my_delicious', true)) : ?>      
                                <li class="float"><a href="<?php echo get_post_meta($post->ID, 'my_delicious', true) ?>"><img alt="" src="<?php bloginfo('template_url'); ?>/images/delicious.png" title="Delicious" /></a></li> 
        <?php endif; ?>
                            </ul>                                                 
                        
                        </div>                                                
<?php endwhile;
                            else: ?>
                                <p>Sorry, no page found</p>                                                                
<?php endif; ?>
                                
                                <div class="hr grid_12 clearfix">&nbsp;</div>                                                                
                                
<?php get_footer(); ?>