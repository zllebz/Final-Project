<?php
$title = 'ใบงานที่ 1';
include('header.php');
require_once "../db/connect.php";


if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result1 = $controller->getsheet1id($id);
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 1 <br>การเก็บข้อมูลพื้นฐานในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อหมู่บ้าน</label>
                        <input type="text" disabled class="form-control" placeholder="" name="villagename" value="<?php echo $result1["villagename"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ที่ตั้งหมู่บ้าน</label>
                        <input type="text" disabled class="form-control" placeholder=""  name="location" value="<?php echo $result1["location"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">พิกัดหมู่บ้าน</label>
                        <input type="text" disabled class="form-control" placeholder="" name="location_map" value="<?php echo $result1["location_map"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลทางศาสนา</label>
                        <input type="text"  disabled class="form-control" placeholder=""  name="religion" value="<?php echo $result1["religion"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">จำนวนประชากร</label>
                        <input type="text" disabled class="form-control" placeholder=""  name="population" value="<?php echo $result1["population"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">จำนวนพื้นที่ (ไร่)</label>
                        <input type="text" disabled class="form-control" name="numarea" value="<?php echo $result1["numarea"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลสถานศึกษาที่เปิดให้บริการ</label> 
                        <input type="text" disabled class="form-control" placeholder="" name="education_service" value="<?php echo $result1["education_service"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ชื่อสถานศึกษาที่เปิดให้บริการ</label>
                        <input type="text" disabled class="form-control" placeholder="" name="education_name" value="<?php echo $result1["education_name"] ?>">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลการบริหารขององค์กรปกครองส่วนท้องถิ่น</label>
                        <input type="text" disabled class="form-control" placeholder="" name="local_government" value="<?php echo $result1["local_government"] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">ศูนย์สุขภาพชุมชน/โรงพยาบาล (แห่ง)</label>
                        <input type="text" disabled class="form-control" name="hospital" value="<?php echo $result1["hospital"] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">สถานนีตำรวจ (แห่ง)</label>
                        <input type="text" disabled class="form-control" name="police_station" value="<?php echo $result1["police_station"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">แผนที่หมู่บ้าน</label>
                        <input class="form-control"  disabled type="file"  name="image" value="<?php echo $result1["image"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">เอกสาร PDF</label>
                        <input class="form-control" disabled type="file"  name="pdf" value="<?php echo $result1["pdf"] ?>">
                    </div>
                    <div class="col-12">
                        <a class="btn btn-primary" href="../dem/sheet_1.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
