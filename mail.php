<?php

session_start();

$code = $_SESSION['code'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "dutyalter@gmail.com";
$mail->Password   = "Admin@#123";

$mail->IsHTML(true);
$mail->AddAddress($email, $name);
$mail->SetFrom("dutyalter@gmail.com", "Duty Management");
$mail->AddReplyTo("dutyalter@gmail.comn", "Duty Management");
$mail->Subject = "Reg:Password reset";
$content = "<b>Use the following code to reset your password - ".$code."</b>";

$mail->MsgHTML($content); 


if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  header('Location: login/html/entercode.html');
}
