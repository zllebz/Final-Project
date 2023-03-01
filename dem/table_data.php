<?php

$menu = "table_data";
$title = "ข้อมูลสถานที่ที่ลงพื้นที่";
require_once "../db/connect.php";
$result = $controller->getfirst2();
?>


<?php include("../dem/header.php"); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>ข้อมูลส่วนต้นเอกสาร <i class="fas fa-file-alt"></i></h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">









  <div class="card">
    <div class="card-header bg-navy ">

      <h3 class="card-title">ข้อมูลส่วนต้นเอกสาร</h3>

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
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ชื่อสถานที่ที่ลงพื้นที่</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ใบงาน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">คำชี้แจง</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $row["first_storage_id"]; ?></td>
                  <td><?php echo $row["data_store_local"]; ?></td>
                  <td><?php if($row["doc_id"]== 1 ){
                    echo "ใบงานที่ 1";
                  } elseif($row["doc_id"]== 2 ){
                    echo "ใบงานที่ 2";
                  } elseif($row["doc_id"]== 3 ){
                    echo "ใบงานที่ 3";
                  } elseif($row["doc_id"]== 4 ){
                    echo "ใบงานที่ 4";
                  } elseif($row["doc_id"]== 5 ){
                    echo "ใบงานที่ 5";
                  } elseif($row["doc_id"]== 6 ){
                    echo "ใบงานที่ 6";
                  } elseif($row["doc_id"]== 7 ){
                    echo "ใบงานที่ 7";
                  } elseif($row["doc_id"]== 8 ){
                    echo "ใบงานที่ 8";
                  } elseif($row["doc_id"]== 9 ){
                    echo "ใบงานที่ 9";
                  } else{
                    echo "ไม่ทราบ";
                  };?></td>
                  <td><?php echo $row["statement"]; ?></td>
                  <td>
                  <a class="btn btn-info btn-xs" href="../edit_view/v_first.php?id=<?php echo $row["first_storage_id"]; ?>">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-warning btn-xs" href="../edit_view/e_first.php?id=<?php echo $row["first_storage_id"]; ?>">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a class="btn btn-success btn-xs" href="../layout/worksheet_<?php echo $row['doc_id']; ?>.php?id=<?php echo $row["first_storage_id"]; ?>">
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