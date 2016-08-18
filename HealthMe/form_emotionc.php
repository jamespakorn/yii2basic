<?php session_start(); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$pt_id=$_SESSION['pt_id'];
$date_pres = date("Y-m-d");



// emotion
$emotion1=$_POST[emotion1];
$emotion2=$_POST[emotion2];
$emotion=$emotion1+$emotion2;

if(isset($HTTP_POST_VARS["insert"]))
{

// insert into pt_ask
$query_rs = "insert into pt_ask (id,pt_id, pt_cid,emotion)
VALUES ('','$pt_id', '$pt_cid','$emotion')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$result . "<Br>" . $data;
		$_SESSION["msglink"]     = "form_food.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form_emotion.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 2;		
	}
	header("location:form_info.php");


}
 else 
 if(isset($HTTP_POST_VARS["update"]))
{
// update precription
if($emotion>0)
{
$query_r = "update pt_precription set want_emotion='1' where pt_id='$pt_id'";
$r = mysql_query($query_r, $connect) or die(mysql_error());
}
// update into pt_ask
$query_rs = "update pt_ask set pt_cid='$pt_cid',emotion='$emotion' where pt_id='$pt_id'";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$query_r . "<Br>" . $data;
		$_SESSION["msglink"]     = "search_form.php?id_card=$pt_cid";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form_emmtion.php?pt_id=$pt_id";
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
