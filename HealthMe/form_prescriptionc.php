<?php session_start(); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$pt_id=$_SESSION['pt_id'];
$date_pres = date("Y-m-d");
$want_fit = $_POST['want_fit'];
$want_dm = $_POST['want_dm'];
$want_ht = $_POST['want_ht'];
$want_ldl = $_POST['want_ldl'];
$want_hdl = $_POST['want_hdl'];
$want_heart = $_POST['want_heart'];
$want_mas = $_POST['want_mas'];
$want_oa = $_POST['want_oa'];
$want_emotion = $_POST['want_emotion'];

 if(isset($HTTP_POST_VARS["update"]))
{
// update into pt_ask
$query_rs = "update pt_precription set want_fit='$want_fit',want_dm='$want_dm',want_dm='$want_dm',want_ht='$want_ht',want_ldl='$want_ldl',want_hdl='$want_hdl',want_heart='$want_heart',want_mas='$want_mas',want_oa='$want_oa',want_emotion='$want_emotion' where pt_id='$pt_id'";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$result . "<Br>" . $data;
		$_SESSION["msglink"]     = "search_form.php?id_card=$pt_cid";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form_food.php?pt_id=$pt_id";
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
