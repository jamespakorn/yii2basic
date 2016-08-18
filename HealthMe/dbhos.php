<?php

//$hostname_connect = "localhost";
//$database_connect = "order_health";
//$username_connect = "root";
//$password_connect = "123456";
//$connect = mysql_pconnect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 
//mysql_query("SET NAMES UTF8");

$hostname_hos = "172.20.20.19";
$database_hos = "hos";
$username_hos = "hpc7";
$password_hos = "c@llit116";

$con_hos = mysql_pconnect($hostname_hos, $username_hos, $password_hos) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8");

?>
