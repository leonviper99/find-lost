<?php
include 'backend/connect.php';
session_start();
include 'backend/auth.php';
include 'backend/fetch_functions.php';
include 'All.classes.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $admin_detail["firstname"]."  ".$admin_detail["lastname"]; ?></title>
  <link href="../images/logo/icon/logo.png" rel="shortcut icon"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php if (isset($_SESSION['mailsuccess'])): {
      echo'<div class="alert alert-success text-center container"><h3>'.$_SESSION['mailsuccess'].'</h3></div>';
      unset($_SESSION['mailsuccess']);
      unset($_SESSION['customerid']);
    } endif
    ?>

    <?php if (isset($_SESSION['msgsuccess'])): {
      echo'<div class="alert alert-success text-center container"><h3>'.$_SESSION['msgsuccess'].'</h3></div>';
      unset($_SESSION['msgsuccess']);
      unset($_SESSION['customerid']);
    } endif
    ?>

    <?php if (isset($_SESSION['errordestination'])): {
      echo'<div class="alert alert-danger text-center container"><h3>'.$_SESSION['errordestination'].'</h3></div>';
      unset($_SESSION['errordestination']);
    } endif
    ?>

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
                    <i class="far fa-circle text-warning"></i>&nbspReceived messages<span class="badge badge-primary float-right"><?php $fetch=$db->query("SELECT * FROM sent_msgs");
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
            <div class="card-body p-0">
              <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#sendbyemail" role="tab" aria-controls="custom-content-above-home" aria-selected="true"><b>Send by Email</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#sendbyphone" role="tab" aria-controls="custom-content-above-profile" aria-selected="false"><b>Send by Phone</b></a>
              </li>
            </ul>
            <div class="tab-custom-content">
              <p class="lea mb-0 pl-3"><b>Compose New Message</b></p>
            </div>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active" id="sendbyemail" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                <form method="POST" action="backend/sendmail.php">
                  <div class="card-body">
                      <div class="info-box bg-light">
                        <div class="info-box-content">
                          <b>To:</b>
                          <p>
                            <?php
                              if (isset($_POST['sendtoselected'])) {
                                if (!empty($_POST['jules'])) {
                                  $_SESSION['customerid']=$_POST['jules'];
                                  foreach ($_SESSION['customerid'] as $key) {
                                    $select=$db->query("SELECT * FROM customer_detail WHERE id='".$key."'");
                                    $row=$select->fetch_assoc();
                                    if ($row['email']) {
                                      echo $row['email']."; ";
                                    }                                  
                                  }
                                }
                              }
                            ?>
                          </p>
                        </div>
                      </div>
                    <div class="form-group mt-3">
                      <input class="form-control" placeholder="Subject:" name="mailsubject" required>
                    </div>
                    <div class="form-group">
                        <textarea id="compose-tex" name="mailmsg" class="form-control" placeholder="Write your message Here..." style="height: 150px" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-25" type="submit" name="sendmail"><b>Send</b></button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="sendbyphone" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                 <form method="POST" action="backend/sendmail.php">
                  <div class="card-body">                
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <b>To:</b>
                        <p>
                          <?php
                            if (isset($_POST['sendtoselected'])) {
                              if (!empty($_POST['jules'])) {
                                $_SESSION['customerid']=$_POST['jules'];
                                foreach ($_SESSION['customerid'] as $key) {
                                  $select=$db->query("SELECT * FROM customer_detail WHERE id='".$key."'");
                                  $row=$select->fetch_assoc();
                                  if ($row['phone']) {
                                    echo $row['phone']."; ";
                                  }                                  
                                }
                              }
                            }
                          ?>
                        </p>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <input class="form-control" placeholder="Subject:" name="msgsubject" required="true">
                    </div>
                    <div class="form-group">
                        <textarea id="compose-tex" name="msg" class="form-control" placeholder="Write your message Here..." style="height: 150px" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-25" type="submit" name="sendmsg"><b>Send</b></button>
                    </div>
                  </div>
                </form>
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var glyph = $this.hasClass('glyphicon')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (glyph) {
        $this.toggleClass('glyphicon-star')
        $this.toggleClass('glyphicon-star-empty')
      }

      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
