<?php

          $con= mysqli_connect("localhost","root","","bellba") or die("Error: " . mysqli_error($con));
          mysqli_query($con, "SET NAMES 'utf8' ");
          error_reporting( error_reporting() & ~E_NOTICE );
          date_default_timezone_set('Asia/Bangkok');  





  if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
  	$id = $_POST['id'];
  	$sql = "SELECT * FROM tbl_amphures WHERE province_id='$id'";
  	$query = mysqli_query($con, $sql);
  	    echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
  	    foreach ($query as $value) {
  		echo '<option value="'.$value['amphures_id'].'">'.$value['name_th'].'</option>';
  		
  	}
  }


if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM tbl_districts WHERE amphure_id='$id'";
    $query = mysqli_query($con, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($query as $value2) {
      echo '<option value="'.$value2['districts_id'].'">'.$value2['name_th'].'</option>';
      
    }
  }

  if (isset($_POST['function']) && $_POST['function'] == 'districts') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM tbl_districts WHERE districts_id='$id'";
    $query3 = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query3);
    echo $result['zip_code'];
    exit();
  }
?>