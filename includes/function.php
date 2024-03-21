<?php

ini_set('display_errors', 0);


function thai_date($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543). "  " . $t;
}
function thai_date_full($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $date . "  " . $th_months[$month] . "  พ.ศ. " . ($d[0] + 543);
}
function eng_date_full($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"January", "February", "March", "April", "May", "June", 
	 								"July", "August", "September", "October", "November", "December");
	
	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $date . "  " . $th_months[$month] . " " . ($d[0]);
}
function thai_date_shot($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", 
	 								"ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	
	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543). "  " . $t;
}
function thai_datetime_shot($datetime, $include_time=true) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", 
	 								"ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	
	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		// $t = $dt[1];
		$hour = ltrim($dt[1], "0");
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543). " เวลา " . $hour." น.";
}
function thai_time($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[0];
	}
	return $date . "  " . $th_months[$month] . "  " . ($d[0] + 543).  " - " . $dt[1];
	//return $datetime;
}

function thai_date1($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $d[2]. "-" .$d[1] . "-" . ($d[0] + 543);
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;
}

function date_conv($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return ($d[2] - 543). "-" .$d[1] . "-" . $d[0];
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;
	
}

function date_conv1($datetime,$include_time=false) {
	@$dt = explode(" ",$datetime);
	@$d = explode("-", $dt[0]);
	@$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	@$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	@$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $d[2]. "-" .$d[1] . "-" . ($d[0]+543);
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;
	
}

function year($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	@$date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	@$month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $d[0];
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;
	
}
function date_conv2($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	// $date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	// $month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $d[0];
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;
	
}
function date_conv3($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	// $date = ltrim($d[2], "0");  //ตัดเลข 0 ข้างหน้าออก
	// $month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $d[2].$d[1].$d[0];
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;
	
}
function date_conv3Add1Day($datetime, $include_time=false) {
	$dt = explode(" ", $datetime);
	$d = explode("-", $dt[0]);
	$th_months = array(1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", 
	 								"กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	
	$date = ltrim($d[2], "0")+1;  //ตัดเลข 0 ข้างหน้าออก
	$dateAddZero = sprintf("%02d",$date);
	// $month = ltrim($d[1], "0");
	$t = "";
	if($include_time) {
		$t = $dt[1];
	}
	return $dateAddZero.$d[1].$d[0];
	//return ($d[0] + 543)."-" . $month . "-" .$date .  "  " . $t;
	
}

function fn_resident($a) {
	$val = "";
	if($a == '1') {
        $val = "เจ้าบ้าน";
    }else if($a == '0'){
		$val = "ผู้อยู่อาศัย";
	}else{
		$val = "ไม่ระบุ";
	}
	
	return $val;
};
?>