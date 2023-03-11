<?php
session_start();

if (!isset($_SESSION['user_name'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../layout/login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_name']);
  header('location: layout/login.php');
}
$menu = "check";
$title = 'ตรวจสอบสถานะสมาชิก';
include("../dem/header0.php");
require_once "../db/connect.php";
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1><i class="nav-icon fas fa-address-card"></i> ตรวจสอบสถานะสมาชิก</h1>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">



  <div class="card">
  <div class="card-header" style="background-color:#652D91">



      <div align="right">
        <a href="#" type="button"></a>

      </div>
    </div>
    <br>
    <div class="card-body p-1">
      <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-sm-12 col-md-12">
          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
              <tr role="row" class="info">
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อผู้ใช้</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">นามสกุล</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">อีเมล์</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เวลา</th>

              </tr>
            </thead>
            <tbody>
                <tr>
                  <td><?php echo $_SESSION["user_id"]; ?></td>
                  <td><?php echo $_SESSION["user_name"]; ?></td>
                  <td><?php echo $_SESSION["user_firstname"]; ?></td>
                  <td><?php echo $_SESSION["user_lastname"]; ?></td>
                  <td><?php echo $_SESSION["user_email"]; ?></td>
                  <td><?php if($_SESSION["permission_id"]==0){
                    echo 'รออนุมัติการเข้าใช้งาน';
                  }?></td>
                  <td><?php echo $_SESSION["user_create"]; ?></td>
                  </td>
                </tr>
            </tbody>
          </table>

        </div>
        <div class="col-md-1">

        </div>
      </div>
    </div>

  </div>



  </div>
  <!-- /.col -->
  </div>
</section>
<!-- /.content -->
<?php include('../dem/footer.php'); ?>
<script>
  $(function() {
    $(".datatable").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
</body>

</html>