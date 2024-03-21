<?php
// Define active page and page name
$pageActive = 'Permission_list';
$pageName = 'ข้อมูลบัญชีผู้ใช้งาน';

// Include header file
include "includes/header.php";

$id  = @$_GET['s_id'];
$sql_select = "select  * from ref_permission where permission_id ='$id'";

//echo $sql_select;

$result = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($result);

$permission_id = @$row['permission_id'];
$permission_detail = @$row['permission_detail'];

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
              <div class="col-md-4">
                <div class="form-group">
                  <label for="permission_detail"><b>สิทธิ์การใช้งานระบบ:</b></label>
                  <input type="text" class="form-control" value="<?=$permission_detail; ?>" name="permission_detail" id="permission_detail" placeholder="">
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
      if ($("#permission_detail").val() == '') {
        $("#permission_detail").addClass("is-invalid");
        showErrorToast('กรุณากรอกสิทธิ์การใช้งานระบบ');
      }else {


        var formData = new FormData();
      
        formData.append('permission_detail', $('#permission_detail').val());
 
         // AJAX call for form submission
        $.ajax({
          url: "service/save_permission.php",
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
                  window.location.href = 'Permission_list.php';
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
      if ($("#permission_detail").val() == '') {
        $("#permission_detail").addClass("is-invalid");
        showErrorToast('กรุณากรอกสิทธิ์การใช้งานระบบ');
      }else {
        // AJAX call for form submission

        var formData = new FormData();
        formData.append('id', $('#hid').val());
        formData.append('permission_detail', $('#permission_detail').val());
   

        $.ajax({
          url: "service/update_permission.php",
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
                  window.location.href = 'Permission_list.php';
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