<?php
$q=$_GET["q"];

//include('dbconnect.php');
//mysql_select_db($database_connect, $connect);
//$sql_lab="SELECT * from opduser WHERE code='". $q . "' order by name DESC  ";				

include('dbhos.php');
mysql_select_db($database_hos, $con_hos);
$sql_lab="SELECT * from view_opd WHERE cid='". $q . "' order by vn asc ";				
    $result_lab = mysql_query($sql_lab);
	$Num_Rows = mysql_num_rows($result_lab);
		  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_lab))
{						
						$sdata = $objResult['ptname'];
						$sdata = $sdata.",".$objResult['hn'];
						$sdata = $sdata.",".$objResult['age'];
						$sdata = $sdata.",".$objResult['sex'];
						$sdata = $sdata.",".$objResult['bw'];
						$sdata = $sdata.",".$objResult['height'];
						$sdata = $sdata.",".$objResult['waist'];
						$sdata = $sdata.",".$objResult['pulse'];
						$sdata = $sdata.",".$objResult['bps'];
						$sdata = $sdata.",".$objResult['bpd'];
						$sdata = $sdata.",".$objResult['occupation'];
						$sdata = $sdata.",".$objResult['vstdate'];
}

//FBS 12						
	$sql_lab2="SELECT * from lab_link WHERE icode in ('3070164','3901159') and cid='". $q . "' order by lab_order_number desc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	 $row_rslab2 = mysql_fetch_assoc($result_lab2);
		$sdata = $sdata.",".$row_rslab2["result"];				
		}
	else	{			$sdata = $sdata.",";				}
	$Num_Rows2="";
//TG 13		 				
	$sql_lab2="SELECT * from lab_link WHERE icode in ('3070094','3901164') and cid='". $q . "' order by lab_order_number desc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  $row_rslab2 = mysql_fetch_assoc($result_lab2);
		$sdata = $sdata.",".$row_rslab2["result"];				
		}
	else	{			$sdata = $sdata.",";				}
	$Num_Rows2="";
//HDL 14						
	$sql_lab2="SELECT * from lab_link WHERE icode in ('3070095') and cid='". $q . "' order by lab_order_number desc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  $row_rslab2 = mysql_fetch_assoc($result_lab2);
		$sdata = $sdata.",".$row_rslab2["result"];				
		}
	else	{			$sdata = $sdata.",";				}
	$Num_Rows2="";
//CHO 15						
	$sql_lab2="SELECT * from lab_link WHERE icode in ('3070093','3901163') and cid='". $q . "'  order by lab_order_number desc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  $row_rslab2 = mysql_fetch_assoc($result_lab2);
		$sdata = $sdata.",".$row_rslab2["result"];				
		}
	else	{			$sdata = $sdata.",";				}
	$Num_Rows2="";
//LDL 16						
	$sql_lab2="SELECT * from lab_link WHERE icode in ('3070096') and cid='". $q . "' order by lab_order_number desc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  $row_rslab2 = mysql_fetch_assoc($result_lab2);
		$sdata = $sdata.",".$row_rslab2["result"];				
		}
	else	{			$sdata = $sdata.",";				}
	$Num_Rows2="";
//BUN 17						
	$sql_lab2="SELECT * from lab_link WHERE icode in ('3070098','3901165') and cid='". $q . "' order by lab_order_number desc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  $row_rslab2 = mysql_fetch_assoc($result_lab2);
		$sdata = $sdata.",".$row_rslab2["result"];				
		}
	else	{			$sdata = $sdata.",";				}
	$Num_Rows2="";
//cr 18						
	$sql_lab2="SELECT * from lab_link WHERE icode in ('3070101','3901166') and cid='". $q . "' order by lab_order_number desc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  $row_rslab2 = mysql_fetch_assoc($result_lab2);
		$sdata = $sdata.",".$row_rslab2["result"];			
		}
	else	{			$sdata = $sdata.",";				}
	$Num_Rows2="";
//hct 19						
	$sql_lab2="SELECT * from lab_link WHERE icode in ('3070235') and cid='". $q . "' order by lab_order_number desc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
	  if($result_lab2){
	  $row_rslab2 = mysql_fetch_assoc($result_lab2);
		$sdata = $sdata.",".$row_rslab2["result"];				
		}
	else	{			$sdata = $sdata.",";		
			}
	$Num_Rows2="";

}
	else	{			$sdata = "";				}

				echo $sdata;

				
	
?>