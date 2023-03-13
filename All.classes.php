<?php
include 'classes/visitor.class.php';
include 'classes/main.class.php';



$vistors=new Visitor($db);
$main = new MAIN($db);





$visitor_ip = $_SERVER['REMOTE_ADDR'];
$vistors->add_view($visitor_ip);
?>