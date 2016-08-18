<?php
$q=$_GET["q"];

//include('dbconnect.php');
//mysql_select_db($database_connect, $connect);
//$sql_lab="SELECT * from opduser WHERE code='". $q . "' order by name DESC  ";				

include('dbhos.php');
mysql_select_db($database_hos, $con_hos);

//FBS						
	$sql_lab2="SELECT * from lab_link WHERE lab like 'fbs%' and cid='". $q . "' order by lab_order_number asc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  while($row_rslab2 = mysql_fetch_assoc($result_lab2))
		{$sdata = $sdata.",".$row_rslab2["result"];				}}
	else	{			$sdata = $sdata.",";				}
//TG						
	$sql_lab2="SELECT * from lab_link WHERE lab like 'triglyceride%' and cid='". $q . "' order by lab_order_number asc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  while($row_rslab2 = mysql_fetch_assoc($result_lab2))
		{$sdata = $sdata.",".$row_rslab2["result"];				}}
	else	{			$sdata = $sdata.",";				}
//HDL						
	$sql_lab2="SELECT * from lab_link WHERE lab like 'hdl%' and cid='". $q . "' order by lab_order_number asc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  while($row_rslab2 = mysql_fetch_assoc($result_lab2))
		{$sdata = $sdata.",".$row_rslab2["result"];				}}
	else	{			$sdata = $sdata.",";				}
//CHO						
	$sql_lab2="SELECT * from lab_link WHERE lab like 'cho%'and cid='". $q . "'  order by lab_order_number asc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  while($row_rslab2 = mysql_fetch_assoc($result_lab2))
		{$sdata = $sdata.",".$row_rslab2["result"];				}}
	else	{			$sdata = $sdata.",";				}
//LDL						
	$sql_lab2="SELECT * from lab_link WHERE lab like 'ldl%' and cid='". $q . "' order by lab_order_number asc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  while($row_rslab2 = mysql_fetch_assoc($result_lab2))
		{$sdata = $sdata.",".$row_rslab2["result"];				}}
	else	{			$sdata = $sdata.",";				}
//BUN						
	$sql_lab2="SELECT * from lab_link WHERE lab like 'bun%' and cid='". $q . "' order by lab_order_number asc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  while($row_rslab2 = mysql_fetch_assoc($result_lab2))
		{$sdata = $sdata.",".$row_rslab2["result"];				}}
	else	{			$sdata = $sdata.",";				}
//cr						
	$sql_lab2="SELECT * from lab_link WHERE lab like 'crieatinine%' and cid='". $q . "' order by lab_order_number asc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  while($row_rslab2 = mysql_fetch_assoc($result_lab2))
		{$sdata = $sdata.",".$row_rslab2["result"];				}}
	else	{			$sdata = $sdata.",";				}
//cr						
	$sql_lab2="SELECT * from lab_link WHERE hct like 'hct%' and cid='". $q . "' order by lab_order_number asc  ";				
	  $result_lab2 = mysql_query($sql_lab2);
      $Num_Rows2 = mysql_num_rows($result_lab2);
	  if($Num_Rows2>0){
	  while($row_rslab2 = mysql_fetch_assoc($result_lab2))
		{$sdata = $sdata.",".$row_rslab2["result"];				}}
	else	{			$sdata = $sdata.",";		
			}
}
	

				echo $sdata;

				
	
?>