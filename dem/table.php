<?php

$menu = "table_loc";
$title = "ข้อมูลสถานที่ที่ลงพื้นที่";
require_once "../db/connect.php";
$result = $controller->getDatastore();
?>


<?php include("../dem/header.php"); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>หน้าจัดการเอกสารสถานที่ <i class="fas fa-file-alt"></i></h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">









  <div class="card">
    <div class="card-header bg-navy ">

      <h3 class="card-title">ตารางระบบจัดการเอกสถานที่</h3>
      <div align="right">
        <a href="../layout/datastores.php">
          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user-plus"></i> เพิ่มข้อมูลการลงพื้นที่</button></a>

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
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานที่สำรวจ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ผู้จัดทำ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $row["data_store_id"]; ?></td>
                  <td><?php echo $row["data_store_local"]; ?></td>
                  <td><?php echo $row["user_firstname"]; ?></td>
                  <td><?php echo $row["data_store_date"]; ?></td>
                  <td>
                    <a class="btn btn-info btn-xs" href="#" target="_blank">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-warning btn-xs" href="#" target="_blank">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a class="btn btn-success btn-xs" href="../layout/firststorage.php?id=<?php echo $row["data_store_id"]; ?>">
                      <i class="fas fa-file-alt"></i>
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