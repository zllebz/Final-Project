<?php
$title = 'ใบงานที่ 6';
include('header.php');

require_once "../db/connect.php";

if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result6 = $controller->getsheet6id($id);
}

?>

<?php 
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['animal_species'];
    $tap2 = $_POST['location_meet'];
    $tap3 = $_POST['quantity'];
    $tap4 = $_POST['history'];
    $tap5 = $_POST['feature'];
    $tap6 = $_POST['animal_owner'];
    $tap7 = $_POST['informant_name'];
    $tap8 = $_POST['image'];
    $tap9 = $_POST['pdf'];
    $tap10 = $_POST['worksheet6_id'];
    $status = $controller->update6($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10);
    if($status){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_6.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "../edit_view/e_sheet_6.php";//หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 6 <br>เรื่อง การเก็บข้อมูลการใช้ประโยชน์ของสัตว์ในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3" method="POST">
                <input type="hidden" name="worksheet6_id" value="<?php echo $result6["worksheet6_id"] ?>" />
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">ข้อมูลพันธุ์สัตว์</label>
                        <textarea class="form-control" name="animal_species"rows="3"><?php echo $result6["animal_species"]?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">สถานที่พบ</label>
                        <input type="text" class="form-control" name="location_meet" value="<?php echo $result6["location_meet"] ?>">
                    </div>
                    <div class="col-6">
                        <label for="exampleFormControlTextarea1" class="form-label">จำนวนที่พบ</label>
                        <input type="text" class="form-control" name="quantity"value="<?php echo $result6["worksheet6_id"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ประวัติที่มา</label>
                        <textarea class="form-control" name="history" rows="3"><?php echo $result6["history"]?></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ลักษณะเด่น</label>
                        <textarea class="form-control" name="feature" rows="3"><?php echo $result6["feature"]?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ชื่อเจ้าของสัตว์</label>
                        <input type="text" class="form-control" name="animal_owner"value="<?php echo $result6["animal_owner"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ชื่อผู้ให้ข้อมูล</label>
                        <input type="text" class="form-control" name="informant_name"value="<?php echo $result6["informant_name"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" name="image" value="<?php echo $result6["image"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
                        <input class="form-control" type="file" name="pdf" value="<?php echo $result6["pdf"] ?>">
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