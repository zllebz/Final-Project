<?php
$title = 'แบบฟอร์มกรอกข้อมูลขั้นต้น';
include('header.php');
require_once "../db/connect.php";
$result = $controller->datest();
//print_r($_GET);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="my-5 text-center">แบบฟอร์มกรอกข้อมูลขั้นต้น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-12">
                        <label for="provinces" class="form-label">เลือกจังหวัด</label>
                        <select name="provinces" id="provinces" class="form-select">
                            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row["provinces_id"]; ?>"><?php echo $row["name_th"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="amphures" class="form-label">เลือกอำเภอ</label>
                        <select name="amphures" id="amphures" class="form-select"></select>
                    </div>
                    <div class="col-12">
                        <label for="districts" class="form-label">เลือกตำบล</label>
                        <select name="districts" id="districts" class="form-select"></select>
                    </div>
                    <div class="col-12">
                        <label for="zip_code" class="form-label">รหัสไปรษณีย์</label>
                        <select name="zip_code" id="zip_code" class="form-select"></select>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                    <script type="text/javascript">
                        $('#provinces').change(function() {
                            var id_provinces = $(this).val();
                            //console.log($(this).val())
                            $.ajax({
                                type: "post",
                                url: "testdrop1.php",
                                data:{id:id_provinces,function:provinces},
                                success: function(data) {
                                    $("#amphures").html(data);
                                }
                            });
                        });
                    </script>

                    <div class="col-12">
                        <label for="objective" class="form-label">วัตถุประสงค์</label>
                        <textarea class="form-control" name="objective" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="equipment" class="form-label">อุปกรณ์</label>
                        <textarea class="form-control" name="equipment" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>