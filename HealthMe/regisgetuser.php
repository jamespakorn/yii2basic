<?php
//header("content-type: application/x-javascript; charset=TIS-620");
				$q=$_GET["q"];
include('dbconnect.php');
mysql_select_db($database_connect, $connect);

				
				$sql_c 	= "select * from opduser where loginname = '". $q . "'";
				$result_c = mysql_query($sql_c, $connect);		
				$Num_Rows  = mysql_num_rows($result_c);
			  if($Num_Rows>0){
				while($row_c=mysql_fetch_object($result_c)){
						$sdata= "มีผู้ใช้ Username แล้ว";
				}
				}
				
			else{
					$sdata = "ใช้ได้";
				}
				echo $sdata;
	
?>