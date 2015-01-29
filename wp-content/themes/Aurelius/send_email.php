<?php

//we need to get our variables first

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$email_to = trim($_POST['your_email']);
$your_web_site_name = trim($_POST['your_web_site_name']);

/* the $header variable is for the additional headers in the mail function,
  we are asigning 2 values, first one is FROM and the second one is REPLY-TO.
  That way when we want to reply the email gmail(or yahoo or hotmail...) will know
  who are we replying to. */
$headers = 'From: ' . $your_web_site_name . ' <' . $email_to . '>' . "\r\n" . 'Reply-To: ' . $email;

if (mail($email_to, $subject, $message, $headers)) {
    echo 'sent'; // we are sending this text to the ajax request telling it that the mail is sent..      
} else {
    echo 'failed'; // ... or this one to tell it that it wasn't sent    
}
?>