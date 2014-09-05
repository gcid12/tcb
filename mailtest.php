<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "Mail.php";


$from = "TCB Robot <robot@tcb.io>";
$to = "RCid <rcid@myring.io>";
$subject = "The robot says: Hello M0743RFUCK3R \r\n\r\n";
$body = "Hello little human battery. I'm sending you an email from the Droplet using gmail SMTP server ";
 
$host = "smtp.gmail.com";
$port = "587";
$username = "robot@tcb.io";
$password = "Happy123.STRONG";
 
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = @Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));
 
$mail = @$smtp->send($to, $headers, $body);
 
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
} else {
  echo("<p>Message successfully sent!</p>");
}

echo 'flag1';
?>
