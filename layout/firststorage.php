<?php
$title = 'แบบฟอร์มกรอกข้อมูลขั้นต้น';
include('header.php');
require_once "../db/connect.php";
$result = $controller->documents();
//print_r($_GET);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_GET["submit"]))) {
    $tap1 = $_GET['statement'];
    $tap2 = $_GET['doc_id'];
    $tap3 = $_GET['objective'];
    $tap4 = $_GET['equipment'];
    $tap5 = $_GET['process'];
    $tap6 = $_GET['exp_benefits'];
    $status = $controller->insertfirst($tap1, $tap2, $tap3, $tap4, $tap5, $tap6);
    if ($status) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-5 text-center">แบบฟอร์มกรอกข้อมูลขั้นต้น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                <div class="col-12">
                        <label for="statement" class="form-label">คำชี้แจง</label>
                        <textarea class="form-control" name="statement" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                    <label for="inputState" class="form-label" >ใบงาน</label>
                        <select name="doc_id" id="inputState" class="form-select">
                        <option value="" selected disabled>-- กรุณาเลือก --</option>
                        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $row["doc_id"]; ?>"><?php echo $row["doc_name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="objective" class="form-label">วัตถุประสงค์</label>
                        <textarea class="form-control" name="objective" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="equipment" class="form-label">อุปกรณ์</label>
                        <textarea class="form-control" name="equipment"  rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="process" class="form-label">วิธีการ</label>
                        <textarea class="form-control" name="process"  rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exp_benefits" class="form-label">สิ่งที่ได้รับจากใบงาน</label>
                        <textarea class="form-control" name="exp_benefits" rows="3"></textarea>
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