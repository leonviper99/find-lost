<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="R" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Rangisha</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <a href="admin_profile.php?admin"><div class="user-panel mt-1 pb-1 mb-1 d-flex">
        <div class="image">
          <?php if (!empty($admin_detail["admin_picture"])) {
            echo '<img src="images/'.$admin_detail["admin_picture"].'" class="img-circle elevation-2" alt="Admin">';
          }
          else{
            echo '<img src="dist/img/avatar1.jpg" class="img-circle elevation-2" alt="Admin">';
          } ?>         
        </div>
        <div class="info">
          <span class="d-block"><?php echo($admin_detail["firstname"]."  ".$admin_detail["lastname"]); ?></span>
          <span><small><i class="fa fa-circle text-success"></i> Online</small></span>
        </div>
      </div></a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->





               <!-- ************* PRODUCT  *********************  -->





          <li class="nav-item has-treeview menu-ope">
            <a href="#" class="nav-link activ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product.php" class="nav-link activ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                  <?php 
                      echo '<span class="badge badge-info right">'.$product->Get_total_uplods().'</span>';
                  ?>
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a href="lost_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lost product</p>
                  <?php  echo '<span class="badge badge-danger right">'.$product->Get_lost_product().'</span>';
                  ?>
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a href="found_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Found Product</p>
                  <?php echo '<span class="badge badge-warning right">'.$product->Get_found_product().'</span>';
                  ?>
                </a>
              </li>
              <li class="nav-item">
                <a href="todayproduct.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Product</p>
                  <?php $todaydate=date("Y-m-d"); $fetch=$db->query("SELECT * FROM product WHERE advert_date='".$todaydate."'");
                      echo '<span class="badge badge-secondary right">'.$fetch->num_rows.'</span>';
                  ?>
                </a>
            </ul>
          </li>




          <!-- ************* PRODUCT MANAGEMENT *********************  -->






          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Product Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="lost_product_control.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lost product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="found_product_control.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Found Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="succeed_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Succeed Product</p>
                </a>
              </li>
            </ul>
          </li>



      <!-- *************  MAIL BOX  *********************  -->



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="mailbox.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="composemail.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mailbox.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>






          <!-- *************  MANAGE CATEGORIES  *********************  -->






          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Manage Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Categories.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add category</p>
                </a>
              </li>
            </ul>
          </li>





          <!-- *************  MAIL BOX  *********************  -->





          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unpaid product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>








          <li class="nav-header">OTHERS</li>
          <li class="nav-item">
            <a href="rangisha_admins.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Admins
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="visitors.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Visitors
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>




          
         
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
         
        </ul>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>