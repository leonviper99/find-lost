<?php
include 'connect.php';
if (isset($_GET['productnumber'])) {

	$itemnumber=$_GET['productnumber'];

	$sql="DELETE FROM product WHERE id='".$itemnumber."' ;";
	$sql .="DELETE FROM product_detail WHERE product_id='".$itemnumber."';";
	$sql .="DELETE FROM customer_detail WHERE product_id='".$itemnumber."';";
	$sql .="DELETE FROM product_images WHERE product_id='".$itemnumber."'";
	if ($db->multi_query($sql) === TRUE){
		echo("<h1>Succsessful deleted</h1>");
	    echo '<meta http-equiv = "refresh" content="2 url=../product.php">';
	}
	else{
		echo "failled";
	}
}


?>