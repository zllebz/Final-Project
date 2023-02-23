<?php
$title = 'ใบงานที่ 1';
require_once '../db/connect.php';
include('header.php');
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 1 <br>การเก็บข้อมูลพื้นฐานในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อหมู่บ้าน</label>
                        <input type="text" class="form-control" placeholder="" name="villagename">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ที่ตั้งหมู่บ้าน</label>
                        <input type="text" class="form-control" placeholder=""  name="location">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">พิกัดหมู่บ้าน</label>
                        <input type="text" class="form-control" placeholder="" name="location_map">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลทางศาสนา</label>
                        <input type="text" class="form-control" placeholder=""  name="religion">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">จำนวนประชากร</label>
                        <input type="text" class="form-control" placeholder=""  name="population">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">จำนวนพื้นที่ (ไร่)</label>
                        <input type="text" class="form-control" name="numarea">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลสถานศึกษาที่เปิดให้บริการ</label> 
                        <input type="text" class="form-control" placeholder="" name="education_service">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ชื่อสถานศึกษาที่เปิดให้บริการ</label>
                        <input type="text" class="form-control" placeholder="" name="education_name">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลการบริหารขององค์กรปกครองส่วนท้องถิ่น</label>
                        <input type="text" class="form-control" placeholder="" name="local_government">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">ศูนย์สุขภาพชุมชน/โรงพยาบาล (แห่ง)</label>
                        <input type="text" class="form-control" name="hospital">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">สถานนีตำรวจ (แห่ง)</label>
                        <input type="text" class="form-control" name="police_station">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
                        <input class="form-control" type="file"  name="pdf">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">แผนที่หมู่บ้าน</label>
                        <input class="form-control" type="file"  name="image">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
//-------------------------------------จุดเชื่อมเว้ย--------------------------------------------------
  //print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
 //ถ้ามีค่าส่งมาจากฟอร์ม
//print_r($_GET);
    if(isset($_GET['villagename']) 
    && isset($_GET['location']) 
    && isset($_GET['location_map']) 
    && isset($_GET['religion'])
    && isset($_GET['population']) 
    && isset($_GET['numarea']) 
    && isset($_GET['education_service']) 
    && isset($_GET['education_name']) 
    && isset($_GET['local_government']) 
    && isset($_GET['hospital']) 
    && isset($_GET['police_station']) 
    && isset($_GET['pdf']) 
    && isset($_GET['image']) 
    ){
    require_once '../db/connect.php';
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $tap1 = $_GET['villagename'];
    $tap2 = $_GET['location'];
    $tap3 = $_GET['location_map'];
    $tap4 = $_GET['religion'];
    $tap5 = $_GET['population'];
    $tap6 = $_GET['numarea'];
    $tap7 = $_GET['education_service'];
    $tap8 = $_GET['education_name'];
    $tap9 = $_GET['local_government'];
    $tap10 = $_GET['hospital'];
    $tap11 = $_GET['police_station'];
    $tap12 = $_GET['pdf'];
    $tap13 = $_GET['image'];
 

              $stmt = $pdo->prepare("INSERT INTO tbl_worksheet_1 (villagename, location, location_map, religion, population, numarea, education_service, education_name
              , local_government, hospital, police_station, pdf, image)
              VALUES (:villagename, :location, :location_map, :religion, :population, :numarea, :education_service, :education_name
              , :local_government, :hospital, :police_station, :pdf, :image)");
              $stmt->bindParam(':villagename', $tap1, PDO::PARAM_STR);
              $stmt->bindParam(':location', $tap2, PDO::PARAM_STR);
              $stmt->bindParam(':location_map', $tap3 , PDO::PARAM_STR);
              $stmt->bindParam(':religion', $tap4 , PDO::PARAM_STR);
              $stmt->bindParam(':population', $tap5 , PDO::PARAM_STR);
              $stmt->bindParam(':numarea', $tap6 , PDO::PARAM_STR);
              $stmt->bindParam(':education_service', $tap7 , PDO::PARAM_STR);
              $stmt->bindParam(':education_name', $tap8 , PDO::PARAM_STR);
              $stmt->bindParam(':local_government', $tap9 , PDO::PARAM_STR);
              $stmt->bindParam(':hospital', $tap10 , PDO::PARAM_STR);
              $stmt->bindParam(':police_station', $tap11 , PDO::PARAM_STR);
              $stmt->bindParam(':pdf', $tap12 , PDO::PARAM_STR);
              $stmt->bindParam(':image', $tap13 , PDO::PARAM_STR);
              $result = $stmt->execute();
              if($result){
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
              $pdo = null; //close connect db
    } //isset 
?>