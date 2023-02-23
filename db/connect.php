<?php
$servername = "localhost";
$username = "root";
$password = ""; 


try {
    $pdo = new PDO("mysql:host=$servername;dbname=bellba;charset=utf8", $username, $password);
  // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

require_once "../db/controller.php";


$controller = new Controller($pdo);
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
?>