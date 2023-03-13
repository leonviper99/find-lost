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
<div class="bordere rounded p- mt-5" style="max-width: 600px; margin: auto;">
	<div class="card">
		<div class="card-header bg-secondary text-center">
			<h4 class="card-title text-light">Umwirondoro wawe</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="backend/foundproduct.php">
			  <input type="hidden" name="item" value="<?php echo($_GET['property']);?>">                          
              <div class="form-group">
                <label  class="text-dark"><b>Amazina yawe</b></label>           
                <input type="" name="name" class="form-control" placeholder="Amazina yombi...." required>
              </div>
              <div class="form-group">
                <label  class="text-dark"><b>Nimero yawe</b></label>               
                <input type="" name="phone" class="form-control" placeholder="0788..." required="true">
              </div>
              <div class="form-group">
                <label class="text-dark"><b>Shiraho Email yawe</b></label>                 
                <input type="email" name="email" class="form-control" placeholder="XXX@gmail.com">
              </div>
              <div class="container mt-2">
                <button class="btn btn-block btn-primary text-white" name="foundsubmit"><h4>Emeza</h4></button>
              </div>
            </form>
		</div>
		<div class="card-footer text-center">
			<h6><b>NB:</b>&nbsp<i class="text-secondary">Kubwicyizere cyanyu umwirondoro wanyu tuwugira ibanga.</i></h6>
		</div>
	</div>
	
</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>