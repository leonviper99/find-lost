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
            <form action="writemail.php" method="POST">
              <div class="card-header">
                <button type="submit" name="sendtoselected" class="btn btn-info btn-sm"><b>Click To Write</b>  <i class="fas fa-pencil-alt"></i></button>
              </div>
              <div class="card-body p-0 mt-2"> 
                <table id="example1" class="table table-bordered table-striped">
                  
                  <thead>
                    <tr>
                      <th>
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>
                        
                      </th>
                      <th>Type</th>
                      <th>Poster</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="mailbox-messages">
                    <?php
                      $fetchproduct= $db->query("SELECT * FROM product");
                      while ($row=$fetchproduct->fetch_assoc()) {
                        $prdct=getCustomer($row['id']);
                        $prdctdetail=getProductDate($row['id']);
                        ?>
                        <tr>
                          <td>
                            <div class="icheck-primary">
                              <input type="checkbox" name="jules[]" value="<?php echo($prdct['id']); ?>" id="check<?php echo($row['id']); ?>">
                              <label for="check<?php echo($row['id']); ?>"></label>
                            </div>
                          </td>
                          <td><?php echo($row['type']); ?></td>
                          <td><?php echo($prdct['name']); ?></td>
                          <td><?php echo($prdct['phone']); ?></td>
                          <td><?php echo($prdct['email']); ?></td>
                          <td><?php echo($row['advert_date']); ?></td>
                          <td><span class="float-right"><?php echo($row['status']); ?></span></td>
                          <td>
                            <a class="btn btn-primary btn-sm" href="productview.php?productnumber=<?php echo($row['id']); ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          </td>
                        </tr>
                      <?php }
                    ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </form>
            <!-- /.form-->
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
