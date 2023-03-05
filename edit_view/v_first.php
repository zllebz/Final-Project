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
$title = 'แบบฟอร์มกรอกข้อมูลขั้นต้น';
include('header.php');
require_once "../db/connect.php";

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
    $result1 = $controller->getfirstid($id);
}

?>


<body>
    <div class="container">
        <div class="row">
            <h3 class="my-5 text-center"  align="center" style="font-size: 22px;">รายงานส่วนต้นใบงานที่ <?php echo $result1["doc_id"] ?></h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                <div class="col-md-12" style="font-size: 16px;">
                    <p align="center"><b>คำชี้แจง </b>
                        <?php echo $result1["statement"] ?>
                    </p>
                    <p><b>วัตถุประสงค์ : </b>
                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $result1["objective"] ?>
                    </p>
                    <p><b>อุปกรณ์ : </b>
                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $result1["equipment"] ?>
                    </p>
                    <p><b>วิธีการ : </b>
                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $result1["process"] ?>
                    </p>
                    <p><b>สิ่งที่ได้รับจากใบงาน : </b>
                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $result1["exp_benefits"] ?>
                    </p>
                    <input type="hidden" name="first_storage_id" value="<?php echo $result1["first_storage_id"] ?>" />
                    <div class="col-12">
                        <?php
                        $html = ob_get_contents();
                        $mpdf->WriteHTML($html);
                        $mpdf->Output("ส่วนต้นใบงาน.pdf");
                        ob_end_flush();
                        ?>
                        <a href="ส่วนต้นใบงาน.pdf" class="btn btn-primary">ดาวน์โหลด PDF</a>
                        <a class="btn btn-primary" href="../dem/table_data.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>