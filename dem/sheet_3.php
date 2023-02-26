<?php

$menu = "sheet3";
$title = "ใบงานที่ 3";
require_once "../db/connect.php";
$result = $controller->getsheet3();
?>

<?php include("../dem/header.php"); ?>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header bg-navy">
      <h3 class="card-title">ตารางระบบจัดการเอกสารเรื่องการเก็บข้อมูลด้านกายภาพในท้องถิ่น</h3>
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
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">รหัสส่วนต้น</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ข้อมูลภูมิประเทศ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ข้อมูลลักษณะดิน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ข้อมูลแหล่งน้ำธรรมชาติ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 1%;">สถานะ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $row["worksheet3_id"]; ?></td>
                  <td><?php echo $row["first_storage_id"]; ?></td>
                  <td><?php echo $row["terrain"]; ?></td>
                  <td><?php echo $row["soilitype"]; ?></td>
                  <td><?php echo $row["natural_water"]; ?></td>
                  <td><?php echo $row["status"]; ?><td>
                    <a class="btn btn-info btn-xs" href="#" target="_blank">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-warning btn-xs" href="#" target="_blank">
                      <i class="fas fa-pencil-alt"></i>
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