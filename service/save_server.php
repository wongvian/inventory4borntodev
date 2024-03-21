<?php
header('Content-Type: application/json');
require '../includes/config.php';
require '../includes/function.php';

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
  } else {
      $response = array(
          'status' => 3
      );
  }
}


$sql_insert = "INSERT INTO data_server(server_name,ip,sn,detail,username,passwd,img,backup_url) ";
$sql_insert .= "VALUES ('$server_name','$ip','$sn','$detail','$txtUname','$txtPasswd','$file_name','$backup_url')"; 

//echo $sql_insert;

    if (mysqli_query($conn,$sql_insert)) {
              echo json_encode(array("status" => 1));
                exit();
       } else {
         echo json_encode(array("status" => 0));
    
       }