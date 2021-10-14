<?php
$servern='locolhost';
$user='root';
$passw='';
$db='register';
$passw='';
if(!$_POST) exit;


if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$first_name     = $_POST['first_name'];
$last_name     = $_POST['last_name'];
$phone   = $_POST['phone'];
$usern   = $_POST['select_price'];
$pass   = $_POST['select_service'];
$gender  = $_POST['subject'];
$year = $_POST['comments'];
if(trim($first_name) == '') {
	echo '<div class="error_message">Attention! You must enter your name.</div>';
	exit();
}  else if(trim($email) == '') {
	echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">Attention! You have enter an invalid e-mail address, try again.</div>';
	exit();
}

if(trim($comments) == '') {
	echo '<div class="error_message">Attention! Please enter your message.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$comments = stripslashes($comments);
}


// Configuration option.
// Enter the email address that you want to emails to be sent to.
// Example $address = "joe.doe@yourdomain.com";

//$address = "example@themeforest.net";
$address = "example@yourdomain.com";


// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."

// Example, $e_subject = '$name . ' has contacted you via Your Website.';

$e_subject = 'You\'ve been contacted by ' . $first_name . '.';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

$e_body = "You have been contacted by $first_name. $first_name selected service of $select_service, their additional message is as follows. Customer max budge is $select_price, for this project." . PHP_EOL . PHP_EOL;
$e_content = "\"$comments\"" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $first_name via email, $email or via phone $phone";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($address, $e_subject, $msg, $headers)) {

	// Email has sent successfully, echo a success page.

	echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h1>Email Sent Successfully.</h1>";
	echo "<p>Thank you <strong>$first_name</strong>, your message has been submitted to us.</p>";
	echo "</div>";
	echo "</fieldset>";

} else {

	echo 'ERROR!';

}