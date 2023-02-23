<?php
$title = 'ใบงานที่ 9';
include('header.php');
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 9 <br>เรื่อง การเก็บข้อมูลแหล่งทรัพยากรและโบราณคดีในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">แหล่งโบราณคดี (ถ้ามี)</label>
                        <textarea class="form-control" name="archeology_site" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">แหล่งทรัพยากรที่สำคัญ</label>
                        <textarea class="form-control" name="important_resources" rows="3" placeholder="(เช่น อุทยานฯ น้ำตก สวนเฉลิมพระเกียรติ สวนพฤกษศาสตร์ สวนป่า ฯ)"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลแหล่งโบราณคดี</label>
                        <textarea class="form-control" name="archeology_record" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">แหล่งทรัพยากรที่สำคัญ</label>
                        <textarea class="form-control" name="name_resources" rows="3"></textarea>
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