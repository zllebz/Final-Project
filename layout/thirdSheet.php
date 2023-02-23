<?php
$title = 'ใบงานที่ 3';
include('header.php');
require_once '../db/connect.php';
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_GET["submit"]))) {
    $tap1 = $_GET['terrain'];
    $tap2 = $_GET['soilitype'];
    $tap3 = $_GET['natural_water'];
    $tap4 = $_GET['irrigation_water'];
    $tap5 = $_GET['weir_slows'];
    $tap6 = $_GET['rainfall'];
    $tap7 = $_GET['water_demand'];
    $tap8 = $_GET['quality_water'];
    $tap9 = $_GET['temperature'];
    $tap10 = $_GET['amount_light'];
    $tap11 = $_GET['geographic'];
    $tap12 = $_GET['image'];
    $tap13 = $_GET['pdf'];
    $status = $controller->insert3($tap1, $tap2, $tap3, $tap4, $tap5, $tap6, $tap7, $tap8, $tap9, $tap10, $tap11, $tap12, $tap13);
    if($status){
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
    }else{
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
            <h3 class="my-3 text-center">ใบงานที่ 3 <br>เรื่อง การเก็บข้อมูลด้านกายภาพในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">สภาพภูมิประเทศ</label>
                        <input type="text" class="form-control" name="terrain" placeholder="เช่น เป็นที่ราบ ลุ่ม ลาดเอียง ภูเขา ป่าพรุ ป่าชายหาด ป่าชายเลน">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">ลักษณะดิน</label>
                        <textarea class="form-control" name="soilitype" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">แหล่งน้ำธรรมชาติ</label>
                        <textarea class="form-control" name="natural_water" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">แหล่งน้ำชลประทาน</label>
                        <textarea class="form-control" name="irrigation_water" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ฝายชะลอความชุ่มชื้น</label>
                        <input type="text" class="form-control" name="weir_slows">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณน้ำฝนเฉลี่ยต่อปี</label>
                        <textarea class="form-control" name="rainfall" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณความต้องการใช้น้ำเปรียบเทียบกับปริมาณน้ำที่มีในพื้นที่</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand" required value="เพียงพอตลอดปี">
                            <label class="form-check-label" for="flexRadioDefault1">
                                เพียงพอตลอดปี
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand" required value="น้ำแห้งในบางช่วง">
                            <label class="form-check-label" for="flexRadioDefault1">
                                น้ำแห้งในบางช่วง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_demand" required value="น้ำท่วมในบางช่วง">
                            <label class="form-check-label" for="flexRadioDefault1">
                                น้ำท่วมในบางช่วง
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">คุณภาพของน้ำที่มี</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water" required value="ปนเปื้อนโลหะหนัก">
                            <label class="form-check-label" for="flexRadioDefault2">
                                ปนเปื้อนโลหะหนัก
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water" required value="ปนเปื้อนจุลินทรีย์">
                            <label class="form-check-label" for="flexRadioDefault2">
                                ปนเปื้อนจุลินทรีย์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="quality_water" required value="น้ำสะอาดไม่มีปัญหาการปนเปื้อน">
                            <label class="form-check-label" for="flexRadioDefault2">
                                น้ำสะอาดไม่มีปัญหาการปนเปื้อน
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">อุณภูมิ (องศาเซลเชียส) </label>
                        <input type="text" class="form-control" name="temperature">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ปริมาณแสง (เปอร์เซ็นต์ความเข้มแสง)</label>
                        <input type="text" class="form-control" name="amount_light">
                    </div>
                    <h5>พิกัดทางภูมิศาสตร์ (GIS)</h5>
                    <div class="col-md-12">
                        <label class="form-label">ค่า X และค่า  Y </label>
                        <input type="text" class="form-control" name="geographic">
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