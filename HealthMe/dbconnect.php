<?php


$hostname_connect = "localhost";
$database_connect = "health_me";
$username_connect = "root";
$password_connect = "hpc7-l0c@lh0st";
//$username_connect = "hpc";
//$password_connect = "90123";
$connect = mysql_pconnect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8");

//$connect = mysql_connect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 
//		mysql_query("SET NAMES utf8",$connect);
/*
$hostname_hos = "172.20.20.14";
$database_hos = "hos";
$username_hos = "sa";
$password_hos = "sa1";

$con_hos = mysql_connect($hostname_hos, $username_hos, $password_hos) or trigger_error(mysql_error(),E_USER_ERROR); 
		mysql_query("SET NAMES utf8",$con_hos);
mysql_select_db($database_hos) or die("เลือกฐานข้อมูลไม่ได้"); 
*/
?>
