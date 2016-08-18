	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
// check email  โดย Email ต้องประกอบด้วย @ และ . โดยที่ไม่อยู่ที่ตำแหน่งเริ่มต้นและสุดท้าย
function checkEmail($email) {
if (strstr($email,'@') and strstr($email,'.') and substr($email,0,1)<>'@' and substr($email,0,1)<>'.' 
and substr($email,strlen($email)-1,1)<>'@' and substr($email,strlen($email)-1,1)<>'.' ) {
	$return_v='True' ;
} else {
	$return_v='False';
}		
return $return_v;
}
 //  Function to Change denominator which = 0 to be near Zero
function zerocheck($denominator)  {
if ($denominator==0) {
	$denominator=0.0001 ; 
	} else {
	 $denominator=$denominator ;
	 } 
return $denominator ;
}

// อาชีพ
function occ($code) {
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$query_r = "select * from occupation where occupation='$code' " ;
$r = mysql_query($query_r, $connect) or die(mysql_error());
$row_r = mysql_fetch_assoc($r);
	$occname =$row_r[name];
$return_v=$occname;
return $return_v ;
} // closed function

// bmi
function bmi($c,$pt_id) {
if ($c>23) {
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$pset="Update pt_prescription Set want_fit='1' and fat = '1' and sugar = '1' Where pt_id= $pt_id " ; 
$r = mysql_query($pset, $connect) or die(mysql_error());
	
	
	} 
return $c ;
} // closed function


?>
<script language=javascript>
//แสดง dialog เตือนการลบข้อมูล
	function del(varUrl)
	{
		if (window.confirm("ยืนยันการลบข้อมูล")==true)
		{
			window.open(varUrl,"_self")
		}
	}
</script>

<script language=javascript>
//แสดง dialog เตือนการลบข้อมูล
	function ask(varUrl,varMessage)
	{
		if (window.confirm(varMessage)==true)
		{
			window.open(varUrl,"_self")
		}
	}
</script>

<script language=javascript>
//แสดง dialog Confirm แจ้งเท่านั้น ไม่ทำรายการทั้ง yes หรือ no
	function suggest(varMessage)
	{
		window.alert(varMessage);
	}
</script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
