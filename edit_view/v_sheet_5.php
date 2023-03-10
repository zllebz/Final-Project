<?php
session_start();

if (!isset($_SESSION['user_name'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../layout/login.php');
}
if ($_SESSION['permission_id'] == 0) {
    $_SESSION['msg'] = "ไม่มีสิทธิเข้าถึง";
    header('location: ../dem/check.php');
  }
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_name']);
  header('location: layout/login.php');
}
?>
<?php
$title = 'ใบงานที่ 5';
include('header.php');
require_once '../db/connect.php';

require_once __DIR__ . '../../vendor/autoload.php';
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);
ob_start();


if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $result1 = $controller->getsheet5id($id);
}
?>


<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center" align="center" style="font-size: 22px;">ใบงานที่ 5 <br>การเก็บข้อมูลการใช้ประโยชน์ของพืชในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12" style="font-size: 16px;">
                    <p style="font-size: 18px;" align="center"><b>ข้อมูลพืช </b></p>
                        <p><b>พืชที่มีความสำคัญ หรือมีลักษณะพิเศษ : (เช่น พืชที่เป็นไม้ผล ผักพื้นเมือง พืชสมุนไพร พืชใช้เนื้อไม้
พืชเศรษฐกิจ ปาล์ม ไผ่ หญ้า ฯลฯ)</b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["data_plant"] ?>
                        </p>
                        <p style="font-size: 18px;" align="center"><b>การใช้ประโยชน์ในท้องถิ่น (ระบุส่วนที่ใช้และวิธีการใช้)</b></p>
                        <p><b>อาหาร : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["food"] ?>
                        </p>
                        <p><b>ยารักษาโรค ใช้กับคน : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["medicine_people"] ?>
                        </p>
                        <p><b>ยารักษาโรค ใช้กับสัตว์ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["medicine_animal"] ?>
                        </p>
                        <p><b>เครื่องเรือน เครื่องใช้อื่นๆ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["furniture"] ?>
                        </p>
                        <p><b>ยาฆ่าแมลง ยาปราบศัตรูพืช : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["insecticide"] ?>
                        </p>
                        <p><b>ความเกี่ยวข้องกับประเพณี วัฒนธรรม : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["cultures"] ?>
                        </p>
                        <p><b>ความเกี่ยวข้องกับความเชื่อทางศาสนา : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["religion"] ?>
                        </p>
                        <p><b>อื่นๆ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["other"] ?>
                        </p>
                        <p><b>รูปภาพที่ 1 : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <img width="100%" hight="auto" src="../images/<?php echo $result1['image1'] ?>">
                        </p>
                        <p><b>รูปภาพที่ 2 : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <img width="100%" hight="auto" src="../images/<?php echo $result1['image2'] ?>">
                        </p>
                        
                    </div>
                    <div class="col-12">
                        <?php
                        $html = ob_get_contents();
                        $mpdf->WriteHTML($html);
                        $mpdf->Output("ใบงานที่5_การเก็บข้อมูลการใช้ประโยชน์ของพืชในท้องถิ่น.pdf");
                        ob_end_flush();
                        ?>
                        <a href="ใบงานที่5_การเก็บข้อมูลการใช้ประโยชน์ของพืชในท้องถิ่น.pdf" class="btn btn-primary">ดาวน์โหลด PDF</a>
                        <a class="btn btn-primary" href="../dem/sheet_5.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>