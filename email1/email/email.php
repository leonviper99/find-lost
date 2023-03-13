<?php
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "rangisharwanda@gmail.com";
   $mail ->Password = "rangishaibyabuze";
   $mail ->SetFrom("rangisharwanda@gmail.com","Rangisha");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   // if(!$mail->Send())
   // {
   //     echo "Mail Not Sent";
   // }
   // else
   // {
   //     echo "Mail Sent";
   // }

   
?>