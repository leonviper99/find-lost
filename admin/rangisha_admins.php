<?php
include 'backend/connect.php';
session_start();
include 'backend/auth.php';
include 'backend/fetch_functions.php';
include 'backend/functionadmin.php';
include 'All.classes.php';

if (isset($_GET['deleteadmin'])) {
  $admin=$db->query("SELECT * from admin WHERE id='".$_GET['deleteadmin']."'");
  $type= $admin ->fetch_assoc();
  if ($type['category'] == "super") {
    $mailSub = "Warning";
    $mailMsg = "<h1>".$_SESSION['administrater_name']."</h1><h2 style='color: maroon'> tried to delete you.</h2>";
    $mailto= "muhayejules@gmail.com";
    include 'email/email.php';
    if(!$mail->Send()){
      header("location: rangisha_admins.php");
    }
    else{
      header("location: rangisha_admins.php");
    }
  }
  else{
    $rmve=$db->query("DELETE FROM admin where id='".$_GET['deleteadmin']."'");
    if ($rmve > 0) {
      $_SESSION['admindel']="The Admin Successful removed.";
    }
  }
}


if (isset($_POST['adminad'])) {
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $level=$_POST['level'];
  $skills=$_POST['skills'];
  $duty=$_POST['duty'];
  $location=$_POST['location'];
  $bdate=$_POST['bdate'];
  $password=$_POST['password'];
  $category=$_POST['category'];
  $picture=$fname.$_FILES['picture']['name'];
  $date=date("Y/m/d");

  $target_dir="images/".$fname;
  $sql=$db->query("SELECT email FROM admin WHERE email='".$email."'");

  if ($sql->num_rows == TRUE) {
    $_SESSION['erroremail']="Failled,Email is already used.";
  }
  else
  {
    $mailto = $email;
    $mailSub = "Rangisha Admin";
    $mailMsg = "<div style='max-width: 400px; margin: auto; border: 2px solid #696969;border-radius: 5px;padding: px;'><div style='text-align: center; padding-bottom: 1px; margin-top: -20px; background-color: #FFE4B5'><h1><b>Welcome to Rangisha.com</b></h1><h2>You are now a member.</h2></div><div style='padding: 4px 5px; font-size: 20px'><b>User email:  </b><span>  ".$email."</span><br><br><b>Password:  </b><span>  ".$lname."</span><br><p style='color: gray;text-align: center;'>«  Great things are never done by one person, They are done by Team.  »</p></div></div>";
    include 'email/email.php';
    if(!$mail->Send())
     {
         $sent=TRUE;
     }
     else
     {
         $sent=TRUE;
     }
    if ($sent===TRUE) {
      $insert=$db->query("INSERT INTO admin(fname,lname,email,phone,bdate,category,password,admin_pic,reg_date,education_level,skills,duties,location_city) VALUES('".$fname."','".$lname."','".$email."','".$phone."','".$bdate."','".$category."','".$lname."','".$picture."','".$date."','".$level."','".$skills."','".$duty."','".$location."')");
      if ($insert) {
        move_uploaded_file($_FILES["picture"]["tmp_name"],"$target_dir".$_FILES["picture"]["name"]);
        // header("location: rangisha_admins.php");
        $_SESSION['successreg']="Succeccful, New admin added.";
      }
      else{
        echo "<h2>Not able to register.</h2>";
      }
    }
  }
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | <?php echo $admin_detail["firstname"]."  ".$admin_detail["lastname"]; ?></title>
  <link href="../images/logo/icon/logo.png" rel="shortcut icon"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <!-- Navbar -->
   <?php include'includes/main_navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php include'includes/main_sidebar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if (isset($_SESSION['erroremail'])): {
            echo '<div class="alert alert-warning text-center"><h3><b>'.$_SESSION['erroremail'].'</b></h3></div>';
            unset($_SESSION['erroremail']);
          } endif ?>
          
          <?php if (isset($_SESSION['successreg'])): {
            echo '<div class="alert alert-success text-center"><h3><b>'.$_SESSION['successreg'].'</b></h3></div>';
            unset($_SESSION['successreg']);
          } endif ?>
          
          <?php if (isset($_SESSION['admindel'])): {
            echo '<div class="alert alert-success text-center"><h3><b>'.$_SESSION['admindel'].'</b></h3></div>';
            unset($_SESSION['admindel']);
          } endif ?>
      <div class="info-box card-danger  card-outline">
        <div class="info-box-content">
           <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><b>Administrators</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><b>Add Administrator</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><b>Messages</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>First</th>
                          <th>Last</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Location</th>
                          <th>Skills</th>
                          <th>Picture</th>
                          <th>Last visit</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                            $fetchproduct= $db->query("SELECT * FROM admin");
                            while ($row=$fetchproduct->fetch_assoc()) {
                              ?>
                              <tr>
                                <td><?php echo($row['fname']); ?></td>
                                <td><?php echo($row['lname']); ?></td>
                                <td><?php echo($row['phone']); ?></td>
                                <td><?php echo($row['email']); ?></td>
                                <td><?php echo($row['location_city']); ?></td>
                                <td><?php echo($row['skills']); ?></td>
                                <td><img src="images/<?php echo($row['admin_pic']); ?>" width="30px"></td>
                                <td><?php
                                date_default_timezone_set('Africa/Kigali');
                                 $timezone_object = date_default_timezone_get();
                                 $date=date("Y-m-d h:i:s");
                                 echo get_timeago($row['active_status'], $date); ?></td>
                                <td>
                                  <a class="btn btn-primary btn-sm" href="admin_detail.php?admincode=<?php echo($row['id']); ?>">
                                      <i class="fas fa-folder">
                                      </i>
                                      View
                                  </a>
                                  <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="rangisha_admins.php?deleteadmin=<?php echo($row['id']); ?>">
                                      <i class="fas fa-trash">
                                      </i>
                                    Delete
                                  </a>
                                </td>
                              </tr>
                            <?php }
                          ?>
                        </tbody>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <form method="POST" action="" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="card card-success">
                            <div class="card-header">
                              <h5>Admin information</h5>
                            </div>
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="fname" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="lname" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="phone" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"  name="email" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Location city</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="location" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Birth date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1"  name="bdate" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1"  name="password" disabled>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card card-info">
                            <div class="card-header">
                              <h5>Admin responsability</h5>
                            </div>
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Admin Category</label>
                                <select class="custom-select" name="category" required>
                                  <option value="">Select Category</option>
                                  <?php if (isset($_SESSION["super"])) {
                                    echo('<option value="super">Super</option>');
                                  } ?>
                                  <option value="admin1">Admin1</option>
                                  <option value="admin2">Admin2</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Duty</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="duty">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Skills</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="skills">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Education Level</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="level">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Admin picture</label>
                                <input type="file" class="form-control" id="exampleInputEmail1"  name="picture">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <button class="btn btn-success w-25 py-1" name="adminad"><b>Submit</b></button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                     Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center mt-1">
    <strong>Copyright &copy; 2020 Rangisha.com .</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
