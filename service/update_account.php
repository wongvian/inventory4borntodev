<?php
header('Content-Type: application/json');
require '../includes/config.php';
require '../includes/function.php';

$id =  htmlspecialchars($_POST["id"]);
$user_name =  htmlspecialchars($_POST["user_name"]);
$full_name = htmlspecialchars($_POST["full_name"]);
$permission_id = htmlspecialchars($_POST["permission"]);

$sql_update = "update tb_admin set user_name='$user_name',full_name='$full_name',permission_id='$permission_id'  where id='$id' ";

//echo $sql_update;

    if (mysqli_query($conn,$sql_update)) {
              echo json_encode(array("status" => 1));
                exit();
       } else {
         echo json_encode(array("status" => 0));
    
       }