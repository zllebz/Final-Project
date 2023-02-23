<?php
$title = 'ใบงานที่ 8';
include('header.php');
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center">ใบงานที่ 8 <br>เรื่อง การเก็บข้อมูลภูมิปัญญาในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">สาขา</label>
                        <p>(สาขาเกษตรกรรม/ สาขาอุตสาหกรรมและหัตถกรรม /สาขาการแพทย์แผนไทย/ สาขาการจัดการทรัพยากรธรรมชาติและสิ่งแวดล้อม /สาขากองทุนและธุรกิจชุมชน/ สาขาสวัสดิการ /สาขาศิลปกรรม
                            <br>/สาขาการจัดการองค์กร/ สาขาภาษาและวรรณกรรม/ สาขาศาสนาและประเพณี)
                        </p>
                        <input type="text" class="form-control" name="branch">
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
                        <input class="form-check-input" type="radio" name="type_wisdom" id="type_wisdom">
                        <label class="form-check-label" for="flexRadioDefault1">
                            ภูมิปัญญาท้องถิ่นด้านพืช
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" id="type_wisdom" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นด้านสัตว์
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" id="type_wisdom" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นด้านประมง
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" id="type_wisdom" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นด้านผลิตภัณฑ์และการแปรรูป
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" id="type_wisdom" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นด้านเครื่องมือเครื่องใช้ทางการเกษตร
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_wisdom" id="type_wisdom" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            อื่นๆ
                        </label>
                    </div>
                    </div>

                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อภูมิปัญญาท้องถิ่น</label>
                        <textarea class="form-control" name="local_highlights" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">รายละเอียดของภูมิปัญญาท้องถิ่น</label>
                        <textarea class="form-control" name="wisdom_details" rows="3"></textarea>
                    </div>
                    <h5>การประชาสัมพันธ์และเผยแพร่ภูมิปัญญาท้องถิ่น</h5>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" id="public_relations">
                        <label class="form-check-label" for="flexRadioDefault1">
                            ยังไม่เคยมีการเผยแพร่ / ใช้เฉพาะบุคคล
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" id="public_relations">
                        <label class="form-check-label" for="flexRadioDefault2">
                            เคยเผยแพร่เฉพาะในชุมชน
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" id="public_relations">
                        <label class="form-check-label" for="flexRadioDefault2">
                            มีการดูงานแล้วจากบุคคลภายนอก
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" id="public_relations">
                        <label class="form-check-label" for="flexRadioDefault2">
                            มีการนำไปใช้
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="public_relations" id="public_relations">
                        <label class="form-check-label" for="flexRadioDefault2">
                            อื่นๆ
                        </label>
                    </div>
                    </div>
                    <h5>ลักษณะของภูมิปัญญาท้องถิ่น</h5>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="characteristic" id="characteristic">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นดั้งเดิม ได้รับการถ่ายทอดมาจาก
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="characteristic" id="characteristic">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่นที่ได้พัฒนาและต่อยอด
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="characteristic" id="characteristic">
                        <label class="form-check-label" for="flexRadioDefault2">
                            ภูมิปัญญาท้องถิ่น/นวัตกรรมที่คิดค้นขึ้นมาใหม่
                        </label>
                    </div>
                    </div>

                    <h5>วัตถุดิบที่ใช้ประโยชน์ในผลิตภัณฑ์ที่เกิดจากภูมิปัญญา ซึ่งมีในพื้นที่ พื้นที่อื่นไม่มี ได้แก่</h5>
                    <div class="col-md-12">
                        <textarea class="form-control" name="animal_species" rows="3"></textarea>
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