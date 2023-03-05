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
if ($_SESSION['position_id'] == 2) {
    $_SESSION['msg'] = "ไม่มีสิทธิเข้าถึง";
    header('location: ../dem/table.php');
  }

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_name']);
  header('location: layout/login.php');
}
?>
<?php
$title = 'ใบงานที่ 1';
include('header.php');
require_once "../db/connect.php";

if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result1 = $controller->getfirstid($id);
}
?>
<?php

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['villagename'];
    $tap2 = $_POST['location'];
    $tap3 = $_POST['location_map'];
    $tap4 = $_POST['religion'];
    $tap5 = $_POST['population'];
    $tap6 = $_POST['numarea'];
    $tap7 = $_POST['education_service'];
    $tap8 = $_POST['education_name'];
    $tap9 = $_POST['local_government'];
    $tap10 = $_POST['hospital'];
    $tap11 = $_POST['police_station'];
    $tap12 = $_POST['image'];
    $tap13 = $_POST['pdf'];
    $tap14 = $_POST['first_storage_id'];
    $status = $controller->insert1($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13,$tap14);
    if($status){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_1.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 0);
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
            }, 0);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 1 <br>การเก็บข้อมูลพื้นฐานในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3" method="POST">
                    <input type="hidden" name="first_storage_id" value="<?php echo $result1["first_storage_id"] ?>" />
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
