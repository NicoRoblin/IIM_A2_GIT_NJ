<?php

require('config/config.php');
require('model/functions.fn.php');
session_start();

if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "julien.salliot@devinci.fr";

    $email_subject = "Your email subject line";

    // validation expected data exists

    if(!isset($_POST['username']) ||

        !isset($_POST['email']) ||

        !isset($_POST['comments'])) {

    }

    $first_name = $_POST['username']; // required

    $email_from = $_POST['email']; // required

    $comments = $_POST['comments']; // required

    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {

        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {

        $error_message .= 'The Username you entered does not appear to be valid.<br />';

    }

    if(strlen($comments) < 2) {

        $error_message .= 'The Comments you entered do not appear to be valid.<br />';

    }

    $email_message = "Form details below.\n\n";

    function clean_string($string) {

        $bad = array("content-type","bcc:","to:","cc:","href");

        return str_replace($bad,"",$string);

    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers

    $headers = 'From: '.$email_from."\r\n".

        'Reply-To: '.$email_from."\r\n" .

        'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $email_message, $headers);

    ?>

    <!-- include your own success html here -->

    Merci de nous avoir contacté, nous vous répondrons dès que possible.

    <?php

}

?>