<?php


/**
* 
*/
class Visitor
{
	private $db;
	private $date;
	
	function __construct($db)
	{
		$this->db=$db;
		$this->date=date("Y-m-d");
	}


	// CHECK IF USER ALREADY EXIST


	function is_unique_view($visitor_ip)
	{
		// $query = "SELECT * FROM page_views WHERE visitor_ip='$visitor_ip' AND page_id='$page_id'";
		$query = "SELECT * FROM visitors WHERE date='".$this->date."'";
		$result = $this->db-> query($query);
		
		if($result->num_rows == 0 )
		{
			$query=$this->db->query("INSERT INTO visitors(date) VALUES('".$this->date."')");
			return TRUE;			
		}
		else{
			if (!isset($_SESSION["viewer"])) {
				$_SESSION["viewer"]="";
			}

			if ($_SESSION["viewer"] == $this->date) {
			   return FALSE;
			}
			else{
			   return TRUE;
			}
		}
	}



	// ADD VISITOR VIEW



	function add_view($visitor_ip)
	{
		if($this->is_unique_view($visitor_ip) === TRUE)
		{
			$query=$this->db->query("UPDATE visitors SET views = views + 1 WHERE date='".$this->date."'");
			
			if($query)
			{
				$_SESSION["viewer"] = $this->date;
				return $_SESSION["viewer"];
			}

		}
	}
}



?>