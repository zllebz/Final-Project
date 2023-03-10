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
$title = 'ใบงานที่ 2';
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


    $tap1 = $_POST['agriculture'];
    $tap2 = $_POST['garden'];
    $tap3 = $_POST['farming'];
    $tap4 = $_POST['number_animal'];
    $tap5 = $_POST['fishing'];
    $tap6 = $_POST['b_industry'];
    $tap7 = $_POST['m_industry'];
    $tap8 = $_POST['s_industry'];
    $tap9 = $_POST['commerce'];
    $tap10 = $_POST['service'];
    $tap11 = $fileNew;
    $tap12 = $fileNew1;
    $tap13 = $_POST['first_storage_id'];

    $status = $controller->insert2($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13);
    if ($status) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_2.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 0);
        </script>';
    } else {
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
            <h3 class="my-3 text-center">ใบงานที่ 2 <br>เรื่อง การเก็บข้อมูลการประกอบอาชีพในท้องถิ่น</h3>
            <div class="card border-0 shadow">
            <form class="row g-3 my-3" method="POST" enctype="multipart/form-data">
                    <h4>การประกอบอาชีพ</h4>
                    <input type="hidden" name="first_storage_id" value="<?php echo $result1["first_storage_id"] ?>" />
                    <div class="col-md-12">
                        <h5>ด้านเกษตรกรรม</h5>
                        <br>
                        <label for="exampleFormControlInput1">พื้นที่ทำนา</label>
                        <input type="text" class="form-control" name="agriculture" placeholder="">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">พื้นที่ทำสวน</label>
                        <textarea class="form-control" name="garden" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">พื้นที่ทำไร่</label>
                        <textarea class="form-control" name="farming" rows="3"></textarea>
                    </div>
                    <br>
                    <h5>ปัศุสัตว์</h5>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">จำนวนสัตว์ในพื้นที่โดยรวม</label>
                        <textarea class="form-control" name="number_animal" rows="3"></textarea>
                    </div>
                    <h5>ประมง</h5>
                    <div class="col-md-12">
                        <label class="form-label">จำนวนสัตว์พื้นที่โดยรวม</label>
                        <textarea class="form-control" name="fishing" rows="3"></textarea>
                    </div>
                    <h5>ด้านอุตสาหกรรม</h5>
                    <br>
                    <div class="col-md-12">
                        <label class="form-label">จำนวนโรงงานอุตสาหกรรมขนาดใหญ่</label>
                        <textarea class="form-control" name="b_industry" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">จำนวนโรงงานอุตสาหกรรมขนาดกลาง</label>
                        <textarea class="form-control" name="m_industry" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">จำนวนโรงงานอุตสาหกรรมขนาดครัวเรือน</label>
                        <textarea class="form-control" name="s_industry" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">การพาณิชย์</label>
                        <textarea class="form-control" name="commerce" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">สถานบริการ</label>
                        <textarea class="form-control" name="service" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                        <input type="file" name="image" id="image" class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
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