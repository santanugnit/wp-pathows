<?php

//$mailto = 'iainstansfield50@outlook.com' ;
$mailto = 'pathosolives@gmail.com' ;
$subject = "New price list request" ;
$formurl = "http://www.pathosolives.co.uk/list-signup.html" ;
$errorurl = "http://www.pathosolives.co.uk/error.html" ;
$thankyouurl = "http://www.pathosolives.co.uk/thanks.html" ;

$email_is_required = 1;
$name_is_required = 1;
$uself = 0;
$use_envsender = 1;
$use_webmaster_email_for_from = 1;
$use_utf8 = 1;

$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ;
$content_type = (!isset( $use_utf8 ) || ($use_utf8 == 0)) ? 'Content-Type: text/plain; charset="iso-8859-1"' : 'Content-Type: text/plain; charset="utf-8"' ;
if (!isset( $use_envsender )) { $use_envsender = 0 ; }
$envsender = "-f$mailto" ;
$email = $_POST['email'] ;
$name = $_POST ['name'] ;
$http_referrer = getenv( "HTTP_REFERER" );

if (!isset($_POST['email'])) {
	header( "Location: $formurl" );
	exit ;
}
if (($email_is_required && (empty($email) || !ereg("@", $email)))) {
	header( "Location: $errorurl" );
	exit ;
}
if ( ereg( "[\r\n]", $email ) ) {
	header( "Location: $errorurl" );
	exit ;
}
if (empty($email)) {
	$email = $mailto ;
}
$fromemail = (!isset( $use_webmaster_email_for_from ) || ($use_webmaster_email_for_from == 0)) ? $email : $mailto ;

if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =
	"This message was sent from:\n" .
	"$http_referrer\n" .
	"------------------------------------------------------------\n" .
	"Email of sender: $email\n" .
	"Name of sender: $name\n" .
	"\n\n------------------------------------------------------------\n" ;

$headers =
	"From: <$fromemail>" . $headersep . "Reply-To: <$email>" . $headersep . "X-Mailer: chfeedback.php 2.13.0" .
	$headersep . 'MIME-Version: 1.0' . $headersep . $content_type ;

if ($use_envsender) {
	mail($mailto, $subject, $messageproper, $headers);
}
else {
	mail($mailto, $subject, $messageproper, $headers );
}
header( "Location: $thankyouurl" );
exit ;

?>
