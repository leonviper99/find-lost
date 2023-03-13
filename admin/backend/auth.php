<?php
if (!isset($_SESSION['administrative_permission'])) {
	
	if (isset($_SESSION['last_admin'])) {
		header("location: pages/lockscreen.php");
	}
	else{
		header("location: index.php");
	}
}
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 600;
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
   	$_SESSION['last_admin']=$_SESSION['administrative_permission'];
    unset($_SESSION['administrative_permission']);
    header("location: pages/lockscreen.php");
}
$_SESSION['LAST_ACTIVITY'] = $time;

?>