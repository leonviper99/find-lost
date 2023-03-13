<?php
include'backend/connect.php';
session_start();
include 'All.classes.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Rangisha-ibyabuze//ibyatowe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Favicon -->
  <link href="images/logo/icon/logo.png" rel="shortcut icon"/>
  <link rel="stylesheet" href="styles/magnific-popup.css"/>
  <link rel="stylesheet" href="styles/slicknav.min.css"/>
  <link rel="stylesheet" type="text/css" href="styles/footer.css">
  <link rel="stylesheet" type="text/css" href="styles/header.css">
  <link rel="stylesheet" type="text/css" href="styles/.css">

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="styles/style.css"/>
<style type="text/css">
.fetched-product .product-detail{
  border-bottom: 1px solid black;
}
.product-detail img{
  height: 140px;
  max-width: 140px;
}
small{
  font-size: 15px;
}
</style>
</head>
<body class="bg-light">

<?php include'header.php'; include'functions.php'; ?>

<div class="page px-xl-5">

  <div class="product-container containe px-3 px-sm-5 px-md-3 px-lg-3 mb-3">


    <?php

     if (isset($_POST['search'])) {

       $_SESSION['name']=$_POST['property'];
     }

       $keyname="%".$_SESSION['name']."%";


       $sql = mysqli_query($db,"SELECT * FROM product inner join product_detail on product.id=product_detail.product_id  WHERE owner LIKE '".$keyname."' or (issue_district LIKE '".$keyname."' or advert_district LIKE '".$keyname."' or issue_sector LIKE '".$keyname."' or advert_sector LIKE '".$keyname."')");
       if (mysqli_num_rows($sql) == 0) {
         $sql = mysqli_query($db,"SELECT * FROM proterty_number inner join product on product.id=proterty_number.product_id inner join product_detail on product.id=product_detail.product_id  WHERE national_idno LIKE '".$keyname."' or ubutaka_no LIKE '".$keyname."' or permi_no LIKE '".$keyname."' or passport_no LIKE '".$keyname."'");
       }
       if (mysqli_num_rows($sql) > 0) {
        $count=mysqli_num_rows($sql);
          echo "<div class='text-center'><h4>Result zibonetse: <u>".$count."</u></h4></div>";
          echo"<div class='row'>";
          while ($row=mysqli_fetch_assoc($sql)) {?>
            <div class="col-md-6 col-xl-4 fetched-product mt-5"><a href="propertyview.php?propertyid=<?php echo $row["product_id"] ?>">
              <div class="product-detail media">
                  <?php

                    if (empty(getImages($row["product_id"]))) {
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
                        echo '<img src="productimages/'.getCustomer($row["product_id"]).'/'.getImages($row["product_id"]).'">';
                      }

                  ?>
                <div class="product-info py-1 px-1 border rounded media-body ml-1">
                  <div class="text-center"><h5><?php echo($row["type"]); ?></h5></div>
                  <?php if (!empty($row["owner"])) {?>
                    <section class="mt-1">
                      <small><strong class="text-dark">Amazina yanditse: </strong></small>
                      <small>
                        <?php if (empty($row["owner"])) {
                          echo "N/A";
                        } else{
                          echo $row["owner"];
                        } ?>
                      </small>
                    </section>
                  <?php } ?>
                  <section class="mt-1">
                    <small><strong class="text-dark"><?php if ($row["type"] == "byarabuze") { echo"Byaburiye"; }else{echo"Byatoraguwe"; }?>:&nbsp</strong></small><small><?php echo $row["advert_district"].",".$row["advert_sector"]; ?></small>
                  </section>
                  <?php if (!empty($row["issue_district"])) {?>
                    <section class="mt-1">
                      <small><strong  class="text-dark"> Byatangiwe: &nbsp</strong></small>
                      <small>
                        <?php if (empty($row["issue_district"])) {
                          echo "N/A";
                        }else{
                          echo $row["issue_district"].",".$row["issue_sector"];
                        }  ?>
                      </small>
                    </section>
                  <?php } ?>
                  <section class="mt-1">
                    <small><strong class="text-dark"> <?php if ($row["type"] == "byarabuze") { echo"Byabuze ku"; }else{echo"byatoraguwe ku"; }?>: &nbsp</strong></small><small><?php echo $row["date"];  ?></small>
                  </section>
                </div>
              </div></a>
            </div>
         <?php }
         echo "</div>";
       }
       else {
         echo "<h3>Ibyo washatse ntibibashije kuboneka. Ongera ugerageze undi mwirondoro</h3>";
       }
     
      // <script type='text/javascript'>
      // alert('Usibite itangazo washyize kururubuga.')
      // window.location='index.php';
      // </script>
    


    ?>




  </div>

</div>
<?php include'footer.php';?>
  <!--====== Javascripts & Jquery ======-->
  <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>

<script src="js/circle-progress.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>