<?php
$title = 'แบบฟอร์มกรอกข้อมูลขั้นต้น';
include('header.php');
require_once "../db/connect.php";
$result = $controller->provinces();
$result1 = $controller->amphures();
$result2 = $controller->districts();
//print_r($_GET);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

?>



<body>
    <div class="container">
        <div class="row">
            <h3 class="my-5 text-center">แบบฟอร์มกรอกสถานที่ที่สำรวจ</h3>
            <div class="card border-0 shadow">
                <form class="row  my-3">
                    <div class="">
                        <label for="provinces" class="form-label">เลือกจังหวัด</label>
                        <select name="provinces"   id="provinces" class=" js-example-basic-single col-xs-6 col-sm-6 col-md-12">
                            <option value="" selected disabled>-- กรุณาเลือก --</option>
                            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row["provinces_id"]; ?>"><?php echo $row["name_th"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="g-3 my-3">
                        <label for="amphures" class="form-label">เลือกอำเภอ</label>
                        <select name="amphures"   id="amphures" class=" js-example-basic-single col-xs-6 col-sm-6 col-md-12">
                            <option value="" selected disabled>-- กรุณาเลือก --</option>
                            <?php while ($row = $result1->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row["amphures_id"]; ?>"><?php echo $row["name_th"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="g-3 my-3">
                        <label for="districts" class="form-label">เลือกตำบล</label>
                        <select name="districts"   id="districts" class=" js-example-basic-single col-xs-6 col-sm-6 col-md-12">
                            <option value="" selected disabled>-- กรุณาเลือก --</option>
                            <?php while ($row = $result2->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row["districts_id"]; ?>"><?php echo $row["name_th"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </script>
                </form>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>

</html>