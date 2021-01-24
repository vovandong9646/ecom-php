<?php
require("PHPMailer.php");
require("SMTP.php");
require("Exception.php");
//require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMailBasic($email, $message)
{
  $mail = new PHPMailer(true);
  //Server settings
  $mail->SMTPDebug = 0;                      // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host = "smtp.gmail.com";                    // Set the SMTP server to send through
  $mail->SMTPAuth = true;                                   // Enable SMTP authentication
  $mail->Username = "vovandongpro8@gmail.com";                   // SMTP username
  $mail->Password = "01213638036";                              // SMTP password
  $mail->SMTPSecure = "ssl";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port = 465;

  $mail->setFrom('vovandongpro8@gmail.com', 'Admin');
  $mail->addAddress($email);
  $mail->addReplyTo('vovandongpro8@gmail.com');
  $mail->Subject = 'Verify Account Test';
  $mail->Body    = $message;
  $mail->AltBody = $message;
  if(!$mail->send()){
    return false;
  }else{
    return true;
  }
}

function sendMail($toName, $toEmail, $subject, $message) {
  $mail = new PHPMailer(true);
  try {
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'vovandongpro8@gmail.com';                     // SMTP username
    $mail->Password   = 'xxxx';                               // password mail
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('vovandongpro8@gmail.com', 'Admin');
    $mail->addReplyTo('vovandongpro8@gmail.com');
    if (empty($toName)) {
      $mail->addAddress($toEmail);
    } else {
      $mail->addAddress($toEmail, $toName);
    }

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    if (!$mail->send()) {
      return false;
    } else {
      return true;
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

?>