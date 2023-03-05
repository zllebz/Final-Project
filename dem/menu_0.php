<?php
ob_start();
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_name']);
  header('location: ../layout/login.php');
}
?>
<aside class="main-sidebar sidebar-light-purple elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link"style="background-color:#f4f6f9">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <a href="../dem/check.php" class="d-block"><?php if ($_SESSION['position_id'] == 1) {
                                    echo '<p>เมนูผู้ดูแลระบบ</p>';
                                  } else {
                                    echo '<p> เมนูผู้ใช้งาน (รออนุมัติการเข้าใช้งาน)</p>';
                                  } ?></a>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <!-- nav-compact -->
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">เมนู</li>

        <li class="nav-item">
          <a href="check.php" class="nav-link <?php if ($menu == "check") {
                                                echo "active";
                                              } ?>">
            <i class="nav-icon fas fa-address-card"></i>
            <p>ตรวจสอบสถานะสมาชิก</p>
          </a>
        </li>



        <div class="user-panel mt-2 pb-3 mb-2 d-flex">

        </div>
        <li class="nav-item">
          <a href="index.php?logout='1'" class="nav-link text-danger">
            <i class="nav-icon fas fa-power-off"></i>
            <p>ออกจากระบบ</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>