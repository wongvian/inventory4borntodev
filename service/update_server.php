<?php
header('Content-Type: application/json');
require '../includes/config.php';
require '../includes/function.php';

$id =  htmlspecialchars($_POST["id"]);
$server_name =  htmlspecialchars($_POST["server_name"]);
$ip = htmlspecialchars($_POST["ip"]);
$sn = htmlspecialchars($_POST["sn"]);
$detail = htmlspecialchars($_POST["detail"]);
$txtUname = htmlspecialchars($_POST["txtUname"]);
$txtPasswd = htmlspecialchars($_POST["txtPasswd"]);
@$backup_url = htmlspecialchars($_POST["backup_url"]);


if (@$_FILES["filePicture"]["name"] <> '') {
  $file = strtolower($_FILES["filePicture"]["name"]);
  $type = strrchr($file, ".");
  if (($type == ".jpeg") || ($type == ".jpg") || ($type == ".png")) {
      $file_name = md5($id) . date('YmdHis')  . $type;
      move_uploaded_file($_FILES["filePicture"]["tmp_name"], "../img/" . $file_name);
  } 
}



if(isset($file_name)){
$sql_update = "update data_server set backup_url='$backup_url',img='$file_name',server_name='$server_name',ip='$ip',sn='$sn',detail='$detail',username='$txtUname',passwd='$txtPasswd'  where id='$id' ";
}else{
  $sql_update = "update data_server set backup_url='$backup_url',server_name='$server_name',ip='$ip',sn='$sn',detail='$detail',username='$txtUname',passwd='$txtPasswd'  where id='$id' ";
}

//echo $sql_update;

    if (mysqli_query($conn,$sql_update)) {
              echo json_encode(array("status" => 1));
                exit();
       } else {
         echo json_encode(array("status" => 0));
    
       }