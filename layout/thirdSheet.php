<?php
$title = 'ใบงานที่ 3';
include('header.php');
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
                        <label for="exampleFormControlTextarea1" class="form-label">พื้นที่ทำไร่</label>
                        <textarea class="form-control" name="farming" rows="3"></textarea>
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
                    <div class="col-md-6">
                        <label class="form-label">ครอบคลุมพื้นที่</label>
                        <input type="text" class="form-control" name="rainfall">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณน้ำฝนเฉลี่ยต่อปี</label>
                        <textarea class="form-control" name="rainfall" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ปริมาณความต้องการใช้น้ำเปรียบเทียบกับปริมาณน้ำที่มีในพื้นที่</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                เพียงพอตลอดปี
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                น้ำแห้งในบางช่วง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                น้ำท่วมในบางช่วง
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">คุณภาพของน้ำที่มี</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                ปนเปื้อนโลหะหนัก
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                ปนเปื้อนจุลินทรีย์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
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