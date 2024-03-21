<?php

session_start();
$session_id = session_id();


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>สำหรับผู้ดูแลระบบ Login  | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asst_backend/plugins/fontawesome/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="asst_backend/dist/css/adminlte.min.css">

  <script src="asst_backend/dist/js/sweetalert.min.js"></script>
  <script src="asst_backend/dist/js/sweetalert.js"></script>
  <link rel="stylesheet" href="asst_backend/vendor/toastr/toastr.min.css">
  <link rel="stylesheet" href="asst_backend/dist/css/sweetalert.css">

  <link rel="icon" type="image/png" sizes="16x16" href="asst_backend/dist/img/favicon.png">

  <link href='https://fonts.googleapis.com/css?family=Kanit:300&subset=thai,latin' rel='stylesheet' type='text/css'>

  <style>
    body,
    .sweet-alert {
      font-family: 'Kanit', sans-serif;
      color: #34495e;
    }

    .page-header .page-header-image {
      position: absolute;
      background-size: cover;
      background-position: 50%;
      width: 100%;
      height: 100%;
      z-index: -1;
    }

    .login-box {
      width: 360px;
    }

    label:not(.form-check-label):not(.custom-file-label) {
      font-weight: 400;
    }
  </style>
</head>

<body class="hold-transition login-page" filter-color="orange" style="background-image:url(asst_backend/dist/img/datacenter.jpg);    position: absolute;
    background-size: cover;
    background-position: 50%;
    width: 100%;
    height: 100%;
    z-index: -1;">


  <div class="login-box">
    <div class="card" style="margin-bottom: 0px;">



      <div class="card-body login-card-body" style="padding-bottom: 5px;">
        <div class="login-box-msg">
          <!-- <img src="dist/img/bbpos-logo.png" width="20%" class="img-fluid" alt="Responsive image"> -->
          <h6 style="margin-top:10px;margin-bottom:0px;color: #007bff;">- <b>Admin Login</b> -</h6>
          <h6 style="margin-top:10px;margin-bottom:0px;color: #007bff;">สำหรับผู้ดูแลระบบ Login เพื่อจัดการข้อมูล</h6>
        </div>

        <form id="formLogin">
          <!-- <form action="process_login" method="post" enctype="multipart/form-data"> -->
          <div class="row">
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้งาน" maxlength="50" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-user-alt"></i>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" id="password" placeholder="รหัสผ่าน" name="password" maxlength="50">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="submit">เข้าสู่ระบบ</button>

          </div>
    

        </form>
      </div>
    
            <span>สิทธิ์ผู้ดูแลระบบ:: admin password:: 1234</span>
            <span>สิทธิ์ผู้ใช้ทั่วไป:: wongvian password:: wongkaso</span>
                
         

      <!-- /.login-card-body -->
    </div>
    <div lass="text-center" style="color: #929090;margin-top:0px;"><small><i class="far fa-copyright"></i><?= date('Y') ?> By Wongvian Wongkaso</small></div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="asst_backend/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="asst_backend/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="asst_backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="asst_backend/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="asst_backend/dist/js/demo.js"></script>
  <script src="asst_backend/vendor/toastr/toastr.min.js"></script>

  <script>
    $(document).ready(function() {
      /** Ajax Submit Login */
      // $("#formLogin").submit(function(e){
      $('#submit').on('click', function(e) {
        e.preventDefault()

        $('#username').removeClass('is-invalid');
        $('#password').removeClass('is-invalid');

        var username = $('#username').val();
        var password = $('#password').val();


        if (username == '') {
          $('#username').addClass('is-invalid');
          $('#username').focus();
          toastr.error('ระบุชื่อผู้ใช้', toastr.options = {
            "closeButton": true,
            "timeOut": "1500"
          });
        } else if (password == '') {
          $('#password').addClass('is-invalid');
          $('#password').focus();
          toastr.error('ระบุรหัสผ่าน', toastr.options = {
            "closeButton": true,
            "timeOut": "1500"
          });
        } else {


          document.getElementById("submit").disabled = true;
          document.getElementById("submit").innerHTML = '<i class="fas fa-sync fa-spin  fa-fw" aria-hidden="true"></i> เข้าสู่ระบบ';

          $.ajax({
            method: "POST",
            url: "service/login.php",
            data: {
              username: username,
              password: password
            },
            success: function(response) {
              if (response.status == 1) {
                location.href = './'
              } else {

                document.getElementById("submit").innerHTML = 'เข้าสู่ระบบ';
                toastr.error('ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง', toastr.options = {
                  "closeButton": true,
                  "timeOut": "1500"
                });
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").value = "เข้าสู่ระบบ";

              }

            }
          });
        }

      })
    })
  </script>

</body>

</html>