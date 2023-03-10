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
    $result1 = $controller->getfirstid($id);
}
?>
<?php
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {

    $mm = $_FILES['image'];

    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode('.', $mm['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../images/' . $fileNew;
    if (in_array($fileActExt, $allow)) {
        move_uploaded_file($mm['tmp_name'], $filePath);
    }

    $nn = $_FILES['pdf'];

    $allow1 = array('pdf');
    $extension1 = explode('.', $nn['name']);
    $fileActExt1 = strtolower(end($extension1));
    $fileNew1 = rand() . "." . $fileActExt1;  // rand function create the rand number 
    $filePath1 = '../upPDF/' . $fileNew1;
    if (in_array($fileActExt1, $allow1)) {
        move_uploaded_file($nn['tmp_name'], $filePath1);
    }
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
    $tap12 = $fileNew;
    $tap13 = $fileNew1;
    $tap14 = $_POST['first_storage_id'];
    $status = $controller->insert3($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13,$tap14);
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
                  window.location = "../dem/table_data.php"; //หน้าที่ต้องการให้กระโดดไป
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
            <form class="row g-3 my-3" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="first_storage_id" value="<?php echo $result1["first_storage_id"] ?>" />
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">สภาพภูมิประเทศ</label>
                        <input type="text" class="form-control" name="terrain" placeholder="เช่น เป็นที่ราบ ลุ่ม ลาดเอียง ภูเขา ป่าพรุ ป่าชายหาด ป่าชายเลน">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">ลักษณะดิน</label>
                        <textarea class="form-control" name="soilitype" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">แหล่งน้ำธรรมชาติ</label>
                        <textarea class="form-control" name="natural_water" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">แหล่งน้ำชลประทาน</label>
                        <textarea class="form-control" name="irrigation_water" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ฝายชะลอความชุ่มชื้น</label>
                        <input type="text" class="form-control" name="weir_slows">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณน้ำฝนเฉลี่ยต่อปี</label>
                        <textarea class="form-control" name="rainfall" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณความต้องการใช้น้ำเปรียบเทียบกับปริมาณน้ำที่มีในพื้นที่</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand" required value="เพียงพอตลอดปี">
                            <label class="form-check-label" for="flexRadioDefault1">
                                เพียงพอตลอดปี
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand" required value="น้ำแห้งในบางช่วง">
                            <label class="form-check-label" for="flexRadioDefault1">
                                น้ำแห้งในบางช่วง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand" required value="น้ำท่วมในบางช่วง">
                            <label class="form-check-label" for="flexRadioDefault1">
                                น้ำท่วมในบางช่วง
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">คุณภาพของน้ำที่มี</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water" required value="ปนเปื้อนโลหะหนัก">
                            <label class="form-check-label" for="flexRadioDefault2">
                                ปนเปื้อนโลหะหนัก
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water" required value="ปนเปื้อนจุลินทรีย์">
                            <label class="form-check-label" for="flexRadioDefault2">
                                ปนเปื้อนจุลินทรีย์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water" required value="น้ำสะอาดไม่มีปัญหาการปนเปื้อน">
                            <label class="form-check-label" for="flexRadioDefault2">
                                น้ำสะอาดไม่มีปัญหาการปนเปื้อน
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">อุณภูมิ (องศาเซลเชียส) </label>
                        <input type="text" class="form-control" name="temperature">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ปริมาณแสง (เปอร์เซ็นต์ความเข้มแสง)</label>
                        <input type="text" class="form-control" name="amount_light">
                    </div>
                    <h5>พิกัดทางภูมิศาสตร์ (GIS)</h5>
                    <div class="col-md-12">
                        <label class="form-label">ค่า X และค่า  Y </label>
                        <input type="text" class="form-control" name="geographic">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                        <input type="file" name="image" id="image" required class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                        <img loading="lazy" width="20%" id="previewImg" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
                        <font color="red">*อัพโหลดได้เฉพาะ .pdf </font>
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
<script>
    let image = document.getElementById('image');
    let previewImg = document.getElementById('previewImg');

    image.onchange = evt => {
        const [file] = image.files;
        if (file) {
            previewImg.src = URL.createObjectURL(file)
        }
    }
</script>

</html>