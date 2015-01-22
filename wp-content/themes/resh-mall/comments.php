<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to _s_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package _s
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
	<?php
	$defaults = array(
        'fields' => array(
		'author' => '<p class="comment-form-author"><input type="text" aria-required="true" size="30" value="'.$comment_author.'" name="author" id="author"><label for="author">昵称</label> <span class="required">*</span></p>',
		'email' => '<p class="comment-form-email"><input type="text" aria-required="true" size="30" value="'.$comment_author_email.'" name="email" id="email"><label for="email">邮箱</label> <span class="required">*</span></p>',
		'url' => '<p class="comment-form-url"><input type="text" size="30" value="'.$comment_author_url.'" name="url" id="url"><label for="url">站点</label></p>'
		),
        'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
        'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'title_reply'          => __( 'Leave a Reply' ),
        'title_reply_to'       => __( 'Leave a Reply to %s' ),
        'cancel_reply_link'    => __( 'Cancel reply' ),
        'label_submit'         => __( 'Post Comment' ),
    );
	comment_form($defaults); ?>
	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">共<?php echo get_comments_number();?>条评论回复</h2>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use _s_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define _s_comment() and that will be used instead.
				 * See _s_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'my_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation-comment" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; 上一页', '_s' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( '下一页 &rarr;', '_s' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', '_s' ); ?></p>
	<?php endif; ?>

	

</div><!-- #comments -->
