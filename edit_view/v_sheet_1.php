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
$title = 'ใบงานที่ 1';
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
    $result1 = $controller->getsheet1id($id);
}
?>


<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center" align="center" style="font-size: 22px;">ใบงานที่ 1 <br>การเก็บข้อมูลพื้นฐานในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12" style="font-size: 16px;">
                        <p><b>ชื่อหมู่บ้าน : </b>
                            <?php echo $result1["villagename"] ?>
                        </p>
                        <p><b>ที่ตั้งหมู่บ้าน : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["location"] ?>
                        </p>
                        <p><b>พิกัดหมู่บ้าน :</b>
                            <?php echo $result1["location_map"] ?>
                        </p>
                        <p><b>ข้อมูลทางศาสนา : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["religion"] ?>
                        </p>
                        <p><b>จำนวนประชากร : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["population"] ?>
                        </p>
                        <p><b>จำนวนพื้นที่ (ไร่) : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["numarea"] ?>
                        </p>
                        <p><b>ข้อมูลสถานศึกษาที่เปิดให้บริการ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["education_name"] ?>
                        </p>
                        <p><b>ข้อมูลการบริหารขององค์กรปกครองส่วนท้องถิ่น : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["local_government"] ?>
                        </p>
                        <p><b>ศูนย์สุขภาพชุมชน/โรงพยาบาล (แห่ง) : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["hospital"] ?>
                        </p>
                        <p><b>สถานนีตำรวจ (แห่ง) : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["police_station"] ?>
                        </p>
                        <p><b>แผนที่หมู่บ้าน : </b></p>
                        <img width="100%" hight="auto" src="../images/<?php echo $result1['image'] ?>">
                    </div>
                    <div class="col-12">
                        <?php
                        $html = ob_get_contents();
                        $mpdf->WriteHTML($html);
                        $mpdf->Output("ใบงานที่1_การเก็บข้อมูลพื้นฐานในท้องถิ่น.pdf");
                        ob_end_flush();
                        ?>
                        <a href="ใบงานที่1_การเก็บข้อมูลพื้นฐานในท้องถิ่น.pdf" class="btn btn-primary">ดาวน์โหลด PDF</a>
                        <a class="btn btn-primary" href="../dem/sheet_1.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>