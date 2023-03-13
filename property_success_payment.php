<?php
include 'backend/connect.php';
session_start();
include 'All.classes.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Rangisha-ibyabuze//ibyatowe</title>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="rangisha ibyabuze ibyatowe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Favicon -->
<link href="images/logo/icon/logo.png" rel="shortcut icon"/>
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="styles/magnific-popup.css"/>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/slicknav.min.css"/>
<link rel="stylesheet" type="text/css" href="styles/header.css">
<link rel="stylesheet" href="styles/style.css"/>
</head>
<body class="bg-light">
<?php include 'header.php';  ?>
<div class="bordered rounded p-3 mt-5" style="max-width: 500px; margin: auto;background-color: white">
	<?php
	  if (isset($_SESSION['paymsg'])): {  ?>
	  		<div class="alert alert-secondary">
	  			<h5>
		  		<?php
		  		  echo $_SESSION['paymsg'];
		  		  unset($_SESSION['paymsg']);
		  		?>
		  		</h5>
	  		</div>
	<?php } endif
	?>
	<form class="" method="POST" action="backend/success-payment.php">
		<div class="form-group text-center">
			<p class="text-dark"><b><i>Uzuza nimero yaterefone iri muri <u class="text-warning">mobile-money</u>.</i></b></p>
			<span>Igiciro ni <b class="text-dark">350 <small>Rwf</small></b></span>			
		</div>
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text">Phone</span>
		  </div>
		  <input type="text" name="phone" class="form-control" required="true">
		</div>
		<div class=" mt-2 text-center">
			<button type="submit" name="confirmpayment" class="btn btn-info"><b>Emeza</b></button>
		</div>
	</form>
</div>

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