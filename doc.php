<?php

$menu = "doc";
$title = "ระบบจัดการแบบฟอร์มเอกสาร";
?>

<?php include("header.php"); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>ระบบจัดการแบบฟอร์มเอกสาร</h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card">
    <div class="card-header card-navy card-outline">


      <div align="right">
        <a href="#">
          <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#exampleModal"></i> เพิ่มเอกสาร</button></a>

      </div>
    </div>
    <br>
    <div class="card-body p-1">

      <div class="row">
        <div class="col-md-1">

        </div>


        <div class="col-md-12">

          <div class="col-sm-12 col-md-12">

            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row" class="info">
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 4%;">ลำดับ</th>
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อเอกสาร</th>
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 8%;">พิมพ์เอกสาร</th>
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จัดการ</th>



                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>
                    001
                  </td>

                  <td>
                    การเก็บข้อมูลพื้นฐานในท้องถิ่น
                  </td>

                  <td>
                    <a href="#">พิมพ์เอกสาร</a>
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="#">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-info btn-xs" href="#">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" href="#">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    002
                  </td>

                  <td>
                    การเก็บข้อมูลการประกอบอาชีพในท้องถิ่น
                  </td>

                  <td>
                    <a href="#">พิมพ์เอกสาร</a>
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="#">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-info btn-xs" href="#">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" href="#">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    003
                  </td>

                  <td>
                    การเก็บข้อมูลด้านกายภาพในท้องถิ่น
                  </td>

                  <td>
                    <a href="#">พิมพ์เอกสาร</a>
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="#">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-info btn-xs" href="#">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" href="#">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    004
                  </td>

                  <td>
                    การเก็บข้อมูลประวัติหมู่บ้าน-ชุมชน-วิถีชุมชน
                  </td>

                  <td>
                    <a href="#">พิมพ์เอกสาร</a>
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="#">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-info btn-xs" href="#">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" href="#">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>

              </tbody>
            </table>

          </div>

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