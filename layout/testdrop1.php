<?php
require_once "../db/connect.php";
if(isset($_POST["function"]) && $_POST["function"] =="provinces"){
    $id = $_POST["id"];
    $sql = "SELECT * FROM amphures WHERE provinces_id = 'id'";
    $query = $this->db->query($sql);
        echo '<option selected disabled>กรุณาเลือก</option>';
    foreach($query as $value){
        echo '<option value ="'.$value['id'].'">'.$value['name_th'].'</option>';
    }
    exit(); 
}

?>