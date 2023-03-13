<?php

/**
* 
*/
class visitors
{

	private $db;

	function __construct($db)
	{
		$this->db=$db;
	}



	// 



	public function Get_total_visitors()
	{
		$fetch=$this->db->query("SELECT SUM(views) as views FROM visitors");
		while ($row=$fetch->fetch_assoc()) {
			if ($row['views'] == 0) {
				return 0;
			}
			else{
				return $row['views'];
			}
			
		}		
	}


	// 



	public function Get_today_visitors()
	{
		$date=date("Y-m-d");
		$fetch=$this->db->query("SELECT  views FROM visitors WHERE date='".$date."'");
		if ($fetch->num_rows >0) {
			$row=$fetch->fetch_assoc();
			return $row['views'];
		}
		else{
			return 0;
		}				
	}




	// 



	public function Get_vistors_detail()
	{
		$count=1;
		$sql=$this->db->query("SELECT * FROM visitors order by id desc");
		while ($row=$sql->fetch_assoc()) {
			echo "<tr>
        			<td>".$count++."</td>
        			<td>".$row['date']."</td>
        			<td>".$row['views']."</td>
        		</tr>";
		}
	}




}


?>