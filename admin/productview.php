<?php
include 'backend/connect.php';
session_start();
include 'backend/auth.php';
include 'backend/fetch_functions.php';
include 'All.classes.php';
$productid=$_GET['productnumber'];



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
            <h1>Product Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <?php
        $select=$db->query("SELECT * FROM product WHERE id='".$productid."'");
        $row=$select->fetch_assoc();
        $prdctcustomer=getCustomer($row['id']);
        $prdctdetail=getProductDate($row['id']);
        ?>
        <div class="card-header">
          <a class="btn btn-info btn-sm" href="editproduct.php?productnumber=<?php echo($row['id']); ?>">
              <i class="fas fa-pencil-alt">
              </i>
              Edit
          </a>
          <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="backend/deleteproduct.php?productnumber=<?php echo($row['id']); ?>">
              <i class="fas fa-trash">
              </i>
              Delete
          </a>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 d-block order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Posted by</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo(($prdctcustomer['name'])); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Poster location</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($prdctcustomer['district']."-".$prdctcustomer['sector']); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Posted On</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($row['advert_date']); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Poster Phone</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($prdctcustomer['phone']); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Poster Email</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($prdctcustomer['email']); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Owner</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($row['owner']); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Issue Place</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($prdctdetail['issue_district']."-".$prdctdetail['issue_district']); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Advert Place</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($prdctdetail['advert_district']."-".$prdctdetail['advert_district']); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Lost/Found On</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($prdctdetail['date']); ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-sm-12 col-md-7">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Properties</span>
                      <table border="1px" style="border: 1px">
                        <thead>
                          <tr>
                            <th>Property</th>
                            <th>Detail</th>
                            <th>Property no</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $fetchproduct= $db->query("SELECT * FROM product inner join proterty_number on product.id=proterty_number.product_id WHERE product_id='".$productid."'");
                            $row=$fetchproduct->fetch_assoc(); ?>
                          <tr>
                            <td><b>Irangamuntu</b></td>
                            <td class="text-center"><?php echo($row['national_id']); ?></td>
                            <td><?php echo($row['national_idno']); ?></td>
                          </tr>
                          <tr>
                            <td><b>Ubutaka</b></td>
                            <td class="text-center"><?php echo($row['ubutaka']); ?></td>
                            <td><?php echo($row['ubutaka_no']); ?></td>
                          </tr>
                          <tr>
                            <td><b>permet</b></td>
                            <td class="text-center"><?php echo($row['permi']); ?></td>
                            <td><?php echo($row['permi_no']); ?></td>
                          </tr>
                          <tr>
                            <td><b>Passport</b></td>
                            <td class="text-center"><?php echo($row['passport']); ?></td>
                            <td><?php echo($row['passport_no']); ?></td>
                          </tr>
                          <tr>
                            <td><b>Others</b></td>
                            <td class="text-center"><?php echo($row['other_product']); ?></td>
                            <td>N/A</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-5">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Lost/Found On</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo($row['description']); ?></span>
                    </div>
                  </div>
                </div>
                <?php
                  $fetchproduct= $db->query("SELECT * FROM product inner join foundcontact on product.id=foundcontact.product_id  WHERE product_id='".$productid."'");
                  $row=$fetchproduct->fetch_assoc();
                  if ($row['status'] == '1') {
                ?>
                <div class="col-12 col-sm-10">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <div><h4 class="my-1 text-info"><b>Product succeed</b></h4></div>
                      <span><b>Founder:</b>&nbsp<i class="muted"><?php echo($row['found_name']); ?></i></span><br>
                      <span><b>Phone:</b><i class="muted">&nbsp<?php echo($row['found_phone']); ?></i></span><br>
                      <span><b>Email:</b><i class="muted">&nbsp<?php echo($row['email']); ?></i></span><br>
                      <span><b>Date:</b><i class="muted">&nbsp<?php echo($row['date']); ?></i></span>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> &copyRangisha</h3>
              <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Client Company
                  <b class="d-block">Deveint Inc</b>
                </p>
                <p class="text-sm">Project Leader
                  <b class="d-block">Tony Chicken</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
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





