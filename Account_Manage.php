<?php

$pageActive = 'Account_manage';
$pageName = 'Account_manage';
include "includes/header.php";



  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      <div class="content-header">
    <div class="container-fluid">

      <div class="content-header">
        <h4 class="m-0">รายการบัญชีผู้ใช้งานทั้งหมด</h4>
      </div>

      <div class="card">
      <div class="card-header py-3">
<a href="Account_Add" class="btn btn-success btn-lg">เพิ่มข้อมูล</a>
</div>
        <div class="card-body">

          <?php 
          $sql  = "select  aa.id, user_name,full_name,permission_detail from tb_admin aa
          left join ref_permission bb on  aa.permission_id = bb.permission_id order by aa.user_name asc";
          $query = mysqli_query($conn, $sql);
          if ($query) { ?>
            
            <div class="table-responsive">
              <table class="table table-bordered" id='datatable'>
                <thead>
                  <tr>
                    <td class="text-center" width="5%">ลำดับ</td>
                    <td class="text-center" width="15%">ชื่อผู้ใช้</td>
                    <td class="text-center" width="30%">ชื่อ-สกุล:</td>
                    <td class="text-center" width="15%">ระดับสิทธิ์</td>
                    <?php if($_SESSION["permission_id"]=="1"){  // ตรวจสอบว่าเป็น ผู้ดูแลระบบหรือไม่?>
                    <td class="text-center" width="15%">รายละเอียด/แก้ไข</td>      
                    <td class="text-center" width="15%">Reset รหัสผ่าน</td>      
                    <td class="text-center" width="5%">ลบ</td>
                    <?php }?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $i = 1; // number of rows
                  while ($row = mysqli_fetch_array($query)) {
                    // $i++;
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $i++; ?></td>
                      <td class="text-center"><?php echo $row['user_name'] ?></td>
                      <td class="text-center"><?php echo $row['full_name'] ?></td>
                      <td class="text-center"><?php echo $row['permission_detail'] ?></td>
                      <?php if($_SESSION["permission_id"]=="1"){  // ตรวจสอบว่าเป็น ผู้ดูแลระบบหรือไม่?>
                      <td class="text-center">
                        <a target="_parent" href="Account_Add?s_id=<?= $row['id']; ?>" class="btn btn-info" role=" button">รายละเอียด/แก้ไข</a>
                      </td>
                      <td class="text-center">
                      <a class="btn btn-warning" role=" button" href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='service/reset_password_account.php?s_id=<?= $row['id'] ?>';}">Reset รหัสผ่าน
                      </td>
                      <td>
                        <a class="btn btn-danger" role=" button" href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='service/del_account.php?s_id=<?= $row['id'] ?>';}">ลบข้อมูล
                        </a>
                      </td>
                      <?php }?>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php } else {
            echo "- ไม่พบผู้สมัคร -";
          } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>



<?php
require "includes/footer.php";
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').DataTable({
      // "columnDefs": [ 
      // {
      //     // "targets": [0],
      //     // "visible": false
      // }
      // ],
      dom: 'Bfrtip',
      buttons: [
        'csv', 'excel', 'pdf', 'print'
      ],
      "paging": true,
      "ordering": false,
      "info": true,
    });
  });
</script>