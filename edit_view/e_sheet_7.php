<?php
$title = 'ใบงานที่ 7';
include('header.php');

require_once "../db/connect.php";

if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result7 = $controller->getsheet7id($id);
}

?>

<?php 
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {
    $tap1 = $_POST['bio_data'];
    $tap2 = $_POST['image'];
    $tap3 = $_POST['pdf'];
    $tap4 = $_POST['worksheet7_id'];
    $status = $controller->update7($tap1, $tap2, $tap3, $tap4);
    if($status){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_7.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../edit_view/e_sheet_7.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 7 <br>เรื่อง การเก็บข้อมูลการใช้ประโยชน์ของชีวภาพอื่นๆ ในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3" method="POST">
                <input type="hidden" name="worksheet7_id" value="<?php echo $result7["worksheet7_id"] ?>" />
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">ข้อมูลชีวภาพ</label>
                        <textarea class="form-control" name="bio_data" rows="3"><?php echo $result7["bio_data"]?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" name="image" value="<?php echo $result7["image"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
                        <input class="form-control" type="file" name="pdf" value="<?php echo $result7["pdf"] ?>">
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