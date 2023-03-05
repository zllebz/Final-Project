<?php
$title = "สมัครสมาชิก";
include("header.php");
require_once '../db/connect.php';
$result = $controller->prefixv();
//print_r($_POST)
?> 

<body>
    <div class="container">
        <div class="row">
            <h3 class="text-center my-3">สมัครสมาชิก</h3>
            <div class="card border-0 shadow">
                <form class="row g-3 my-3" method="post">
                <div class="col-md-2">
                        <label for="inputState" class="form-label">คำนำหน้า</label>
                        <select name="prefix_id" id="inputState" class="form-select">
                        <option value="" selected disabled>-- กรุณาเลือก --</option>
                        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $row["prefix_id"]; ?>"><?php echo $row["prefix_name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">ชื่อจริง</label>
                        <input type="text" name="user_firstname" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" name="user_lastname" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">ที่อยู่อีเมล</label>
                        <input type="email" name="user_email" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" name="user_name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">รหัสผ่าน</label>
                        <input type="password" name="user_password" class="form-control">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary my-2">ยืนยันข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>


<?php
//-------------------------------------จุดเชื่อม--------------------------------------------------
  //print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
 //ถ้ามีค่าส่งมาจากฟอร์ม

    if(isset($_POST['prefix_id']) && isset($_POST['user_firstname']) && isset($_POST['user_lastname']) && isset($_POST['user_email'])&& isset($_POST['user_name']) && isset($_POST['user_password']) ){
    require_once '../db/connect.php';

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $prefix_id = $_POST['prefix_id'];
    $name = $_POST['user_firstname'];
    $surname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $username = $_POST['user_name'];
    $password = sha1($_POST['user_password']); //เก็บรหัสผ่านในรูปแบบ sha1 
 
    //check duplicat
      $stmt = $pdo->prepare("SELECT user_id FROM tbl_users WHERE user_name = :user_name");
      //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
      $stmt->execute(array(':user_name' => $username));
      //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
      if($stmt->rowCount() > 0){
          echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Username ซ้ำ !! ",  
                            text: "กรุณาสมัครใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 0);
                </script>';
      }else{ //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
              //sql insert
              $stmt = $pdo->prepare("INSERT INTO tbl_users (prefix_id, user_firstname, user_lastname, user_email, user_name, user_password)
              VALUES (:prefix_id, :user_firstname, :user_lastname, :user_email, :user_name, :user_password)");
              $stmt->bindParam(':prefix_id', $prefix_id, PDO::PARAM_STR);
              $stmt->bindParam(':user_firstname', $name, PDO::PARAM_STR);
              $stmt->bindParam(':user_lastname', $surname , PDO::PARAM_STR);
              $stmt->bindParam(':user_email', $user_email , PDO::PARAM_STR);
              $stmt->bindParam(':user_name', $username , PDO::PARAM_STR);
              $stmt->bindParam(':user_password', $password , PDO::PARAM_STR);
              $result = $stmt->execute();
              if($result){
                  echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "สมัครสมาชิกสำเร็จ",
                            text: "",
                            type: "success"
                        }, function() {
                            window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 0);
                  </script>';
              }else{
                 echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                            type: "error"
                        }, function() {
                            window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 0);
                  </script>';
              }
              $pdo = null; //close connect db
        } //else chk dup
    } //isset 
?>