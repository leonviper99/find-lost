<?php
include 'backend/connect.php';
session_start();
include 'All.classes.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Rangisha-ibyabuze//ibyatowe</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Favicon -->
  <link href="images/logo/icon/logo.png" rel="shortcut icon"/>
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="styles/magnific-popup.css"/>
  <link rel="stylesheet" href="styles/slicknav.min.css"/>
  <link rel="stylesheet" href="styles/owl.carousel.min.css"/>
  <link rel="stylesheet" type="text/css" href="styles/advert.css">
  <link rel="stylesheet" type="text/css" href="styles/footer.css">
  <link rel="stylesheet" type="text/css" href="styles/header.css">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- DATE-PICKER -->
    <link rel="stylesheet" href="plugins/date-picker/css/datepicker.min.css">


  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="styles/style.css"/>

  <script>
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            var inputValue = $(this).attr("name");
            $("." + inputValue).toggle();
        });
    });
  </script>
<style type="text/css">
#regiration_form button{
  border: none;
  border-radius: 25px;
}
.box{
  display: none;
}
.box input{
  border: 2px solid orange;
  padding: 2px;
}
.transform{
  text-transform: uppercas;
}
</style>
</head>
<div id="overlay"></div>
<body style="background-image: url(images/bg-atmosphere.jpg);background-size: cove;" class="bg-ligh">
<?php include 'header.php';  ?>

  <div class="page containe bg-light my-3">
    <div class="pb-3">


        <div class="tab bg-white">
          <div class="tab-inner">
            <button class="tablinks left" onclick="openCity(event, 'ibyabuze')" id="defaultOpen">Ibyabuze <span class="text-success"><img src="images/icons/tick.png" width="20px" height="20px"></span></button>
          </div>
          <div class="tab-inner">
            <button class="tablinks right" onclick="openCity(event, 'ibyatoraguwe')">Ibyatowe<span class="text-success"><img src="images/icons/tick.png" width="20px" height="20px"></span></button>
          </div>
        </div>


          <!-- ################  IBYABUZE    ############## -->
          

        <form class="form-detail mx-2 mx-md-0" action="backend/save_advert.php" method="POST" enctype="multipart/form-data" onsubmit="return Validate()" name="vform">
          <div class="tabcontent p-2 bg-white mb-2" id="ibyabuze">
              <div class="text-center mb-4">
                <h4 class="text-secondary">Rangisha ibyo wabuze</h4>
                <input type="hidden" name="adverttype" value="byarabuze">
              </div>
              <div class="row">
                <div class="col-md-4"><label><b>Ibyabuze</b></label></div>          
                <div class="col-md-8 pl-5 pl-md-0">
                    <div id="property_error"></div>
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
                  <div class="text-cente my-2">
                     <label class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo"><b>Ibindi..</b></label>
                     <div id="demo" class="collapse">
                      <textarea name="ibindi" class="form-control"  id="title" placeholder="Andika ubundi bwoko bwibyabuze"></textarea>
                      <small class="text-danger"><b class="input-group-addon" id="left">60</b>  remaining</small>
                     </div>
                  </div>
                </div>
              </div>
              <h5 class="text-primary text-century"><strong> Amakuru yerekeye ibyabuze</strong></h5>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Nyirabyo</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-md-6"><input type="" placeholder="amazina" class="form-control transform" name="nyirabyo"></div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Aho byatangiwe</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6">
                    <select class='form-control' name='akarerebyatangiwe'>
                      <option value=''>Akarere</option>
                      <?php
                        $stmt=$db->query("SELECT DISTINCT district FROM districts order by id");
                        echo "";
                          while ($row2 = $stmt->fetch_assoc()) {
                          echo "<option value='$row2[district]'>$row2[district]</option>";
                        }
                          echo "";
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-6 mt-2 mt-sm-0"><input type="" placeholder="umurenge" class="form-control" name="umurengebyatangiwe"></div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Aho byaburiye</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6">
                    <select class='form-control' name='akarerebyabuze' >
                      <option value=''>Akarere</option>
                      <?php
                        $stmt=$db->query("SELECT DISTINCT district FROM districts order by id");
                        echo "";
                          while ($row2 = $stmt->fetch_assoc()) {
                          echo "<option value='$row2[district]'>$row2[district]</option>";
                        }
                          echo "";
                      ?>
                    </select>
                    <div id="diserror"></div>
                  </div>
                  <div class="col-sm-6 mt-2 mt-sm-0"><input type="" placeholder="umugi cg umurenge" class="form-control" name="umugi" ></div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Igihe byaburiye</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6">
                    <input type="date" class="form-control datepicker-her" name="itariki">
                    <div id="itariki_error"></div>
                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Amafoto</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6"><input type="file" name="ifoto[]" multiple></div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Andi makuru</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6"><textarea name="description" class="form-control" placeholder="Andi makuru watanga kubyabuze"></textarea></div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6"></div>
                </div>
              </div>

              <h5 class="text-primary text-century"><strong> Amakuru yuwataye</strong></h5>


              <div class="row mt-4">
                <div class="col-md-3"><label><b>Amazina</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6"><input type="text" name="amazinayuwataye" class="form-control"></div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Phone</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6">
                    <input type="text" name="telefone"  class="form-control" value="078">
                    <div id="telefone_error"></div>
                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Email</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6"><input type="email" name="email" placeholder="...@gmail.com" class="form-control"></div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3"><label><b>District</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6">
                    <select class='form-control' name='livedistrict' >
                      <option value=''>Akarere</option>
                      <?php
                        $stmt=$db->query("SELECT DISTINCT district FROM districts order by id");
                        echo "";
                          while ($row2 = $stmt->fetch_assoc()) {
                          echo "<option value='$row2[district]'>$row2[district]</option>";
                        }
                          echo "";
                      ?>
                    </select>
                  </div>
                </div>
              </div>          
              <div class="row mt-4">
                <div class="col-md-3"><label><b>Sector</b></label></div>
                <div class="col-md-9 row">
                  <div class="col-sm-6">
                    <input type="text" name="livecity"  placeholder="Sector/umuryi" class="form-control">
                    <div id="custm_error"></div>
                  </div>
                </div>
              </div>
              <div class="form-submit py-2 text-center">
                <button type="submit" name="lostadvertsubmit" class="btn mt-3" ><b>Next</b></button>
              </div>
          </div>
        </form>




          <!-- #################    END  IBYABUZE     ################## -->



            <!-- ##################   Ibyatoraguwe    ######################### -->





            <form class="form-detail mx-2 mx-md-0" action="backend/save_advert.php" method="POST" enctype="multipart/form-data" onsubmit="return validateFound()" name="foundform">
              <div class="tabcontent p-2 bg-white mb-2" id="ibyatoraguwe">
                  <div class="text-center mb-4">
                    <h4 class="text-secondary">Ranga ibyo watoraguye</h4>
                    <input type="hidden" name="adverttype" value="byaratoraguwe">
                  </div>
                  <div class="row">
                    <div class="col-md-4"><label><b>Ibyatowe</b></label></div>          
                    <div class="col-md-8 pl-5 pl-md-0">
                      <div id="property_error1"></div>
                        <?php
                                  $select=$db->query("SELECT * FROM categories");
                                  while ($row=$select->fetch_assoc()) {?>
                                    <div class="row">
                                    <div class="col-sm-6 custom-control custom-checkbox">
                                      <input class="custom-control-input" type="checkbox" name="a<?php echo $row['ubwoko'];?>" value="1" id="customCheckbox<?php echo $row['ubwoko'];?>">
                              <label for="customCheckbox<?php echo $row['ubwoko'];?>" class="custom-control-label"><?php echo $row['ubwoko'];?></label>
                                    </div>
                                    <div class="a<?php echo $row['ubwoko'];?> box mb-1 ml- col-sm-6">
                                      <input type="text"  name="<?php echo $row['ubwoko']."_no";?>" class="p-1 form-control" placeholder="Nimero <?php echo $row['ubwoko'];?>">
                                    </div>
                                    </div>
                                 <?php }

                                 ?>
                      <div class="text-cente my-2">
                         <label class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo1"><b>Ibindi..</b></label>
                         <div id="demo1" class="collapse">
                          <textarea name="ibindi" class="form-control" placeholder="Andika ubundi bwoko bwibyatoraguwe"></textarea>
                         </div>
                      </div>
                    </div>
                  </div>
                  <h5 class="text-primary text-century"><strong> Amakuru yerekeye ibyatowe</strong></h5>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Nyirabyo</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-md-6"><input type="" placeholder="amazina" class="form-control" name="nyirabyo"></div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Aho byatangiwe</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6">
                        <select class='form-control' name='akarerebyatangiwe' >
                          <option value=''>Akarere</option>
                          <?php
                            $stmt=$db->query("SELECT DISTINCT district FROM districts order by id");
                            echo "";
                              while ($row2 = $stmt->fetch_assoc()) {
                              echo "<option value='$row2[district]'>$row2[district]</option>";
                            }
                              echo "";
                          ?>
                        </select>
                      </div>
                      <div class="col-sm-6 mt-2 mt-sm-0"><input type="" placeholder="umurenge" class="form-control" name="umurengebyatangiwe"></div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Aho byatoraguwe</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6">
                        <select class='form-control' name='akarerebyabuze' >
                          <option value=''>Akarere</option>
                          <?php
                            $stmt=$db->query("SELECT DISTINCT district FROM districts order by id");
                            echo "";
                              while ($row2 = $stmt->fetch_assoc()) {
                              echo "<option value='$row2[district]'>$row2[district]</option>";
                            }
                              echo "";
                          ?>
                        </select>
                        <div id="diserror1"></div>
                      </div>
                      <div class="col-sm-6 mt-2 mt-sm-0"><input type="" placeholder="umugi cg umurenge" class="form-control" name="umugi" ></div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Igihe byatoraguwe</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6">
                        <input type="date" name="itariki" class="form-control">
                        <div id="itariki_error1"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Amafoto</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6"><input type="file" name="ifoto[]" multiple></div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Andi makuru</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6"><textarea name="description" class="form-control" placeholder="Andi makuru watanga kubyabuze"></textarea></div>
                    </div>
                  </div>

                  <h5 class="text-primary text-century"><strong> Amakuru yuwabitoye</strong></h5>


                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Amazina</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6"><input type="text" name="amazinayuwataye" class="form-control"></div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Phone</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6">
                        <input type="" name="telefone" pattern=".{10,}" title="numero igomba kuba aricumi"  class="form-control">
                        <div id="telefone_error1"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Email</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6"><input type="email" name="email" placeholder="...@gmail.com" class="form-control"></div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>District</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6">
                        <select class='form-control' name='livedistrict' >
                          <option value=''>Akarere</option>
                          <?php
                            $stmt=$db->query("SELECT DISTINCT district FROM districts order by id");
                            echo "";
                              while ($row2 = $stmt->fetch_assoc()) {
                              echo "<option value='$row2[district]'>$row2[district]</option>";
                            }
                              echo "";
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>          
                  <div class="row mt-4">
                    <div class="col-md-3"><label><b>Sector</b></label></div>
                    <div class="col-md-9 row">
                      <div class="col-sm-6">
                        <input type="text" name="livecity"  placeholder="Sector/umuryi" class="form-control">
                        <div id="custm_error1"></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-submit py-2 text-center">
                    <button type="submit" name="foundadvertsubmit" class="btn mt-3" ><b>Next</b></button>
                  </div>
              </div>
            </form>

            <!-- ########################    END  IBYATORAGUWE   ########################## -->

    </div>
  </div>
  <?php include 'footer.php'; ?>
  <script src="js/advert.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/main.js"></script>
  <!-- DATE-PICKER -->
    <script src="plugins/date-picker/js/datepicker.js"></script>
    <script src="plugins/date-picker/js/datepicker.en.js"></script>

</body>
</html>