<?php
/**
* 
*/
class Admin
{
	private $db;
	private $user;
	
	public function __construct($db)
	{
		$this->db=$db;
	}


	//  ADMIN LOGIN




	public function Admin_login($email, $password)
	{
		$select=$this->db->query("SELECT * FROM admin WHERE email='".$email."' AND password='".$password."'");

		if ($select->num_rows == TRUE) {
		    $row=$select->fetch_assoc();
		    if ($row['category'] == "super") {
		      $_SESSION["super"]=$_POST['email'];
		    }
		    $_SESSION['administrative_permission']=$row['id'];
		    $sql=$this->db->query("UPDATE admin SET active_status='".$date."' WHERE id='".$_SESSION['administrative_permission']."'");
		    header("location: dashboard.php");
		}
		else{
		    $_SESSION["loginerror"]="Invalid Email or Password";
		    return $_SESSION["loginerror"];
		}
	}


	// ADMIN INFO



	public function getAdminDetail() {
		if (!isset($_SESSION['administrative_permission'])) {
			$_SESSION['administrative_permission']="";
		}
		$sql=$this->db->query("SELECT * from admin WHERE id ='".$_SESSION['administrative_permission']."'");
		$row=  mysqli_fetch_array($sql);
		$array=array();
		$array['firstname']=$row['fname'];
		$array['lastname']=$row['lname'];
		$array['phone']=$row['phone'];
		$array['email']=$row['email'];
		$array['duties']=$row['duties'];
		$array['location_city']=$row['location_city'];
		$array['education_level']=$row['education_level'];
		$array['skills']=$row['skills'];
		$array['admin_picture']=$row['admin_pic'];
 		return $array;
 	}


 	// ADMIN SESSION RESTORE



 	public function Restore_session($Id,$password)
 	{
 		$select=$this->db->query("SELECT * FROM admin WHERE id='".$Id."' AND password='".$password."'");
 		if ($select->num_rows >0) {
 			$_SESSION['administrative_permission']=$Id;
 			$sql=$this->db->query("UPDATE admin SET active_status=NOW() WHERE id='".$_SESSION['administrative_permission']."'");
 			header("location: ../dashboard.php");
 		}

 	}

}
?>