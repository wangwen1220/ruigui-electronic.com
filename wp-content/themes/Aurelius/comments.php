<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

if (post_password_required()) {
?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>    
<?php
    return;
}
?><!--wordpress needs all of the code above do not delete but you can edit the sentence-->

<!-- You can start editing here. -->
<!--if there is one comment-->
<?php if (have_comments()) : ?><!--you need the id comments for the links to the comments-->
    <h3><?php comments_number('No Comments', 'One Comment', '% Comments'); ?> to &#8220;<?php the_title(); ?>&#8221;</h3>
    
    <ol class="commentlist"><!--one comment-->    
<?php wp_list_comments(); ?>
    <!--end of one comment if you would like to seperate comments and pings please search for english tutorials-->
</ol>
<!--comments navi-->
<div class="comment_nav">
    <?php previous_comments_link("<span class='comment_prev advancedlink'>&laquo; Older Comments</span>") ?>
<?php next_comments_link("<span class='comment_next advancedlink'>Newer Comments &raquo;</span>") ?>
</div>

<?php else : ?>
        
<?php if ('open' == $post->comment_status) : ?>
            <!-- If comments are open, but there are no comments. -->            
            <span class="meta" id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments'); ?> to &#8220;<?php the_title(); ?>&#8221;</span>    
<?php else : ?>
                <!-- If comments are closed. -->                
                <span class="meta">Comments are closed.</span>                
                
<?php endif; ?>
<?php endif; ?><!--end of comments-->
                
                <!--beginn of the comments form-->                
<?php if ('open' == $post->comment_status) : ?>
                    
                    <div id="respond"><!--you need div  id response for threaded comments-->                    
                    
<?php comment_form_title('<h6>Leave a Comment</h6>', '<h6>Leave a Comment to %s</h6>'); ?>
                
                
                
                    <!--if registration is required-->                
<?php if (get_option('comment_registration') && !$user_ID) : ?>
                        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
                            <!--begin of the comment form read and understand -->                        
                            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment_form">
                                <ul>                        
<?php if ($user_ID) : ?>
                    
                                <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
                    
<?php else : ?>
                        
                                    <li class="clearfix">                        
                                        <label for="name">Your Name</label>                        
                                        <input type="text" name="author" class="text_input" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1"  />
                                    </li>                        
                        
                                    <li class="clearfix">                        
                                        <label for="email">Your Email</label>                        
                                        <input type="text" name="email" class="text_input" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
                                    </li>                        
                        
                                    <li class="clearfix">                        
                                        <label for="email">Your Website</label>                        
                                        <input type="text" name="url" class="text_input" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
                                    </li>                        
                        
<?php endif; ?>
                        
                                    <li class="clearfix">                        
                                        <label for="message">Comment</label>                        
                                        <textarea id="message" name="comment" rows="3" cols="40"></textarea>                        
                                    </li>                        
                        
                                    <li class="clearfix">                        
                                        <input name="submit" class="button medium black right" type="submit" id="submit" tabindex="5" value="Add Comment" />                        
<?php comment_id_fields(); ?><!--this is necessary because wp must know which comment to which article-->
                    
<?php do_action('comment_form', $post->ID); ?>
                    
                    
                            </ul>                     
                        </form>                    
                    </div>                    
                    
<?php endif; ?>
                                    
<?php endif; ?>
