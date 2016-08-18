<?php session_start(); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$pt_id=$_SESSION['pt_id'];
$date_pres = date("Y-m-d");
$targreement=$_POST[targreement];
$targreemente=$_POST[targreemente];

// food
$food1=$_POST[food1];
$food2=$_POST[food2];
$food3=$_POST[food3];
$food4=$_POST[food4];
$food5=$_POST[food5];
$food6=$_POST[food6];
$food7=$_POST[food7];
$food8=$_POST[food8];
$food9=$_POST[food9];
$food10=$_POST[food10];
$food11=$_POST[food11];
$food12=$_POST[food12];

$food=$food1+$food2+$food3+$food4+$food5+food6+food7+food8+food9+food10+food11+food12;

// emotion
$emotion1=$_POST[emotion1];
$emotion2=$_POST[emotion2];
$emotion=$emotion1+$emotion2;

if(isset($HTTP_POST_VARS["insert"]))
{
// insert into pt_ask
$query_rs = "insert into pt_ask (id,pt_id, pt_cid,food,emotion)
VALUES ('','$pt_id', '$pt_cid','$food','$emotion')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$result . "<Br>" . $data;
		$_SESSION["msglink"]     = "form_prescription.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [Insert Error] <br> " ;
		$_SESSION["msglink"]     = "form_food.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 2;		
	}
	header("location:form_info.php");


}
 else 
 if(isset($HTTP_POST_VARS["update"]))
{
if($targreement=="on")
{
$query_rs = "update pt_ask set pt_cid='$pt_cid',food='$food' where pt_id='$pt_id'";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
}
if($targreemente=="on")
{
// update into pt_ask
$query_rs = "update pt_ask set pt_cid='$pt_cid',emotion='$emotion' where pt_id='$pt_id'";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
}
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$result . "<Br>";
		$_SESSION["msglink"]     = "search_form.php?id_card=$pt_cid";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".$targreemente."] <br> " ;
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
