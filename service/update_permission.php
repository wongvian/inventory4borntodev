<?php
header('Content-Type: application/json');
require '../includes/config.php';
require '../includes/function.php';

$id =  htmlspecialchars($_POST["id"]);
$permission_detail =  htmlspecialchars($_POST["permission_detail"]);




  $sql_update = "update ref_permission set permission_detail ='$permission_detail' where permission_id='$id' ";

//echo $sql_update;

    if (mysqli_query($conn,$sql_update)) {
              echo json_encode(array("status" => 1));
                exit();
       } else {
         echo json_encode(array("status" => 0));
    
       }