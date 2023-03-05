<?php
session_start();

if (!isset($_SESSION['user_name'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../layout/login.php');
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
$title = 'ใบงานที่ 9';
include('header.php');
require_once "../db/connect.php";

if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result9 = $controller->getsheet9id($id);
}

?>

<?php
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['archeology_site'];
    $tap2 = $_POST['important_resources'];
    $tap3 = $_POST['archeology_record'];
    $tap4 = $_POST['name_resources'];
    $tap5 = $_POST['image'];
    $tap6 = $_POST['pdf'];
    $tab7 = $_POST['worksheet9_id'];

    $status = $controller->update9($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tab7);
    if ($status) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_9.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../edit_view/e_sheet_9.php"; //หน้าที่ต้องการให้กระโดดไป
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
                <form class="row g-3 my-3" method="POST">
                <input type="hidden" name="worksheet9_id" value="<?php echo $result9["worksheet9_id"] ?>" />
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label" >แหล่งโบราณคดี (ถ้ามี)</label>
                        <textarea class="form-control" name="archeology_site" rows="3"><?php echo $result9["archeology_site"]?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">แหล่งทรัพยากรที่สำคัญ (เช่น อุทยานฯ น้ำตก สวนเฉลิมพระเกียรติ สวนพฤกษศาสตร์ สวนป่า ฯ)</label>
                        <textarea class="form-control" name="important_resources" rows="3"><?php echo $result9["important_resources"]?></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลแหล่งโบราณคดี</label>
                        <textarea class="form-control" name="archeology_record" rows="3"><?php echo $result9["archeology_record"]?></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">แหล่งทรัพยากรที่สำคัญ</label>
                        <textarea class="form-control" name="name_resources" rows="3"><?php echo $result9["name_resources"]?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" name="image" value="<?php echo $result9["image"] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
                        <input class="form-control" type="file" name="pdf" value="<?php echo $result9["pdf"] ?>" />
                    </div>
                    <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
