<?php
header('Content-Type: application/json');
require '../includes/config.php';
require '../includes/function.php';

$permission_detail =  htmlspecialchars($_POST["permission_detail"]);


$sql_insert = "INSERT INTO ref_permission(permission_detail) ";
$sql_insert .= "VALUES ('$permission_detail')"; 

//echo $sql_insert;

    if (mysqli_query($conn,$sql_insert)) {
              echo json_encode(array("status" => 1));
                exit();
       } else {
         echo json_encode(array("status" => 0));
    
       }