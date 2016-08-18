<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>++ ใบสั่งสุขภาพ ++</title>
</head>

<body>
<div class="bockhead1">
<center>
  <img src="img/baner.JPG" style="width:1024px" />
</center>
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
 
  <tr>
    <td width="40%" height="50"><div align="center">
 <?php 
 if(empty($_SESSION['users'])) 
 { 
 echo "<a href='index.php' >เข้าสู่ระบบ</a>";  
 }
 else { ?>
      &nbsp;&nbsp;&nbsp;
        <a href="form.php" style="font-size: 12px; font-family: Tahoma;; font-weight: bold">>> บันทึกรายใหม่ << </a> 
      <?php }?> 
    </div></td>
    <td width="52%"><div align="center"><?php if($_SESSION['statusCheck']!=""){ 
	echo $_SESSION['users']; 
	echo " <a href='session_out.php'= >Log out</a>"; 
	echo " | รหัส รพ. : ".$_SESSION['hos_id'];
	echo " | "; ?> 
     <a href="search_form.php" style="font-size: 12px; font-family: Tahoma;; font-weight: bold">สรุปรายการข้อมูล </a>   
	    <?php  } //echo $statusCheck; ?>
	    </div></td>
    <td width="8%">&nbsp;</td>
  </tr>
</table>
<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
}
.mu_register {	MARGIN: 0px auto; WIDTH: 90%
}
.style16 {font-family: Tahoma;
	font-size: 14px;
	color: #3300FF;
}
.style23 {font-family: "ms Sans Serif"; font-size: 12px; }
-->
</style>
