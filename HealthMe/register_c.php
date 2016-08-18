<?php
	ob_start();
	session_start();
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
	$loginname			= $_POST["loginname"];
	$password			= $_POST["password"];
	$name				= $_POST["name"];
	$position			= $_POST["position"];
	$hos_id				= $_POST["hos_id"];
	$hospital			= $_POST["hospital"];
	$tel				= $_POST["tel"];
	$email				= $_POST["email"];
	$sc 				= $_POST["txtcapchar"];
				
		if ($sc <> $_SESSION['security_number'])
		{
			$_SESSION['security_error'] = "ไม่สามารถเข้าระบบได้ Security";
						header("location:register.php");
		}else{
	//Check USername
			
	$strSQL 	= "SELECT * FROM opduser WHERE loginname = '". $loginname . "'";
	$rsUser = mysql_query($strSQL, $connect) or die(mysql_error());
	$Num_Rows  = mysql_num_rows($rsUser);
				
	if($Num_Rows > 0){
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ  Userlogin มีผู้ใช้แล้ว กรุณาเปลี่ยนใหม่ <br> ". $strSQL ;
		$_SESSION["msglink"]     = "register.php";
		$_SESSION["msgicon"] 	 = 2;		
	header("location:form_info.php");
	}		


	//Member

	$now = date("Y-m-d H:i:s"); 
	$MemDateRegis		= $now;
	
	$strSQL 	= "insert into opduser(id,loginname,ppassword,pname,pposition,hos_id,hospital,tel,email,status,MemDateRegis) values";
	$strSQL    .= " ('','".$loginname."','".$password."','".$name."','".$position."','".$hos_id."','".$hospital."','".$tel."','".$email."',0,'".$MemDateRegis."')";
//echo  $strSQL ;
$insert_stat = mysql_query($strSQL, $connect) or die(mysql_error());
	
	if($insert_stat){

		$Gdata  = "ยินดีต้อนรับ สมาชิกใหม่ <Br>";
		$Gdata .= "Username สมาชิก : ".$loginname."<Br>"."รหัสผ่าน : ".$password."<Br>";

		
		$_SESSION["msgsystem"] 	 = "Successful : บันทึกข้อมูลเสร็จเรียบร้อยแล้ว <br> " . $Gdata;
		$_SESSION["msglink"]     = "index.php";
		$_SESSION["msgicon"] 	 = 1;

	}else{	
		$_SESSION["msgsystem"] 	 = "Error : บันทึกไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง  <br> ";
		$_SESSION["msglink"]     = "register.php";
		$_SESSION["msgicon"] 	 = 2;		
	}
	
	header("location:form_info.php");
	
		}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
