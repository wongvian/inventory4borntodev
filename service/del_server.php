<?php
//header('Content-Type: application/json');
require '../includes/config.php';
require '../includes/function.php';



$id  = htmlspecialchars($_GET["s_id"]);


$sql_del = "delete from data_server  where id = '$id' ";

//echo $sql_update;

if (mysqli_query($conn, $sql_del)) {

    //echo json_encode(array("status" => 1));
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('ลบข้อมูลเรียบร้อยแล้ว');
    window.location.href='../Server_list.php';
    </script>");

    exit();
} else {
    //echo json_encode(array("status" => 0));
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
    window.location.href='../Server_Add.php';
    </script>");
}
