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
$title = 'ใบงานที่ 3';
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
    $result1 = $controller->getsheet3id($id);
}
?>


<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center" align="center" style="font-size: 22px;">ใบงานที่ 3 <br>การเก็บข้อมูลด้านกายภาพในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12" style="font-size: 16px;">
                        <p><b>สภาพภูมิประเทศ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["terrain"] ?>
                        </p>
                        <p><b>ลักษณะดิน : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["soilitype"] ?>
                        </p>
                        <p><b>แหล่งน้ำธรรมชาติ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["natural_water"] ?>
                        </p>
                        <p><b>แหล่งน้ำชลประทาน : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["irrigation_water"] ?>
                        </p>
                        <p><b>ฝายชะลอความชุ่มชื้น : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["weir_slows"] ?>
                        </p>
                        <p><b>ปริมาณน้ำฝนเฉลี่ยต่อปี : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["rainfall"] ?>
                        </p>
                        <p><b>ปริมาณความต้องการใช้น้ำเปรียบเทียบกับปริมาณน้ำที่มีในพื้นที่ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["water_demand"] ?>
                        </p>
                        <p><b>คุณภาพของน้ำที่มี : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["quality_water"] ?>
                        </p>
                        <p><b>อุณภูมิ (องศาเซลเชียส) : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["temperature"] ?>
                        </p>
                        <p><b>ปริมาณแสง (เปอร์เซ็นต์ความเข้มแสง) : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["amount_light"] ?>
                        </p>
                        <p><b>พิกัดทางภูมิศาสตร์ (GIS) : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["geographic"] ?>
                        </p>
                        <p><b>รูปภาพ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <img width="100%" hight="auto" src="../images/<?php echo $result1['image'] ?>">
                        </p>
                    </div>
                    <div class="col-12">
                        <?php
                        $html = ob_get_contents();
                        $mpdf->WriteHTML($html);
                        $mpdf->Output("ใบงานที่3_การเก็บข้อมูลด้านกายภาพในท้องถิ่น.pdf");
                        ob_end_flush();
                        ?>
                        <a href="ใบงานที่3_การเก็บข้อมูลด้านกายภาพในท้องถิ่น.pdf" class="btn btn-primary">ดาวน์โหลด PDF</a>
                        <a class="btn btn-primary" href="../dem/sheet_3.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>