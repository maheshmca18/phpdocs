mail
============
install the command:
===========================
composer require swiftmailer/swiftmailer

<?php
require_once 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';

$subject = 'Sporkey Merchant signup';
$from = array('selvamani@irssoft.com' =>'irs test');
$to = array(
 'maheshirssoft@gmail.com'  => 'Mahesh',
// 'recipient2@example2.com' => 'Recipient2 Name'
);

$text = "Mandrill speaks plaintext";
$html = "<em>Mandrill speaks <strong>HTML</strong></em>";

$transport = Swift_SmtpTransport::newInstance('mail.indialocal.co.in', 25);
$transport->setUsername('test@indialocal.co.in');
$transport->setPassword('!r$welcome');
$swift = Swift_Mailer::newInstance($transport);

$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setBody($html, 'text/html');
$message->setTo($to);
$message->addPart($text, 'text/plain');

if ($recipients = $swift->send($message, $failures))
{
 echo 'Message successfully sent!';
} else {
 echo "There was an error:\n";
}
