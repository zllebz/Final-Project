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
$title = 'ใบงานที่ 5';
include('header.php');
require_once "../db/connect.php";
if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result1 = $controller->getsheet5id($id);
}
?>

<?php
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['data_plant'];
    $tap2 = $_POST['food'];
    $tap3 = $_POST['medicine_people'];
    $tap4 = $_POST['medicine_animal'];
    $tap5 = $_POST['furniture'];
    $tap6 = $_POST['insecticide'];
    $tap7 = $_POST['cultures'];
    $tap8 = $_POST['religion'];
    $tap9 = $_POST['other'];
    $tap13 = $_POST['worksheet5_id'];
    $tap14 = $_POST['status'];
    $status = $controller->update5($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9,$tap13,$tap14);
    if($status){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_5.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = ../edit_view/e_sheet_5.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 0);
        </script>';
    }
}
?>

<body>
<div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 5 <br>เรื่อง การเก็บข้อมูลการใช้ประโยชน์ของพืชในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3" method="POST">
                    <div class="col-md-12">
                    <input type="hidden" name="worksheet5_id" value="<?php echo $result1["worksheet5_id"] ?>" />
                        <h3>ข้อมูลพืช</h3>
                        <p>พืชที่มีความสำคัญ หรือมีลักษณะพิเศษ เช่น พืชที่เป็นไม้ผล ผักพื้นเมือง พืชสมุนไพร พืชใช้เนื้อไม้
พืชเศรษฐกิจ ปาล์ม ไผ่ หญ้า ฯลฯ</p>
                        <textarea class="form-control" name="data_plant" rows="3"><?php echo $result1["data_plant"] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <h3>การใช้ประโยชน์ในท้องถิ่น (ระบุส่วนที่ใช้และวิธีการใช้)</h3>
                        <label for="exampleFormControlInput1" class="form-label">อาหาร</label>
                        <input type="text" class="form-control" name="food" value="<?php echo $result1["food"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ยารักษาโรค ใช้กับคน</label>
                        <input type="text" class="form-control" name="medicine_people" value="<?php echo $result1["medicine_people"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ยารักษาโรค ใช้กับสัตว์</label>
                        <input type="text" class="form-control" name="medicine_animal" value="<?php echo $result1["medicine_animal"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">เครื่องเรือน เครื่องใช้อื่นๆ</label>
                        <input type="text" class="form-control" name="furniture" value="<?php echo $result1["furniture"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ยาฆ่าแมลง ยาปราบศัตรูพืช</label>
                        <input type="text" class="form-control" name="insecticide" value="<?php echo $result1["insecticide"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ความเกี่ยวข้องกับประเพณี วัฒนธรรม</label>
                        <input type="text" class="form-control" name="cultures" value="<?php echo $result1["cultures"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ความเกี่ยวข้องกับความเชื่อทางศาสนา</label>
                        <input type="text" class="form-control" name="religion" value="<?php echo $result1["religion"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">อื่นๆ </label>
                        <input type="text" class="form-control" name="other" value="<?php echo $result1["other"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">สถานะเอกสาร</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status"   <?=($result1["status"]=="0")?"checked":""?> value="0">
                            <label class="form-check-label" for="flexRadioDefault1">
                                ปิด
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status"  <?=($result1["status"]=="1")?"checked":""?> value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                เปิด
                            </label>
                        </div>
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