<?php
header("Location: ./Server_list.php");	
$pageActive = 'dashboard';
$pageName = 'dashboard';
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
        <h4 class="m-0">ข้อมูลเครื่องแม่ข่ายทั้งหมด</h4>
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