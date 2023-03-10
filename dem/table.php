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
$menu = "table_loc";
$title = "ข้อมูลสถานที่ที่ลงพื้นที่";
require_once "../db/connect.php";
$result = $controller->getDatastore();
$number = 1;
?>


<?php include("../dem/header.php"); ?>




<!-- Main content -->
<section class="content">


  <div class="card">
  <div class="card-header" style="background-color:#652D91">

      <h3 class="card-title"style="color:white">ตารางระบบจัดการสถานที่</h3>
      <div align="right">
        <?php if ($_SESSION['position_id'] == 1) {
          echo '<a href="../layout/datastores.php">
          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-plus-lg"></i> เพิ่มข้อมูลการลงพื้นที่</button></a>';
        }
        ?>  
      </div>
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
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานที่สำรวจ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ผู้จัดทำ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                <td><?php echo $number++; ?></td>
                  <td><?php echo $row["data_store_id"]; ?></td>
                  <td><?php echo $row["data_store_local"]; ?></td>
                  <td><?php echo $row["user_firstname"]; ?></td>
                  <td><?php echo $row["data_store_date"]; ?></td>
                  <td>
                    <?php if ($_SESSION['position_id'] == 1) {
                      echo '<a class="btn btn-success btn-xs" href="../layout/firststorage.php?id=' . $row["data_store_id"] . '">' . '<i class="bi bi-plus-lg">จำทำข้อมูลส่วนต้น</i></a>';
                    } ?>
                    </a>
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