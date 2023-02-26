<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <title>เข้าสู่ระบบ</title>
</head>

<body>
  <h1>Login</h1>
  <form action="" method="post">
    <div class="form-control">
      <label for="email">User</label>
      <input type="text" name="user_name" autocomplete="off" required>
    </div>
    <div class="form-control">
      <label for="password">Password</label>
      <input type="password" id="password" name="user_password" required>
      <i class="fa-solid fa-eye" id="eye"></i>
    </div>
    <div class="form-control">
      <button class="btn">Login</button>
    </div>
    <a href="register.php">สมัครสมาชิก</a>
  </form>
  <script src="js/app.js"></script>
</body>

</html>

<?php
   if(isset($_POST['user_name']) && isset($_POST['user_password']) ){
   // sweet alert 
   echo '
   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

   //ไฟล์เชื่อมต่อฐานข้อมูล
   require_once '../db/connect.php';
   //ประกาศตัวแปรรับค่าจากฟอร์ม
   $username = $_POST['user_name'];
   $password = sha1($_POST['user_password']); //เก็บรหัสผ่านในรูปแบบ sha1 

   //check username  & password
     $stmt = $pdo->prepare("SELECT user_id, user_firstname, user_lastname FROM tbl_users WHERE user_name = :user_name AND user_password = :user_password");
     $stmt->bindParam(':user_name', $username , PDO::PARAM_STR);
     $stmt->bindParam(':user_password', $password , PDO::PARAM_STR);
     $stmt->execute();

     //กรอก username & password ถูกต้อง
     if($stmt->rowCount() == 1){
       //fetch เพื่อเรียกคอลัมภ์ที่ต้องการไปสร้างตัวแปร session
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       //สร้างตัวแปร session
       $_SESSION['user_id'] = $row['user_id'];
       $_SESSION['user_firstname'] = $row['user_firstname'];
       $_SESSION['user_lastname'] = $row['user_lastname'];
               //เช็คว่ามีตัวแปร session อะไรบ้าง
        print_r($_SESSION);
 
       // exit();
         header('Location: ../index.php'); //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
     }else{ //ถ้า username or password ไม่ถูกต้อง

        echo '<script>
                      setTimeout(function() {
                       swal({
                           title: "เกิดข้อผิดพลาด",
                            text: "Username หรือ Password ไม่ถูกต้อง ลองใหม่อีกครั้ง",
                           type: "warning"
                       }, function() {
                           window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                       });
                     }, 1000);
                 </script>';
             $pdo = null; //close connect db
           } //else
   } //isset 
   //devbanban.com
   ?>