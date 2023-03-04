<?php 
    session_start();
    include('../db/server.php');
    include('header.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['user_name']);
        $password = mysqli_real_escape_string($conn, $_POST['user_password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = sha1($password);
            $query = "SELECT * FROM tbl_users WHERE user_name = '$username' AND user_password = '$password'";
            $result = mysqli_query($conn, $query);
            $objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['user_name'] = $objResult['user_name'];
                $_SESSION['user_firstname'] = $objResult['user_firstname'];
                $_SESSION['user_lastname'] = $objResult['user_lastname'];
                $_SESSION['user_email'] = $objResult['user_email'];
                $_SESSION['position_id'] = $objResult['position_id'];
                $_SESSION['permission_id'] = $objResult['permission_id'];
                $_SESSION['user_id'] = $objResult['user_id'];

                
                $_SESSION['success'] = "Your are now logged in";
                header("location: ../dem/index.php");
            } else {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                header("location: ../layout/login.php");
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: ../layout/login.php");
        }
    }

?>
