<?php session_start(); ?>
<?php include('chcek.php'); ?>
<?php
include('dbconnect.php');
mysql_select_db($database_connect, $connect);

$pt_cid=$_POST[cid];
$pt_hn=$_POST[hn];
$pt_name=$_POST[spname];
$pt_sex=$_POST[sex];
$pt_address=$_POST[address];
$pt_weight=$_POST[weight];
$pt_height=$_POST[height];
$pt_bmi=($pt_weight/($pt_weight*$pt_weight));
$pt_waist=$_POST[waist];
$pt_pulse=$_POST[pulse];
$pt_occ=$_POST[pt_occ];
$p_tel=$_POST[tel];
$p_email=$_POST[email];
$p_line=$_POST[LineID];
$pt_bps=$_POST[pt_bps];
$pt_bpd=$_POST[pt_bpd];
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

// insert into pt_screen
$query_rs = "insert into pt_screen (pt_id, pt_cid, pt_hn, pt_name, pt_age, pt_sex, pt_address, pt_weight,pt_height,  pt_bmi, pt_waist, pt_pulse, pt_occ,p_tel,p_email,p_line,pt_bps,pt_bpd, pt_bloodgrp, pt_fbs,pt_hba1c,pt_tg,pt_hdl,pt_cho,pt_ldl,pt_bun,pt_cr,pt_hct,pt_date_screen)
VALUES ('',       '$pt_cid','$pt_hn','$pt_name','$pt_age','$pt_sex','$pt_address','$pt_weight','$pt_height','$pt_bmi','$pt_waist','$pt_pulse','$pt_occ','$p_tel','$p_email','$p_line','$pt_bps','$pt_bpd','$pt_bloodgrp','$pt_fbs','$pt_hba1c','$pt_tg', '$pt_hdl','$pt_cho', '$pt_ldl','$pt_bun','$pt_cr','$pt_hct','$pt_date_screen')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());

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

// insert into pt_disease
$query_rs = "insert into pt_screen (pt_id, pt_cid, pt_hn, pt_name, pt_age, pt_sex, pt_address, pt_weight,pt_height,  pt_bmi, pt_waist, pt_pulse, pt_occ,p_tel,p_email,p_line,pt_bps,pt_bpd, pt_bloodgrp, pt_fbs,pt_hba1c,pt_tg,pt_hdl,pt_cho,pt_ldl,pt_bun,pt_cr,pt_hct,pt_date_screen)
VALUES ('',       '$pt_cid','$pt_hn','$pt_name','$pt_age','$pt_sex','$pt_address','$pt_weight','$pt_height','$pt_bmi','$pt_waist','$pt_pulse','$pt_occ','$p_tel','$p_email','$p_line','$pt_bps','$pt_bpd','$pt_bloodgrp','$pt_fbs','$pt_hba1c','$pt_tg', '$pt_hdl','$pt_cho', '$pt_ldl','$pt_bun','$pt_cr','$pt_hct','$pt_date_screen')";
$rs = mysql_query($query_rs, $connect) or die(mysql_error());

// pt_life
$life_type=$_POST[life_type];
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
$a3a1=$_POST[a3a1];
$a3b1=$_POST[a3b1];
$a3a2=$_POST[a3a2];
$a3b2=$_POST[a3b2];
$a3a3=$_POST[a3a3];
$a3b3=$_POST[a3b3];
$a3a4=$_POST[a3a4];
$a3b4=$_POST[a3b4];


echo 'บันทึกข้อมูลเรียบร้อยแล้ว ' .'<br><br>';
echo ' <a href="hp_maintain.php">กลับหน้า เดิม ';
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
<?php
mysql_free_result($rs1);
mysql_free_result($rs2);
mysql_free_result($rs3);
mysql_free_result($rs5);
?>
