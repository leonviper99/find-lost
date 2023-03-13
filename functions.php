<?php


function getCustomer($productId){
	global $db;
	$fetchproduct = "SELECT * FROM customer_detail WHERE product_id=$productId";
	$fetchresult = $db->query($fetchproduct);
	$row = $fetchresult->fetch_assoc();

	return $row['name'];
}

function getImages($productId){
	global $db;
	$fetchproduct = "SELECT * FROM product_images WHERE product_id=$productId";
	$fetchresult = $db->query($fetchproduct);
	$row = $fetchresult->fetch_assoc();

	return $row['images'];

}
function getProductDetail($productId){
	global $db;
	$array=array();
	$fetchproduct = "SELECT * FROM product_detail WHERE product_id=$productId";
	$fetchresult = $db->query($fetchproduct);
	$row = $fetchresult->fetch_assoc();
	$array['issue_district']=$row['issue_district'];
	$array['issue_sector']=$row['issue_sector'];
	$array['advert_district']=$row['advert_district'];
	$array['advert_sector']=$row['advert_sector'];
	$array['date']=$row['date'];

	return $array;

}

function TimeAgo ($oldTime) {
	date_default_timezone_set('Africa/Kigali');
    $timestamp = strtotime($oldTime);	
	   
	   $strTime = array("sec", "min", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");
	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i];
	   }
}

?>