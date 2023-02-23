<?php
$title = 'แบบฟอร์มกรอกข้อมูลขั้นต้น';
include('header.php');
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-5 text-center">แบบฟอร์มกรอกข้อมูลขั้นต้น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-12">
                        <label for="objective" class="form-label">วัตถุประสงค์</label>
                        <textarea class="form-control" name="objective" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="equipment" class="form-label">วิธีการ</label>
                        <textarea class="form-control" name="equipment"  rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="process" class="form-label">สิ่งที่ได้รับจากใบงาน</label>
                        <textarea class="form-control" name="process" rows="3"></textarea>
                    </div>
                    <div class="col-md-2">
                        <label for="Exp_Benefits" class="form-label">วันที่สำรวจ</label>
                        <input type="text" name="Exp_Benefits" class="form-control">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary my-3">หน้าถัดไป</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>