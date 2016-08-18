<?php
$q=$_GET["q"];

//include('dbconnect.php');
//mysql_select_db($database_connect, $connect);
//$sql_lab="SELECT * from opduser WHERE code='". $q . "' order by name DESC  ";				

include('dbhos.php');
mysql_select_db($database_hos, $con_hos);
$sql_lab="SELECT * from v_screen WHERE cid='". $q . "' order by date_pres asc ";				
    $result_lab = mysql_query($sql_lab);
	$Num_Rows = mysql_num_rows($result_lab);
		  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_lab))
{						
						$sdata = $objResult['ptname'];
						$sdata = $sdata.",".$objResult['date_pres'];
}
	else	{			$sdata = "";				}

				echo $sdata;

				
	
?>