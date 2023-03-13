<?php
include 'backend/connect.php';
session_start();
include 'All.classes.php';


if (isset($_POST['editsubmit'])) {
	$itangazo=$_POST['itangazo'];
	$irangamuntu=$_POST['irangamuntu'];
	$ubutaka=$_POST['ubutaka'];
	$perimi=$_POST['perimi'];
	$passport=$_POST['passport'];
	$owner=$_POST['owner'];
	$ibindi=$_POST['ibindi'];
	$issue_district=$_POST['issue_district'];
	$issue_sector=$_POST['issue_sector'];
	$advert_district=$_POST['advert_district'];
	$advert_sector=$_POST['advert_sector'];
	$date=$_POST['date'];
	$description=$_POST['description'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$district=$_POST['district'];
	$sector=$_POST['sector'];

	$sql="UPDATE product set type='".$itangazo."', national_id='".$irangamuntu."', ubutaka='".$ubutaka."', permi='".$perimi."', passport='".$passport."', owner='".$owner."', other_product='".$ibindi."', description='".$description."' WHERE id='".$_SESSION['code']."' ;";
	$sql .="UPDATE product_detail set issue_district='".$issue_district."', issue_sector='".$issue_sector."', advert_district='".$advert_district."', advert_sector='".$advert_sector."' WHERE product_id='".$_SESSION['code']."';";
	$sql .="UPDATE customer_detail set phone='".$phone."', email='".$email."', district='".$district."', sector='".$sector."' WHERE product_id='".$_SESSION['code']."'";
	if ($db->multi_query($sql) === TRUE) {
		if ($itangazo == "byarabuze") {
			header("location: lostpropertystatus.php");
		}
		else{
			header("location: foundpropertystatus.php");
		}
		
	}
	else{
		echo "none";
	}
}

if (!isset($_SESSION['code'])) {
	header("location: index.php");
}

$sql=mysqli_query($db,"SELECT * FROM product inner join customer_detail on product.id=customer_detail.product_id join product_detail on product.id=product_detail.product_id  WHERE product.id='".$_SESSION['code']."'");
$row=mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rangisha-ibyabuze//ibyatowe</title>
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" href="styles/magnific-popup.css"/>
	<link rel="stylesheet" href="styles/slicknav.min.css"/>
	<link rel="stylesheet" href="styles/owl.carousel.min.css"/>
	<link rel="stylesheet" type="text/css" href="styles/advert.css">
	<link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


	<!-- Main Stylesheets -->
  <link rel="stylesheet" href="styles/style.css"/>



<style type="text/css">
#regiration_form button{
	border: none;
	border-radius: 25px;
}

</style>
</head>
<div id="overlay"></div>
<body style="background-image: url(images/kigaliarena.jpg);background-size: cover;">
<?php include 'header.php';  ?>

	<div class="page container bg-light rounded mt-3">
		<div class="py-3">
			<small class="float-right"><b class="text-danger">*</b>&nbsp<u>required</u></small><br>
			<form method="POST" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-6 px-lg-4 px-sm-1 ">
						<div class="bordered p-1">
							<h5 class="text-primary text-century"><strong>Ubwoko Bwibyabuze/ibyatoraguwe</strong> </h5>
							<div class="form-group mt-2">
								<label ><b>Category</b><b class="text-danger">*</b></label>
								<select class="custom-select" name="itangazo">
									<option value="<?php echo $row['type']?>">Hitamo category</option>
									<option value="byarabuze">Kurangisha (ibyo wabuze)</option>
									<option value="byaratoraguwe">Kuranga (ibyatowe)</option>
								</select>
							</div>
							<div class="form-group">
		                        <label for="exampleInputPassword1"><b>Ubwoko</b></label>
		                        <div class="custom-control custom-checkbox">
		                          <input class="custom-control-input" type="checkbox" name="irangamuntu" value="1" id="customCheckbox1" <?php if ($row['national_id'] == '1') {echo("checked");} ?>>
		                          <label for="customCheckbox1" class="custom-control-label">Irangamuntu</label>
		                        </div>
		                        <div class="custom-control custom-checkbox">
		                          <input class="custom-control-input" type="checkbox" name="ubutaka" value="1" id="customCheckbox2" <?php if ($row['ubutaka'] == '1') {echo("checked");} ?>>
		                          <label for="customCheckbox2" class="custom-control-label">Ubutaka</label>
		                        </div>
		                        <div class="custom-control custom-checkbox">
		                          <input class="custom-control-input" type="checkbox" name="perimi" value="1" id="customCheckbox3" <?php if ($row['permi'] == '1') {echo("checked");} ?>>
		                          <label for="customCheckbox3" class="custom-control-label">Permi</label>
		                        </div>
		                        <div class="custom-control custom-checkbox">
		                          <input class="custom-control-input" type="checkbox" name="passport" value="1" id="customCheckbox4" <?php if ($row['passport'] == '1') {echo("checked");} ?>>
		                          <label for="customCheckbox4" class="custom-control-label">Passport</label>
		                        </div>
	                            <div class="text-cente">
	                               <label data-toggle="collapse" data-target="#demo">Ibindi..</label>
	                               <div id="demo" class="collapse">
	                                <textarea name="ibindi"><?php echo($row['other_product']); ?></textarea>
	                               </div>
	                            </div>
		                     </div>
							<div>
								<label><b>Ibindi..</b></label><br>
								<textarea name="ibindi" class="form-control"><?php echo $row['other_product'];?></textarea>
							</div>
						</div>
					</div>
					<div class="col-lg-6 px-lg-4 px-sm-1">
						<div class="bordered p-1">
							<h5 class="text-primary text-century"><strong> Amakuru yerekeye ibyabuze</strong></h5>
							<div class="form-group mt-2">
								<label><b>Nyirabyo</b><b class="text-danger">*</b></label><br>
								<input type=""  name="owner" value="<?php echo $row['owner']?>">
							</div>
							<div class="form-group">
								<label><b>Aho byatangiwe</b></label><br>
								<input type="text" name="issue_district" value="<?php echo $row['issue_district']?>">&nbsp
								<input type="text" name="issue_sector" value="<?php echo $row['issue_sector']?>">
							</div>
							<div class="form-group">
								<label><b>Aho byaburiye / byatoraguwe</b><b class="text-danger">*</b></label><br>
								<input type="text" name="advert_district" value="<?php echo $row['advert_district']?>">
								<input type="text" name="advert_sector" value="<?php echo $row['advert_sector']?>">
							</div>
							<div class="form-group">
								<label><b>Igihe byaburiye / byatoraguwe</b><b class="text-danger">*</b></label><br>
								<input type="date" name="date" class="form-control" value="<?php echo $row['date']?>">
							</div>
							<div class="form-group">
								<label><b>Amafoto</b></label>
								<input type="file" name="ifoto[]" multiple>
							</div>
							<div class="form-group">
								<label><b>Andi makuru</b></label><br>
								<textarea name="description" class="form-control"><?php echo $row['description']?></textarea>
							</div>
						</div>
					</div>
					<div class="col-lg-12  px-lg-4 px-sm-1">
						<div class="bordered p-1 mt-2">
							<h5 class="text-primary text-century"><strong> Amakuru yuwataye/uwatoye ibyabuze</strong></h5>
							<div class="form-group mt-2">
								<span>Amazina</span><b class="text-danger">*</b><br>
								<input type="text" value="<?php echo $row['name']?>" disabled>
							</div>
							<div class="form-group">
								<div class=""><span>Phone</span><b class="text-danger">*</b></div>
								<div class="">
									<input type="text" name="phone" value="<?php echo $row['phone']?>">
								</div>
							</div>
							<div class="form-group">
								<div class=""><span>Email</span></div>
								<div class="">
									<input type="text" name="email" value="<?php echo $row['email']?>">
								</div>
							</div>
							<div class="form-group">
								<div class=""><span>District</span><b class="text-danger">*</b></div>
								<div class="">
									<input type="text" name="district" value="<?php echo $row['district']?>">
								</div>
							</div>
							<div class="form-group">
								<div class=""><span>Sector/Umugi</span><b class="text-danger">*</b></div>
								<div class="">
									<input type="text" name="sector" value="<?php echo $row['sector']?>">
								</div>
							</div>
					    </div>
					</div>
				</div>
				<div class="text-center mt-3">
					<button type="submit" name="editsubmit" class="btn btn-info w-50 my-3" ><h4><b>Emeza</b></h4></button>
				</div>
			</form>
		</div>
	</div>
	<?php include 'footer.php'; ?>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>