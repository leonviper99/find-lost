<?php

include 'connect.php';
session_start();
// session_destroy();

$sendcustomer=$_SESSION['succes-sub'];
$phonenumber=$_SESSION['telefone'];

$messg1=$messg2=$messg3=$messg4="";

if (!empty($_SESSION['national_no'] || $_SESSION['ubutaka_no'] || $_SESSION['passport_no'] || $_SESSION['perimi_no'])) {
	if (!empty($_SESSION['national_no'])) {
		$national_no=$_SESSION['national_no'];
		$selecttable=$db->query("SELECT * FROM proterty_number WHERE national_idno='".$national_no."' AND product_id != '".$sendcustomer."'");
		$row=$selecttable->fetch_assoc();
		if ($row > 0) {
			$messg1="\r\nirangamuntu ".$row['national_idno']." hari uwayishyize kurubuga kanda hano ubirebe \r\n http://rangisha.com/propertyview.php?propertyid=".$row['product_id'];
		}
		

	}
	if (!empty($_SESSION['ubutaka_no'])) {
		$ubutaka_no=$_SESSION['ubutaka_no'];
		$selecttable=$db->query("SELECT * FROM proterty_number WHERE ubutaka_no='".$ubutaka_no."' AND product_id != '".$sendcustomer."'");
		$row=$selecttable->fetch_assoc();
		if ($row > 0) {
			$messg2="\r\nicyemezo cyubutaka  ".$row['ubutaka_no']." hari uwagishyize kurubuga kanda hano ubirebe \r\n http://rangisha.com/propertyview.php?propertyid=".$row['product_id'];
		}
	}
	if (!empty($_SESSION['passport_no'])) {
		$passport_no=$_SESSION['passport_no'];
		$selecttable=$db->query("SELECT * FROM proterty_number WHERE passport_no='".$passport_no."' AND product_id != '".$sendcustomer."'");
		$row=$selecttable->fetch_assoc();
		if ($row > 0) {
			$messg3="\nPassport  ".$row['passport_no']." hari uwayishyize kurubuga kanda hano ubirebe \r\n http://rangisha.com/propertyview.php?propertyid=".$row['product_id'];
		}
	}
	if (!empty($_SESSION['perimi_no'])) {
		$perimi_no=$_SESSION['perimi_no'];
		$selecttable=$db->query("SELECT * FROM proterty_number WHERE permi_no='".$perimi_no."' AND product_id != '".$sendcustomer."'");
		$row=$selecttable->fetch_assoc();
		if ($row > 0) {
			$messg4="\nPerimi ".$row['permi_no']." hari uwayishyize kurubuga kanda hano ubirebe \r\n http://rangisha.com/propertyview.php?propertyid=".$row['product_id'];
		}
	}
	$propertynumbercheck = TRUE;
}
else{
	$propertynumbercheck = TRUE;
}

$_SESSION['propertycheck']=$messg1.$messg2.$messg3.$messg4;
if ($propertynumbercheck) {
	if (!empty($_SESSION['email'])) {
		
		$mailto = $_SESSION['email'];
	    $mailSub = "Itangazo ryakiriwe na rangisha.com";
	    $mailMsg = "<div style='max-width: 400px; margin: auto; border: 2px solid #696969;border-radius: 5px;padding: px;'><div style='text-align: center; padding-bottom: 1px; margin-top: -30px; background-color: #FFE4B5'><h1><b>Rangisha.com</b></h1></div><h4 style='padding: 0px 5px'>Murakoze kubw'itangazo mutanze,  Code:".$_SESSION['succes-sub']."  #-Nimero: ".$phonenumber. "muzabikoresha mugihe mushaka gusuzuma itangazo mutanze".$messg1.$messg2.$messg3.$messg4."</h4></div>";

	    require '../email1/email/email.php';
	    if($mail->Send()){
	    	$mailsuccess = TRUE;
	    }
	    else{
	    	$mailsuccess = TRUE;
	    }
	}
	else{
		$NoEmail = TRUE;
	}

	if ($mailsuccess || $NoEmail) {
		$delivery=("Murakoze kubw'itangazo mutanze,  Code:".$_SESSION['succes-sub']."  #-Nimero: ".$phonenumber. "muzabikoresha mugihe mushaka gusuzuma itangazo mutanze \n\n".$messg1.$messg2.$messg3.$messg4);

		// THIS IS FOR MESSAGE API

		require '../send_msgs/msg_file.php';

		// END OF API

		if ($httpcode == 200) {
			if ($_SESSION['itangazo'] == "byarabuze") {
				header("location: ../ibyabuze.php");
			}
			else{
				header("location: ../ibyatoraguwe.php");
			}
		}
		else{
			// echo $mailto;
			if ($_SESSION['itangazo'] == "byarabuze") {
				echo'<meta http-equiv="refresh" content="0;../ibyabuze.php"/>';
			}
			else{
				echo'<meta http-equiv="refresh" content="0;../ibyatoraguwe.php"/>';
			}
			
			

		}
	}
}

?>