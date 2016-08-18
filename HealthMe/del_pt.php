<?php session_start(); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$pt_id=$_SESSION['pt_id'];
$date_pres = date("Y-m-d");
$targreement=$_POST[targreement];
$targreemente=$_POST[targreemente];

// food
$pt_id=$_REQUEST[pt_id];

 if(isset($HTTP_POST_VARS["update"]))
{
if($targreement=="on")
{
$query_rs = "DELETE from pt_screen WHERE pt_id='$pt_id'"; $rs = mysql_query($query_rs, $connect) or die(mysql_error());
$query_rs = "DELETE from pt_ask WHERE pt_id='$pt_id'"; $rs = mysql_query($query_rs, $connect) or die(mysql_error());
$query_rs = "DELETE from pt_disease WHERE pt_id='$pt_id'"; $rs = mysql_query($query_rs, $connect) or die(mysql_error());
$query_rs = "DELETE from pt_life WHERE pt_id='$pt_id'"; $rs = mysql_query($query_rs, $connect) or die(mysql_error());
$query_rs = "DELETE from pt_precription WHERE pt_id='$pt_id'"; $rs = mysql_query($query_rs, $connect) or die(mysql_error());
$query_rs = "DELETE from pt_work WHERE pt_id='$pt_id'"; $rs = mysql_query($query_rs, $connect) or die(mysql_error());
}
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$result . "<Br>";
		$_SESSION["msglink"]     = "search_form.php";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".$targreemente."] <br> " ;
		$_SESSION["msglink"]     = "search_form.php";
		$_SESSION["msgicon"] 	 = 2;		
	}
	header("location:form_info.php");


}



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
</body>
</html>
