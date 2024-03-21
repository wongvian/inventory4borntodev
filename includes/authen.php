<?php
include "config.php";
@session_start();
$session_id = session_id();

//$sqlUser = "SELECT * FROM tb_admin WHERE user_name =  '" . $_SESSION["user_name"] . "'  ";



$sql_u = "SELECT * FROM tb_admin WHERE user_name =  '" . $_SESSION["user_name"] . "'  ";
$query_u = mysqli_query($conn,$sql_u);
$row_user = mysqli_fetch_array($query_u);

$full_name = $row_user['full_name'];


if ($session_id != $_SESSION["session_id"]) {

    header('Location: login');
    exit;
}
