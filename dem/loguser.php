<?php
session_start();

if (!isset($_SESSION['user_name'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../layout/login.php');
}

if ($_SESSION['permission_id'] == 0) {
  $_SESSION['msg'] = "ไม่มีสิทธิเข้าถึง";
  header('location: ../dem/check.php');
}

if ($_SESSION['position_id'] == 2) {
  $_SESSION['msg'] = "ไม่มีสิทธิเข้าถึง";
  header('location: ../dem/table.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_name']);
  header('location: layout/login.php');
}


$menu = "index";
$title = 'ข้อมูลการเข้าสู่ระบบ';
include("../dem/header.php");
require_once "../db/connect.php";
$result = $controller->getlogall();
$number = 1;
?>
<section class="content">



  <div class="card">
    <div class="card-header" style="background-color:#652D91">

      <h3 class="card-title" style="color:white">ข้อมูลการเข้าสู่ระบบ</h3>
      <div align="right">
        <?php if ($_SESSION['position_id'] == 1) {
          echo '<a class="btn btn-primary btn-xs" href="../layout/logfile.php"><i class="fas fa-file-alt"></i></a>';
        } ?>
        <?php if ($_SESSION['position_id'] == 1) {
          echo '<a href="../dem/index.php">
          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal">จัดการข้อมูลสมาชิก</button></a>';
        }
        ?>
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
              <tr role="row" class="info" >
                <th tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ลำดับ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ID</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อผู้ใช้งาน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">นามสกุล</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">อีเมล์</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ตำแหน่ง</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เวลาเข้าสู่ระบบ</th>
              </tr>
            </thead>
            <tbody>

              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?php echo $row["logfile_id"]; ?></td>
                  <td><?php echo $row["user_name"]; ?></td>
                  <td><?php echo $row["user_firstname"]; ?></td>
                  <td><?php echo $row["user_lastname"]; ?></td>
                  <td><?php echo $row["user_email"]; ?></td>
                  <td><?php if ($row["position_id"] == 1) {
                        echo 'ผู้ดูแลระบบ';
                      } elseif ($row["position_id"] == 2) {
                        echo 'ผู้ใช้งาน';
                      } ?></td>
                  <td><?php echo $row["date_time"]; ?></td>
                </tr>
              <?php } ?>
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