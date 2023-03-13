<?php
/**
* 
*/
class MAIN
{

	private $db;
	
	function __construct($db)
	{
		$this->db=$db;
	}


	// SEND PHONE SMS


	public function SendSMS($phonenumber, $delivery)
	{

		$phonenumber = $phonenumber;
		$delivery = $delivery;
		require '../send_msgs/msg_file.php';
		if ($httpcode == 200) {
			return TRUE;
		}
		else{
			return TRUE;
		}
	}


	// SEND EMAIL


	public function SendEmail($mail, $sub, $mailmsg)
	{
		if (!empty($mail)) {
			$mailto = $mail;
			$mailSub = $sub;
			$mailMsg = $mailmsg;
			require '../email1/email/email.php';
			if($mail->Send()){
				return TRUE;
			}
			else{
				return TRUE;
			}
		}
		else{
			return TRUE;
		}
	}


	// PROPERTY


	public function Propertyinfo($lastid, $akarerebyatangiwe, $umurengebyatangiwe, $akarerebyabuze, $umugi, $itariki)
	{
		$sql = $this->db -> query("INSERT INTO product_detail(product_id, issue_district, issue_sector, advert_district, advert_sector, date) VALUES('".$lastid."','".$akarerebyatangiwe."','".$umurengebyatangiwe."','".$akarerebyabuze."','".$umugi."','".$itariki."')");
		if ($sql) {
			return TRUE;
		}
		else{
			echo "not info";
			return FALSE;
		}
	}


	// PROPERTY


	public function Customerinfo($lastid, $amazinayuwataye, $telefone, $email, $livedistrict, $livecity)
	{
		$sql = $this->db -> query("insert into customer_detail(product_id,name,phone,email,district,sector) values('".$lastid."','".$amazinayuwataye."','".$telefone."','".$email."','".$livedistrict."','".$livecity."')");
		if ($sql) {
			return TRUE;
		}
		else{
			echo "not cust";
			return FALSE;
		}
	}


	// PROPERTY


	public function Propertynumber($lastid, $national_no, $ubutaka_no, $perimi_no, $passport_no)
	{
		if (!empty($national_no || $ubutaka_no || $perimi_no || $passport_no)){
			$sql = $this->db -> query("insert into proterty_number(product_id,national_idno,ubutaka_no,permi_no,passport_no) values('".$lastid."','".$national_no."','".$ubutaka_no."','".$perimi_no."','".$passport_no."')");
			if ($sql) {
				return TRUE;
			}
			else{
				echo "not numb";
				return FALSE;
			}
		}
		else{
			return TRUE;
		}
	}


	// PROPERTY IMAGES


	public function Propertyimage($ifoto, $amazinayuwataye, $lastid)
	{
		if (!empty($ifoto)) {
            $checkdir="../productimages/".$amazinayuwataye."/";
            if ($checkdir > 0 ) {
              $target_dir = "../productimages/".$amazinayuwataye."/";
            }
            else{
              $newdir= "../productimages/".$amazinayuwataye;
                @mkdir($newdir);
                $target_dir = "../productimages/".$amazinayuwataye."/";
            }

            foreach ($ifoto as $key => $value) { 

              $file_tmpname = $_FILES['ifoto']['tmp_name']["$key"];
              $imagename = $ifoto["$key"];
              $target = $target_dir . basename($ifoto["$key"]);

              if(move_uploaded_file($file_tmpname, $target)){
              	$insertimg="INSERT INTO product_images(product_id,images) VALUES('".$lastid."', '".$imagename."')";
                $resultimg=$this->db->query($insertimg);               
              }             
            }
          }
          else{
            return TRUE;   
          }
	}


	// PROPERTY


	public function Saveproperty($itangazo, $irangamuntu, $passport, $ubutaka, $perimi, $national_no, $ubutaka_no, $passport_no, $perimi_no, $ibindi, $nyirabyo, $akarerebyatangiwe, $umurengebyatangiwe, $akarerebyabuze, $umugi, $itariki,$description, $amazinayuwataye, $telefone, $email, $livedistrict, $livecity, $ifoto)
	{
		date_default_timezone_set('Africa/Kigali');
        $timezone_object = date_default_timezone_get();
		$insertproduct="insert into product(type, national_id, ubutaka, permi, passport, other_product, description, owner, advert_date) values('".$itangazo."','".$irangamuntu."','".$ubutaka."','".$perimi."','".$passport."','".$ibindi."','".$description."','".$nyirabyo."',NOW())";
      	$resultproduct=$this->db->query($insertproduct) or mysqli_error();
      	if ($resultproduct)
      	{
      		$lastid=$this->db->insert_id;
	      	if (($this->Propertyinfo($lastid, $akarerebyatangiwe, $umurengebyatangiwe, $akarerebyabuze, $umugi, $itariki) && $this->Customerinfo($lastid, $amazinayuwataye, $telefone, $email, $livedistrict, $livecity) && $this->Propertynumber($lastid, $national_no, $ubutaka_no, $perimi_no, $passport_no)) == TRUE)
	      	{
	      		$this->Propertyimage($ifoto, $amazinayuwataye, $lastid);

	      		$messg1=$messg2=$messg3=$messg4="";

	      		$delivery=("Murakoze kubw'itangazo mutanze,  Code:".$lastid."  #-Nimero: ".$telefone. "  muzabikoresha mugihe mushaka gusuzuma itangazo mutanze \n\n".$messg1.$messg2.$messg3.$messg4);

	      		$mailSub = "Itangazo ryakiriwe na rangisha.com";
	    		$mailMsg = "<div style='max-width: 400px; margin: auto; border: 2px solid #696969;border-radius: 5px;padding: px;'><div style='text-align: center; padding-bottom: 1px; margin-top: -30px; background-color: #FFE4B5'><h1><b>Rangisha.com</b></h1></div><h4 style='padding: 0px 5px'>Murakoze kubw'itangazo mutanze,  Code:".$lastid."  #-Nimero: ".$telefone. "  muzabikoresha mugihe mushaka gusuzuma itangazo mutanze".$messg1.$messg2.$messg3.$messg4."</h4></div>";
	      		if (($this->SendSMS($telefone, $delivery) && $this->SendEmail($email, $mailSub, $mailMsg)) == TRUE) {
	      			$_SESSION['advertsuccess']=$lastid;
	      			if ($itangazo == "byarabuze") {
						return header("location: ../ibyabuze.php");
					}
					else{
						return header("location: ../ibyatoraguwe.php");
					}
	      		}
	      	}
	    }
	}



	// 
	function GetCustomerInfo($productId){

		$array=array();

		$fetchproduct = "SELECT * FROM customer_detail WHERE product_id=$productId";
		$fetchresult = $this->db->query($fetchproduct);
		$row = $fetchresult->fetch_assoc();

		$array['name']=$row['name'];
		$array['phone']=$row['phone'];
		
		return $array;
	}



	function GetPropertyType($productId){
		$fetchproduct = "SELECT * FROM product WHERE id=$productId";
		$fetchresult = $this->db->query($fetchproduct);
		$row = $fetchresult->fetch_assoc();

		return $row['type'];
	}



	public function Success_Property($name, $phone, $email, $item){

		if ($this->GetPropertyType($item) == "byarabuze") {
			$telefone = $this->GetCustomerInfo($item)['phone'];
			$emailto = $this->GetCustomerInfo($item)['email'];
			$sms_msg = ("Uwatoye ibintu byawe yabonetse \n yitwa:  ".$name."  \n #-Nimero ye ni:  ".$phone);

			$email_msg = "<div style='max-width: 400px; margin: auto; border: 2px solid #696969;border-radius: 5px;padding: px;'><div style='text-align: center; padding-bottom: 1px; margin-top: -45px; background-color: #FFE4B5'><h1><b>Rangisha.com</b></h1></div><h4 style='padding: 0px 5px'><b>Tubashimiye kubwicyizere mwatugiriye.</b><br> Tukaba tunejejwe no kukumenyesha ko uwatoye ibintu byawe yabonetse akaba yitwa: <br><b style='background-color: #F0FFF0; padding: 3px;'>".$name."</b>  #-Nimero ye ni: <b style='background-color: #F0FFF0; padding: 3px;'>".$phone. "</b></h4></div>";
		}

		else{
			$telefone = $phone;
			$emailto = $email;
			$sms_msg = ("Uwatoye ibintu byawe \n yitwa:  ".$name."  \n #-Nimero ye ni:  ".$phone);

			$email_msg = "<div style='max-width: 400px; margin: auto; border: 2px solid #696969;border-radius: 5px;padding: px;'><div style='text-align: center; padding-bottom: 1px; margin-top: -45px; background-color: #FFE4B5'><h1><b>Rangisha.com</b></h1></div><h4 style='padding: 0px 5px'>Tunejejwe no kukumenyesha ko uwatoye ibintu byawe yitwa: <br><b style='background-color: #F0FFF0; padding: 3px;'>".$this->GetCustomerInfo($item)['name']."</b>  #-Nimero ye ni: <b style='background-color: #F0FFF0; padding: 3px;'>".$this->GetCustomerInfo($item)['phone']. "</b></h4></div>";
		}

        // FOR EMAIL msg
        $mailto = $emailto;
        $mailSub = "Ibyabonetse kuri rangisha.com";

        if (($this->SendSMS($phone, $sms_msg) || $this->SendEmail($emailto, $mailSub, $email_msg)) == TRUE)
        {
        	$date=date("Y/m/d");
        	$sql=$this->db->query("INSERT INTO foundcontact(product_id,found_name,found_phone,email,date) VALUES('".$item."','".$name."','".$phone."','".$email."','".$date."')");
	        if ($sql > 0) {
		        	$update=$this->db->query("UPDATE product set status='1' WHERE id='".$item."'");
		        	if ($update) {
		        	$_SESSION['success']= TRUE;
		        	if ($this->GetPropertyType($item) == "byarabuze") {
		        		header("location: ../ibyabuze.php");
		        	}
		        	else{
		        		header("location: ../ibyatoraguwe.php");
		        	}
		        }
	        }
        }
	}




}


?>