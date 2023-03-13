	<?php
	include 'connect.php';
	if (isset($_POST['checkproperty'])) {
	    session_start();
		$_SESSION['code']=$_POST['code'];
		$_SESSION['phone']=$_POST['phone'];

		$sql=$db->query("SELECT type FROM product inner join customer_detail on product.id=customer_detail.product_id WHERE product.id='".$_SESSION['code']."' AND customer_detail.phone='".$_SESSION['phone']."'");
		$row=$sql->fetch_assoc();
		if ($sql == TRUE) {
			if ($row['type'] == "byaratoraguwe") {
				
				header("location: ../foundpropertystatus.php");
			}
			else if ($row['type'] == "byarabuze"){
				header("location: ../lostpropertystatus.php");
			}
			else{
				echo("<h1>Umubare na Nimero washyizemo Ntibihura. Wongere ugerageze mukanya.</h1>");
				 echo '<meta http-equiv = "refresh" content="4; url=../index.php">';
			}
		}
    }
	?>