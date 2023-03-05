<?php
ob_start();
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_name']);
  header('location: ../layout/login.php');
}
?>
<aside class="main-sidebar sidebar-light-purple elevation-4" >
  <!-- Brand Logo -->
  <a href="" class="brand-link " style="background-color:#f4f6f9" >
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="../dem/index.php" class="d-block"><?php if ($_SESSION['position_id'] == 1) {
             echo '<p>เมนูผู้ดูแลระบบ</p>';
            }else{
              echo '<p>เมนูผู้ใช้งาน</p>';
            }?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <!-- nav-compact -->
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">เมนู</li>


        <li class="nav-item ">
          <a href="index.php" class="nav-link <?php if ($menu == "index") {
                                                            echo "active";
                                                          } ?>">
            <i class="nav-icon fas fa-address-card"></i>
            <?php if ($_SESSION['position_id'] == 1) {
             echo '<p>ระบบจัดการสมาชิก</p>';
            }else{
              echo '<p>ส่วนจัดการ (เฉพาะผู้ดูแลระบบ)</p>';
            }
            
            ?>
          </a>
        </li>

        <li class="nav-item">
          <a href="table.php" class="nav-link <?php if ($menu == "table_loc") {
                                                echo "active";
                                              } ?>">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>ข้อมูลสถานที่ที่ลงพื้นที่</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="table_data.php" class="nav-link <?php if ($menu == "table_data") {
                                                      echo "active";
                                                    } ?>">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>ข้อมูลส่วนต้นเอกสาร</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              ข้อมูลเอกสาร
              <span class="badge badge-info right">9</span>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item ">
              <a href="sheet_1.php" class="nav-link  <?php if ($menu == "sheet_1") {
                                                      echo "active bg-purple";
                                                    } ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>ใบงานที่ 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="sheet_2.php" class="nav-link <?php if ($menu == "sheet_2") {
                                                      echo "active bg-purple";
                                                    } ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>ใบงานที่ 2</p>
              </a>
            </li>
        </li>
        <li class="nav-item">
          <a href="sheet_3.php" class="nav-link <?php if ($menu == "sheet_3") {
                                                  echo "active bg-purple";
                                                } ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>ใบงานที่ 3</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="sheet_4.php " class="nav-link <?php if ($menu == "sheet_4") {
                                                    echo "active bg-purple";
                                                  } ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>ใบงานที่ 4</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sheet_5.php " class="nav-link <?php if ($menu == "sheet_5") {
                                                    echo "active bg-purple";
                                                  } ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>ใบงานที่ 5</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sheet_6.php " class="nav-link <?php if ($menu == "sheet_6") {
                                                    echo "active bg-purple";
                                                  } ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>ใบงานที่ 6</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sheet_7.php" class="nav-link <?php if ($menu == "sheet_7") {
                                                  echo "active bg-purple";
                                                } ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>ใบงานที่ 7</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sheet_8.php" class="nav-link <?php if ($menu == "sheet_8") {
                                                  echo "active bg-purple";
                                                } ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>ใบงานที่ 8</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sheet_9.php " class="nav-link <?php if ($menu == "sheet_9") {
                                                    echo "active bg-purple";
                                                  } ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>ใบงานที่ 9</p>
          </a>
        </li>
      </ul>
      </li>

      <li class="nav-item">
        <a href="doc.php" class="nav-link <?php if ($menu == "doc") {
                                            echo "active bg-purple";
                                          } ?> ">
          <i class="nav-icon fas fa-file-pdf"></i>
          <p>รูปแบบเอกสาร</p>
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