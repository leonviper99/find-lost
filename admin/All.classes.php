<?php
include 'classes/admin.class.php';
include 'classes/product.class.php';
include 'classes/categories.class.php';
include 'classes/visitors.class.php';

$product= new product($db);
$admin = new Admin($db);
$category = new category($db);
$visitors = new visitors($db);

$admin_detail = $admin->getAdminDetail();
?>