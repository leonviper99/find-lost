<?php
include 'connect.php';
session_start();
$sql=$db->query("UPDATE admin SET active_status=NOW() WHERE id='".$_SESSION['administrative_permission']."'");
session_destroy();
header("location: ../index.php");
?>