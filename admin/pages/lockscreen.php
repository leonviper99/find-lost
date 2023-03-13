<?php
session_start();



if (!isset($_SESSION['last_admin'])) {
  header("location: ../index.php");
}
else{
  include '../backend/connect.php';
  include '../classes/admin.class.php';
  $admin = new Admin($db,$_SESSION['last_admin']);
  $admin_detail = $admin->getAdminDetail();
}
if (isset($_POST['sessionredo'])) {
  $admin->Restore_session($_SESSION['last_admin'],$_POST['password']);
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rangisha restart session</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../index.php"><img src="../../images/logo/kk.png" alt="LOGO"></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo($admin_detail['firstname']." ".$admin_detail['lastname']);?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../images/<?php echo($admin_detail['admin_picture']);?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" name="password" required="true">

        <div class="input-group-append">
          <button type="submit" class="btn" name="sessionredo"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="../index.php">Or sign in as a different admin</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2020 <b><a href="../../index.php" class="text-black">Rangisha</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
