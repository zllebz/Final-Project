<?php
$title = 'ใบงานที่ 2';
include('header.php');
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 2 <br>เรื่อง การเก็บข้อมูลการประกอบอาชีพในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <h4>การประกอบอาชีพ</h4>
                    <div class="col-md-12">
                        <h5>ด้านเกษตรกรรม</h5>
                        <br>
                        <label for="exampleFormControlInput1">พื้นที่ทำนา</label>
                        <input type="text" class="form-control" name="agriculture" placeholder="">
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">พื้นที่ทำสวน</label>
                        <textarea class="form-control" name="garden" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">พื้นที่ทำไร่</label>
                        <textarea class="form-control" name="farming" rows="3"></textarea>
                    </div>
                    <br>
                    <h5>ปัศุสัตว์</h5>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">จำนวนสัตว์ในพื้นที่โดยรวม</label>
                        <textarea class="form-control" name="number_animal" rows="3"></textarea>
                    </div>
                    <h5>ประมง</h5>
                    <div class="col-md-12">
                        <label class="form-label">จำนวนสัตว์พื้นที่โดยรวม</label>
                        <textarea class="form-control" name="fishing" rows="3"></textarea>
                    </div>
                    <h5>ด้านอุตสาหกรรม</h5>
                    <br>
                    <div class="col-md-12">
                        <label class="form-label">จำนวนโรงงานอุตสาหกรรมขนาดใหญ่</label>
                        <textarea class="form-control" name="b_industry" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">จำนวนโรงงานอุตสาหกรรมขนาดกลาง</label>
                        <textarea class="form-control" name="m_industry" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">จำนวนโรงงานอุตสาหกรรมขนาดครัวเรือน</label>
                        <textarea class="form-control" name="s_industry" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">การพาณิชย์</label>
                        <textarea class="form-control" name="commerce" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">สถานบริการ</label>
                        <textarea class="form-control" name="service" rows="3"></textarea>
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