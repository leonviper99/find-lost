<?php
include 'backend/connect.php';
session_start();
include 'backend/auth.php';
include 'backend/fetch_functions.php';
include 'All.classes.php';
$msg=$_GET['msg'];
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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
            <h1>Read message</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">message</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="composemail.php" class="btn btn-primary btn-block mb-3">Compose</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="mailbox.php" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right">12</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="sentmails.php" class="nav-link">
                    <i class="far fa-envelope"></i> Sent
                  </a>
                </li>
                <li class="nav-item">
                  <a href="composemail.php" class="nav-link">
                    <i class="far fa-edit"></i> Compose
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-filter"></i> Junk
                    <span class="badge bg-warning float-right">5</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Status</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <span class="nav-link">
                    <i class="far fa-circle text-warning"></i>&nbspReceived messages<span class="badge badge-success float-right"><?php $fetch=$db->query("SELECT * FROM msg_comment");
                      echo $fetch->num_rows; ?></span>
                    
                  </span>
                </li>
                <li class="nav-item">
                  <span class="nav-link">
                    <i class="far fa-circle text-warning"></i>&nbspSent messages<span class="badge badge-primary float-right"><?php $fetch=$db->query("SELECT * FROM sent_msgs");
                      echo $fetch->num_rows; ?></span>
                    
                  </span>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <?php
                  $selectmsg=$db->query("SELECT * FROM msg_comment WHERE id='".$msg."'");
                  $row=$selectmsg->fetch_assoc();
              ?>
              <div class="p-sm-2 p-lg-4">
                <?php
                  if (isset($_SESSION['success'])): {
                    echo "<div class='alert alert-success text-center'><h3>".$_SESSION['success']."</h3></div>";                 
                    unset($_SESSION['success']);
                  } endif
                  ?>
                <div class="msg-container row">
                  <div class="col-sm-6 col-lg-3">
                    <div class="info-box bg-ligh">
                      <div class="info-box-content">
                        <span class="info-box-number text-center text-muted mb-0">Sender name</span>
                        <span class="info-box-text text-center text-muted"><?php echo($row['name']); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="info-box bg-ligh">
                      <div class="info-box-content">
                        <span class="info-box-number text-center text-muted mb-0">Sender Contact</span>
                        <span class="info-box-text text-center text-muted"><?php echo($row['contact']); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="info-box bg-ligh">
                      <div class="info-box-content">
                        <span class="info-box-number text-center text-muted mb-0">Time</span>
                        <span class="info-box-text text-center text-muted"><?php echo($row['date']); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="info-box bg-ligh">
                      <div class="info-box-content">
                        <span class="info-box-number text-center text-muted mb-0">Subject</span>
                        <span class="info-box-text text-center text-muted"><?php echo($row['subject']); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="info-box bg-ligh">
                      <div class="info-box-content">
                        <span class="info-box-number text-center text-muted mb-2"><u>Received message</u></span>
                        <span class="info-box-tex text-center text-muted"><?php echo($row['msg']); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <form method="POST" action="backend/replytocustomer.php">
                    <label><h4><strong> Reply</strong></h4></label>
                    <input type="hidden" name="contact" value="<?php echo($row['contact']); ?>">
                    <input type="hidden" name="id" value="<?php echo($row['id']); ?>">
                    <textarea name="msg" placeholder="write a reply here..." class="form-control" required="true"></textarea>
                    <div class="py-2 text-center">
                      <button class="btn btn-info px-2 w-75" name="reply"><b>Send</b></button>
                    </div>
                  </form>
                </div>
                <div class="container">
                  <?php
                  $selectmsg=$db->query("SELECT * FROM feedback_msgs WHERE destination='".$row['contact']."' order by id desc");
                   while ($rw =$selectmsg->fetch_assoc()) {
                     echo("<div class='mb-2'><span class='py-1 px-2 '><b>".$rw['sender'].":</b>&nbsp".$rw['feedback']."</span></div>");
                   }
                  ?>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page Script -->

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
