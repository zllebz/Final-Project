<?php
$title = 'ใบงานที่ 2';
include('header.php');
?>

<body>
<div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 5 <br>เรื่อง การเก็บข้อมูลด้านกายภาพในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <h3>ข้อมูลพืช</h3>
                        <p>พืชที่มีความสำคัญ หรือมีลักษณะพิเศษ เช่น พืชที่เป็นไม้ผล ผักพื้นเมือง พืชสมุนไพร พืชใช้เนื้อไม้
พืชเศรษฐกิจ ปาล์ม ไผ่ หญ้า ฯลฯ</p>
                        <textarea class="form-control" name="data_plant" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <p>การใช้ประโยชน์ในท้องถิ่น (ระบุส่วนที่ใช้และวิธีการใช้)</p>
                        <label for="exampleFormControlInput1" class="form-label">อาหาร</label>
                        <input type="text" class="form-control" name="food">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ยารักษาโรค ใช้กับคน</label>
                        <input type="text" class="form-control" name="medicine_people">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">ยารักษาโรค ใช้กับสัตว์</label>
                        <input type="text" class="form-control" name="medicine_animal">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">เครื่องเรือน เครื่องใช้อื่นๆ</label>
                        <input type="text" class="form-control" name="furniture">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ยาฆ่าแมลง ยาปราบศัตรูพืช</label>
                        <input type="text" class="form-control" name="insecticide">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ความเกี่ยวข้องกับประเพณี วัฒนธรรม</label>
                        <input type="text" class="form-control" name="cultures">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณน้ำฝนเฉลี่ยต่อปี</label>
                        <textarea class="form-control" name="rainfall" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ความเกี่ยวข้องกับความเชื่อทางศาสนา</label>
                        <input type="text" class="form-control" name="religion">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">อื่นๆ </label>
                        <input type="text" class="form-control" name="other">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพ</label>
                        <input class="form-control" type="file" id="formFile">
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