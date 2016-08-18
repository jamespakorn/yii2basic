<?php
header("content-type: application/x-javascript; charset=utf-8");
				$q=$_GET["q"];
include('dbconnect.php');
mysql_select_db($database_connect, $connect);

				
				$sql_c 	= "select * from hospcode where hospcode = '". $q . "'";
				$result_c = mysql_query($sql_c, $connect);		
				$Num_Rows  = mysql_num_rows($result_c);
			  if($Num_Rows>0){
				while($row_c=mysql_fetch_assoc($result_c)){
						$sdata = $row_c['hosptype'].$row_c['name'];
				}
				}
				
			else{
					$sdata = "ไม่พบ";
				}
				echo $sdata;
	
?>
