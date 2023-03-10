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
$title = 'ใบงานที่ 7';
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
    $result1 = $controller->getsheet7id($id);
}
?>


<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center" align="center" style="font-size: 22px;">ใบงานที่ 7 <br>การเก็บข้อมูลการใช้ประโยชน์ของชีวภาพอื่นๆ ในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12" style="font-size: 16px;">
                        <p><b>ข้อมูลชีวภาพ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["bio_data"] ?>
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
                        $mpdf->Output("ใบงานที่7_การเก็บข้อมูลการใช้ประโยชน์ของชีวภาพอื่นๆ ในท้องถิ่น.pdf");
                        ob_end_flush();
                        ?>
                        <a href="ใบงานที่7_การเก็บข้อมูลการใช้ประโยชน์ของชีวภาพอื่นๆ ในท้องถิ่น.pdf" class="btn btn-primary">ดาวน์โหลด PDF</a>
                        <a class="btn btn-primary" href="../dem/sheet_7.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>