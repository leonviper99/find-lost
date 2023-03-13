<?php
include 'connect.php';
if (isset($_POST['reply'])) {
	$contact=$_POST['contact'];
	$msg=$_POST['msg'];
	$regex = '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/';
	if (ctype_digit($contact)){
		$phonenumber=$contact;
		$delivery=$msg;
		// THIS IS FOR MESSAGE API
		require '../send_msgs/msg_file.php';

		if ($httpcode == 200){
			$msgsent = TRUE;
		}
		else{
			echo "nono";
		}
	}
	else{
	   $mailto = $contact;
	   $mailSub = "Feedback";
	   $mailMsg = $msg;

	   // THIS IS FOR EMAIL MESSAGE
	   require '../email/email.php';

	   if(!$mail->Send())
	   {
	       echo "Mail Not Sent";
	   }
	   else
	   {
	       $msgsent = TRUE;
	   }
	   if ($msgsent) {
	   	session_start();
	   	$date=date("y-m-d");

	      	$sql=$db->query("INSERT INTO feedback_msgs(destination,sender,feedback,date) VALUES('".$contact."','".$_SESSION['administrater_name']."','".$msg."','".$date."')");
	      	if ($sql) {
	      		$_SESSION['success']="message sent to &nbsp".$contact;
	      		header("location: ../read-mail.php?msg=".$_POST['id']."");
	      	}
	      }   
	}
}
?>