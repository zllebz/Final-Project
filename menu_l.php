<!-- Main Sidebar Container -->
<!-- http://fordev22.com/ -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link bg-navy">
    <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">หน้าผู้ดูแลระบบ</a>
      </div>
    </div>




    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <!-- nav-compact -->
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">เมนู</li>




        <li class="nav-item">
          <a href="index.php" class="nav-link <?php if ($menu == "index") {
                                                echo "active";
                                              } ?> ">
            <i class="nav-icon fas fa-address-card"></i>
            <p>ระบบจัดการสมาชิก</p>
          </a>
        </li>



        <!-- <li class="nav-item">
            <a href="shop.php" class="nav-link <?php if ($menu == "shop") {
                                                  echo "active";
                                                } ?> ">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>Shop</p>
            </a>
          </li>

           <li class="nav-item">
            <a href="food.php" class="nav-link <?php if ($menu == "food") {
                                                  echo "active";
                                                } ?> ">
              <i class="nav-icon fas fa-hamburger"></i>
              <p>Food</p>
            </a>
          </li> -->

        <li class="nav-item">
          <a href="doc.php" class="nav-link <?php if ($menu == "doc") {
                                              echo "active";
                                            } ?> ">
            <i class="nav-icon fas fa-file-pdf"></i>
            <p>ระบบจัดการแบบฟอร์มเอกสาร</p>
          </a>
        </li>


        <!-- <li class="nav-item">
            <a href="from.php" class="nav-link <?php if ($menu == "from") {
                                                  echo "active";
                                                } ?> ">
              <i class="nav-icon fas fa-apple-alt"></i>
              <p>Form</p>
            </a>
          </li>

      

          <li class="nav-item">
            <a href="table.php" class="nav-link <?php if ($menu == "table") {
                                                  echo "active";
                                                } ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>Tebles</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="button.php" class="nav-link <?php if ($menu == "button") {
                                                    echo "active";
                                                  } ?>">
              <i class="nav-icon fas fa-check-square"></i>
              <p>Buttons</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="icon.php" class="nav-link <?php if ($menu == "icon") {
                                                  echo "active";
                                                } ?>">
              <i class="nav-icon fas fa-icons"></i>
              <p>Icon</p>
            </a>
          </li> -->
        <div class="user-panel mt-2 pb-3 mb-2 d-flex">

        </div>
        <li class="nav-item">
          <a href="http://fordev22.com/" class="nav-link text-danger">
            <i class="nav-icon fas fa-power-off"></i>
            <p>ออกจากระบบ</p>
          </a>
        </li>




      </ul>
    </nav>

    <!-- /.sidebar-menu -->
    <!-- http://fordev22.com/ -->
  </div>
  <!-- /.sidebar -->
</aside>