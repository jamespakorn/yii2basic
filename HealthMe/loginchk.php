<?php
    ob_start();
    session_start();

include('dbconnect.php');
mysql_select_db($database_connect, $connect);
 
 ?>
<?php
$users=$_REQUEST['users'];
$pass=$_REQUEST['pass'];

	if($users=="" ||$pass=="")
	{
		$_SESSION['x']="กรุณาใส่ Username และ Password ค่ะ ";
		
 		echo"<meta http-equiv='refresh' content='0;URL=index.php?u=1'>";
	}else{	
	//username and status
$query_rsUser = "SELECT * FROM opduser  WHERE loginname='$users' and ppassword='$pass'  ";
$rsUser = mysql_query($query_rsUser);
$row_rsUser = mysql_fetch_assoc($rsUser);
$_SESSION['nameCheck']=$row_rsUser['name'];
$_SESSION['users']=$row_rsUser['loginname'];
$_SESSION['statusCheck']=$row_rsUser['status'];
$_SESSION['hos_id']=$row_rsUser['hos_id'];
	$today = date("y/m/d");
	$totime = date("H:i:s");
$main_insert_stat = "insert into main_stat_login (offid,login_time,login_date,username) values ('$nameCheck','$totime','$today','$users')";
//echo $main_insert_stat ;
$insert_stat = mysql_query($main_insert_stat, $connect) or die(mysql_error());
				switch($_SESSION['statusCheck']) {
				case "1" : echo"<meta http-equiv='refresh' content='0;URL=form.php'>";  break;
				case "0" : $_SESSION["x"]="อยู่ระหว่าง อนุมัติ Username ของท่าน ";     session_destroy();
						echo"<meta http-equiv='refresh' content='0;URL=index.php'>"; 
						break;
				case "3" : echo"<meta http-equiv='refresh' content='0;URL=form.php'>";  break;
		default:$_SESSION["x"]="ใส่ Username และ Password ไม่ถูกต้องค่ะ ";
		 echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
		 break;
				 }
		}		
?>