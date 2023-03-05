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

$menu = "doc";
$title = "ระบบจัดการแบบฟอร์มเอกสาร";
?>
<?php include ("../dem/header.php"); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>รูปแบบฟอร์มเอกสาร <i class="fas fa-file-alt"></i> </h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card">
    <div class="card-header card-navy card-outline">


      <div align="right">
        
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
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๑-เรื่อง-การเก็บข้อมูลพื้นฐานในท้องถิ่น.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
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
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๒-เรื่อง-การเก็บข้อมูลการประกอบอาชีพในท้องถิ่น.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
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
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๓-เรื่อง-การเก็บข้อมูลด้านกายภาพในท้องถิ่น.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
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
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๔-เรื่อง-การเก็บข้อมูลประวัติหมู่บ้าน-ชุมชน-วิถีชุมชน.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    5
                  </td>

                  <td>
                    การเก็บข้อมูลการใช้ประโยชน์ของพืชในท้องถิ่น
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๕-เรื่อง-การเก็บข้อมูลการใช้ประโยชน์ของพืชในท้องถิ่น.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    6
                  </td>

                  <td>
                    การเก็บข้อมูลของสัตว์ในท้องถิ่น
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๖-เรื่อง-การเก็บข้อมูลการใช้ประโยชน์ของสัตว์ในท้องถิ่น.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    7
                  </td>

                  <td>
                    การเก็บข้อมูลการใช้ประโยชน์ของชีวภาพอื่นๆ ในท้องถิ่น
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๗-เรื่อง-การเก็บข้อมูลการใช้ประโยชน์ของชีวภาพอื่นๆ-ในท้องถิ่น.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    8
                  </td>

                  <td>
                    การเก็บข้อมูลภูมิปัญญาในท้องถิ่น
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๘-เรื่อง-การเก็บข้อมูลภูมิปัญญาในท้องถิ่น.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    9
                  </td>

                  <td>
                    การเก็บข้อมูลแหล่งทรัพยากรและโบราณคดีในท้องถิ่น
                  </td>

                  <td>
                    <a class="btn btn-primary btn-xs" href="../pdf/ใบงานที่-๙-เรื่อง-การเก็บข้อมูลแหล่งทรัพยากรและโบราณคดีในท้องถิ่น.pdf">
                      <i class="fas fa-folder"></i>
                      ดาวน์โหลด
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
      "autoWidth": false,
    });
  });
</script>

</body>

</html>