<?php
$title = 'แก้ไขข้อมูลผู้ใช้';
include('header.php');

require_once "../db/connect.php";

if (!isset($_GET["id"])) {
    header("../dem/table_data.php");
} else {
    $id = $_GET["id"];
    $editUser = $controller->geteditUser($id);
}

?>

<?php
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ((isset($_POST["submit"]))) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $status = $controller->updateuser($user_firstname, $user_lastname, $user_email, $user_name, $user_id);
    if ($status) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
                  text: "กรุณารอระบบบันทึก",
                  type: "success"
              }, function() {
                  window.location = "../dem/index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "../edit_view/e_user.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <h3 class="text-center my-3">แก้ไขข้อมูลสมาชิก</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $editUser["user_id"] ?>" />
                    <div class="col-md-6">
                        <label class="form-label">ชื่อจริง</label>
                        <input type="text" name="user_firstname" class="form-control" value="<?php echo $editUser["user_firstname"] ?>" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" name="user_lastname" class="form-control" value="<?php echo $editUser["user_lastname"] ?>" />
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ที่อยู่อีเมล</label>
                        <input type="email" name="user_email" class="form-control" value="<?php echo $editUser["user_email"] ?>" />
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" name="user_name" class="form-control" value="<?php echo $editUser["user_name"] ?>" />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary my-2">ยืนยันข้อมูล</button>
                    </div>
                    <?php echo print_r($editUser); ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>