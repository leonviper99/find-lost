<?php

include 'connect.php';
session_start();

if (isset($_POST['editsubmit'])) {

	$date=date("y/m/d");
	$item=mysqli_real_escape_string($db,($_POST['itemno']));
	$itangazo=mysqli_real_escape_string($db,($_POST['itangazo']));
	$irangamuntu=mysqli_real_escape_string($db,($_POST['irangamuntu']));
	$passport=mysqli_real_escape_string($db,($_POST['passport']));
	$ubutaka=mysqli_real_escape_string($db,($_POST['ubutaka']));
	$perimi=mysqli_real_escape_string($db,($_POST['perimi']));
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


	$insertproduct="UPDATE product SET type='".$itangazo."', national_id='".$irangamuntu."', ubutaka='".$ubutaka."', permi='".$perimi."', passport='".$passport."', other_product='".$ibindi."', description='".$description."', owner='".$nyirabyo."' WHERE id='".$item."'";
	$resultproduct=$db->query($insertproduct) or mysqli_error();
	if ($resultproduct) {
		if (!empty($national_no || $ubutaka_no || $perimi_no || $passport_no)) {
			$sql2 = $db -> query("UPDATE proterty_number SET national_idno='".$national_no."', ubutaka_no='".$ubutaka_no."', permi_no= '".$perimi_no."', passport_no='".$passport_no."'  WHERE product_id='".$item."'");
		}
		$sql1 = $db -> query("UPDATE product_detail SET issue_district='".$akarerebyatangiwe."', issue_sector='".$umurengebyatangiwe."', advert_district='".$akarerebyabuze."', advert_sector='".$umugi."'  WHERE product_id='".$item."'");
		
		$sql="UPDATE customer_detail SET name='".$amazinayuwataye."', phone='".$telefone."', email='".$email."', district='".$livedistrict."', sector='".$livecity."'  WHERE product_id='".$item."'";
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
	                	$remove=$db->query("DELETE FROM product_images WHERE product_id='".$item."'");
	                	if ($remove > 0) {
		                	$insertimg="INSERT INTO product_images(product_id,images) VALUES('".$item."', '".$imagename."')";
		                	$resultimg=$db->query($insertimg);

		                	if ($resultimg) {
				                $_SESSION['submitp']="Prduct edited Successful";
		                		header("location: ../product.php");
		                	}
		                	else{
		                		die($db->error);
		                	}
		                }
	                }
	                else{
	                	$_SESSION['submitp']="Prduct edited Successful";
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