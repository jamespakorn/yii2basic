<?php session_start(); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$pt_id=$_SESSION['pt_id'];
$date_pres = date("Y-m-d");



// agree
$box1=$_POST[box1];
$box2=$_POST[box2];
$box3=$_POST[box3];
$sweet=$_POST[dis_sweet];
$salt=$_POST[dis_salt];
$fat=$_POST[dis_fat];
$ex1=$_POST[ex1];
$ex2=$_POST[ex2];
$ex1_text=$_POST[box4];
$ex2_text=$_POST[box5];

if(isset($HTTP_POST_VARS["insert"]))
{

// insert into pt_ask
$query_rs = "insert into pt_precription (id,pt_id, pt_cid,sugar_t,salt_t,fat_t,sugar,salt,fat,ex1,ex2,ex1_text,ex2_text)
VALUES ('','$pt_id', '$pt_cid','$box1','$box2','$box3','$sweet','$salt','$fat','$ex1','$ex2','$ex1_text','$ex2_text')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$result . "<Br>" . $data;
		$_SESSION["msglink"]     = "form_presciption.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form_food.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 2;		
	}
	header("location:form_info.php");


}
 else 
 if(isset($HTTP_POST_VARS["update"]))
{
// update into pt_ask
$query_rs = "update pt_precription set sugar_t='$box1',salt_t='$box2',fat_t='$box3',sugar='$sweet',salt='$salt',fat='$fat',ex1='$ex1',ex2='$ex2',ex1_text='$box4', ex2_text='$box5' where pt_id='$pt_id'";
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
