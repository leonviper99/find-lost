<?php 
include 'backend/connect.php';
include 'backend/geturl.php';
include 'functions.php';
session_start();
include 'All.classes.php';
$property=$property1=$property2=$property3="";
$item = $_GET["propertyid"];
$fetchproduct=mysqli_query($db,"SELECT * FROM product WHERE id='".$item."'");
	$row= $fetchproduct->fetch_assoc();
if (empty(getImages($row["id"]))) {
	if ($row["national_id"] == "1") {
		$img ='http://www.rangisha.com/images/no_image/irangamuntu.png';
	}
	elseif ($row["ubutaka"] == "1") {
		$img ='http://www.rangisha.com/images/no_image/ubutaka.png';
	}
	elseif ($row["permi"] == "1") {
		$img ='http://www.rangisha.com/images/no_image/permi.png';
	}
	elseif ($row["passport"] == "1") {
		$img ='http://www.rangisha.com/images/no_image/pass.png';
	}
	else {
		$img ='http://www.rangisha.com/images/no_image/no_images.png';
	}
}
else{
	$custm=getCustomer($row['id']);
	$img ='http://www.rangisha.com/productimages/'.$custm.'/'.getImages($row['id']);
}
if ($row["national_id"] == "1") {
$property= "Irangamuntu - ";
}
if ($row["ubutaka"] == "1") {
$property1= "Icyangomba cy'ubutaka - ";
}
if ($row["permi"]) {
$property2= "Permi - ";
}
if ($row["passport"]) {
$property3= "Passport - ";
}
$propertyfull=$property.$property1.$property2.$property3.$row["other_product"];


if($row['type'] == "byarabuze"){$type= "nabuze";}else{$type=  "natoraguye";}
$pot="Nitwa: ".getCustomer($row['id'])."  | ".$type.": ".$propertyfull;
if (!empty($row['description'])) {
	$description = $row['description'];
}
else{
	$description = "Ranga ibyabuze - ibyatoraguwe";
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rangisha-ibyabuze//ibyatowe</title>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Rangisha ibyabuze / ibyatoraguwe">
  <meta name="keywords" content="rangisha ni urubuga rugufasha gushaka no kuranga ibyabuze ibyatoraguwe kuburyo bworoshye. Rangisha ihuza uwataye nuwatoye">
  <meta name="keywords" content="Turanga amarangamuntu passport ibyangombwa by'ubutaka perimi ikarita za bank nibindi byinshi">


    <meta property="og:title" content="<?php echo $pot; ?>">
    <meta property="og:site_name" content=Rangisha.com>
    <meta property="og:description" content="<?php echo $description; ?>">

    <meta property="og:url" content="<?php echo($url); ?>" />
    <meta property="og:image" content="<?php echo $img; ?>">
    <meta property="og:image:secure_url" content="<?php echo $img; ?>">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
  
  <!-- Favicon -->
  <link href="images/logo/icon/logo.png" rel="shortcut icon"/>

    <link rel="stylesheet" type="text/css" href="styles/protertyview.css">
  <link rel="stylesheet" href="styles/fancybox.min.css">
  <link rel="stylesheet" href="styles/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="styles/header.css">
  <link rel="stylesheet" type="text/css" href="styles/footer.css">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="styles/magnific-popup.css"/>
  <link rel="stylesheet" href="styles/slicknav.min.css"/>
  <link rel="stylesheet" href="styles/owl.carousel.min.css"/>
  <link rel="stylesheet" href="styles/style.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles/protertyview.css">
    <link rel="stylesheet" href="styles/style.css">
    
  </head>
  <body>
  	<?php include 'header.php';?>
    <div class="page containe p-1 mt-1 mt-lg-3 mx-1 mx-sm-3 mx-lg-5">
      <div  class="row">
        <div class="col-lg-8">

        	<!-- ################# IMAGE Slides for medium and large screen  ################# -->

          <div class="product-images border-royalblue p-2 d-none d-sm-block text-center">
          	<?php
          		$fetchproduct=mysqli_query($db,"SELECT * FROM product WHERE id='".$item."'");
          		$row= $fetchproduct->fetch_assoc();
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
			?>
          	<div class="swiper-container gallery-top">
				<div class="swiper-wrapper">
					<?php 
					$selectimage= $db ->query("SELECT * FROM product_images JOIN customer_detail on product_images.product_id=customer_detail.product_id  WHERE product_images.product_id='".$item."'");
			              if ($selectimage ->num_rows >0) {
			              while ($row = $selectimage ->fetch_assoc()) { ?>
					<div class="swiper-slide cover" style="background-image: url('productimages/<?php echo $row["name"]."/".$row["images"] ?>');">
					  <a href="productimages/<?php echo $row["name"]."/".$row["images"] ?>" data-fancybox="gallery" class="zoom bordered"><span class="fa fa-search"></span></a>
					  <div class="img-info">
					    <span class="btn-toggle-expand"><span class="icon-call_made"></span></span>
					    <div class="img-info-content">
					      <h2>Image Title Here 2</h2>
					      <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, ipsam, illo dolorum laboriosam voluptatum laudantium.</p>
					    </div>
					  </div>
					</div>
					<?php } ?>
				</div>
				<div class="swiper-button-next swiper-button-white bg-secondary"></div>
			    <div class="swiper-button-prev swiper-button-white bg-secondary"></div>
			</div>
			<div class="swiper-container gallery-thumbs">
				<div class="swiper-wrapper">
					<?php
					$selectimage= $db ->query("SELECT * FROM product_images JOIN customer_detail on product_images.product_id=customer_detail.product_id  WHERE product_images.product_id='".$item."'");
					 while ($row = $selectimage ->fetch_assoc()) { ?>
					<div class="swiper-slide cover" style="background-image:url('productimages/<?php echo $row["name"]."/".$row["images"] ?>')"></div>
					<?php } }
					else{
						echo "<div class='text-center'><h1 class='text-muted mt-5'>No images</h1></div>";
					}
					?>
				</div>
			</div>
			<?php } ?>
		  </div>

		  <!-- ################# IMAGE Slides for medium and large screen  ################# -->


		  <div class="product-images border-royalblue p-2 d-sm-none text-center">
		  	<?php
          		$fetchproduct=mysqli_query($db,"SELECT * FROM product WHERE id='".$item."'");
          		$row= $fetchproduct->fetch_assoc();
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
        </div>
	      <div class="col-lg-4">
	        <?php
	        $fetchproduct="SELECT * FROM product inner join product_detail on product.id=product_detail.product_id join customer_detail on product.id=customer_detail.product_id WHERE product.id='".$item."'";
	        $fetch=$db->query($fetchproduct);
	        $row=$fetch->fetch_assoc();
	        ?>
	        <div class="property-content">
	          <div>
	            <div class="share-container text-center pb-2 pt-2 pt-lg-0">
	              <span class="text-century"><strong class="text-dark" style="font-size: 20px">Bisangize Abandi</strong></span><br>
	              <span class="mx-1 bg-primar">
	              		<a href="http://www.facebook.com/sharer.php?u=<?php echo($url); ?>" data-toggle="tooltip" data-placement="top" title="Share on Facebook">
	              			<span class="bg-light"><img src="images/facebook.png" width="30"></span><small></small>
	              		</a>
	              </span >
	              <span class="mx-1"><b class="border-royalblu px-1"><a href="https://wa.me/?text=<?php echo($url); ?>" targe="_blank"><img src="images/whatsapp-logo.com.png" width="30" data-toggle="tooltip" data-placement="top" title="Share on Whats'up"></a></b></span>
	              <span class="mx-1"><b class="border-royalblu px-1"><a href="https://www.linkedin.com/shareArticle?url=<?php echo($url); ?>"  data-toggle="tooltip" data-placement="top" title="Share on Linkedin"><img src="images/linkedin.png" width="30"></a></b></span>             
	            </div>
	            <div class="info-container mt-3">
	              <section class="mt-2 p-1">
	                <?php
	                if ($row["type"] == "byarabuze") {
	                  echo "<span><b>Amazina yanditse kubyabuze:</b></span>";
	                }
	                else{
	                  echo "<span><b>Amazina yanditse kubyatowe:</b></span>";
	                }
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
	                    echo "Irangamuntu - ";
	                  }
	                  if ($row["ubutaka"] == "1") {
	                    echo "Icyangomba cy'ubutaka - ";
	                  }
	                  if ($row["permi"]) {
	                    echo "Permi - ";
	                  }
	                  if ($row["passport"]) {
	                    echo "Passport - ";
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
	                if ($row["type"] == "byarabuze") {
	                  echo "<span><b>Byaburiye:</b></span>";
	                }
	                else{
	                  echo "<span><b>Byatoraguwe:</b></span>";
	                }
	                echo "<span>&nbsp&nbsp&nbsp".$row["advert_district"].",".$row["advert_sector"]."</span>";
	                ?>
	                </section>
	                <div class="line"></div>
	                <section class="mt-2 p-1">
	                  <?php
	                if ($row["type"] == "byarabuze") {
	                  echo "<span><b>Byabuze:</b></span>";
	                }
	                else{
	                  echo "<span><b>Byatoraguwe:</b></span>";
	                }
	                echo "<span>&nbsp&nbsp&nbsp".$row["date"]."</span>";
	                ?>
	                </section>
	                <div class="line"></div>
	                <section class="mt-2 p-1">
	                  <?php
	                if ($row["type"] == "byarabuze") {
	                  echo "<span><b>Uwabibuze:</b></span>";
	                }
	                else{
	                  echo "<span><b>Uwabitoye:</b></span>";
	                }
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
	                  <span>&nbsp&nbsp&nbsp<?php echo substr($row["advert_date"], 0, 10); ?></span>
	                </section>
	            </div>            
	            <div class="">
	                <section class="mt-2 p-1">
	                  <?php
	                 if ($row["status"] == "0") {
	                ?>
	                    <div class="pb-4">
	                    	<a href="propertyconfirmation.php?property=<?php echo($item); ?>" class="btn btn-block btn-primary py-2 py-md-4"><h4>Kanda hano tuguhuze nuwatanze itangazo</h4></a>
	                    </div>
	                <?php } else{
	                  echo("<div class='alert alert-success my-2 text-center'><b>byarabonetse<b/></div>");
	                }
	                 ?>
	                </section>
	            </div>
	          </div>
	        </div>
	      </div>
    </div>
    <div class="container my-sm-1 my-md-4 p-2 rounded bordered">
    	<h5>Mukiriya mwiza uramutse usanze uwataye ibi bintu umuzi cyangwa uwabitoye ukaba umuzi ukurikije information zatanzwe haruguru wakwihutira kumumenyesha cyangwa ukaba wanabisangiza abandi kumbuga nkoranyambaga muma groupe atandukanye kugira turusheho gufashanya.</h5>
    </div>
  </div>
  <?php include 'footer.php';?>


  <script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
  </script>

  <script src="js/image-slider/jquery-3.3.1.min.js"></script>
  
  <script src="js/owl.carousel.min.js"></script>
  <!-- <script src="js/jquery.stellar.min.js"></script> -->
  <script src="js/image-slider/jquery.countdown.min.js"></script>
  <script src="js/image-slider/jquery.magnific-popup.min.js"></script>
  <script src="js/image-slider/aos.js"></script>

  <script src="js/image-slider/jquery.fancybox.min.js"></script>
  <script src="js/image-slider/swiper.min.js"></script>
  <script src="js/image-slider/main.js"></script>


  <script src="js/main.js"></script>

  
    
  </body>
</html>