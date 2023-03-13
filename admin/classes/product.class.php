<?php
/**
* 
*/
class product
{
	private $db;
	
	function __construct($db)
	{
		$this->db=$db;
	}


	// ADD NEW PRODUCT


	public function Productadd($itangazo, $irangamuntu, $passport, $ubutaka, $perimi, $national_no, $ubutaka_no, $passport_no, $perimi_no, $ibindi, $nyirabyo, $akarerebyatangiwe, $umurengebyatangiwe, $akarerebyabuze, $umugi, $itariki, $description, $amazinayuwataye, $telefone, $email, $livedistrict, $livecity, $adminid, $remark)
	{
		$date=date("y/m/d");
		$insertproduct="insert into product(type,national_id,ubutaka,permi,passport,other_product,description,owner,advert_date) values('".$itangazo."','".$irangamuntu."','".$ubutaka."','".$perimi."','".$passport."','".$ibindi."','".$description."','".$nyirabyo."','".$date."')";
		$resultproduct=$this->db->query($insertproduct) or mysqli_error();
		if ($resultproduct) {
			$lastid=$this->db->insert_id;
			$sql1 = $this->db -> query("insert into product_detail(product_id,issue_district,issue_sector,advert_district,advert_sector,date) values('".$lastid."','".$akarerebyatangiwe."','".$umurengebyatangiwe."','".$akarerebyabuze."','".$umugi."','".$itariki."')");
			$sql2=  $this->db->query("insert into customer_detail(product_id,name,phone,email,district,sector) values('".$lastid."','".$amazinayuwataye."','".$telefone."','".$email."','".$livedistrict."','".$livecity."')");
			$sql3 = $this->db->query("INSERT INTO admin_property_post(admin_id,product_id,remarks) VALUES('".$adminid."','".$lastid."','".$remark."')");
			if (($sql1 && $sql2 && $sql3) == TRUE){
				if (!empty($national_no || $ubutaka_no || $perimi_no || $passport_no)) {
					$sql4 = $this->db -> query("insert into proterty_number(product_id,national_idno,ubutaka_no,permi_no,passport_no) values('".$lastid."','".$national_no."','".$ubutaka_no."','".$perimi_no."','".$passport_no."')");
					$insertsuccess = TRUE;
				}
				else{
					$insertsuccess = TRUE;
				}
				
				if($insertsuccess == TRUE){
					$_SESSION["lastid"] = $lastid;
				    return $_SESSION["lastid"];
				}
				
			}
		}
	}



	// 


	public function Get_total_uplods()
	{
		$fetch=$this->db->query("SELECT * FROM product");
		return $fetch->num_rows;
	}



	// 



	public function Get_success_product()
	{
		$fetch=$this->db->query("SELECT * FROM product WHERE status=1");
		return $fetch->num_rows;
	}



	// 



	public function Get_lost_product()
	{
		$fetch=$this->db->query("SELECT * FROM product WHERE type='byarabuze'");
		return $fetch->num_rows;
	}



	// 



	public function Get_found_product()
	{
		$fetch=$this->db->query("SELECT * FROM product WHERE type='byaratoraguwe'");
		return $fetch->num_rows;
	}



	// 



	public function Get_todays_product()
	{
		$fetch=$this->db->query("SELECT * FROM product WHERE type='byaratoraguwe'");
		return $fetch->num_rows;
	}



	













}

?>