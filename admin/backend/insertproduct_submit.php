<?php

include 'connect.php';
session_start();

if (isset($_POST['productsubmit'])) {
	$date=date("y/m/d");
	$itangazo=mysqli_real_escape_string($db,($_POST['itangazo']));
	$irangamuntu=mysqli_real_escape_string($db,($_POST['Irangamuntu']));
	$passport=mysqli_real_escape_string($db,($_POST['Passport']));
	$ubutaka=mysqli_real_escape_string($db,($_POST['Icyangombwa_cyubutaka']));
	$perimi=mysqli_real_escape_string($db,($_POST['Perimi']));
	$national_no=mysqli_real_escape_string($db,($_POST['national_no']));
	$ubutaka_no=mysqli_real_escape_string($db,($_POST['ubutaka_no']));
	$passport_no=mysqli_real_escape_string($db,($_POST['passport_no']));
	$perimi_no=mysqli_real_escape_string($db,($_POST['perimi_no']));
	$ibindi=mysqli_real_escape_string($db,($_POST['ibindi']));
	$nyirabyo=mysqli_real_escape_string($db,($_POST['nyirabyo']));
	$akarerebyatangiwe=mysqli_real_escape_string($db,($_POST['akarerebyatangiwe']));
	$umurengebyatangiwe=mysqli_real_escape_string($db,($_POST['umurengebyatangiwe']));
	$akarerebyabuze=mysqli_real_escape_string($db,($_POST['akarerebyabuze']));
	$umugi=mysqli_real_escape_string($db,($_POST['umugi']));
	$itariki=mysqli_real_escape_string($db,($_POST['itariki']));
	// $ifoto=mysqli_real_escape_string($db,($_FILES['ifoto']['name']));
	$description=mysqli_real_escape_string($db,($_POST['description']));
	$amazinayuwataye=mysqli_real_escape_string($db,($_POST['amazinayuwataye']));
	$telefone=mysqli_real_escape_string($db,($_POST['telefone']));
	$email=mysqli_real_escape_string($db,($_POST['email']));
	$livedistrict=mysqli_real_escape_string($db,($_POST['livedistrict']));
	$livecity=mysqli_real_escape_string($db,($_POST['livecity']));
	$materialname= array('n' => $irangamuntu,'l' => $passport,'m' => $ubutaka);


	// foreach ($materialname as $key) {




	$insertproduct="insert into product(type,national_id,ubutaka,permi,passport,other_product,description,owner,advert_date) values('".$itangazo."','".$irangamuntu."','".$ubutaka."','".$perimi."','".$passport."','".$ibindi."','".$description."','".$nyirabyo."','".$date."')";
	$resultproduct=$db->query($insertproduct) or mysqli_error();
	if ($resultproduct) {
		$lastid=$db->insert_id;
		if (!empty($national_no || $ubutaka_no || $perimi_no || $passport_no)) {
			$sql2 = $db -> query("insert into proterty_number(product_id,national_idno,ubutaka_no,permi_no,passport_no) values('".$lastid."','".$national_no."','".$ubutaka_no."','".$perimi_no."','".$passport_no."')");
		}
		$sql1 = $db -> query("insert into product_detail(product_id,issue_district,issue_sector,advert_district,advert_sector,date) values('".$lastid."','".$akarerebyatangiwe."','".$umurengebyatangiwe."','".$akarerebyabuze."','".$umugi."','".$itariki."')");
		
		$sql="insert into customer_detail(product_id,name,phone,email,district,sector) values('".$lastid."','".$amazinayuwataye."','".$telefone."','".$email."','".$livedistrict."','".$livecity."')";
		if ($db->query($sql) === TRUE){
			if (!empty($_FILES['ifoto']['name'])) {
				$checkdir="../productimages/".$amazinayuwataye."/";
				if ($checkdir > 0 ) {
					$target_dir = "../../productimages/".$amazinayuwataye."/";
				}
				else{
					$newdir= "../../productimages/".$amazinayuwataye;
				    @mkdir($newdir);
				    $target_dir = "../../productimages/".$amazinayuwataye."/";
				}

				foreach ($_FILES["ifoto"]["name"] as $key => $value) { 

					$file_tmpname = $_FILES['ifoto']['tmp_name']["$key"];
					$imagename = $_FILES['ifoto']['name']["$key"];
	                $target = $target_dir . basename($_FILES["ifoto"]["name"]["$key"]);

	                if(move_uploaded_file($file_tmpname, $target)){

	                	$insertimg="INSERT INTO product_images(product_id,images) VALUES('".$lastid."', '".$imagename."')";
	                	$resultimg=$db->query($insertimg);

	                	if ($resultimg) {
			                $_SESSION['submitp']="New Property Successful Added with code:&nbsp".$lastid."&nbsp and number:&nbsp".$telefone;
	                		header("location: ../product.php");
	                	}
	                	else{
	                		die($db->error);
	                	}
	                }
	                else{
	                	$_SESSION['submitp']="New Property Successful Added but images failled to move with code:&nbsp".$lastid."&nbsp and number:&nbsp".$telefone;
	                    header("location: ../product.php");
	                }
					
				}
			}
			else{
				$_SESSION['submitp']="New Property Successful Added but no images found with code:&nbsp".$lastid."&nbsp and number:&nbsp".$telefone;
	            header("location: ../product.php");				
			}
			
		}
		else{
			echo "fff";
		}
	}
	else{
		echo "fail";
	}




}



?>