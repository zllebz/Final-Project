<?php
$title = 'ใบงานที่ 6';
include('header.php');
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 6 <br>เรื่อง การเก็บข้อมูลการใช้ประโยชน์ของสัตว์ในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">ข้อมูลพันธุ์สัตว์</label>
                        <textarea class="form-control" name="animal_species" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">สถานที่พบ</label>
                        <input type="text" class="form-control" name="location_meet">
                    </div>
                    <div class="col-6">
                        <label for="exampleFormControlTextarea1" class="form-label">จำนวนที่พบ</label>
                        <input type="text" class="form-control" name="quantity">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ประวัติที่มา</label>
                        <textarea class="form-control" name="history" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ชื่อเจ้าของสัตว์</label>
                        <input type="text" class="form-control" name="animal_owner">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ชื่อผู้ให้ข้อมูล</label>
                        <input type="text" class="form-control" name="Informant_name">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">อัพโหลดเอกสาร PDF</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="col-12">
                        <a type="submit" href="#" class="btn btn-primary">บันทึกข้อมูล</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>