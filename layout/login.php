<?php
session_start();
include('../db/server.php');

?>
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
  <form action="login_db.php" method="post">
    <?php if (isset($_SESSION['error'])) : ?>
      <div class="error">
        <h3>
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </h3>
      </div>
    <?php endif ?>
    <div class="form-control">
      <label for="email">User</label>
      <input type="text" name="user_name">
    </div>
    <div class="form-control">
      <label for="password">Password</label>
      <input type="password" id="password" name="user_password">
      <i class="fa-solid fa-eye" id="eye"></i>
    </div>
    <div class="form-control">
      <button type="submit" name="login_user" class="btn">Login</button>
    </div>
    <a href="register.php">สมัครสมาชิก</a>
  </form>
  <script src="js/app.js"></script>
</body>

</html>