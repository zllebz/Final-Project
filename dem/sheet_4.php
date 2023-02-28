<?php

$menu = "sheet_4";
$title = "ใบงานที่ 4";
require_once "../db/connect.php";
$result = $controller->getsheet4();
?>

<?php include("../dem/header.php"); ?>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header bg-navy">
      <h3 class="card-title">ตารางระบบจัดการเอกสารเรื่องการเก็บข้อมูลประวัติหมู่บ้าน ชุมชน วิถีชุมชน</h3>
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
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ประวัติหมู่บ้าน</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วิถีชีวิต</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 1%;">สถานะ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $row["worksheet4_id"]; ?></td>
                  <td><?php echo $row["first_storage_id"]; ?></td>
                  <td><?php echo $row["village_history"]; ?></td>
                  <td><?php echo $row["way_life"]; ?></td>
                  <td><?php if($row["status"]== 0){
                    echo '<i class="fas fa-circle" style="color:red;" ></i>';
                  }else{
                    echo '<i class="fas fa-circle" style="color:green;" ></i>';
                  }
                    ?>    
                  <td>
                  <a class="btn btn-info btn-xs" href="../edit_view/v_sheet_4.php?id=<?php echo $row["worksheet4_id"]; ?>">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-warning btn-xs" href="../edit_view/e_sheet_4.php?id=<?php echo $row["worksheet4_id"]; ?>">
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