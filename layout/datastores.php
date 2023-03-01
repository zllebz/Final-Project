<?php
$title = 'แบบฟอร์มกรอกข้อมูลขั้นต้น';
include('header.php');
require_once "../db/connect.php";
//print_r($_GET);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

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
                <form class="row  my-3">
                    <div class="form-group">
                        <label for="sel1">จังหวัด:</label>
                        <select class="form-control" name="province_id" id="provinces">
                            <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                            <?php foreach ($query as $value) { ?>
                                <option value="<?php echo $value["provinces_id"]; ?>"><?php echo $value["name_th"] ?></option>
                            <?php } ?>
                        </select>


                        <br>

                        <label for="sel1">อำเภอ:</label>
                        <select class="form-control" name="Ref_dist_id" id="amphures">

                        </select>
                        <br>

                        <label for="sel1">ตำบล:</label>
                        <select class="form-control" name="Ref_subdist_id" id="districts">
                        </select>
                        <br>

                        <label for="sel1">รหัสไปรษณีย์:</label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control">
                </form>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php include('script.php'); ?>