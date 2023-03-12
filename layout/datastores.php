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
$title = 'แบบฟอร์มกรอกข้อมูลขั้นต้น';
include('header.php');
require_once "../db/connect.php";


echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['data_store_local'];
    $tap1 = implode(" ", $tap1);
    $tap2 = $_POST['user_id'];
    //echo $tap1;
    //exit;
    //$tap13 = $_GET['pdf'];
    $status = $controller->insertdata($tap1,$tap2);
    if ($status) {
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "บันทึกข้อมูลสำเร็จ",
                      text: "",
                      type: "success"
                  }, function() {
                      window.location = "../dem/table.php"; //หน้าที่ต้องการให้กระโดดไป
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
                      window.location = "../layout/datastores.php"; //หน้าที่ต้องการให้กระโดดไป
                  });
                }, 0);
            </script>';
    }
}
?>


<?php
$con = mysqli_connect("localhost", "plantgenetic", "gvJBju6D", "plantgenetic");
mysqli_query($con, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');

$sql_provinces = "SELECT * FROM tbl_provinces";
$query = mysqli_query($con, $sql_provinces);
?>




<body>
    <div class="container">
        <div class="row">
            <h3 class="my-5 text-center">แบบฟอร์มกรอกสถานที่ที่สำรวจ</h3>
            <div class="card border-0 shadow">
                <form class="row  my-3" method="POST">
                    <div class="col-md-12 my-2">
                        <input type="hidden" name ="user_id" value="<?php echo $_SESSION["user_id"]?>">
                        <label for="exampleFormControlInput1 " class="my-2">ข้อมูลพื้นที่ที่สำรวจ</label>
                        <textarea class="form-control" name="data_store_local[]" rows="3"></textarea>
                        <input type="hidden" name="data_store_local[]" value="," >
                    </div>

                    <div class="form-group ">
                        <label for="sel1" class="my-2">จังหวัด:</label>
                        <select class="form-control" name="province_joke" id="provinces">
                            <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                            <?php foreach ($query as $value) { ?>
                                <option value="<?php echo $value["provinces_id"]; ?>"><?php echo $value["name_th"] ?></option>
                            <?php } ?>
                        </select>

                        <label for="sel1" class="my-2">อำเภอ:</label>
                        <select class="form-control" name="amphrues_joke" id="amphures">

                        </select>

                        <label for="sel1" class="my-2">ตำบล:</label>
                        <select class="form-control" name="data_store_local[]" id="districts">
                        </select>

                        <label for="sel1" class="my-2">รหัสไปรษณีย์:</label>
                        <input type="text" maxlength="5" name="data_store_local[]" id="zip_code" class="form-control">
                        <div class="col-12 my-3">
                            <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('script.php'); ?>