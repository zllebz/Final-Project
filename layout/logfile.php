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
if ($_SESSION['position_id'] == 2) {
    $_SESSION['msg'] = "ไม่มีสิทธิเข้าถึง";
    header('location: ../dem/table.php');
  }

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_name']);
  header('location: layout/login.php');
}
?>
<?php
$title = 'log';
include('header.php');
require_once '../db/connect.php';
$result = $controller->getlogall();

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

?>



    <div class="container">
        <div class="row">
            <h3 class="my-3 text-center" align="center" style="font-size: 22px;"> </h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3">
                    <div class="col-md-12" style="font-size: 16px;">
                        <h1 class="text-center" align="center"><?php echo "ข้อมูลการเข้าสู่ระบบ"; ?></h1>

                        <table class="table">
                        <thead>
                            <tr role="row" class="info">
                            <th>ลำดับ</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>อีเมล์</th>
                            <th>เวลาเข้าสู่ระบบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr role="row" class="info" >
                            <td><?php echo $row["logfile_id"]; ?></td>
                            <td><?php echo $row["user_name"]; ?></td>
                            <td><?php echo $row["user_firstname"]; ?></td>
                            <td><?php echo $row["user_lastname"]; ?></td>
                            <td><?php echo $row["user_email"]; ?></td>
                            <td><?php echo $row["date_time"]; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <?php
                        $html = ob_get_contents();
                        $mpdf->WriteHTML($html);
                        $mpdf->Output("ข้อมูลการเข้าสู่ระบบ.pdf");
                        ob_end_flush();
                        ?>
                        <a href="ข้อมูลการเข้าสู่ระบบ.pdf" class="btn btn-primary">ดาวน์โหลด PDF</a>
                        <a class="btn btn-primary" href="../dem/index.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
