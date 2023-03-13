<?php
include 'connect.php';
include '../All.classes.php';
session_start();
if (isset($_POST['foundsubmit'])) {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $item=$_POST['item'];


    $main->Success_Property($name, $phone, $email, $item);

}

?>