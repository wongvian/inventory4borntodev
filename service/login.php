<?php


header('Content-Type: application/json');
require '../includes/config.php';


// $username = $_POST['username'];
// $password = $_POST['password'];

@$username_u = htmlspecialchars($_POST['username']);
@$password_u = htmlspecialchars($_POST['password']);

if ($username_u =='' || $password_u == '') {
  header('Location: ./');
  exit;
}

  // Fetch the user record from the database based on the provided username
  $sql = "SELECT * FROM tb_admin WHERE user_name = '$username_u'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $hashedPassword = $row["password"];

      // Check if the provided password matches the stored MD5 hashed password
      if (md5($password_u) == $hashedPassword) {
  session_start();
  $_SESSION["session_id"] = session_id();
  $_SESSION["user_name"] = $row["user_name"];
  $_SESSION["permission_id"] = $row["permission_id"];

  $response = array(
    'status' => 1,
    'msg' => 'Login successful'
  );

      } else {
            // Login failed
            $response = array(
              'status' => 0,
              'msg' => 'Invalid Credentials'
            );
        }
    } else {
        // User not found
        $response = array(
          'status' => 0,
          'msg' => 'Invalid Credentials'
        );
    }
    echo json_encode($response);
    exit();