<?php session_start(); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);

$pt_cid=$_POST[id_card];
$pt_hn=$_POST[hn];
$pt_name=$_POST[spname];
$pt_age=$_POST[age];
$pt_sex=$_POST[sex];
$pt_address=$_POST[address];
$pt_weight=$_POST[weight];
$pt_height=$_POST[height];
$pt_bmi=($pt_weight/($pt_height*$pt_height))*10000;
$pt_waist=$_POST[waist];
$pt_pulse=$_POST[pulse];
$pt_occ=$_POST[pt_occ];
$p_tel=$_POST[tel];
$p_email=$_POST[email];
$p_line=$_POST[LineID];
$pt_bps=$_POST[bps];
$pt_bpd=$_POST[bpd];
// Lab investigation; 
$pt_bloodgrp=$_POST[blood];
$pt_fbs=$_POST[fbs];
$pt_hba1c=$_POST[HbA1C];
$pt_tg=$_POST[tg];
$pt_hdl=$_POST[hdl];
$pt_cho=$_POST[cho];
$pt_ldl=$_POST[ldl];
$pt_bun=$_POST[bun];
$pt_cr=$_POST[cr];
$pt_hct=$_POST[hct];
$pt_date_screen=$_POST[dateInput];
$hos_id=$_SESSION['hos_id'];


if(isset($HTTP_POST_VARS["insert"]))
{

// insert into pt_screen
$query_rs = "insert into pt_screen (pt_id, pt_cid, pt_hn, pt_name, pt_age, pt_sex, pt_address, pt_weight,pt_height,  pt_bmi, pt_waist, pt_pulse, pt_occ,p_tel,p_email,p_line,pt_bps,pt_bpd, pt_bloodgrp, pt_fbs,pt_hba1c,pt_tg,pt_hdl,pt_cho,pt_ldl,pt_bun,pt_cr,pt_hct,pt_date_screen,hos_id)
VALUES ('',       '$pt_cid','$pt_hn','$pt_name','$pt_age','$pt_sex','$pt_address','$pt_weight','$pt_height','$pt_bmi','$pt_waist','$pt_pulse','$pt_occ','$p_tel','$p_email','$p_line','$pt_bps','$pt_bpd','$pt_bloodgrp','$pt_fbs','$pt_hba1c','$pt_tg', '$pt_hdl','$pt_cho', '$pt_ldl','$pt_bun','$pt_cr','$pt_hct','$pt_date_screen','$hos_id')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());


$sql_c="SELECT pt_id,pt_cid,pt_name,pt_hn FROM pt_screen  WHERE pt_cid='$pt_cid' order by pt_id  ";
$result_c = mysql_query($sql_c, $connect);		
while($row_c=mysql_fetch_object($result_c)){
		$_SESSION[pt_id]=$row_c->pt_id;
		$_SESSION[pt_cid]=$row_c->pt_cid;
		$_SESSION[pt_name]=$row_c->pt_name;
		$_SESSION[pt_hn]=$row_c->pt_hn;
		}
$query_rs = "insert into pt_precription (id,pt_id, pt_cid) VALUES ('','$_SESSION[pt_id]','$pt_cid')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
		
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$result . "<Br>" . $data;
		$_SESSION["msglink"]     = "form_disease.php?pt_id=$_SESSION[pt_id]";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form.php";
		$_SESSION["msgicon"] 	 = 2;		
	}
	header("location:form_info.php");

 }
 else 
 if(isset($HTTP_POST_VARS["update"]))
{
$query_rs = "update pt_screen set pt_cid='$pt_cid', pt_hn='$pt_hn', pt_name='$pt_name', pt_age='$pt_age', pt_sex='$pt_sex', pt_address='$pt_address', pt_weight='$pt_weight',pt_height='$pt_height',  pt_bmi='$pt_bmi', pt_waist='$pt_waist', pt_pulse='$pt_pulse', pt_occ='$pt_occ',p_tel='$p_tel',p_email='$p_email',p_line='$p_line',pt_bps='$pt_bps',pt_bpd='$pt_bpd', pt_bloodgrp='$pt_bloodgrp', pt_fbs='$pt_fbs',pt_hba1c='$pt_hba1c',pt_tg='$pt_tg',pt_hdl='$pt_hdl',pt_cho='$pt_cho',pt_ldl='$pt_ldl',pt_bun='$pt_bun',pt_cr='$pt_cr',pt_hct='$pt_hct',pt_date_screen='$pt_date_screen'
 where pt_id='$pt_id' ";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());

if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " .$result . "<Br>" . $data;
		$_SESSION["msglink"]     = "search_form.php?id_card=$pt_cid";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form.php?pt_id=$pt_id";
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
