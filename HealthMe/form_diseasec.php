<?php session_start(); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
$pt_id=$_SESSION['pt_id'];
$date_pres = date("Y-m-d");


// pt_disease
$d0=$_POST[d0];
$d1=$_POST[d1];
$d2=$_POST[d2];$d2_1=$_POST[d2_1];$d2_2=$_POST[d2_2];$d2_3=$_POST[d2_3];$d2_4=$_POST[d2_4];$d2_5=$_POST[d2_5];
$d3=$_POST[d3];
$d4=$_POST[d4];
$d5=$_POST[d5];
$d6=$_POST[d6];$d6_1=$_POST[d6_1];$d6_2=$_POST[d6_2];$d6_3=$_POST[d6_3];$d6_4=$_POST[d6_4];$d6_5=$_POST[d6_5];
$d7=$_POST[d7];$d7_1=$_POST[d7_1];$d7_2=$_POST[d7_2];
$d8=$_POST[d8];
$d9=$_POST[d9];
// pt_life
$life_type=$_POST[life_type];
if(empty($life_type)){ $life_type=2;}
$history_family=$_POST[history_family];
$df1=$_POST[df1];
$df2=$_POST[df2];
$df3=$_POST[df3];
$df4=$_POST[df4];
$df5=$_POST[df5];
$df6=$_POST[df6];
$df7=$_POST[df7];
$df8=$_POST[df8];
$sigar=$_POST[sigar];
$alcohol=$_POST[alcohol];
$s1=$_POST[s1];
$s2=$_POST[s2];
$s3=$_POST[s3];
$s1a=$_POST[s1a];
$s3a=$_POST[s3a];
$s3b=$_POST[s3b];
$a1=$_POST[a1];
$a2=$_POST[a2];
$a3=$_POST[a3];
$a1a=$_POST[a1a];
$a3b1=$_POST[a3b1];
$a3c1=$_POST[a3c1];
$a3b2=$_POST[a3b2];
$a3c2=$_POST[a3c2];
$a3b3=$_POST[a3b3];
$a3c3=$_POST[a3c3];
$a3b4=$_POST[a3b4];
$a3c4=$_POST[a3c4];
//

$sql_c="SELECT * FROM v_screen  WHERE pt_id='$pt_id'  ";
$result_c = mysql_query($sql_c, $connect);		
while($row_c=mysql_fetch_object($result_c)){
		$bmi=$row_c->pt_bmi;
		$sex=$row_c->pt_sex;
		$weight=$row_c->pt_weight;
		$waist=$row_c->pt_waist;
		$bps=$row_c->pt_bps;
		$pbd=$row_c->pt_bpd;
		$fbs=$row_c->pt_fbs;
		$hba1c=$row_c->pt_hba1c;
		$tg=$row_c->pt_tg;
		$hdl=$row_c->pt_hdl;
		$cho=$row_c->pt_cho;
		$ldl=$row_c->pt_ldl;
		$cr=$row_c->pt_cr;
		//$d1=$row_c->d1;$d2=$row_c->d2;$d2_2=$row_c->d2_2;$d3=$row_c->d3;$d5=$row_c->d5;$d6=$row_c->d6;$d8=$row_c->d8;
		$p16=$row_c->p16;
		$psum=$row_c->psum;
		$emotion=$row_c->emotion;
		}

//  function
function bmi($bmi,$pt_id) 
{
if ($bmi>23)
		{	$pset="Update pt_precription Set want_fit='1' , fat = '1' , sugar = '1' Where pt_id= $pt_id " ;		 } 
else 	{ 	$pset="Update pt_precription Set want_fit='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function waist($waist,$sex,$pt_id) 
{
if ($waist>90 and $sex==1)
	 	{	$pset="Update pt_precription Set want_fit='1' , fat = '1' , sugar = '1' Where pt_id= $pt_id " ; } 
else if ($waist>80 and $sex==2)
	 	{	$pset="Update pt_precription Set want_fit='1' , fat = '1' , sugar = '1' Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_fit='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function fbs($fbs,$d2,$pt_id) 
{
if ($fbs>=126 and $d2==0)
	 	{	$pset="Update pt_precription Set want_dm='1' ,  sugar = '1' Where pt_id= $pt_id " ; } 
else if ($fbs>=155 and $d2==1)
	 	{	$pset="Update pt_precription Set want_dm='1' ,  sugar = '1' Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_dm='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function hba1c($hba1c,$pt_id) 
{
if ($hba1c>8 )
	 	{	$pset="Update pt_precription Set want_dm='1' ,  sugar = '1' Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_dm='' Where pt_id= $pt_id " ; }
return $pset ;
}
function d3($d3,$pt_id) 
{
if ($d3==1 )
	 	{	$pset="Update pt_precription Set want_ht='1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_ht='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function bp($bps,$bpd,$pt_id) 
{
if ($bps>=140 or $bpd >=90 )
	 	{	$pset="Update pt_precription Set want_ht='1', salt = '1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_ht='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function ldl($ldl,$pt_id) 
{
if ($ldl>130 )
	 	{	$pset="Update pt_precription Set want_ldl='1', fat ='1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_ldl='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function hdl($hdl,$pt_id) 
{
if ($hdl<40 )
	 	{	$pset="Update pt_precription Set want_hdl='1', fat ='1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_hdl='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function d6($d6,$pt_id) 
{
if ($d6==1 )
	 	{	$pset="Update pt_precription Set want_heart='1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_heart='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function d8($d8,$pt_id) 
{
if ($d8==1 )
	 	{	$pset="Update pt_precription Set want_oa='1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set want_oa='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function d5($d5,$pt_id) 
{
if ($d5==1 )
	 	{	$pset="Update pt_precription Set salt='1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set salt='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function d2_2($d2_2,$pt_id) 
{
if ($d2_2==1 )
	 	{	$pset="Update pt_precription Set salt='1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set salt='' Where pt_id= $pt_id " ; }
return $pset ;
} 
function calorie($bmi,$weight,$life_type,$pt_id) 
{
if ($bmi>23)
		{	
		if($life_type==1){	$pset=	($weight*20)-500;	 } 
		else if($life_type==2){	$pset=	($weight*25)-500;	 } 
		else if($life_type==3){	$pset=	($weight*30)-500;	 } 
		else {	$pset=	($weight*25)-500;	 } 
		}
elseif ($bmi>=18.50 and $bmi<=22.99)
		{	
		if($life_type==1){	$pset=	($weight*25)-500;	 } 
		else if($life_type==2){	$pset=	($weight*35)-500;	 } 
		else if($life_type==3){	$pset=	($weight*40)-500;	 } 
		else {	$pset=	($weight*35)-500;	 } 
		}
elseif ($bmi<18.50)
		{	
		if($life_type==1){	$pset=	($weight*30)+500;	 } 
		else if($life_type==2){	$pset=	($weight*40)+500;	 } 
		else if($life_type==3){	$pset=	($weight*45)+500;	 } 
		else {	$pset=	($weight*40)+500;	 } 
		}
		
else 	{ 	$pset=0 ; }
return $pset ;
} 
function cr($cr,$pt_id) 
{
if ($cr>=1.3 )
	 	{	$pset="Update pt_precription Set salt='1'  Where pt_id= $pt_id " ; } 
else 	{ 	$pset="Update pt_precription Set salt='' Where pt_id= $pt_id " ; }
return $pset ;
} 

// closed function
$calorie= calorie($bmi,$weight,$life_type,$pt_id);


$pset= bmi($bmi,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());
	
$pset= waist($waist,$sex,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());

$pset= fbs($fbs,$d2,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());

$pset= hba1c($hba1c,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());

$pset= bp($bps,$bpd,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());

$pset= d2_2($d2_2,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());
$pset= d3($d3,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());
$pset= d5($d5,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());
$pset= d6($d6,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());
$pset= d8($d8,$pt_id);$result_c = mysql_query($pset, $connect) or die(mysql_error());



if(isset($HTTP_POST_VARS["insert"]))
{
// insert into pt_disease
$query_rs = "insert into pt_disease (id,pt_id, pt_cid,d0,d1,d2,d2_1,d2_2,d2_3,d2_4,d2_5, d3, d4, d5,d6,d6_1,d6_2,d6_3,d6_4, d6_5, d7,d7_1,d7_2,d8,d9)
VALUES ('','$pt_id',       '$pt_cid','$d0','$d1','$d2','$d2_1','$d2_2','$d2_3','$d2_4','$d2_5','$d3','$d4','$d5','$d6','$d6_1','$d6_2','$d6_3','$d6_4','$d6_5','$d7','$d7_1','$d7_2', '$d8', '$d9')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());

// insert into pt_life
$query_rs = "insert into pt_life (id,pt_id, pt_cid,life_type,history_family,df1,df2,df3,df4,df5,df6, df7, df8, sigar,alcohol,s1,s2,s3,s1a,s3a,s3b,a1,a2,a3,a1a,a3b1,a3c1, a3b2, a3c2,a3b3,a3c3,a3b4,a3c4)
VALUES ('','$pt_id',       '$pt_cid','$life_type','$history_family','$df1','$df2','$df3','$df4','$df5','$df6','$df7','$df8','$sigar','$alcohol','$s1','$s2','$s3','$s1a','$s3a','$s3b','$a1','$a2','$a3', '$a1a', '$a3b1', '$a3c1', '$a3b2', '$a3c2', '$a3b3', '$a3c3', '$a3b4', '$a3c4')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
// update into pt_screen
$query_rs = "update pt_screen  set calorie='$calorie' where pt_id='$pt_id'";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());

if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " ;
		$_SESSION["msglink"]     = "form_work.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 1;
	}else{
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form_disease.php?pt_id=$pt_id";
		$_SESSION["msgicon"] 	 = 2;		
	}
	header("location:form_info.php");
}
 else 
 if(isset($HTTP_POST_VARS["update"]))
{
// update into pt_disease
$query_rs1 = "update pt_disease set pt_cid='$pt_cid',d0='$d0',d1='$d1',d2='$d2',d2_1='$d2_1',d2_2='$d2_2',d2_3='$d2_3',d2_4='$d2_4',d2_5='$d2_5', d3='$d3', d4='$d4', d5='$d5',d6='$d6',d6_1='$d6_1',d6_2='$d6_2',d6_3='$d6_3',d6_4='$d6_4', d6_5='$d6_5', d7='$d7',d7_1='$d7_1',d7_2='$d7_2',d8='$d8',d9='$d9' where pt_id='$pt_id'";
$rs = mysql_query($query_rs1, $connect) or die(mysql_error());
// update into pt_life
$query_rs = "update pt_life  set pt_cid='$pt_cid',life_type='$life_type',history_family='$history_family',df1='$df1',df2='$df2',df3='$df3',df4='$df4', df5='$df5',df6='$df6', df7='$df7', df8='$df8', sigar='$sigar',alcohol='$alcohol',s1='$s1',s2='$s2',s3='$s3',s1a='$s1a',s3a='$s3a',s3b='$s3b',a1='$a1',a2='$a2',a3='$a3',a1a='$a1a',a3b1='$a3b1',a3c1='$a3c1', a3b2='$a3b2', a3c2='$a3c2',a3b3='$a3b3',a3c3='$a3c3',a3b4='$a3b4',a3c4='$a3c4'where pt_id='$pt_id'";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
// update into pt_screen
$query_rs = "update pt_screen  set calorie='$calorie' where pt_id='$pt_id'";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());
if($rs){
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> "  ;
		$_SESSION["msglink"]     = "search_form.php?id_card=$pt_cid";
		$_SESSION["msgicon"] 	 = 1;
		
	}else{
		
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง [".mysql_error()."] <br> " ;
		$_SESSION["msglink"]     = "form_disease.php?pt_id=$pt_id";
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
