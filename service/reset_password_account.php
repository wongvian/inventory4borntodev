<?php
require '../includes/config.php';
require '../includes/function.php';



$id  = htmlspecialchars($_GET["s_id"]);


$sql_up = "update tb_admin set password=md5('1234') where id = '$id' ";

if (mysqli_query($conn,$sql_up)) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Reset รหัสผ่านเรียบร้อยแล้ว');
    window.location.href='../Account_Manage.php';
    </script>");

    exit();
} else {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
    window.location.href='../Account_Manage.php';
    </script>");
}
