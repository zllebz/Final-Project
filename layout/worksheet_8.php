<?php
$title = 'ใบงานที่ 8';
include('header.php');
require_once "../db/connect.php"; 

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_GET["submit"]))) {
    $tap1 = $_GET['branch'];
    $tap2 = $_GET['local_name'];
    $tap3 = $_GET['copyright'];
    $tap4 = $_GET['type_wisdom'];
    $tap5 = $_GET['local_highlights'];
    $tap6 = $_GET['wisdom_details'];
    $tap7 = $_GET['public_relations'];
    $tap8 = $_GET['characteristic'];
    $tap9 = $_GET['materials'];
    $tap10 = $_GET['image'];
    $tap11 = $_GET['pdf'];


    //$tap13 = $_GET['pdf'];
    $status = $controller->insert8($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11);
    if ($status) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "../dem/sheet_8.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../layout/worksheet_8.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 8 <br>เรื่อง การเก็บข้อมูลภูมิปัญญาในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">สาขา</label>
                        <input type="text" class="form-control" name="branch"  placeholder="เช่น สาขาเกษตรกรรม / สาขาอุตสาหกรรมและหัตถกรรม / สาขาการแพทย์แผนไทย / สาขาการจัดการทรัพยากรธรรมชาติและสิ่งแวดล้อม">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อภูมิปัญญาท้องถิ่น</label>
                        <input type="text" class="form-control" name="local_name">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlTextarea1" class="form-label">เจ้าของภูมิปัญญาท้องถิ่น</label>
                        <input type="text" class="form-control" name="copyright">
                    </div>
                    
                    <h5>ประเภทของภูมิปัญญาท้องถิ่น</h5>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom"  required value="ภูมิปัญญาท้องถิ่นด้านพืช">
                        <label class="form-check-label" for="flexRadioDefault1">
                            ภูมิปัญญาท้องถิ่นด้านพืช
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" required value="ภูมิปัญญาท้องถิ่นด้านสัตว์">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นด้านสัตว์
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" required value="ภูมิปัญญาท้องถิ่นด้านประมง" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นด้านประมง
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" required value="ภูมิปัญญาท้องถิ่นด้านผลิตภัณฑ์และการแปรรูป">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นด้านผลิตภัณฑ์และการแปรรูป
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" required value="ภูมิปัญญาท้องถิ่นด้านเครื่องมือเครื่องใช้ทางการเกษตร">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นด้านเครื่องมือเครื่องใช้ทางการเกษตร
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" required  value="อื่นๆ">
                        <label class="form-check-label" for="flexRadioDefault2">
                            อื่นๆ
                        </label>
                    </div>
                    </div>

                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">จุดเด่นของภูมิปัญญาท้องถิ่น</label>
                        <textarea class="form-control" name="local_highlights" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">รายละเอียดของภูมิปัญญาท้องถิ่น</label>
                        <textarea class="form-control" name="wisdom_details" rows="3"></textarea>
                    </div>
                    <h5>การประชาสัมพันธ์และเผยแพร่ภูมิปัญญาท้องถิ่น</h5>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" required value="ยังไม่เคยมีการเผยแพร่ / ใช้เฉพาะบุคคล">
                        <label class="form-check-label" for="flexRadioDefault1">
                            ยังไม่เคยมีการเผยแพร่ / ใช้เฉพาะบุคคล
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" required value="เคยเผยแพร่เฉพาะในชุมชน">
                        <label class="form-check-label" for="flexRadioDefault2">
                            เคยเผยแพร่เฉพาะในชุมชน
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" required value="มีการดูงานแล้วจากบุคคลภายนอก">
                        <label class="form-check-label" for="flexRadioDefault2">
                            มีการดูงานแล้วจากบุคคลภายนอก
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" required value="มีการนำไปใช้">
                        <label class="form-check-label" for="flexRadioDefault2">
                            มีการนำไปใช้
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" required value="อื่นๆ">
                        <label class="form-check-label" for="flexRadioDefault2">
                            อื่นๆ
                        </label>
                    </div>
                    </div>
                    <h5>ลักษณะของภูมิปัญญาท้องถิ่น</h5>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="characteristic" required value="ภูมิปัญญาท้องถิ่นดั้งเดิม ได้รับการถ่ายทอดมาจาก">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นดั้งเดิม ได้รับการถ่ายทอดมาจาก
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="characteristic" required value="ภูมิปัญญาท้องถิ่นที่ได้พัฒนาและต่อยอด">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นที่ได้พัฒนาและต่อยอด
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="characteristic" required value="ภูมิปัญญาท้องถิ่น/นวัตกรรมที่คิดค้นขึ้นมาใหม่">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่น/นวัตกรรมที่คิดค้นขึ้นมาใหม่
                        </label>
                    </div>
                    </div>

                    <h5>วัตถุดิบที่ใช้ประโยชน์ในผลิตภัณฑ์ที่เกิดจากภูมิปัญญา ซึ่งมีในพื้นที่ พื้นที่อื่นไม่มี ได้แก่</h5>
                    <div class="col-md-12">
                        <textarea class="form-control" name="materials" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
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

</html>