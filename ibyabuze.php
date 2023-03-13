<?php 
include 'backend/connect.php';
session_start();
include 'All.classes.php';
include 'functions.php';
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
  <link rel="stylesheet" type="text/css" href="styles/header.css">
  <link rel="stylesheet" type="text/css" href="styles/footer.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="styles/magnific-popup.css"/>
  <link rel="stylesheet" href="styles/slicknav.min.css"/>
  <link rel="stylesheet" href="styles/owl.carousel.min.css"/>

	<!-- Main Stylesheets -->
  <link rel="stylesheet" href="styles/style.css"/>


<style type="text/css">
.product-content a:hover{
	text-decoration: none;
}
.product-image{
	min-height: 222px;
}
.product-image img{
  		max-width: 100%;
  		max-height: 220px;
  	}
</style>
</head>
<body class="bg-light">

  <?php include 'header.php';?>

  <div class="page">
  	<div class="container">
  		<?php
		  if (isset($_SESSION['advertsuccess'])): {  ?>
		  	<div class="success-submit container">
		  		<div class="alert alert-secondary">
		  			<h3 class="text-center"><strong>Murakoze kubwitangazo ryanyu.</strong></h3>
			  		<?php
			  		  echo "<h5>Code&nbsp<b class='text-danger'>".$_SESSION['advertsuccess']."</b>&nbsp hamwe nanimero yatelefone wakoresheje uzabikoresha mugihe ushaka gusuzuma niba ibyo wataye byarabonetse.</h5>";
			  		  unset($_SESSION['advertsuccess']);
			  		?>
		  		</div>
		  	</div>
		<?php } endif;
		  if (isset($_SESSION['success'])): {
			  		  echo "<script type='text/javascript'>
				      alert('Urakoze kubwubufasha utanze turakoresha nimero na email utanze tuguhamagara.');
				      </script>";
			  		  session_destroy();
			  		} endif
		?>
  		<div class="product-container">
  			<div class="product-content">
  				<div class="row">
	  				<?php

	  				// $fetchproduct="select * from product inner join product_detail on product.id=product_detail.product_id join customer_detail on product.id=customer_detail.product_id join product_images on product.id=product_images.product_id where type='ibyabuze'";

	  				if (isset($_GET['page_no']) && $_GET['page_no']!="") {
						$page_no = $_GET['page_no'];
						} 
					else {
							$page_no = 1;
				        }

					$total_records_per_page = 12;
				    $offset = ($page_no-1) * $total_records_per_page;
					$previous_page = $page_no - 1;
					$next_page = $page_no + 1;
					$adjacents = "2"; 

					$result_count = mysqli_query($db,"SELECT COUNT(*) As total_records FROM `product` WHERE type='byarabuze' AND status='0'");
					$total_records = mysqli_fetch_array($result_count);
					$total_records = $total_records['total_records'];
				    $total_no_of_pages = ceil($total_records / $total_records_per_page);
					$second_last = $total_no_of_pages - 1; // total page minus 1

	  				$fetchproduct="SELECT * FROM product WHERE type='byarabuze' AND status='0' order by id desc LIMIT $offset, $total_records_per_page";
	  				$fetchresult=$db->query($fetchproduct);
	  				while ($row = $fetchresult->fetch_assoc()) {
	  					$productdetail=getProductDetail($row['id']);
	  					
	  					?>
	  					<div class="col-md-6 col-lg-4 mt-2">
	  						<a href="rangisha-lost-and-found-property-465728675<?php echo $row["id"] ?>">
	  						<div class="product-info border p-1 bg-white">

	  							<div class="product-image text-center">
	  								<?php 
	  									if (empty(getImages($row["id"]))) {
	  										if ($row["national_id"] == "1") {
	  											echo '<img src="images/no_image/irangamuntu.png">';
	  										}
	  										elseif ($row["ubutaka"] == "1") {
	  											echo '<img src="images/no_image/ubutaka.png">';
	  										}
	  										elseif ($row["permi"] == "1") {
	  											echo '<img src="images/no_image/permi.png">';
	  										}
	  										elseif ($row["passport"] == "1") {
	  											echo '<img src="images/no_image/pass.png">';
	  										}
	  										else {
	  											echo '<img src="images/no_image/no_images.png">';
	  										}
	  									}
	  									else{
	  										echo '<img src="productimages/'.getCustomer($row["id"]).'/'.getImages($row["id"]).'">';
	  									}
	  								?>

	  								
	  							</div>
	  							<div class="product-detail mt-2">
	  								<div class="bg-light mb-2">
	  									<span class="py-1 px-2 bg-danger rounded text-white"><small><strong><?php echo  $row["type"] ?></strong></small></span>
	  									<span class="px-1 float-right bg-primary rounded text-white"><small><strong><?php echo getCustomer($row["id"]) ?></strong></small></span>
	  									<section class="mt-1">
		  									<small><strong class="text-dark">Nyirabyo : </strong></small>
		  										<?php if (!empty($row["owner"])) {
		  											echo '<small>'.$row["owner"].'</small>';
		  										} else{
		  											echo "<b class='text-secondary'>&nbspN/A</b>";
		  										}
		  									    ?>	  									
		  								</section>
	  									<section class="mt-1">
		  									<small><strong class="text-dark">Byatangiwe : </strong></small>
	  									<?php if (!empty($productdetail['issue_district'])) {?><small><?php echo $productdetail['issue_district']." ".$productdetail['issue_sector']; ?></small>
	  									<?php }
	  										else{
	  											echo "<b class='text-secondary'>&nbspN/A</b>";
	  										}
	  									 ?>
		  								</section>
	  									<section class="mt-1">

		  									<small><strong class="text-dark">Byaburiye : </strong></small><small>
		  										<?php
		  											echo $productdetail['advert_district']." ".$productdetail['advert_sector'];
		  										?></small>
		  								</section>
	  									<section class="mt-1">
		  									<small><strong class="text-dark">Byabuze : </strong></small><small><?php echo $productdetail['date'] ?></small>
		  								</section>
	  								</div>
	  							</div>
	  						</div></a>
	  					</div>
	  				<?php }
						mysqli_close($db);
	  				 ?>
	  				 <div class="col-sm-12 py-5">


	  				 	<ul class="pagination">
							<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
						    
							<li <?php if($page_no <= 1){ echo "class='disabled page-item'"; } ?>>
							<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?> class="page-link">Previous</a>
							</li>
						       
						    <?php 
							if ($total_no_of_pages <= 10){  	 
								for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
									if ($counter == $page_no) {
								   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
										}else{
						           echo "<li class=''><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
										}
						        }
							}
							elseif($total_no_of_pages > 10){
								
							if($page_no <= 4) {			
							 for ($counter = 1; $counter < 8; $counter++){		 
									if ($counter == $page_no) {
								   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
										}else{
						           echo "<li class='page-item'><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
										}
						        }
								echo "<li><a>...</a></li>";
								echo "<li class='page-item'><a href='?page_no=$second_last'>$second_last</a></li>";
								echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
								}

							 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
								echo "<li><a href='?page_no=1'>1</a></li>";
								echo "<li><a href='?page_no=2'>2</a></li>";
						        echo "<li><a>...</a></li>";
						        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
						           if ($counter == $page_no) {
								   echo "<li class='active'><a>$counter</a></li>";	
										}else{
						           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
										}                  
						       }
						       echo "<li><a>...</a></li>";
							   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
							   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
						            }
								
								else {
						        echo "<li><a href='?page_no=1'>1</a></li>";
								echo "<li><a href='?page_no=2'>2</a></li>";
						        echo "<li><a>...</a></li>";

						        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
						          if ($counter == $page_no) {
								   echo "<li class='active'><a>$counter</a></li>";	
										}else{
						           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
										}                   
						                }
						            }
							}
						?>
						    
							<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled page-item'"; } ?>>
							<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?> class="page-link">Next</a>
							</li>
						    <?php if($page_no < $total_no_of_pages){
								echo "<li><a href='?page_no=$total_no_of_pages' class='page-link'>Last &rsaquo;&rsaquo;</a></li>";
								} ?>
						</ul>
	  				 	



	  				 </div>
	  			</div>
  				
  			</div>
  		</div>
  	</div>
  </div>
  <?php include 'footer.php';?>
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>