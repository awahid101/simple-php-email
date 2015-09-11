<?php

/*
 * Send an email
 * 
 * I had made this script just for my friend for educational purpose. 
 * 
 * WARNING: This script has sever security holes, please not do use it on production
 * 
 * @author awahid 
 */

// Pear Mail Library
require_once "Mail.php";

//receiver email address
$receiverEmail = "awahid@gmail.com";

//sender email address
$senderEmail = "admin@awahid.net";

//email subject
$subject = "Someone just send an email";

/*
 * $_REQUEST variable is a special vairable which holds get and post requests. 
 * We generally have key and value in $_REQUEST vairable.
 * 
 * have a look at http://www.w3schools.com/php/php_superglobals.asp for more information 
 * 
 */

/*
 * foreach loop iterates through the $_REQUEST variable and adds $key and $value in to $message varibale.
 * We are prepairing the message variable
 */
foreach ($_REQUEST as $key => $val) {
    $message .= "$key:  $val" . PHP_EOL;
}
/*
 * We will need headers which we set as an array.
 */
$headers = array(
    'From' => $senderEmail,
    'To' => $receiverEmail,
    'Subject' => $subject
);

/*
 * creating an instance of mail object
 */
$smtp = Mail::factory('mail');

/*
 * the send function basically sends the email
 */
$mail = $smtp->send($receiverEmail, $headers, $message);

/*
 * display an error or success message 
 */
if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
?>