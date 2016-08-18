<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css" media="all">
<!--
#apDiv0 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:1;
	background-image: url(tree/d0-0.png);
	visibility: visible;
}

#apDiv1 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:19;
	background-image: url(tree/d1-0.png);
	visibility: visible;
}
#apDiv2 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:18;
	background-image: url(tree/d2-0.png);
	visibility: visible;
}
#apDiv3 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:17;
	background-image: url(tree/d3-0.png);
	visibility: visible;
}

#apDiv4 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:16;
	background-image: url(tree/d4-0.png);
	visibility: visible;
}

#apDiv5 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:15;
	background-image: url(tree/d5-0.png);
	visibility: visible;
}
#apDiv6 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:14;
	background-image: url(tree/d6-0.png);
	visibility: visible;
}
#apDiv7 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:13;
	background-image: url(tree/d7-0.png);
	visibility: visible;
}
#apDiv8 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:12;
	background-image: url(tree/d8-0.png);
	visibility: visible;
}
#apDiv9 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:11;
	background-image: url(tree/r1-0.png);
	visibility: visible;
}
#apDiv10 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:10;
	background-image: url(tree/r2-0.png);
	visibility: visible;
}
#apDiv11 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:11;
	background-image: url(tree/r3-0.png);
	visibility: visible;
}
#apDiv12 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:12;
	background-image: url(tree/r4-0.png);
	visibility: visible;
}
#apDiv13 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:13;
	background-image: url(tree/r5-0.png);
	visibility: visible;
}
.zzz img
{
position:absolute;
z-index:2;
}
-->
</style>
<?php
$pt_id=$_REQUEST['pt_id'];
include('dbconnect.php');
mysql_select_db($database_connect, $connect);

// ตรวจสอบว่า ตาราง v_s
  if($pt_id<>"") {
     $sql_t1="SELECT * FROM v_tree  WHERE pt_id='". $pt_id . "'    ";
//echo  $sql_t1;
	 $result_t1 = mysql_query($sql_t1);
	 $Num_Rows  = mysql_num_rows($result_t1);
  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_t1))
		{						
$d1 = $objResult['d1'];
$d2 = $objResult['d2'];
$d3   = $objResult['d3'];
$d4   = $objResult['d4'];
$d5   = $objResult['d5'];
$d6   = $objResult['d6'];
$d7   = $objResult['d7'];
$d8   = $objResult['d8'];
$d9   = $objResult['sigar'];
$d10   = $objResult['alcohol'];
$d11   = $objResult['emotion'];
$d12   = $objResult['food'];
$d13   = $objResult['psum'];
	}	
}
}
?>

<?php 
/* echo "<img src='tree/d0-0.png' width='500' id='zzz'/>";
if($d1==1){  echo "<img src='tree/d1-0.png' width='500' id='zzz' />"; }
if($d2==1){ echo "<img src='tree/d2-0.png' width='500' id='zzz' />"; }
if($d3==1){ echo "<img src='tree/d3-0.png' width='500' id='zzz' />"; }
if($d4==1){ echo "<img src='tree/d4-0.png' width='500' id='zzz' />"; }
if($d5==1){ echo "<img src='tree/d5-0.png' width='500' id='zzz'/>"; }
if($d6==1){ echo "<img src='tree/d6-0.png' width='500' id='zzz'/>"; }
if($d7==1){ echo "<img src='tree/d7-0.png' width='500' id='zzz'/>"; }
if($d8==1){ echo "<img src='tree/d8-0.png' width='500' id='zzz'/>"; }
if($d9==1){ echo "<img src='tree/r1-0.png' width='500' id='zzz'/>"; }
if($d10==1){ echo "<img src='tree/r2-0.png' width='500' id='zzz'/>"; }
if($d11==1){ echo "<img src='tree/r3-0.png' width='500' id='zzz'/>"; }
if($d12==1){ echo "<img src='tree/r4-0.png' width='500' id='zzz'/>"; }
if($d13==1){ echo "<img src='tree/r5-0.png' width='500' id='zzz'/>"; }
*/
?>

<div id="apDiv0"></div>

<?php 

if($d1==1){  echo "<div id='apDiv1'></div>"; }
if($d2==1){ echo "<div id='apDiv2'></div>"; }
if($d3==1){ echo "<div id='apDiv3'></div>"; }
if($d4==1){ echo "<div id='apDiv4'></div>"; }
if($d5==1){ echo "<div id='apDiv5'></div>"; }
if($d6==1){ echo "<div id='apDiv6'></div>"; }
if($d7==1){ echo "<div id='apDiv7'></div>"; }
if($d8==1){ echo "<div id='apDiv8'></div>"; }
if($d9==1){ echo "<div id='apDiv9'></div>"; }
if($d10==1){ echo "<div id='apDiv10'></div>"; }
if($d11==1){ echo "<div id='apDiv11'></div>"; }
if($d12<=8){ echo "<div id='apDiv12'></div>"; }
if($d13<600){ echo "<div id='apDiv13'></div>"; }

?>