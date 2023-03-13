<?php


function getCustomer($productId){
	global $db;
	$array=array();
	$fetchproduct = "SELECT * FROM customer_detail WHERE product_id='$productId'";
	$fetchresult = $db->query($fetchproduct);
	$row = $fetchresult->fetch_assoc();
		$array['name']=$row['name'];
		$array['id']=$row['id'];
		$array['phone']=$row['phone'];
		$array['email']=$row['email'];	
		$array['district']=$row['district'];
		$array['sector']=$row['sector'];

	return $array;
}

function getProductDate($productId){
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

function substrwords($text, $maxchar, $end='...') {
  if (strlen($text) > $maxchar || $text == '') {
      $words = preg_split('/\s/', $text);      
      $output = '';
      $i      = 0;
      while (1) {
          $length = strlen($output)+strlen($words[$i]);
          if ($length > $maxchar) {
              break;
          } 
          else {
              $output .= " " . $words[$i];
              ++$i;
          }
      }
      $output .= $end;
  } 
  else {
      $output = $text;
  }
  return $output;
}

?>