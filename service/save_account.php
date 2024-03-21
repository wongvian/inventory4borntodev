<?php
header('Content-Type: application/json');
require '../includes/config.php';
require '../includes/function.php';

$user_name =  htmlspecialchars($_POST["user_name"]);
$full_name = htmlspecialchars($_POST["full_name"]);
$permission_id = htmlspecialchars($_POST["permission"]);
$default_password = '1234';




$sql_insert = "INSERT INTO tb_admin(user_name,full_name,password,permission_id) ";
$sql_insert .= "VALUES ('$user_name','$full_name',md5('$default_password'),'$permission_id')"; 

//echo $sql_insert;

    if (mysqli_query($conn,$sql_insert)) {
              echo json_encode(array("status" => 1));
                exit();
       } else {
         echo json_encode(array("status" => 0));
    
       }