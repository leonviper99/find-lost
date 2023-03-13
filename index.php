<?php
include 'backend/connect.php';
session_start();
include 'All.classes.php';
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Rangisha-ibyabuze/ibyatowe</title>
  <meta name="keywords" content="ibyabuze / ibyatoraguwe / ibyatowe">
  <meta name="keywords" content="rangisha ni urubuga rugufasha gushaka no kuranga ibyabuze ibyatoraguwe kuburyo bworoshye. Rangisha ihuza uwataye nuwatoye">
  <meta name="keywords" content="Turanga amarangamuntu passport ibyangombwa by'ubutaka perimi ikarita za bank nibindi byinshi">
  <meta name="keywords" content="rangisha helps you to find lost property at cheap price">
  <meta name="keywords" content="We announce lost national identity | passport | driving permet | bank cards and many others">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Favicon -->
  <link href="images/logo/icon/logo.png" rel="shortcut icon"/>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">

  <!-- Stylesheets -->
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="styles/header.css">
  <link rel="stylesheet" type="text/css" href="styles/footer.css">
  <link rel="stylesheet" href="styles/bootstrap4/bootstrap.min.css"/>
  <link rel="stylesheet" href="styles/font-awesome.min.css"/>
  <link rel="stylesheet" href="styles/magnific-popup.css"/>
  <link rel="stylesheet" href="styles/slicknav.min.css"/>
  <link rel="stylesheet" href="styles/owl.carousel.min.css"/>


  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="styles/style.css"/>


  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>












  <div class="row">
        <div class="col-md-6">
                  <div class="card card-info">
                    <div class="card-header">
                      <h5>Register as new Student</h5>
                    </div>
                    <div class="card-body">
                      <div>
              <label for="acc_info"><strong>Student's names</strong></label>    
            </div>
            <div>
              <div class="form-group">
                <label for="fname">First name</label>
                <input type="text" class="form-control" name="fname" required>
              </div>
              <div class="form-group">                    
                <label for="lname">Last name</label>
                <input type="text" class="form-control" name="lname" required>
              </div>
            </div>
              <div class="form-group">
                <label for="student_id">User Name</label>
                <input type="text" class="form-control" name="username" required>
              </div>
              <div class="form-group">                    
                <label for="email">email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">                    
                <label for="school">School</label>
                <select class="custom-select" name="school" required>
                  <option>AIS</option>
                  <option>EPBITI</option>
                  <option>Glory PS</option>
                </select>
              </div>
              <div class="form-group">                    
                <label for="class">Class</label>
                <select class="custom-select" name="class" required>
                  <option>P1</option>
                  <option>P2</option>
                  <option>P3</option>
                </select>
              </div>  
              <div class="form-group">                    
                <label for="photo">Photo</label>
                <input type="file" class="form-control" name="picture" required>
              </div>
              <div>
                <label><strong>Student's Address</strong></label>
              </div>
                   <div class="form-group">                   
                    <label for="District">Location</label>
                    <input type="text" class="form-control" name="location" required>
                  </div>
                  <div class="form-group">
                    <label for="phone">Telephone(Student's or his/her Parent's)</label>
                    <input type="telephone" class="form-control" name="phone" required>
                  </div>

              <div class="form-group">                    
                <label for="password">password</label>
                <input type="password" class="form-control" name="pwd" required>
              </div>
              <div class="form-group">                    
                <label for="password">Confirm Your Password</label>
                <input type="password" class="form-control" name="cpwd" required>
              </div>
              </div>    
        </div>


















  <!-- Page Preloder -->
  <div id="prelode">
    <div class="loader"></div>
  </div>

  <!-- Header section  -->

  <?php include'header.php'; ?>
  
  
  <!-- Hero section  -->
  <section class="hero-section">
    <div class="hero-slider owl-carousel d-none d-md-block">
      <div class="hero-item set-bg" data-setbg="images/hero-slider/s1.png">
        <div class="container">
          <div class="row">
            <div class="col-xl-8">
              <h2><span class="text-light">Shakira ibyawe byabuze hano</span></h2>
              <a href="advert_form.php" class="site-btn sb-white mr-4 mb-3"><b>Tangira Nonaha</b></a>
              <a href="contact.php" class="site-btn sb-dark">Uko Bikorwa</a>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-item set-bg" data-setbg="images/hero-slider/1.jpg">
        <div class="container">
          <div class="row">
            <div class="col-xl-8">
              <h2><span class="text-light">Ranga ibyo watoye</span></h2>
              <a href="advert_form.php" class="site-btn sb-white mr-4 mb-3"><b>Tangira Nonaha</b></a>
              <a href="contact.php" class="site-btn sb-dark">Uko Bikorwa</a>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-item set-bg" data-setbg="images/hero-slider/s2.png">
        <div class="container">
          <div class="row">
            <div class="col-xl-8">
              <h2><span class="text-light">Biroroshye - Birahendutse - Birihuta</span></h2>
              <a href="advert_form.php" class="site-btn sb-white mr-4 mb-3"><b>Tangira Nonaha</b></a>
              <a href="contact.php" class="site-btn sb-dark">Uko Bikorwa</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-menu-container py-1 d-md-none" style="background-image: url(images/hero-slider/s4.png);">
      <div class="py-5">
        <form class="hero-menu mb-4">
          <a href="advert_form.php"><span class="site-btn"><h4>Ranga</h4></span></a>
          <a href="ibyabuze.php"><span class="site-btn"><h4>Ibyabuze</h4></span></a>
          <a href="ibyatoraguwe.php"><span class="site-btn"><h4> Ibyatoraguwe</h4></span></a>
          <!-- <a href=""><span class="site-btn"><h4>Ubuhamya</h4></span></a> -->
          <a href="contact.php"><span class="site-btn text-light"><h4>Contact Us!</h4></span></a>
        </form>
      </div>
    </div>
  </section>
  <!-- Hero section end  -->

  <!-- Services section  -->
  <section class="services-section mt-3">
    <div class="container">
      <h4>Turanga</h4>
      <div class="line mt-2"></div>
      <div id="client-carousel" class="client-slider owl-carousel">
        <div class="single-brand">
            <img src="images/no_image/irangamuntu.png" alt="">
        </div>
        <div class="single-brand">
            <img src="images/no_image/ubutaka.png" alt="">
        </div>
        <div class="single-brand">
            <img src="images/no_image/bankcard.png" alt="">
        </div>
        <div class="single-brand">
            <img src="images/no_image/pass.png" alt="">
        </div>
        <div class="single-brand">
            <img src="images/no_image/permi.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- Services section end  -->

  <!-- Features section   -->
  <section class="property-section bg-light spad set-bg">
    <div class="container">
      <div class="property-header text-center">
        <h2>Ibiherutse  </h2>
        
      </div>
      <div class="row">
        <?php
            include 'functions.php';
          $fetchproduct="SELECT * FROM product WHERE status='0' order by id desc LIMIT 12";
            $fetchresult=$db->query($fetchproduct);
            while ($row = $fetchresult->fetch_assoc()) { 
             $productdetail=getProductDetail($row['id']);
        ?>
        <div class="col-xl-3 col-lg-4 col-sm-6 mt-3">
          <div class="property-box card">
            <div class="property-img text-center">
              <small class="property-time px-1"><?php echo TimeAgo ($row['advert_date']); ?></small>

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
            <div class="property-text">
              <div class="advertiser text-center"><small class="px-1 text-success"><?php echo getCustomer($row["id"]); ?></small></div>
              <div class="text-info  lost-property">
                <b class="text-danger title"><?php if($row['type'] == "byarabuze"){echo "nabuze";}else{echo "<span class='text-primary'>natoraguye<span>";} ?>:</b>&nbsp<strong><i class="text-dark">
                  <?php
                    // if ($row["type"] == "byarabuze") {
                    //   echo "<span><b>Ibyabuze:&nbsp&nbsp&nbsp</b></span>";
                    // }
                    // else{
                    //   echo "<span><b>Ibyatoraguwe:&nbsp&nbsp&nbsp</b></span>";
                    // }
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
                  ?></i></strong>
              </div>
              <div class="text-info lost-property">
                <b class="text-dark">Amazina Yanditse:&nbsp&nbsp</b><i class="text-dark"><?php if (empty($row['owner'])) {
                  echo "<b>N/A</b>";} else echo $row['owner']; ?></i>
              </div>
              <div class="text-info">
                <?php if ($row['type'] == "byarabuze") {
                  echo "<b class='text-dark'>Byaburiye:</b>";
                }else{
                  echo "<b class='text-dark'>Byatoraguwe:</b>";
                }
                echo "&nbsp&nbsp<i class='text-dark'>".$productdetail['advert_district']." ".$productdetail['advert_sector']."</i>";
                ?>
              </div>
              <div class="text-info">
                  <b class="text-dark"><?php if($row['type'] == "byarabuze"){echo "Byabuze";}else{echo "Byatoraguwe";} ?>:&nbsp&nbsp</b><i class="text-dark"><?php echo $productdetail['date']; ?></i>
              </div>
                <a href="rangisha-lost-and-found-property-465728675<?php echo $row['id'] ?>" class="fb-more-btn"><b>Read More</b></a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- Features section end  -->


  <!-- Clients section  -->
  <section class="works-section spa">
    <div class="works_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center">
                        <span class="wow lightSpeedIn" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Ibyo Dukora</h3>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">« Tukora muburyo bwihuse, bworosheye kandi bunahendutse. »</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="single_works wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <span>
                            01
                        </span>
                        <h3>Kuranga ibyabuze</h3>
                        <p>Tugufasha kubona ibyo watakaje cyangwa wabuze mugihe icyaricyo cyose.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="single_works wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                        <span>
                            02
                        </span>
                        <h3>Kuranga ibyatoraguwe</h3>
                        <p>Uramutse haribyo utoye ukaba utazi nyirabyo ubishyira kurururubuga tukaguhuza na nyirabyo</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="single_works wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                        <span>
                            03
                        </span>
                        <h3>Guhuza uwataye nuwatoye</h3>
                        <p>Dufasha uwatakaje nuwatoye guhura hakurikijwe amakuru yatanzwe.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- Clients section end  -->


  <!-- Testimonial section -->
  <section class="testimonial-section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 p-0  d-md-block d-none">
          <div class="testimonial-bg set-bg" data-setbg="images/property/ikofi.jpg"></div>
        </div>
        <div class="col-lg-6 p-0">
          <div class="testimonial-box">
            <div class="testi-box-warp">
              <h2>Ubuhamya & Statistics</h2>
                <div class="testimonial-collapse">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree4">
                            <i class="fa fa-angle-down" style="font-size: 28px;"></i>&nbsp&nbsp&nbsp Ibyashyizweho byaratakaye
                        </button>
                    </h5>
                  <div id="collapseThree1" class="collapse">
                      <div class="pl-5">
                        <b class="text-primary"><?php $fetch=mysqli_query($db,"select * from product where type='byarabuze'");$result=mysqli_num_rows($fetch);echo($result);?></b><span class="text-secondary">   Byatakaye nibyo bimaze gushyirwaho.</span> 
                      </div>
                  </div>
                </div>
                <div class="testimonial-collapse">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree4">
                            <i class="fa fa-angle-down" style="font-size: 28px;"></i>&nbsp&nbsp&nbsp Ibyashyizweho byaratoraguwe
                        </button>
                    </h5>
                  <div id="collapseThree2" class="collapse">
                      <div class="pl-5">
                        <b class="text-danger"><?php $fetch=mysqli_query($db,"select * from product where type='byaratoraguwe'");$result=mysqli_num_rows($fetch);echo($result);?></b><span class="text-secondary">   Byatoraguwe nibyo bimaze gushyirwaho.</span> 
                      </div>
                  </div>
                </div>
                <div class="testimonial-collapse">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree4">
                            <i class="fa fa-angle-down" style="font-size: 28px;"></i>&nbsp&nbsp&nbsp Ibimaze Kuboneka
                        </button>
                    </h5>
                  <div id="collapseThree3" class="collapse">
                      <div class="pl-5">
                        <b class="text-success"><?php $fetch=mysqli_query($db,"select * from foundcontact");$row=mysqli_num_rows($fetch);echo($row);?></b><span class="text-secondary">   Byatoraguwe nibyo bimaze gushyirwaho.</span> 
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimonial section end  -->

  <!-- Video section  -->
  <section class="video-section spad" >
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-none d-lg-block">
          <div class="video-text mt-5">
            <h2>Dutanga serivisi zo gufasha abaturarwanda kubona ibyabo byabuze</h2>
            <p>Nyuma yo kubona ko hari ikibazo cyo kubura ibyawe ukabura aho ubishakira ndetse hakaba n'icyo gutora iby'abandi ukabura uko wabibagezaho tukuzaniye uburyo bwiza kandi bwihuse bwo kuguhuza na nyir'ibyabuze cyangwa se n uwagutoreye ibyo wabuze.Bishobora kuba ibyangombwa cyangwa se indi mitungo igendanwa nk imizigo,imfunguzo n'ibindi.Icyo usabwa ni ukuzuza form kuri uru rubuga uciye ahanditse "Ranga"maze ugakurikiza amabwiriza.Tukwibutse ko kandi ubu buryo buhendutse ndetse bukaba bukoreshwa amasaha makumyabiri n'ane kuyandi(24/7).</p>
            <a href="contact.php" class="site-btn">contact us</a>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="video-box text-center">
            <h2 class="my-2">Our team</h2>
            <div class="row">
              <div class="col-sm-6 col-md-3 col-lg-6">
                <div class="img">
                  <img src="images/owner/IMG-20200614-WA012.jpg" class="rounded-circle">
                  <div class="team-contact">
                    <p>0780312140</p>
                  </div>
                </div>
                <div class="img-text text-center">
                  <h5>Co-founder</h5>
                  <p class="text-secondary">Cyuzuzo Patrick</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-6">
                <div class="img">
                  <img src="images/owner/UMUTONIIMG_20200219_195428.jpg" class="rounded-circle">
                  <div class="team-contact">
                    <p>0789358414</p>
                  </div>
                </div>
                <div class="img-text text-center">
                  <h5>Co-founder</h5>
                  <p class="text-secondary">UMUTONI Yolland</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-6">
                <div class="img">
                  <img src="images/owner/NGENZIleo.jpg" class="rounded-circle">
                  <div class="team-contact">
                    <p>0782408411</p>
                  </div>
                </div>
                <div class="img-text text-center">
                  <h5>Co-founder</h5>
                  <p class="text-secondary">Ngenzi Jean Leon</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-6">
                <div class="img">
                  <img src="images/owner/jules.png" class="rounded-circle">
                  <div class="team-contact">
                    <p>0783076306</p>
                  </div>
                </div>
                <div class="img-text text-center">
                  <h5>Co-founder</h5>
                  <p class="text-secondary">Muhayimana Jules</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Video section end  -->
  <?php include'footer.php'; ?>  
  <!--====== Javascripts & Jquery ======-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="styles/bootstrap4/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
