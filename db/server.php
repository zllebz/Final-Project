<?php

$conn = new mysqli('localhost','root','','bellba');
if ($conn->connect_errno) {
    die( "Failed to connect to MySQL : (" . $conn->connect_errno . ") " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>
