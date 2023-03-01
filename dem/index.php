<?php
$menu = "index";
$title = 'จัดการข้อมูลสมาชิก';
include("../dem/header.php");
require_once "../db/connect.php";
$result = $controller->getUser();
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1><i class="nav-icon fas fa-address-card"></i> จัดการข้อมูลสมาชิก</h1>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">



  <div class="card">
    <div class="card-header bg-navy">


      <div align="right">
        <a href="#"
          type="button"></a>

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
                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อผู้ใช้</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">นามสกุล</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">อีเมล์</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ตำแหน่ง</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สิทธิ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เวลา</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">จัดการ</th>



              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $row["user_id"]; ?></td>
                  <td><?php echo $row["user_firstname"]; ?></td>
                  <td><?php echo $row["user_lastname"]; ?></td>
                  <td><?php echo $row["user_email"]; ?></td>
                  <td><?php echo $row["position_id"]; ?></td>
                  <td><?php echo $row["permission_id"]; ?></td>
                  <td><?php echo $row["user_create"]; ?></td>

                  <td>
                  <a class="btn btn-info btn-xs" href="../edit_view/e_user.php?id=<?php echo $row["user_id"]; ?>">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-warning btn-xs" href="../edit_view/e_user.php?id=<?php echo $row["user_id"]; ?>">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                  </td>
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