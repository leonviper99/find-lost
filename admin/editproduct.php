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
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="../images/logo/icon/logo.png" rel="shortcut icon"/>

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
            <h1>Edit Product</h1>
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
      <?php
        $select=$db->query("SELECT * FROM product WHERE id='".$productid."'");
        $row=$select->fetch_assoc();
        $prdctcustomer=getCustomer($row['id']);
        $prdctdetail=getProductDate($row['id']);
        ?>
      <form method="POST" action="backend/editproduct.php"  enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="card  card-warning">
                <div class="card-header">
                    <h3 class="card-title">Ubwoko Bwibyabuze/ibyatoraguwe</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <div class="card-body">
                      <div class="form-group">
                        <label>Advert type</label>
                        <select class="custom-select" name="itangazo">
                          <option value="<?php echo($row['type']); ?>"><?php echo($row['type']); ?></option>
                          <option value="byarabuze">Kurangisha (ibyo wabuze)</option>
                          <option value="byaratoraguwe">Kuranga (ibyatowe)</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Ubwoko</label>
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
                    </div>
                    <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <div class="card  card-primary">
                <div class="card-header">
                    <h3 class="card-title">Amakuru yuwataye/uwatoye ibyabuze</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <div class="card-body">
                      <div  class="form-group">
                        <label for="exampleInputPassword1">Detail</label>
                        <div class="row">
                          <div class="col-md-4 col-lg-2"><span>Amazina</span><b class="text-danger">*</b></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="text" name="amazinayuwataye" value="<?php echo(($prdctcustomer['name'])); ?>">
                          </div>
                        </div>
                        <div class="row mt-1">
                          <div class="col-md-4 col-lg-2"><span>Phone</span><b class="text-danger">*</b></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="" name="telefone" value="<?php echo($prdctcustomer['phone']); ?>">
                          </div>
                        </div>
                        <div class="row mt-1">
                          <div class="col-md-4 col-lg-2"><span>Email</span></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="text" name="email" value="<?php echo($prdctcustomer['email']); ?>">
                          </div>
                        </div>
                        <div class="row mt-1">
                          <div class="col-md-4 col-lg-2"><span>District</span><b class="text-danger">*</b></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="text" name="livedistrict" value="<?php echo($prdctcustomer['district']);?>">
                          </div>
                        </div>
                        <div class="row mt-1">
                          <div class="col-md-4 col-lg-2"><span>Sector</span><b class="text-danger">*</b></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="text" name="livecity" value="<?php echo($prdctcustomer['sector']);?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="card  card-primary">
                <div class="card-header">
                    <h3 class="card-title">Amakuru yerekeye ibyabuze</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nyirabyo</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name="nyirabyo" value="<?php echo $row['owner']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Aho byatangiwe</label>
                        <div class="row">
                          <div class="col-md-6 col-lg-4"><input type="text" class="form-control" name="akarerebyatangiwe" id="exampleInputPassword1" value="<?php echo $prdctdetail['issue_district']; ?>"></div>
                          <div class="col-md-6 col-lg-4"><input type="text" class="form-control"  name="umurengebyatangiwe" value="<?php echo $prdctdetail['issue_sector']; ?>"></div>
                        </div>                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Aho byaburiye / byatoraguwe</label>
                        <div class="row">
                          <div class="col-md-6 col-lg-4"><input type="text" class="form-control"  name="akarerebyabuze" value="<?php echo $prdctdetail['advert_district']; ?>"></div>
                          <div class="col-md-6 col-lg-4"><input type="text" class="form-control"  name="umugi" id="exampleInputPassword1" value="<?php echo  $prdctdetail['advert_sector'];?>"></div>
                        </div>                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Igihe byaburiye / byatoraguwe</label>
                        <input type="date" class="form-control" name="itariki" id="exampleInputEmail1" value="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Amafoto</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="ifoto[]" multiple>
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label" for="exampleChec">Andi makuru</label>
                        <textarea class="form-control" rows="3" name="description"><?php echo($row['description']); ?></textarea>
                      </div>
                      <input type="hidden" name="itemno" value="<?php echo($row['id']); ?>">
                    </div>
                    <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
          <div class="submit text-center">
            <button class="btn btn-success w-25 px-5 py-2" type="submit" name="editsubmit"><h4><b>Confirm</b></h4></button>
          </div>
        </form>
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
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
