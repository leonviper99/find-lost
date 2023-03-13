<?php 
  
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require 'master/src/PHPMailer.php';
require 'master/src/SMTP.php'; 
require 'master/src/Exception.php';
  
$mail = new PHPMailer(true); 
  
    $mail->SMTPDebug = 2;                                        
    $mail->isSMTP();                                             
    $mail->Host       = 'smtp.gmail.com;';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = 'rangisharwanda@gmail.com';                  
    $mail->Password   = 'rangishaibyabuze';                         
    $mail->SMTPSecure = 'tls';                               
    $mail->Port       = 587;
    $mail->isHTML(true);  
    $mail->setFrom('rangisharwanda@gmail.com', 'Rangisha');            
    $mail->addAddress($mailto);
    $mail->Subject = $mailSub; 
    $mail->Body    = $mailMsg;

  
?> 