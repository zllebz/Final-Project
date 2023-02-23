<?php
$title = 'ใบงานที่ 4';
include('header.php');
?>

<body>
<div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 4 <br>เรื่อง การเก็บข้อมูลประวัติหมู่บ้าน ชุมชน วิถีชุมชน</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">ประวัติหมู่บ้าน</label>
                        <textarea class="form-control" name="Village_history" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">วิถีชีวิต</label>
                        <textarea class="form-control" name="way_life" rows="3"></textarea>
                    </div>
                    <h5 class="md-3">แบบบักทึกข้อมูลวิถีชีวิต</h5>
                    <p>คำชี้แจง ให้แต่ละกลุ่มสอบถาม/สัมภาษณ์ วิถีชีวิต รอบวัน/รอบสัปดาห์/รอบเดือน/รอบปี</p>
                    <div class="col-12">
                        <textarea class="form-control" name="life_recoed_life" rows="3" placeholder="ผู้ให้ข้อมูล"></textarea>
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