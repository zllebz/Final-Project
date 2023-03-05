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
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_name']);
  header('location: layout/login.php');
}

?>
<?php
$menu = "sheet_2";
$title = "ใบงานที่ 2";
require_once "../db/connect.php";
if ($_SESSION['position_id'] == 1) {
  $result = $controller->getsheet2();
} elseif ($_SESSION['position_id'] == 2) {
  $result = $controller->getsheet2if();
}
$number = 1;
?>

<?php include("../dem/header.php"); ?>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header" style="background-color:#652D91">
      <h3 class="card-title" style="color:white">ตารางระบบจัดการเอกสารเรื่องการเก็บข้อมูลการประกอบอาชีพในท้องถิ่น</h3>
    </div>
    <br>
    <div class="card-body p-1">

      <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-12">

          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
              <tr role="row" class="info">
              <th tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ลำดับ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ID</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">รหัสส่วนต้น</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ข้อมูลพื้นที่ทำนา</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ข้อมูลการทำประมง</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ข้อมูลการทำอุตสาหกรรมครัวเรือน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 1%;">สถานะ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?php echo $row["worksheet2_id"]; ?></td>
                  <td><?php echo $row["first_storage_id"]; ?></td>
                  <td><?php echo $row["agriculture"]; ?></td>
                  <td><?php echo $row["fishing"]; ?></td>
                  <td><?php echo $row["s_industry"]; ?></td>
                  <td>
                    <?php if ($row["status"] == 0) {
                      echo '<i class="fas fa-circle" style="color:red;" ></i>';
                    } else {
                      echo '<i class="fas fa-circle" style="color:green;" ></i>';
                    }
                    ?>
                  <td>
                    <a class="btn btn-info btn-xs" href="../edit_view/v_sheet_2.php?id=<?php echo $row["worksheet2_id"]; ?>">
                      <i class="fas fa-eye"></i>
                    </a>
                    <?php if ($_SESSION['position_id'] == 1) {
                      echo '<a class="btn btn-warning btn-xs" href="../edit_view/e_sheet_2.php?id=' . $row["worksheet2_id"] . '">' . '<i class="fas fa-pencil-alt"></i></a>';
                    } ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>

      </div>

    </div>

  </div>
  </div>
  <!-- /.col -->
  </div>
</section>

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