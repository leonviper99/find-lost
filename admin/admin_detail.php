<?php
include 'backend/connect.php';
session_start();
include 'backend/auth.php';
include 'backend/fetch_functions.php';
include 'backend/functionadmin.php';
include 'All.classes.php';
if (isset($_GET['admincode']) && $_GET['admincode'] != $_SESSION['administrative_permission']) {
  $_SESSION['dest']=$_GET['admincode'];
}
else{
  header("location: admin_profile.php");
}


if (isset($_POST['msg'])) {
  $message=$_POST['message'];
  $date=date( 'd-m-Y h:i:s');
    $insert=$db->query("INSERT INTO admin_messages(admin_id,destination_id,message,time) VALUES('".$_SESSION['administrative_permission']."','".$_SESSION['dest']."','".$message."',NOW())");
    if ($insert) {
      header("location: admin_detail.php");
    }
    else{
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
      <div class="card card-secondary card-outline">
        <div class="card-body">

          <?php
            $select=$db->query("SELECT * FROM admin WHERE id='".$_SESSION['dest']."'");
            $row=$select->fetch_assoc();
            // $prdctcustomer=getCustomer($row['id']);
            // $prdctdetail=getProductDate($row['id']);
          ?>


          <div class="row">
            <div class="col-12 col-sm-6 col-md-8">
              <div class="card  card-primary card-outline">
                <div class="row">
                  <div class=" col-md-5 mt-2">
                    <div class="box-profile container-fluid">
                      <div class="text-center">
                        <?php if (!empty($row['admin_pic'])) {
                          echo '<img src="images/'.$row['admin_pic'].'" class="img-circle profile-user-img img-fluid" alt="Admin">';
                        }
                        else{
                          echo '<img src="dist/img/avatar1.jpg" class="img-circle elevation-2" alt="Admin">';
                        } ?> 
                      </div>
                      <h3 class="profile-username text-center"><?php echo($row['fname']." ".$row['lname']); ?></h3>
                      <p class="text-muted text-center"><?php echo $row["duties"]; ?></p>
                      <h6><b>Last visit:   &nbsp</b><span class="text-primary"><?php echo TimeAgo($row['active_status'], date("Y-m-d H:i:s")); ?></span></h6>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Uploads</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                          <b>msgs</b> <a class="float-right">543</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="d-sm-non col-md-7">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="info-box bg-light">
                          <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Email</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php echo($row['email']); ?></span>
                          </div>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="info-box bg-light">
                          <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Phone</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php echo($row['phone']); ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="info-box bg-light">
                          <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Location</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php echo($row['location_city']); ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="info-box bg-light">
                          <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Other Skills</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php echo($row['skills']); ?></span>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              



              <div class="card card-warning direct-chat direct-chat-danger">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                          data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->


                  <?php
                        $myadminid=$row["id"];
                        $fetchmsg=$db->query("SELECT * FROM admin_messages WHERE (destination_id='".$_SESSION['administrative_permission']."' or admin_id='".$_SESSION['administrative_permission']."') AND (admin_id='".$myadminid."' or destination_id='".$myadminid."') order by id Desc");
                        while ($rw=$fetchmsg->fetch_assoc()) { 
                          $sender=getAdmin($rw['admin_id']);
                          $time=TimeAgo($rw['time'], date("Y-m-d H:i:s")); ?>


                          <?php

                           if ($rw['destination_id'] == $_SESSION['administrative_permission']) { ?>
                           <div class="direct-chat-msg w-75">
                            <div class="direct-chat-infos clearfix">
                              <span class="direct-chat-name float-left"><b><?php echo($sender['fname']." ".$sender['lname']) ?></b></span>
                              <span class="direct-chat-timestamp float-right"><?php echo $time ?></span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="images/<?php echo $sender['admin_pic']; ?>" alt="user image" alt="Admin Image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                              <?php echo($rw['message']); ?>
                              

                            </div>
                            <!-- /.direct-chat-text -->
                           </div>
                             
                          <?php } else{ ?>
                            <div class="direct-chat-msg right w float-righ">
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right"><b>Me</b></span>
                                <span class="direct-chat-timestamp float-left"><?php echo $time ?></span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <img class="direct-chat-img" src="images/<?php echo $sender['admin_pic']; ?>" alt="Image">
                              <!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                <?php echo($rw['message']); ?>
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>                 


                         <?php } } ?>
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control" name="message" required>
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-danger" name="msg">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
            </div>
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
