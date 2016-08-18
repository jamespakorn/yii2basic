<?php session_start(); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$pt_id=$_SESSION['pt_id'];

// pt_work
$p3h=$_POST[p3h];$p3m=$_POST[p3m];
$p6h=$_POST[p6h];$p6m=$_POST[p6m];
$p9h=$_POST[p9h];$p9m=$_POST[p9m];
$p12h=$_POST[p12h];$p12m=$_POST[p12m];
$p15h=$_POST[p15h];$p15m=$_POST[p15m];
$p16h=$_POST[p16h];$p16m=$_POST[p16m];
$p1=$_POST[p1];
$p2=$_POST[p2];
$p4=$_POST[p4];
$p5=$_POST[p5];
$p7=$_POST[p7];
$p8=$_POST[p8];
$p10=$_POST[p10];
$p11=$_POST[p11];
$p13=$_POST[p13];
$p14=$_POST[p14];

$p3=($p3h*60)+$p3m;
$p6=($p6h*60)+$p6m;
$p9=($p9h*60)+$p9m;
$p12=($p12h*60)+$p12m;
$p15=($p15h*60)+$p15m;
$p16=($p16h*60)+$p16m;

$s1=$p2*8*$p3;
$s2=$p5*4*$p6;
$s3=$p8*4*$p9;
$s4=$p11*8*$p12;
$s5=$p14*4*$p3;

$psum = ($s1+$s2+$s3+$s4+$s5);

if(isset($HTTP_POST_VARS["insert"]))
{

// insert into pt_work
$query_rs = "insert into pt_work (id,pt_id, pt_cid,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,psum)
VALUES ('','$pt_id',       '$pt_cid','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14','$p15','$p16','$psum')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " ;
		$_SESSION["msglink"]     = "form_food.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form_work.php";
		$_SESSION["msgicon"] 	 = 2;		
	}
	header("location:form_info.php");

}
 else 
 if(isset($HTTP_POST_VARS["update"]))
{
$query_rs = "update pt_work set pt_cid='$pt_cid',p1='$p1', p2='$p2', p3='$p3', p4='$p4',p5='$p5',  p6='$p6', p7='$p7', p8='$p8', p9='$p9',p10='$p10',p11='$p11',p12='$p12',p13='$p13',p14='$p14', p15='$p15', p16='$p16',psum='$psum'
 where pt_id='$pt_id' ";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());

if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " ;
		$_SESSION["msglink"]     = "search_form.php?id_card=$pt_cid";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form_work.php?pt_id=$pt_id";
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
