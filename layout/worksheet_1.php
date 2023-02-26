<?php
$title = 'ใบงานที่ 1';
include('header.php');
require_once "../db/connect.php";

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_GET["submit"]))) {
    $tap1 = $_GET['villagename'];
    $tap2 = $_GET['location'];
    $tap3 = $_GET['location_map'];
    $tap4 = $_GET['religion'];
    $tap5 = $_GET['population'];
    $tap6 = $_GET['numarea'];
    $tap7 = $_GET['education_service'];
    $tap8 = $_GET['education_name'];
    $tap9 = $_GET['local_government'];
    $tap10 = $_GET['hospital'];
    $tap11 = $_GET['police_station'];
    $tap12 = $_GET['image'];
    $tap13 = $_GET['pdf'];
    $status = $controller->insert1($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13);
    if($status){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_1.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../layout/worksheet_1.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 1 <br>การเก็บข้อมูลพื้นฐานในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อหมู่บ้าน</label>
                        <input type="text" class="form-control" placeholder="" name="villagename">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ที่ตั้งหมู่บ้าน</label>
                        <input type="text" class="form-control" placeholder=""  name="location">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">พิกัดหมู่บ้าน</label>
                        <input type="text" class="form-control" placeholder="" name="location_map">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลทางศาสนา</label>
                        <input type="text" class="form-control" placeholder=""  name="religion">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">จำนวนประชากร</label>
                        <input type="text" class="form-control" placeholder=""  name="population">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">จำนวนพื้นที่ (ไร่)</label>
                        <input type="text" class="form-control" name="numarea">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลสถานศึกษาที่เปิดให้บริการ</label> 
                        <input type="text" class="form-control" placeholder="" name="education_service">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ชื่อสถานศึกษาที่เปิดให้บริการ</label>
                        <input type="text" class="form-control" placeholder="" name="education_name">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลการบริหารขององค์กรปกครองส่วนท้องถิ่น</label>
                        <input type="text" class="form-control" placeholder="" name="local_government">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">ศูนย์สุขภาพชุมชน/โรงพยาบาล (แห่ง)</label>
                        <input type="text" class="form-control" name="hospital">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">สถานนีตำรวจ (แห่ง)</label>
                        <input type="text" class="form-control" name="police_station">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">แผนที่หมู่บ้าน</label>
                        <input class="form-control" type="file"  name="image">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
                        <input class="form-control" type="file"  name="pdf">
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
