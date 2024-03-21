<?php
// Define active page and page name
$pageActive = 'Server_Add';
$pageName = 'รายการข้อมูลเครื่องแม่ข่ายทั้งหมด';

// Include header file
include "includes/header.php";

$id  = @$_GET['s_id'];
$sql_select = "SELECT * FROM data_server WHERE id ='$id'";
//echo $sql_select;
$result = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($result);

$server_name = $row['server_name'];
$server_ip = $row['ip'];
$sn = $row['sn'];
$detail_ = $row['detail'];
$username = $row['username'];
$passwd = $row['passwd'];
$img = $row['img'];
$backup_url = $row['backup_url'];

?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">ข้อมูลเครื่อง Server</h3>
        </div>

        <div class="card-body">
          <form id="myForm" action="#" method="post">
          <input type="hidden" id="hid" name="hid" value="<?php echo $id;?>">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="server_name"><b>ชื่อเครื่อง Server</b></label>
                  <input type="text" class="form-control" value="<?=$server_name ?>" name="server_name" id="server_name" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="ip"><b>IP:</b></label>
                  <input type="text" class="form-control" value="<?=$server_ip ?>" id="ip" name="ip" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sn"><b>SN/หมายเลข ครุภัณฑ์ </b></label>
                  <input type="text" class="form-control" value="<?=$sn ?>" name="sn" id="sn" placeholder="">
                </div>
              </div>
            </div>

            <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                  <label for="txtUname"><b>UserName</b></label>
                  <input type="text" class="form-control" value="<?=$username ?>" name="txtUname" id="txtUname" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txtPasswd"><b>Password:</b></label>
                  <input type="text" class="form-control" value="<?=$passwd ?>" name="txtPasswd" id="txtPasswd" placeholder="">
                </div>
              </div>
              </div>


            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="detail"><b>รายละเอียด</b></label>
                  <textarea class="form-control" id="detail" name="detail" rows="6"><?=$detail_ ?></textarea>
                </div>
              </div>
     
            </div>

            
            <div class="col-2">
                <div class="form-group">
                  <label for="filePic"><b>ภาพประกอบ</b></label>
                  <br>
                  <img src="img/<?= $img?>" class="img-thumbnail" alt="..." style="height: 60px;"></li>
                  <input type="file" class="form-control" id="filePic" name="filePic" placeholder="อัพโหลดไฟล์ภาพประกอบ">
                  <div id="" class="text-muted text-sm mt-1">
                    <ol>
                      <li>รูปแบบไฟล์ต้องเป็นชนิด jpeg, jpg, png เท่านั้น</li>
                    </ol>
                  </div>
                </div>
              </div>
                    

              <div class="col-md-8">
                <div class="form-group">
                  <label for="txt_bk_url"><b>BackUp Url</b></label>
                  <input type="text" class="form-control" value="<?=$backup_url ?>" name="txt_bk_url" id="txt_bk_url" placeholder="">
                </div>
              </div>


            <?php
            if (@$id) {
            ?>
              <button class="btn btn-success" type="submit" id="btnEdit"><i class="fa-solid fa-floppy-disk"></i> แก้ไข</button>

            <?php
            } else {
            ?>
              <button class="btn btn-primary" type="submit" id="btnSave"><i class="fa-solid fa-floppy-disk"></i> บันทึก</button>
            <?php
            }
            ?>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-light"><i class="fa-solid fa-chevron-left"></i> ย้อนกลับ</a>
          </form>
        </div>
      </div>
    </div>
  </div>


  
</div>
</div>

<?php require "includes/footer.php"; ?>

<script type="text/javascript">
  $(document).ready(function() {
    $("#btnSave").click(function(e) {
      e.preventDefault();

      // Reset previous validation
      $(".form-control").removeClass("is-invalid");

      // Validate form fields
      if ($("#server_name").val() == '') {
        $("#server_name").addClass("is-invalid");
        showErrorToast('กรุณากรอกชื่อเครื่อง Server');
      } else if ($("#ip").val() == '') {
        $("#ip").addClass("is-invalid");
        showErrorToast('กรุณากรอก IP');
      } else if ($("#sn").val() == '') {
        $("#sn").addClass("is-invalid");
        showErrorToast('กรุณากรอก SN/หมายเลข ครุภัณฑ์');
      } else {


        var formData = new FormData();
        formData.append('id',$('#hid').val());
        formData.append('server_name', $('#server_name').val());
        formData.append('ip', $('#ip').val());
        formData.append('sn', $('#sn').val());
        formData.append('txtUname', $('#txtUname').val());
        formData.append('txtPasswd', $('#txtPasswd').val());
        formData.append('detail', $('#detail').val());
        formData.append('backup_url', $('#txt_bk_url').val());
        formData.append('filePicture', $('input[name=filePic]')[0].files[0]);

        // AJAX call for form submission
        $.ajax({
        url: "service/save_server.php",
        type: "post",
        dataType: "html",
        contentType: false,
        processData: false,
        data: formData,
          success: function(response) {
            if (response.status == 1) {
              Swal.fire({
                allowOutsideClick: false,
                allowEscapeKey: false,
                icon: 'success',
                title: 'บันทึกสำเร็จ',
                showConfirmButton: true,
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = 'Server_Add.php';
                }
              })

            } else {
              showErrorToast('มีบางอย่างผิดพลาด');
            }
          }
        });
      }
    });

    // Function to display success toastr
    function showSuccessToast(message) {
      toastr.success(message, {
        closeButton: true,
        progressBar: false,
        timeOut: 3000
      });
    }

    // Function to display error toastr
    function showErrorToast(message) {
      toastr.error(message, {
        closeButton: true,
        progressBar: false,
        timeOut: 3000
      });
    }
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $("#btnEdit").click(function(e) {
      e.preventDefault();

      // Reset previous validation
      $(".form-control").removeClass("is-invalid");

      // Validate form fields
      if ($("#server_name").val() == '') {
        $("#server_name").addClass("is-invalid");
        showErrorToast('กรุณากรอกชื่อเครื่อง Server');
      } else if ($("#ip").val() == '') {
        $("#ip").addClass("is-invalid");
        showErrorToast('กรุณากรอก IP');
      } else if ($("#sn").val() == '') {
        $("#sn").addClass("is-invalid");
        showErrorToast('กรุณากรอก SN/หมายเลข ครุภัณฑ์');
      } else {
        // AJAX call for form submission

        var formData = new FormData();
        formData.append('id',$('#hid').val());
        formData.append('server_name', $('#server_name').val());
        formData.append('ip', $('#ip').val());
        formData.append('sn', $('#sn').val());
        formData.append('txtUname', $('#txtUname').val());
        formData.append('txtPasswd', $('#txtPasswd').val());
        formData.append('detail', $('#detail').val());
        formData.append('backup_url', $('#txt_bk_url').val());
        formData.append('filePicture', $('input[name=filePic]')[0].files[0]);


        $.ajax({
        url: "service/update_server.php",
        type: "post",
        dataType: "html",
        contentType: false,
        processData: false,
        data: formData,
        success: function(response) {
                    response = JSON.parse(response);
            if (response.status == 1) {
              Swal.fire({
                allowOutsideClick: false,
                allowEscapeKey: false,
                icon: 'success',
                title: 'บันทึกสำเร็จ',
                showConfirmButton: true,
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'Server_Add.php';
                }
              })

            }else{
                        toastr.error('มีบางอย่างผิดพลาด', toastr.options = {
                            "closeButton": true,
                            "progressBar": false,
                            "timeOut": "3000"
                        })
                    }
                }
            });
          }

        });
      
    });
</script>

