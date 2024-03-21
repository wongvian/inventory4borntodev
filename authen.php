<?php

$pageActive = 'dashboard';
$pageName = 'dashboard';

require_once "includes/header.php";


$errorUserBlank = '';
$errorPassBlank = '';

@$_id = $_GET['id'];



?>
<?php
     if($_SERVER["REQUEST_METHOD"] == "POST") {
			
   
          $tel = $_POST['inputtel'];
          

      if($tel == '')
      {
        $errorUserBlank = "กรุณากรอกเบอร์โทรที่กรอกในระบบ เพื่อตรวจสอบสิทธิ์";
      }

   
      
      if($tel != '')
      {
				$strSQL = "SELECT * FROM maiyai_budge WHERE id_ = '$_id' and tel='$tel' ";

       //echo $strSQL;
				
        $objQuery = mysqli_query($conn,$strSQL);
        $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
				mysqli_close($conn);

       // echo $objResult["cit_id"];

        if($objResult)
        {
					$_SESSION["id"] = $objResult["id"];
					
				
         echo  "<meta http-equiv=\"refresh\" content=\"0;url=formedit.php?id=$_id\">";
			
        }
        else
        {
            echo "<script language=\"JavaScript\">";
            echo "alert('ข้อมูลไม่ถูกต้อง');";
            echo "window.open(\"\",\"_self\");";
            echo "</script>";
        }


      }
      
      
    }
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

<div class="card card-info">

  <div class="card-header">
  ตรวจสอบสิทธิ์การใช้งาน  </div>

  <div class="card-body">
  <form method="post">
    <div class="card col-md-8  mx-auto mt-5" >
		<!-- col-md-offset-4-->
		<h3 class="form-signin-heading">ตรวจสอบสิทธิ์การใช้งาน</h3>
      <div class="card-header"><i class="fas fa-lock"></i> <strong>เบอร์โทรที่กรอกในระบบ</strong></div>
      <div class="row">
            <div class="card-body">
            
              <form class="form-signin">
                <div class = "row">
                
                  <div class = "col-md-7">
                    <div class="form-group" >

                      <label for="inputtel">เบอร์โทรที่กรอกในระบบ</label>
                      <input class="form-control" id="inputtel"  maxlength="13" data-inputmask="'mask': '9999999999' type="text" name="inputtel" placeholder="ระบุเบอร์โทรที่กรอกในระบบ"  autofocus>
                      <p><small><font color="red"><?php echo $errorUserBlank; ?></font></small></p>
                    </div>
      
												<button  class="btn btn-success float-md-right" type="submit"><i class="fas fa-check-circle"></i> เข้าสู่ระบบ</button>
												<a href="index.php" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก</a>
                      </form>
                  </div>
                  <div class="col-md-5">
                    <img src="images/login.png" width="90%"; alt="">
                  </div>
                </div>         
      </div>
    </div>
 </div>
      </div>

	  </form>

  </div>
  </div>
  </div>
   
<?php
require "includes/footer.php";
?>

<script>
    function getSubcategories(category) {
        // Make an AJAX request to a PHP script to get subcategories based on the selected category
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_subcategories.php?category=" + category, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update the subcategory dropdown with the received options
                document.getElementById("subcategory").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>

<script>
  // Initialize the input mask
  $(document).ready(function () {
    $('#TxtFat_citizenId').inputmask();
    $('#TxtMot_citizenId').inputmask();
    $('#TxtPar_citizenId').inputmask();
    $('#txtCitizen').inputmask();
  });
</script>

