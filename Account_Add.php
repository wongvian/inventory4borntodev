<?php
// Define active page and page name
$pageActive = 'Account_manage';
$pageName = 'ข้อมูลบัญชีผู้ใช้งาน';

// Include header file
include "includes/header.php";

$id  = @$_GET['s_id'];
$sql_select = "select  aa.id, user_name,full_name,aa.permission_id from tb_admin aa
left join ref_permission bb on  aa.permission_id = bb.permission_id WHERE aa.id ='$id'";
//echo $sql_select;
$result = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($result);

$id = @$row['id'];
$user_name = @$row['user_name'];
$full_name = @$row['full_name'];
$permission_id = @$row['permission_id'];

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
            <input type="hidden" id="hid" name="hid" value="<?php echo $id; ?>">
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label for="user_name"><b>ชื่อผู้ใช้(user name)</b></label>
                  <input type="text" class="form-control" value="<?= $user_name ?>" name="user_name" id="user_name" placeholder="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="full_name"><b>ชื่อ-สกุล:</b></label>
                  <input type="text" class="form-control" value="<?= $full_name ?>" name="full_name" id="full_name" placeholder="">
                </div>
              </div>
            </div>
      

            <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="ddl_permission"><b>สิทธิ์การใช้งานระบบ</b></label>
                <select id="ddl_permission" name="ddl_permission" class="form-control">
                  <option value="">-เลือก-</option>
                  <?php
                  $strDefault = $permission_id;
                  $sql_ = "SELECT * FROM ref_permission ORDER BY permission_id ASC";
                  $st = mysqli_query($conn, $sql_);
                  while ($row = mysqli_fetch_array($st)) {
                    if ($strDefault == $row['permission_id']) {
                      $sel = "selected";
                  } else {
                      $sel = "";
                  }
                  ?>
                    <option value="<?= $row['permission_id'] ?>" <?php echo $sel; ?>><?= $row['permission_detail'] ?>
                    </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
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
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-light"><i class="fa-solid fa-chevron-left"></i> เริ่มใหม่</a>
        

          </form>
        </div>
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
      if ($("#user_name").val() == '') {
        $("#user_name").addClass("is-invalid");
        showErrorToast('กรุณากรอกชื่อผู้ใช้(user name)');
      } else if ($("#ddl_permission").val() == '') {
        $("#ddl_permission").addClass("is-invalid");
        showErrorToast('กรุณาเลือกระดับสิทธิ์การใช้งานระบบ');
      }else {


        var formData = new FormData();
      
        formData.append('user_name', $('#user_name').val());
        formData.append('full_name', $('#full_name').val());
        formData.append('permission', $('#ddl_permission').val());
 

        // AJAX call for form submission
        $.ajax({
          url: "service/save_account.php",
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
                  window.location.href = 'Account_Manage.php';
                }
              })

            } else {
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


<script type="text/javascript">
  $(document).ready(function() {
    $("#btnEdit").click(function(e) {
      e.preventDefault();

      // Reset previous validation
      $(".form-control").removeClass("is-invalid");

      // Validate form fields
      if ($("#user_name").val() == '') {
        $("#user_name").addClass("is-invalid");
        showErrorToast('กรุณากรอกชื่อผู้ใช้(user name)');
      } else if ($("#ddl_permission").val() == '') {
        $("#ddl_permission").addClass("is-invalid");
        showErrorToast('กรุณาเลือกระดับสิทธิ์การใช้งานระบบ');
      }else {
        // AJAX call for form submission

        var formData = new FormData();
        formData.append('id', $('#hid').val());
        formData.append('user_name', $('#user_name').val());
        formData.append('full_name', $('#full_name').val());
        formData.append('permission', $('#ddl_permission').val());
 


        $.ajax({
          url: "service/update_account.php",
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
                  window.location.href = 'Account_Manage.php';
                }
              })

            } else {
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