<?php
$title = 'ใบงานที่ 2';
include('header.php');
require_once "../db/connect.php";

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_GET["submit"]))) {
    $tap1 = $_GET['data_plant'];
    $tap2 = $_GET['food'];
    $tap3 = $_GET['medicine_people'];
    $tap4 = $_GET['medicine_animal'];
    $tap5 = $_GET['furniture'];
    $tap6 = $_GET['insecticide'];
    $tap7 = $_GET['cultures'];
    $tap8 = $_GET['religion'];
    $tap9 = $_GET['other'];
    $tap10 = $_GET['image1'];
    $tap11 = $_GET['image2'];
    $tap12 = $_GET['pdf'];
    //$tap13 = $_GET['pdf'];
    $status = $controller->insert5($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12);
    if($status){
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
    }else{
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
            <h3 class="my-3 text-center">ใบงานที่ 5 <br>เรื่อง การเก็บข้อมูลด้านกายภาพในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <h3>ข้อมูลพืช</h3>
                        <p>พืชที่มีความสำคัญ หรือมีลักษณะพิเศษ เช่น พืชที่เป็นไม้ผล ผักพื้นเมือง พืชสมุนไพร พืชใช้เนื้อไม้
พืชเศรษฐกิจ ปาล์ม ไผ่ หญ้า ฯลฯ</p>
                        <textarea class="form-control" name="data_plant" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <p>การใช้ประโยชน์ในท้องถิ่น (ระบุส่วนที่ใช้และวิธีการใช้)</p>
                        <label for="exampleFormControlInput1" class="form-label">อาหาร</label>
                        <input type="text" class="form-control" name="food">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ยารักษาโรค ใช้กับคน</label>
                        <input type="text" class="form-control" name="medicine_people">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ยารักษาโรค ใช้กับสัตว์</label>
                        <input type="text" class="form-control" name="medicine_animal">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">เครื่องเรือน เครื่องใช้อื่นๆ</label>
                        <input type="text" class="form-control" name="furniture">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ยาฆ่าแมลง ยาปราบศัตรูพืช</label>
                        <input type="text" class="form-control" name="insecticide">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ความเกี่ยวข้องกับประเพณี วัฒนธรรม</label>
                        <input type="text" class="form-control" name="cultures">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ความเกี่ยวข้องกับความเชื่อทางศาสนา</label>
                        <input type="text" class="form-control" name="religion">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">อื่นๆ </label>
                        <input type="text" class="form-control" name="other">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" name="image1">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" name="image2">
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
</html>