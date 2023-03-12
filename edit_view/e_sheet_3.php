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
$title = 'ใบงานที่ 3';
include('header.php');
require_once '../db/connect.php';
if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result1 = $controller->getsheet3id($id);
}
?>

<?php
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['terrain'];
    $tap2 = $_POST['soilitype'];
    $tap3 = $_POST['natural_water'];
    $tap4 = $_POST['irrigation_water'];
    $tap5 = $_POST['weir_slows'];
    $tap6 = $_POST['rainfall'];
    $tap7 = $_POST['water_demand'];
    $tap8 = $_POST['quality_water'];
    $tap9 = $_POST['temperature'];
    $tap10 = $_POST['amount_light'];
    $tap11 = $_POST['geographic'];
    $tap14 = $_POST['worksheet3_id'];
    $tap15 = $_POST['status'];
    $status = $controller->update3($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap14,$tap15);
    if($status){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_3.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../layout/worksheet_3.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 0);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 3 <br>เรื่อง การเก็บข้อมูลด้านกายภาพในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3" method="POST">
                <input type="hidden" name="worksheet3_id" value="<?php echo $result1["worksheet3_id"] ?>" />
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">สภาพภูมิประเทศ</label>
                        <input type="text" class="form-control" name="terrain" value="<?php echo $result1["terrain"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">ลักษณะดิน</label>
                        <textarea class="form-control" name="soilitype" rows="3"><?php echo $result1["soilitype"] ?></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">แหล่งน้ำธรรมชาติ</label>
                        <textarea class="form-control" name="natural_water" rows="3"><?php echo $result1["natural_water"] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">แหล่งน้ำชลประทาน</label>
                        <textarea class="form-control" name="irrigation_water" rows="3"><?php echo $result1["irrigation_water"] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ฝายชะลอความชุ่มชื้น</label>
                        <input type="text" class="form-control" name="weir_slows" value="<?php echo $result1["weir_slows"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณน้ำฝนเฉลี่ยต่อปี</label>
                        <textarea class="form-control" name="rainfall" rows="3"><?php echo $result1["rainfall"] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณความต้องการใช้น้ำเปรียบเทียบกับปริมาณน้ำที่มีในพื้นที่</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand"   <?=($result1["water_demand"]=="เพียงพอตลอดปี")?"checked":""?> value="เพียงพอตลอดปี">
                            <label class="form-check-label" for="flexRadioDefault1">
                                เพียงพอตลอดปี
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand"  <?=($result1["water_demand"]=="น้ำแห้งในบางช่วง")?"checked":""?> value="น้ำแห้งในบางช่วง">
                            <label class="form-check-label" for="flexRadioDefault1">
                                น้ำแห้งในบางช่วง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand"  <?=($result1["water_demand"]=="น้ำท่วมในบางช่วง")?"checked":""?> value="น้ำท่วมในบางช่วง">
                            <label class="form-check-label" for="flexRadioDefault1">
                                น้ำท่วมในบางช่วง
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">คุณภาพของน้ำที่มี</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water"  <?=($result1["quality_water"]=="ปนเปื้อนโลหะหนัก")?"checked":""?> value="ปนเปื้อนโลหะหนัก">
                            <label class="form-check-label" for="flexRadioDefault2">
                                ปนเปื้อนโลหะหนัก
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water"  <?=($result1["quality_water"]=="ปนเปื้อนจุลินทรีย์")?"checked":""?> value="ปนเปื้อนจุลินทรีย์">
                            <label class="form-check-label" for="flexRadioDefault2">
                                ปนเปื้อนจุลินทรีย์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water"  <?=($result1["quality_water"]=="น้ำสะอาดไม่มีปัญหาการปนเปื้อน")?"checked":""?> value="น้ำสะอาดไม่มีปัญหาการปนเปื้อน">
                            <label class="form-check-label" for="flexRadioDefault2">
                                น้ำสะอาดไม่มีปัญหาการปนเปื้อน
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">อุณภูมิ (องศาเซลเชียส) </label>
                        <input type="text" class="form-control" name="temperature" value="<?php echo $result1["temperature"] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ปริมาณแสง (เปอร์เซ็นต์ความเข้มแสง)</label >
                        <input type="text" class="form-control" name="amount_light" value="<?php echo $result1["amount_light"] ?>">
                    </div>
                    <h5>พิกัดทางภูมิศาสตร์ (GIS)</h5>
                    <div class="col-md-12">
                        <label class="form-label">ค่า X และค่า  Y </label>
                        <input type="text" class="form-control" name="geographic" value="<?php echo $result1["geographic"] ?>">
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