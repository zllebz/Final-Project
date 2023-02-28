<?php
$title = 'ใบงานที่ 4';
include('header.php');
require_once "../db/connect.php";

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_GET["submit"]))) {
    $tap1 = $_GET["village_history"];
    $tap2 = $_GET["way_life"];
    $tap3 = $_GET["life_recoed_life"];
    $tap4 = $_GET["image"];
    $tap5 = $_GET["pdf"];
    $status = $controller->insert4($tap1, $tap2, $tap3, $tap4, $tap5);
    if($status){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_4.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "../layout/worksheet_4.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}
?>

<body>
<div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 4 <br>เรื่อง การเก็บข้อมูลประวัติหมู่บ้าน ชุมชน วิถีชุมชน</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">ประวัติหมู่บ้าน</label>
                        <textarea class="form-control" name="village_history" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">วิถีชีวิต</label>
                        <textarea class="form-control" name="way_life" rows="3"></textarea>
                    </div>
                    <h5 class="md-3">แบบบันทึกข้อมูลวิถีชีวิต</h5>
                    <p>คำชี้แจง ให้แต่ละกลุ่มสอบถาม/สัมภาษณ์ วิถีชีวิต รอบวัน/รอบสัปดาห์/รอบเดือน/รอบปี</p>
                    <div class="col-12">
                        <textarea class="form-control" name="life_recoed_life" rows="3" placeholder="ผู้ให้ข้อมูล"></textarea>
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
                        <button type="submit"  name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>