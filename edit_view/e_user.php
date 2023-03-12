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
$title = 'แก้ไขข้อมูลผู้ใช้งาน';
include('header.php');
require_once "../db/connect.php";

if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result1 = $controller->getuserid($id);
}




?>
<?php
//print_r($_GET);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['user_firstname'];
    $tap2 = $_POST['user_lastname'];
    $tap3 = $_POST['user_email'];
    $tap4 = $_POST['user_name'];
    $tap5 = $_POST['user_id'];
    $tap6 = $_POST['permission_id'];
    $status = $controller->updateuser($tap1, $tap2, $tap3, $tap4, $tap5,$tap6);
    if ($status) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "",
                  type: "success"
              }, function() {
                  window.location = "../dem/index.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../edit_view/e_user.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 0);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-5 text-center">แก้ไขข้อมูลผู้ใช้งาน</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $result1["user_id"] ?>" />
                    <div class="col-12">
                        <label for="statement" class="form-label">ชื่อ</label>
                        <input class="form-control" name="user_firstname" rows="3" value="<?php echo $result1["user_firstname"] ?>"></input>
                    </div>
                    <div class="col-12">
                        <label for="objective" class="form-label">นามสกุล</label>
                        <input class="form-control" name="user_lastname" rows="3" value="<?php echo $result1["user_lastname"] ?>"></input>
                    </div>
                    <div class="col-12">
                        <label for="equipment" class="form-label">email</label>
                        <input class="form-control" name="user_email" rows="3" value="<?php echo $result1["user_email"] ?>"></input>
                    </div>
                    <div class="col-12">
                        <label for="process" class="form-label">user</label>
                        <input class="form-control" name="user_name" rows="3" value="<?php echo $result1["user_name"] ?>"></input>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">ปรับสิทธิการใช้งาน</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="permission_id"   <?=($result1["permission_id"]=="0")?"checked":""?> value="0">
                            <label class="form-check-label" for="flexRadioDefault1">
                                รอการอนุมัติ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="permission_id"  <?=($result1["permission_id"]=="1")?"checked":""?> value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                อนุมัติการเข้าใช้งาน
                            </label>
                        </div>
                    </div>


                    <div class="col-12 mt-3 ">
                        <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>