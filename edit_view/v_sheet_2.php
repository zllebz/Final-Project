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
$title = 'ใบงานที่ 2';
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
    $result1 = $controller->getsheet2id($id);
}
?>


<body>
    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center" align="center" style="font-size: 22px;">ใบงานที่ 2 <br> การเก็บข้อมูลการประกอบอาชีพในท้องถิ่น</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12" style="font-size: 16px;">
                        <h3 align="center">ด้านเกษตรกรรม</h3>
                        <p><b>พื้นที่ทำนา : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["agriculture"] ?>
                        </p>
                        <p><b>พื้นที่ทำสวน : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["garden"] ?>
                        </p>
                        <p><b>พื้นที่ทำไร่ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["farming"] ?>
                        </p>
                        <h3 align="center">ปัศุสัตว์</h3>
                        <p><b>จำนวนสัตว์ในพื้นที่โดยรวม : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["number_animal"] ?>
                        </p>
                        <h3 align="center">การประมง</h3>
                        <p><b>จำนวนสัตว์ในพื้นที่โดยรวม : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["fishing"] ?>
                        </p>
                        <h3 align="center">ด้านอุตสาหกรรม</h3>
                        <p><b>จำนวนโรงงานอุตสาหกรรมขนาดใหญ่ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["b_industry"] ?>
                        </p>
                        <p><b>จำนวนโรงงานอุตสาหกรรมขนาดกลาง : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["m_industry"] ?>
                        </p>
                        <p><b>จำนวนโรงงานอุตสาหกรรมขนาดครัวเรือน : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["s_industry"] ?>
                        </p>
                        <p><b>การพาณิชย์ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["commerce"] ?>
                        </p>
                        <p><b>สถานบริการ : </b>
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $result1["service"] ?>
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
                        $mpdf->Output("ใบงานที่2_การเก็บข้อมูลการประกอบอาชีพในท้องถิ่น.pdf");
                        ob_end_flush();
                        ?>
                        <a href="ใบงานที่2_การเก็บข้อมูลการประกอบอาชีพในท้องถิ่น.pdf" class="btn btn-primary">ดาวน์โหลด PDF</a>
                        <a class="btn btn-primary" href="../dem/sheet_2.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>