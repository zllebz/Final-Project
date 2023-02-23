<?php

$menu = "doc";
$title = "ระบบจัดการแบบฟอร์มเอกสาร";
?>

<?php include("header.php"); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>ระบบจัดการแบบฟอร์มเอกสาร <i class="fas fa-file-alt"></i> </h1>
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
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ลำดับ</th>
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อเอกสาร</th>
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ควบคุม</th>
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">สถานะ</th>


                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>
                    1
                  </td>

                  <td>
                    การเก็บข้อมูลพื้นฐานในท้องถิ่น
                  </td>

                  <td>
                    <a href="#">จัดทำเอกสาร</a>
                  </td>

                  <td>
                  <a class="btn btn-danger btn-md" href="#" target="_blank">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    2
                  </td>

                  <td>
                    การเก็บข้อมูลการประกอบอาชีพในท้องถิ่น
                  </td>

                  <td>
                    <a href="#">จัดทำเอกสาร</a>
                  </td>
                  <td>
                  <a class="btn btn-danger btn-md" href="#" target="_blank">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    3
                  </td>

                  <td>
                    การเก็บข้อมูลด้านกายภาพในท้องถิ่น
                  </td>

                  <td>
                    <a href="#">จัดทำเอกสาร</a>
                  </td>
                  <td>
                  <a class="btn btn-danger btn-md" href="#" target="_blank">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    4
                  </td>

                  <td>
                    การเก็บข้อมูลประวัติหมู่บ้าน-ชุมชน-วิถีชุมชน
                  </td>

                  <td>
                    <a href="#">จัดทำเอกสาร</a>
                  </td>
                  <td>
                  <a class="btn btn-danger btn-md" href="#" target="_blank">
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