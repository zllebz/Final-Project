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
    $result1 = $controller->getfirstid($id);
}
?>
<?php
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {

    $mm = $_FILES['image1'];

    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode('.', $mm['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = '../images/' . $fileNew;
    if (in_array($fileActExt, $allow)) {
        move_uploaded_file($mm['tmp_name'], $filePath);
    }


    $mb = $_FILES['image2'];

    $allow2 = array('jpg', 'jpeg', 'png');
    $extension2 = explode('.', $mb['name']);
    $fileActExt2 = strtolower(end($extension2));
    $fileNew2 = rand() . "." . $fileActExt2;  // rand function create the rand number 
    $filePath2 = '../images/' . $fileNew2;
    if (in_array($fileActExt2, $allow2)) {
        move_uploaded_file($mb['tmp_name'], $filePath2);
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


    $tap1 = $_POST['data_plant'];
    $tap2 = $_POST['food'];
    $tap3 = $_POST['medicine_people'];
    $tap4 = $_POST['medicine_animal'];
    $tap5 = $_POST['furniture'];
    $tap6 = $_POST['insecticide'];
    $tap7 = $_POST['cultures'];
    $tap8 = $_POST['religion'];
    $tap9 = $_POST['other'];
    $tap10 = $fileNew;
    $tap11 = $fileNew2;
    $tap12 = $fileNew1;
    $tap13 = $_POST['first_storage_id'];
    //$tap13 = $_GET['pdf'];
    $status = $controller->insert5($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12,$tap13);
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
            <h3 class="my-3 text-center">ใบงานที่ 5 <br>เรื่อง การเก็บข้อมูลการใช้ประโยชน์ของพืชในท้องถิ่น</h3>
            <div class="card border-0 shadow">
            <form class="row g-3 my-3" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="first_storage_id" value="<?php echo $result1["first_storage_id"] ?>" />
                    <div class="col-md-12">
                        <h3>ข้อมูลพืช</h3>
                        <p>พืชที่มีความสำคัญ หรือมีลักษณะพิเศษ เช่น พืชที่เป็นไม้ผล ผักพื้นเมือง พืชสมุนไพร พืชใช้เนื้อไม้
พืชเศรษฐกิจ ปาล์ม ไผ่ หญ้า ฯลฯ</p>
                        <textarea class="form-control" name="data_plant" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <h3>การใช้ประโยชน์ในท้องถิ่น (ระบุส่วนที่ใช้และวิธีการใช้)</h3>
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
                        <label for="formFile" class="form-label">รูปภาพที่ 1</label>
                        <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                        <input type="file" name="image1" id="image1" required class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                        <img loading="lazy" width="20%" id="previewImg" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพที่ 2</label>
                        <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                        <input type="file" name="image2" id="image2" required class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                        <img loading="lazy" width="20%" id="previewImg2" alt="">
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
    let image = document.getElementById('image1');
    let previewImg = document.getElementById('previewImg');

    image.onchange = evt => {
        const [file] = image.files;
        if (file) {
            previewImg.src = URL.createObjectURL(file)
        }
    }
</script>
<script>
    let image2 = document.getElementById('image2');
    let previewImg2 = document.getElementById('previewImg2');

    image2.onchange = evt => {
        const [file] = image2.files;
        if (file) {
            previewImg2.src = URL.createObjectURL(file)
        }
    }
</script>

</html>