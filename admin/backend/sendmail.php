<?php
include 'connect.php';
session_start();
// include 'backend/fetch_functions.php';

if (isset($_POST['sendmail'])) {

	require '../PHPMailer-master/PHPMailerAutoload.php';
	
    $mailSub = $_POST["mailsubject"];
    $mailMsg = $_POST["mailmsg"];
    $time=date("Y-m-d");
if (!empty($_SESSION['customerid'])) {
    foreach ($_SESSION['customerid'] as $key) {
    	$select=$db->query("SELECT * FROM customer_detail WHERE id='".$key."'");
    	$row=$select->fetch_assoc();
    	$mailto=$row['email'];

    	$mail = new PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = "smtp.gmail.com";
        $mail ->Port = 465; // or 587
        $mail ->IsHTML(true);
        $mail ->Username = "muhayejules@gmail.com";
        $mail ->Password = "smalljules";
        $mail ->SetFrom("muhayejules@gmail.com","Rangisha");
        $mail ->Subject = $mailSub;
        $mail ->Body = $mailMsg;
        $mail ->AddAddress($mailto);

    	if($mail->Send()){
        	$sql=$db->query("INSERT INTO sent_msgs(admin,destination,subject,msg,date) VALUES('".$_SESSION['administrative_permission']."','".$mailto."','".$mailSub."','".$mailMsg."','".$time."')");
        	if ($sql) {
        		$_SESSION['mailsuccess']="The Email has been sent successful !";
            	header("location: ../writemail.php");
        	}
        }
        else{
        	$_SESSION['mailsuccess']="The Email Not sent !";
            header("location: ../writemail.php");
        }
    }   
}
else{
    $_SESSION['errordestination']="The email not sent, No Email selected.";
    header("location: ../writemail.php");
}
}



if (isset($_POST['sendmsg'])) {
	$msgsubject=$_POST["msgsubject"];
	$msg=$_POST["msg"];
	$time=date("Y-m-d");

	foreach ($_SESSION['customerid'] as $key) {
		$select=$db->query("SELECT * FROM customer_detail WHERE id='".$key."'");
		$row=$select->fetch_assoc();

		if (!empty($row['phone'])) {
			// THIS IS FOR MESSAGE API
			$phonenumber=$row['phone'];
			$delivery=$msg;

            $number = array();
            array_push($number, $mtn);

            $imploded_phone = implode(",", $number);

            $data = array(
                "sender"=>'LostFound',
                "recipients"=> "$phonenumber",
                "message"=>$delivery,
            );
            $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
            $data = http_build_query($data);
            $username="m.jules";
            $password="muhayimana1";
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
            curl_close($ch);                        

            if ($httpcode == 200){
            	$sql=$db->query("INSERT INTO sent_msgs(admin,destination,subject,msg,date) VALUES('".$_SESSION['administrative_permission']."','".$phonenumber."','".$msgsubject."','".$msg."','".$time."')");
            	if ($sql) {
            		$_SESSION['msgsuccess']="The message has been sent successful !";
            		header("location: ../writemail.php");
            	}
            }
            else
            {
            	$_SESSION['msgsuccess']="The message not sent, Check Your message Pack";
            	header("location: ../writemail.php");
            }
		}
		else{
			$_SESSION['errordestination']="The message not sent, No selected number.";
            header("location: ../writemail.php");
		}
	}


}


?>