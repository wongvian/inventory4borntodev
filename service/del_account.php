<?php
//header('Content-Type: application/json');
require '../includes/config.php';
require '../includes/function.php';



$id  = htmlspecialchars($_GET["s_id"]);


$sql_del = "delete from tb_admin  where id = '$id' ";

//echo $sql_update;

if (mysqli_query($conn, $sql_del)) {

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('ลบข้อมูลเรียบร้อยแล้ว');
    window.location.href='../Account_Manage.php';
    </script>");

    exit();
} else {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
    window.location.href='../Account_Manage.php';
    </script>");
}


