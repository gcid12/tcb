<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "Mail.php";
 
$from = "Robot <robot@myring.io>";
$to = "rcid@myring.io <rcid@myring.io>";
$subject = "Test email using PHP SMTP TEST2\r\n\r\n";
$body = "This is a test email message. Test 2";
 
$host = "smtp.gmail.com";
$username = "robot@myring.io";
$password = "Happy123.STRONG";
 
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));
 
$mail = $smtp->send($to, $headers, $body);
 
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  echo("<p>Message successfully sent!</p>");
}

echo 'flag2';
?>
