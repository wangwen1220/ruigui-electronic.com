<?php
/*
* ----------------------------------------------------------------------------------------------------
* Template Name: Contact
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/
get_header(); 
?>

<?php
###
#Get theme options
#
$email_to = get_theme_option('contact','email');
$google_map = stripslashes(get_theme_option('contact','google_map'));
###
?>
<div id="main" class="clearfix fullwidth">

<!--Begin Primary-->
<div id="primary">
<!--Begin Content-->
<article id="content">

<div class="post post-single post-contact-single clearfix" id="post-<?php the_ID(); ?>">

<?php if($google_map) : ?>
<div class="col-2-1 col-first contact-google-map">
<h3><?php esc_html_e('Where we are','HK'); ?></h3>
<?php echo $google_map; ?>
</div>
<?php endif; ?>

<div class="col-2-1 contact-form-wrap">
	<h3><?php esc_html_e('Contact Form','HK'); ?></h3>
	<form action="" method="post" id="contact-form">

	<p id="name-error" class="error"><?php esc_html_e("I don't talk to strangers.",'HK'); ?></p>
	<p class="contact-file"><input type="text" name="name" id="name" placeholder="Name" value="" class="text-file" />

	<p id="email-error" class="error"><?php esc_html_e("You don't want me to answer?",'HK'); ?></p>
	<p class="contact-file"><input type="text" name="email" id="email" placeholder="Email" value="" class="text-file" />

	<p id="subject-error" class="error"><?php esc_html_e("What is the purpose of the contact?",'HK'); ?></p>
	<p class="contact-file"><input type="text" name="subject" id="subject" placeholder="Subject" value="" class="text-file" />

	<p id="message-error" class="error"><?php esc_html_e("Forgot why you came here?",'HK'); ?></p>
	<p class="message"><textarea name="message"  id="message" class="contact-form-content"></textarea></p>

	<p id="mail-success" class="success"><?php esc_html_e("Thank you. The mailman is on his way.",'HK'); ?></p>
	<p id="mail-fail" class="error"><?php esc_html_e("Sorry, don't know what happened. Try later.",'HK'); ?></p>

	<div id="romove-submit">
	<input type="submit" id="send-message" value="Send Message">
	<input type="hidden" id="email_to" name="email_to" value="<?php echo $email_to; ?>"/>
	</div>

	</form>  
</div>
<div class="clear"></div>

<?php 
	if (have_posts()) : the_post();  
	$content = get_the_content(); 
?>
<?php if($content) : ?>
	<div class="post-content">
	<?php the_content(); ?>
	</div>
<?php endif; ?>
<?php endif; ?>

<?php 
echo '<script type="text/javascript">'."\n";
echo '//<![CDATA['."\n";
echo 'jQuery(document).ready(function(){'."\n";
echo '	jQuery("#send-message").click(function(e){'."\n";
echo '		//stop the form from being submitted'."\n";
echo '		e.preventDefault();'."\n";
echo '		/* declare the variables, var error is the variable that we use on the end'."\n";
echo '            to determine if there was an error or not */'."\n";
echo '		var error = false;'."\n";
echo '		var email_to = jQuery("#email_to").val();'."\n";
echo '		var name = jQuery("#name").val();'."\n";
echo '		var email = jQuery("#email").val();'."\n";
echo '		var subject = jQuery("#subject").val();'."\n";
echo '		var message = jQuery("#message").val();'."\n";
echo '		if(name.length == 0){'."\n";
echo '			var error = true;'."\n";
echo '			jQuery("#name-error").fadeIn(500);'."\n";
echo '		}else{'."\n";
echo '			jQuery("#name-error").fadeOut(500);'."\n";
echo '		}'."\n";
echo '		if(email.length == 0 || email.indexOf("@") == "-1"){'."\n";
echo '			var error = true;'."\n";
echo '			jQuery("#email-error").fadeIn(500);'."\n";
echo '		}else{'."\n";
echo '			jQuery("#email-error").fadeOut(500);'."\n";
echo '		}'."\n";
echo '		if(subject.length == 0){'."\n";
echo '			var error = true;'."\n";
echo '			jQuery("#subject-error").fadeIn(500);'."\n";
echo '		}else{'."\n";
echo '			jQuery("#subject-error").fadeOut(500);'."\n";
echo '		}'."\n";
echo '		if(message.length == 0){'."\n";
echo '			var error = true;'."\n";
echo '			jQuery("#message-error").fadeIn(500);'."\n";
echo '		}else{'."\n";
echo '			jQuery("#message-error").fadeOut(500);'."\n";
echo '		}'."\n";

echo '		//now when the validation is done we check if the error variable is false (no errors)'."\n";
echo '		if(error == false){'."\n";
echo '			jQuery("#send-message").attr({"disabled" : "true", "value" : "Sending..." });'."\n";
			
echo '			jQuery.post("'.WRAPS_URI.'/wrap_send_email.php", jQuery("#contact-form").serialize(),function(result){'."\n";
		
echo '				if(result == "sent"){'."\n";
echo '					//if the mail is sent remove the submit paragraph'."\n";
echo '					 jQuery("#romove-submit").remove();'."\n";
echo '					//and show the mail success div with fadeIn'."\n";
echo '					jQuery("#mail-success").fadeIn(500);'."\n";
echo '				}else{'."\n";
echo '					//show the mail failed div'."\n";
echo '					jQuery("#mail-fail").fadeIn(500);'."\n";
echo '					//reenable the submit button by removing attribute disabled and change the text back to Send The Message'."\n";
echo '					jQuery("#send-message").removeAttr("disabled").attr("value", "Send The Message");'."\n";
echo '				}'."\n";
echo '			});'."\n";
echo '		}'."\n";
echo '	});'."\n";
echo '});'."\n";
echo '//]]>'."\n";
echo '</script>'."\n";
?>

</div>
<!--end contact form-->

</article>
<!--End Content-->
</div>
<!--End Primary-->

</div>
<!-- #main -->
<?php get_footer(); ?>