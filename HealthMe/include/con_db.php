<?php
$host="localhost";
$username="root";
$pass_word="123456";
$db="env_club";
$Conn = mysql_connect( $host,$username,$pass_word) or die ("ติดต่อกับฐานข้อมูล Mysql ไม่ได้ ");
mysql_query("SET NAMES utf8",$Conn);
mysql_select_db($db) or die("เลือกฐานข้อมูลไม่ได้"); 

?>