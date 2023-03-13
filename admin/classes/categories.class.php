<?php


class Category
{
	private $db;
	
	function __construct($db)
	{
		$this->db=$db;
	}


	public function getCategory()
	{
		$count=1;
		$sql=$this->db->query("SELECT * FROM categories");
		while ($row=$sql->fetch_assoc()) {
			echo "<tr>
        			<td>".$count++."</td>
        			<td>".$row['ubwoko']."</td>
        			<td><button class='btn btn-info'><i class='fas fa-pencil-alt'>&nbsp&nbsp&nbspEdit</button></td>
        		</tr>";
		}
	}


	public function AddCategory($value)
	{
		$sql=$this->db->query("INSERT INTO categories(ubwoko) VALUES('".$value."')");
		$sql1=$this->db->query("ALTER TABLE product ADD ".$value." int(1) NOT NULL AFTER passport");
		$sql2=$this->db->query("ALTER TABLE proterty_number ADD ".$value." text(20) NOT NULL AFTER passport_no");
		if ($sql && $sql1 && $sql2) {
			$_SESSION['categoryadded']="New Category Added.";
			return header("location: categories.php");
		}
		else{
			echo "string";
		}
	}


}


?>