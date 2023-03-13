<?php
include 'backend/connect.php';
include 'backend/geturl.php';
session_start();
include 'All.classes.php';

$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 600;
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
    header("location: index.php");
}
$_SESSION['LAST_ACTIVITY'] = $time;



if (isset($_GET['re_advert'])) {
	$update=mysqli_query($db,"UPDATE product set status='0' WHERE id='".$_SESSION['code']."'");
	if ($update) {
		$sql=mysqli_query($db,"DELETE FROM foundcontact WHERE product_id='".$_SESSION['code']."'");
		if ($sql) {
			header("location: checklostproperty.php");
		}
	}
}


if (isset($_GET['deleteproperty']) == 'delete') {
	$sql="DELETE FROM product WHERE id='".$_SESSION['code']."' ;";
	$sql .="DELETE FROM product_detail WHERE product_id='".$_SESSION['code']."';";
	$sql .="DELETE FROM customer_detail WHERE product_id='".$_SESSION['code']."';";
	$sql .="DELETE FROM product_images WHERE product_id='".$_SESSION['code']."'";
	if ($db->multi_query($sql) === TRUE) {?>
		<script type="text/javascript">
			// alert('Usibite itangazo washyize kururubuga.')
			window.location='index.php';
			</script>
	<?php }
	else{
		echo "fail";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Rangisha-ibyabuze//ibyatowe</title>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="industry, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Favicon -->
  <link href="images/logo/icon/logo.png" rel="shortcut icon"/>
	<link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/style.css"/>
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" href="styles/magnific-popup.css"/>
	<link rel="stylesheet" href="styles/slicknav.min.css"/>
	<link rel="stylesheet" href="styles/owl.carousel.min.css"/>
  <style type="text/css">
.share-container {
	background: #F5F5F5;
}
.info-container{
	border: 1px solid #696969;
}
.line{
	margin: auto;
	width: 80%;
	margin-top: 4px;
	border-bottom: 1px solid rgb(0,0,0,0.3);
}

@media (max-width: 767px){
	.line{
		width: 98%;
	}
}
  </style>
</head>
<body>
	
	<?php include 'header.php';



	$sql=mysqli_query($db,"SELECT * FROM product inner join customer_detail on product.id=customer_detail.product_id join product_detail on product.id=product_detail.product_id  WHERE product.id='".$_SESSION['code']."'");
	$row=mysqli_fetch_assoc($sql);

	// echo $row['owner'];

?>
<div class="page container bordered rounded py-2 my-2">
	<div class="property-check">
		<div class="property-check-header py-2">
			<h2><b>Suzuma niba ibyo washyize kururur'urubuga Byarabonetse</b></h2>
		</div>
		<div class="property-check-content">
			<div class="row">
				<div class="col-lg-7">
					<?php
					if ($row['status'] == "1") {
						echo '<div class="alert alert-success"><h5><b>Ibyo washyize kururubuga byarabonetse</b></h5></div>';
					}
					else{
						echo '<div class="alert alert-danger"><h5><b>Ibyo washyize kururubuga uwabitoye ntaraboneka</b></h5></div>';
					}
					?>
					
					<div class="image-container"></div>



					<div class="info-container mt-3">
		              <section class="mt-2 p-1">
		                <?php
		                  echo "<span><b>Amazina yanditse kubyabuze:</b></span>";
		                echo "<span>&nbsp&nbsp&nbsp".$row["owner"]."</span>";
		                ?>
		                </section>
		                <div class="line"></div>
		                <section class="mt-2 p-1">
		                  <?php
		                  if ($row["type"] == "byarabuze") {
		                    echo "<span><b>Ibyabuze:&nbsp&nbsp&nbsp</b></span>";
		                  }
		                  else{
		                    echo "<span><b>Ibyatoraguwe:&nbsp&nbsp&nbsp</b></span>";
		                  }
		                  if ($row["national_id"] == "1") {
		                    echo "Irangamuntu- ";
		                  }
		                  if ($row["ubutaka"] == "1") {
		                    echo "Icyangomba cy'ubutaka- ";
		                  }
		                  if ($row["permi"]) {
		                    echo "Permi- ";
		                  }
		                  if ($row["passport"]) {
		                    echo "Passport- ";
		                  }
		                  echo($row["other_product"]);
		                ?>
		                </section>
		                <div class="line"></div>
		                <?php
		                  if (!empty($row['issue_district'])) {
		                    echo "<span class='mt-2 p-1'><b>Byatangiwe:</b>&nbsp&nbsp&nbsp</span>".$row['issue_district'].",".$row['issue_sector'].'<div class="line"></div>';
		                  }
		                ?>

		                <section class="mt-2 p-1">
		                  <?php
		                  echo "<span><b>Byaburiye:</b></span>";
		                echo "<span>&nbsp&nbsp&nbsp".$row["advert_district"].",".$row["advert_sector"]."</span>";
		                ?>
		                </section>
		                <div class="line"></div>
		                <section class="mt-2 p-1">
		                  <?php
		                  echo "<span><b>Byabuze:</b></span>";
		                echo "<span>&nbsp&nbsp&nbsp".$row["date"]."</span>";
		                ?>
		                </section>
		                <div class="line"></div>
		                <section class="mt-2 p-1">
		                  <?php
		                  echo "<span><b>Uwabibuze:</b></span>";
		                echo "<span>&nbsp&nbsp&nbsp".$row["name"]."</span>";
		                ?>
		                </section>
		                <div class="line"></div>
		                <section class="mt-2 p-1">
		                  <span><small><b>Andi makuru:</b>&nbsp&nbsp&nbsp</small></span>
		                  <span class="d-table border-royalblue bg-secondary text-light px-1"><?php echo($row["description"]); ?></span>
		                </section>
		                <div class="line"></div>
		                <section class="mt-2 p-1">
		                  <span><b>Ritanzwe:</b></span>
		                  <span>&nbsp&nbsp&nbsp<?php echo($row["advert_date"]); ?></span>
		                </section>
		            </div>  





				</div>
				<div class="col-lg-5">
					<div>
						<div class="share-container text-center py-2 text-center">
							<section class="mx-1 text-century mb-1"><strong class="">Ushobora kubisangiza Abandi&nbsp</strong></section>
							<span class="mx-1"><b class="border-royalblue py-1 px-2 rounded"><a href="
								http://www.facebook.com/sharer.php?u=rangisha.com/propertyview.php?propertyid=<?php echo($_SESSION['code']); ?>"><img src="images/facebook.png" width="19"></a></b></span>
							<span class="mx-1"><b class="border-royalblue py-1 px-2 rounded"><a href="https://wa.me/?text=rangisha.com/propertyview.php?propertyid=<?php echo($_SESSION['code']); ?>"	target="_blank"><img src="images/whatsapp-logo.com.png" width="19"></a></b></span>
							<span class="mx-1"><b class="border-royalblue py-1 px-2 rounded"><a href="https://www.linkedin.com/shareArticle?url=rangisha.com/propertyview.php?propertyid=<?php echo($_SESSION['code']); ?>"><img src="images/linkedin.png" width="19"></a></b></span>								
						</div>
						<?php
						 if ($row['status'] == "1") { 
						 	$found=mysqli_query($db,"SELECT * FROM foundcontact WHERE product_id='".$_SESSION['code']."'");
						 	$res=mysqli_fetch_assoc($found);
						 	?>
						 	<div class="mt-3 p-2">
						 		<div class="border rounded">
						 			<div class="found-header text-info text-center" style="border-bottom: 1px solid #C0C0C0;">
						 				<h6><strong>Ibyo washyize kururu rubuga uwabitoye yabonetse.Tunabashimira kubwicyizere cyanyu</strong></h6>
						 			</div>
						 			<div class="px-2">
						 				<small class="text-center text-danger"><b>Umwirondoro we:</b></small>
							 			<section>
							 				<b>Uwabitoye:</b>&nbsp<span><?php echo($res['found_name']) ?></span>
							 			</section>
							 			<section class="mt-1">
							 				<b>Nimero ye:</b>&nbsp<span><?php echo($res['found_phone']) ?></span>
							 			</section>
							 		</div>
							 		<div class="container my-2">
							 			<a href="checklostproperty.php?re_advert=advert" onclick="return confirm('Emeza ko Ushaka gusubiza itangazo kurubuga?')" class="btn btn-block btn-secondary"><b>Uramutse usanze uwatanze contact ibyo afite bidahura nibyo washakaga kanda hano bisubire kurubuga</b></a>
							 		</div>
						 		</div>
						 		
						 	</div>
						 <?php }
						 ?>
						<div class="container">
							<div class="mt-3">
									<a href="editproperty.php" class="btn btn-block btn-info"><b>Kanda hano ubashe gukosora ibyo washyizeho</b></a>
							</div>
							<div class="mt-3">
									<a href="checkproperty.php?deleteproperty=delete" onclick="return confirm('Are you sure to delete?')" class="btn btn-block btn-danger"><b>Kanda hano ubashe gusiba ibyo washyizeho</b></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>
</body>
<!-- <script type="text/javascript">
function confirmation(){
    var result = confirm("Are you sure to delete?");
    if(result){
        // Delete logic goes here
    }
}
</script> -->
</html>