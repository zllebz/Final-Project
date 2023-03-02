<?php
$title = 'แบบฟอร์มกรอกข้อมูลขั้นต้น';
include('header.php');
require_once "../db/connect.php";
$result = $controller->provinces();

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['data_store_local'];
    $tap1 = implode(" ", $tap1);

    //$tap13 = $_GET['pdf'];
    $status = $controller->insertdata($tap1);
    if ($status) {
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "บันทึกข้อมูลสำเร็จ",
                      text: "กรุณารอระบบบันทึก",
                      type: "success"
                  }, function() {
                      window.location = "../dem/table.php"; //หน้าที่ต้องการให้กระโดดไป
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
                      window.location = "../layout/datastores.php"; //หน้าที่ต้องการให้กระโดดไป
                  });
                }, 1000);
            </script>';
    }
}
?>


<?php
$con = mysqli_connect("localhost", "root", "", "bellba") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting(error_reporting() & ~E_NOTICE);
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
                        <label for="exampleFormControlInput1 " class="my-2">ข้อมูลพื้นที่ที่สำรวจ</label>
                        <textarea class="form-control" name="data_store_local[]" rows="3"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="sel1" class="my-2">จังหวัด:</label>
                        <select class="form-control" name="data_store_local[]" id="provinces">
                            <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                            <?php foreach ($query as $value) { ?>
                                <option value="<?php echo $value["provinces_id"]; ?>"><?php echo $value["name_th"] ?></option>
                            <?php } ?>
                        </select>

                        <label for="sel1" class="my-2">อำเภอ:</label>
                        <select class="form-control" name="data_store_local[]" id="amphures">

                        </select>

                        <label for="sel1" class="my-2">ตำบล:</label>
                        <select class="form-control" name="data_store_local[]" id="districts">
                        </select>

                        <label for="sel1" class="my-2">รหัสไปรษณีย์:</label>
                        <input type="text" name="data_store_local[]" id="zip_code" class="form-control">
                        <div class="col-12 my-3">
                            <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('script.php'); ?>