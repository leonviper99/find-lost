<?php
include 'backend/connect.php';

session_start();
include 'backend/auth.php';
include 'backend/fetch_functions.php';
include 'All.classes.php';

if (isset($_POST['productsubmit'])) {
  $addproduct -> Productadd($_POST['itangazo'],$_POST['Irangamuntu'],$_POST['Passport'],$_POST['Icyangombwa_cyubutaka'],$_POST['Perimi'],$_POST['Irangamuntu_no'],$_POST['Icyangombwa_cyubutaka_no'],$_POST['Passport_no'],$_POST['Perimi_no'],$_POST['ibindi'],$_POST['nyirabyo'],$_POST['akarerebyatangiwe'],$_POST['umurengebyatangiwe'],$_POST['akarerebyabuze'],$_POST['umugi'],$_POST['itariki'],$_POST['description'],$_POST['amazinayuwataye'],$_POST['telefone'],$_POST['email'],$_POST['livedistrict'],$_POST['livecity'],$_POST['adminid'],$_POST['remark']);
  if (!empty($_SESSION["lastid"])) {
    if (!empty($_FILES['ifoto']['name'])) {
      $amazinayuwataye=$_POST['amazinayuwataye'];
        $checkdir="../productimages/".$amazinayuwataye."/";
        if ($checkdir > 0 ) {
          $target_dir = "../productimages/".$amazinayuwataye."/";
        }
        else{
          $newdir= "../productimages/".$amazinayuwataye;
            @mkdir($newdir);
            $target_dir = "../productimages/".$amazinayuwataye."/";
        }

        foreach ($_FILES["ifoto"]["name"] as $key => $value) { 

          $file_tmpname = $_FILES['ifoto']['tmp_name']["$key"];
          if (file_exists($target_dir.$_FILES['ifoto']['name']["$key"])) {
            $imagename = $_SESSION["lastid"].$_FILES['ifoto']['name']["$key"];
          }
          else{
            $imagename = $_FILES['ifoto']['name']["$key"];
          }
          $target = $target_dir . basename($imagename);

          if(move_uploaded_file($file_tmpname, $target)){

            $insertimg="INSERT INTO product_images(product_id,images) VALUES('".$_SESSION["lastid"]."', '".$imagename."')";
            $resultimg=$db->query($insertimg);

            if ($resultimg) {
              $_SESSION['submitp']="New Property Successful Added with code:&nbsp".$_SESSION["lastid"];
              header("location: product.php");
            }
            else{
              die($db->error);
            }
          }
          else{
            $_SESSION['submitp']="New Property Successful Added with code:&nbsp".$_SESSION["lastid"];
            header("location: product.php");
          }        
        }
      }
      else{
        $_SESSION['submitp']="New Property Successful  Added with code:&nbsp".$_SESSION["lastid"];
            header("location: product.php");     
      }
    }
  
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | <?php echo($admin_detail['firstname']." ".$admin_detail['lastname']); ?></title>
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
            <h1>Product // Ibyatoraguwe gusa</h1>
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
      <form method="POST" action=""  enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="card  card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ubwoko Bwibyatoraguwe</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <div class="card-body">
                      <div class="form-group">
                        <label>Advert type</label>
                        <select class="custom-select" name="itangazo">
                          <option value="byaratoraguwe">Kuranga (ibyatowe)</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Ubwoko</label>
                        <?php
                          $select=$db->query("SELECT * FROM categories");
                          while ($row=$select->fetch_assoc()) {?>
                            <div class="row">
                            <div class="col-sm-6 custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" name="<?php echo $row['ubwoko'];?>" value="1" id="customCheckbox<?php echo $row['id'];?>">
                              <label for="customCheckbox<?php echo $row['id'];?>" class="custom-control-label"><?php echo $row['ubwoko'];?></label>
                            </div>
                            <div class="<?php echo $row['ubwoko'];?> box mb-1 ml- col-sm-6">
                              <input type="text"  name="<?php echo $row['ubwoko']."_no";?>" class="p-1 form-control" placeholder="Nimero <?php echo $row['ubwoko'];?>">
                            </div>
                            </div>
                         <?php }

                         ?>
                          <div class="text-cente">
                             <label data-toggle="collapse" data-target="#demo" class="btn btn-info">Ibindi..</label>
                             <div id="demo" class="collapse">
                              <textarea name="ibindi" placeholder="Andika ubundi bwoko byibyatoraguwe cg ibyabuze" class="form-control"></textarea>
                             </div>
                          </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <div class="card  card-primary">
                <div class="card-header">
                    <h3 class="card-title">Amakuru yerekeye utanze itangazo</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <div class="card-body">
                      <div  class="mt-2">
                        <div class="row">
                          <div class="col-md-4 col-lg-2"><strong>Amazina</strong><b class="text-danger">*</b></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="hidden" name="amazinayuwataye" value="Rangisha">
                            <input type="text" class="form-control" value="<?php echo $admin_detail['firstname']." ".$admin_detail['lastname']; ?>"  disabled="true">
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-4 col-lg-2"><strong>Phone</strong><b class="text-danger">*</b></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="hidden" name="telefone" value="<?php echo $admin_detail['phone']; ?>">
                            <input type="text" class="form-control" value="<?php echo $admin_detail['phone']; ?>"  disabled="true">
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-4 col-lg-2"><strong>Email</strong></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="hidden" name="email" value="<?php echo $admin_detail['email']; ?>">
                            <input type="text" class="form-control" value="<?php echo $admin_detail['email']; ?>"  disabled="true" >
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-4 col-lg-2"><strong>District</strong><b class="text-danger">*</b></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="text" name="livedistrict" class="form-control">
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-4 col-lg-2"><strong>Sector</strong><b class="text-danger">*</b></div>
                          <div class="col-md-8 col-lg-10">
                            <input type="text" name="livecity" class="form-control">
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
                    <h3 class="card-title">Amakuru yerekeye ibyatowe</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nyirabyo</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name="nyirabyo" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Aho byatangiwe</label>
                        <div class="row">
                          <div class="col-md-6 col-lg-4"><input type="text" class="form-control" name="akarerebyatangiwe" id="exampleInputPassword1" placeholder="district"></div>
                          <div class="col-md-6 col-lg-4"><input type="text" class="form-control"  name="umurengebyatangiwe" placeholder="sector/city"></div>
                        </div>                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Aho byaburiye / byatoraguwe</label>
                        <div class="row">
                          <div class="col-md-6 col-lg-4"><input type="text" class="form-control"  name="akarerebyabuze" placeholder="district"></div>
                          <div class="col-md-6 col-lg-4"><input type="text" class="form-control"  name="umugi" id="exampleInputPassword1" placeholder="sector/city"></div>
                        </div>                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Igihe byaburiye / byatoraguwe</label>
                        <input type="date" class="form-control" name="itariki" id="exampleInputEmail1">
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
                      <div class="form-group">
                        <label class="form-check-label" for="exampleChec">Andi makuru</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label class="form-check-label"><b>Add Remarks</b></label>
                        <input type="hidden" name="adminid" value="<?php echo $_SESSION['administrative_permission']; ?>">
                        <textarea class="form-control" rows="3" name="remark" placeholder="Aho yabikura EX: Irangamuntu yawe wayikura kuri police station ya musanze ..."></textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
          <div class="submit text-center">
            <button class="btn btn-success w-25 px-5 py-2" type="submit" name="productsubmit"><h4><b>Submit</b></h4></button>
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
