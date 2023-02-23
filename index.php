<?php
$menu = "index";
$title = 'จัดการข้อมูลสมาชิก';
?>
<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1><i class="nav-icon fas fa-address-card"></i> จัดการข้อมูลสมาชิก</h1>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">



  <div class="card">
    <div class="card-header card-navy card-outline">


      <div align="right">
        <a href="#">
          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user-plus"></i> เพิ่มข้อมูล สมาชิก</button></a>

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
                <th tabindex="0" rowspan="1" colspan="1" style="width: 18%;">ชื่อผู้ใช้</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 18%;">สถานะ</th>
                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">-</th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <td>
                  1.
                </td>
                <td>
                  admin01
                </td>
                <td>
                  ผู้ดูแลระบบ
                </td>
                <td>

                  <a class="btn btn-info btn-xs" href="#" target="_blank">
                    <i class="fas fa-eye">
                    </i>

                  </a>


                  <a class="btn btn-warning btn-xs" href="#" target="_blank">
                    <i class="fas fa-pencil-alt">
                    </i>
                  </a>

                  <a class="btn btn-danger btn-xs" href="#" target="_blank">
                    <i class="fas fa-trash-alt">
                    </i>
                  </a>
                </td>


              </tr>

              <tr>
                <td>
                  2.
                </td>
                <td>
                  admin02
                </td>
                <td>
                  ผู้ดูแลระบบ
                </td>
                <td>

                  <a class="btn btn-info btn-xs" href="#" target="_blank">
                    <i class="fas fa-eye">
                    </i>

                  </a>


                  <a class="btn btn-warning btn-xs" href="#" target="_blank">
                    <i class="fas fa-pencil-alt">
                    </i>
                  </a>

                  <a class="btn btn-danger btn-xs" href="#" target="_blank">
                    <i class="fas fa-trash-alt">
                    </i>
                  </a>
                </td>


              </tr>

              <tr>
                <td>
                  3.
                </td>
                <td>
                  users01
                </td>
                <td>
                  ผู้ใช้งาน
                </td>
                <td>

                  <a class="btn btn-info btn-xs" href="#" target="_blank">
                    <i class="fas fa-eye">
                    </i>

                  </a>


                  <a class="btn btn-warning btn-xs" href="#" target="_blank">
                    <i class="fas fa-pencil-alt">
                    </i>
                  </a>

                  <a href="#" class="btn btn-danger btn-xs">
                    <i class="fas fa-trash-alt">
                    </i>
                  </a>
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
<?php include('footer.php'); ?>
<script>
  $(function() {
    $(".datatable").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>

</html>