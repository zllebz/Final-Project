<?php
$title = 'ใบงานที่ 9';
include('header.php');
require_once "../db/connect.php";

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_GET["submit"]))) {
    $tap1 = $_GET['archeology_site'];
    $tap2 = $_GET['important_resources'];
    $tap3 = $_GET['archeology_record'];
    $tap4 = $_GET['name_resources'];
    $tap5 = $_GET['image'];
    $tap6 = $_GET['pdf'];



    //$tap13 = $_GET['pdf'];
    $status = $controller->insert9($tap1, $tap2, $tap3, $tap4, $tap5, $tap6);
    if ($status) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}

?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 9 <br>เรื่อง การเก็บข้อมูลแหล่งทรัพยากรและโบราณคดีในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">แหล่งโบราณคดี (ถ้ามี)</label>
                        <textarea class="form-control" name="archeology_site" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">แหล่งทรัพยากรที่สำคัญ</label>
                        <textarea class="form-control" name="important_resources" rows="3" placeholder="(เช่น อุทยานฯ น้ำตก สวนเฉลิมพระเกียรติ สวนพฤกษศาสตร์ สวนป่า ฯ)"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลแหล่งโบราณคดี</label>
                        <textarea class="form-control" name="archeology_record" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">แหล่งทรัพยากรที่สำคัญ</label>
                        <textarea class="form-control" name="name_resources" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
                        <input class="form-control" type="file" name="pdf">
                    </div>
                    <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>