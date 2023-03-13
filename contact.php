<?php
include 'backend/connect.php';
session_start();
include 'All.classes.php';
if (isset($_POST['sendmsg'])) {
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$subject=$_POST['subject'];
	$msg=$_POST['msg'];
	$date=date("Y-m-d");

	$sql=$db->query("INSERT INTO msg_comment(name,contact,subject,msg,date) VALUES('".$name."','".$contact."','".$subject."','".$msg."','".$date."')");
	if ($sql) {
		echo "<script type='text/javascript'>
				      alert('Urakoze kubwigitekerezo utanze')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travello template project">
<link rel="stylesheet" type="text/css" href="styles/footer.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/header.css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>
<?php include'header.php'; ?>
<div class="super_container">
	<!-- Home -->

	<div class="home" style="background-image:url(images/hero-slider/ines.jpg)">
		<div class="home-text text-center py-3" style="background-color: rgb(250,250,250,0.8);">
			<h1>Wadusanga mu ishuri rikuru rya INES-Ruhengeri</h1>
		</div>
	</div>

	<div class="container mt-3">
		<div class="row">
			<div class="col-sm-6 col-lg-3">
			  <div class="card mt-2">
			    <img class="card-img-top" src="images/owner/jules.png" alt="Jules" style="width:%;height: 270px">
			    <div class="card-body">
			      <h4 class="card-title">Co-founder</h4>
			      <h5><p class="card-text">MUHAYIMANA Jules</p><h5>
			    </div>
			    <div class="card-footer">
			    	<strong>0783076306 // muhayejules@gmail.com</strong>
			    </div>
			  </div>
			</div>
			<div class="col-sm-6 col-lg-3">
			  <div class="card mt-2">
			    <img class="card-img-top" src="images/owner/NGENZIleo.jpg" alt="Ngenzi" style="width;height: 270px">
			    <div class="card-body">
			      <h4 class="card-title">Co-founder</h4>
			      <p class="card-text">Ngenzi Jean Leon</p>
			    </div>
			    <div class="card-footer">
			    	<strong>0782408411</strong>
			    </div>
			  </div>
			</div>
			<div class="col-sm-6 col-lg-3">
			  <div class="card mt-2">
			    <img class="card-img-top" src="images/owner/IMG-20200614-WA012.jpg" alt="Jules" style="width;height: 270px">
			    <div class="card-body">
			      <h4 class="card-title">Co-founder</h4>
			      <h5><p class="card-text">Cyuzuzo Patrick</p><h5>
			    </div>
			    <div class="card-footer">
			    	<strong>urumuripatrick@gmail.com</strong>
			    </div>
			  </div>
			</div>
			<div class="col-sm-6 col-lg-3">
			  <div class="card mt-2">
			    <img class="card-img-top" src="images/owner/UMUTONIIMG_20200219_195428.jpg" alt="Yolland" style="width;height: 270px">
			    <div class="card-body">
			      <h4 class="card-title">Co-founder</h4>
			      <p class="card-text">UMUTONI Yolland</p>
			    </div>
			    <div class="card-footer">
			    	<strong>umutoniyollanda@gmail.com</strong>
			    </div>
			  </div>
			</div>
		</div>
	</div>

	<div class="contact">
		<div class="container">
			<div class="row">

				
				<div class="col-lg-6">
					<div class="contact_content">
						<div class="contact_title">Tugezeho ikibazo cyangwa igitekerezo</div>
						<div class="contact_text">
							<p>Mushobora kutugezaho ibibazo cyangwa ibitekerezo byanyu mubanje kuzuza aha hakurikira</p>
						</div>
						<div class="contact_list">
							<ul>
								<li>
									<div>address:</div>
									<div>Musanze/INES-RUHENGERI</div>
								</li>
								<li>
									<div>phone:</div>
									<div>+250782408411</div>
								</li>
								<li>
									<div>email:</div>
									<div>rangisharwanda@gmail.com</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-6">
					<div class="contact_form_container">
						<form action="" id="contact_form" class="contact_form" method="POST">
							<div style="margin-bottom: 18px"><input type="text" class="contact_input contact_input_name inpt" placeholder="Amazina yanyu" required="required" name="name"><div class="input_border"></div></div>
							<div class="row">
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div><input type="text" class="contact_input contact_input_email inpt" placeholder="E-mail / phone byanyu" required="required" name="contact"><div class="input_border"></div></div>
								</div>
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div><input type="text" class="contact_input contact_input_subject inpt" placeholder="Impamvu" required="required" name="subject"><div class="input_border"></div></div>
								</div>
							</div>
							<div><textarea class="contact_textarea contact_input inpt" placeholder="Ubutumwa" required="required" name="msg"></textarea><div class="input_border" style="bottom:3px"></div></div>
							<button type="submit" name="sendmsg" class="contact_button">Ohereza</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
</body>
</html>