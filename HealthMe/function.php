<script type="text/javascript">

<!-- START HIDE
print1="";
print2="";
print3="";
today = new Date();
weekday = today.getDay();
if (weekday == 6) print1='วันเสาร์ที่';
if (weekday == 0) print1='วันอาทิตย์ที่';
if (weekday == 1) print1='วันจันทร์ที่';
if (weekday == 2) print1='วันอังคารที่';
if (weekday == 3) print1='วันพุธที่';
if (weekday == 4) print1='วันพฤหัสบดีที่';
if (weekday == 5) print1='วันศุกร์ที่';
month = today.getMonth();
if (month == 0) print2='มกราคม';
if (month == 1) print2='กุมภาพันธ์';
if (month == 2) print2='มีนาคม';
if (month == 3) print2='เมษายน';
if (month == 4) print2='พฤษภาคม';
if (month == 5) print2='มิถุนายน';
if (month == 6) print2='กรกฎาคม';
if (month == 7) print2='สิงหาคม';
if (month == 8) print2='กันยายน';
if (month == 9) print2='ตุลาคม';
if (month == 10) print2='พฤศจิกายน';
if (month == 11) print2='ธันวาคม';
date = today.getDate();
year=today.getYear()+543;

// STOP HIDE -->
</script>
<SCRIPT LANGUAGE="JavaScript">
<!--

function showFilled(Value) {
return (Value > 9) ? "" + Value : "0" + Value;
}
function StartClock24() {
TheTime = new Date;
document.clock.showTime.value = showFilled(TheTime.getHours()) + ":" +
showFilled(TheTime.getMinutes()) + ":" + showFilled(TheTime.getSeconds());
setTimeout("StartClock24()",1000)
}
//-->
</script>
<style type="text/css">
<!--
.input { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt;border-style: none }
-->
</style>
<style>
<!--
.styling{
background-color:black;
color:lime;
font: bold 16px MS Sans Serif;
padding: 3px;
}
-->
</style>
<?php
 // แสดงค่า error ต่างๆที่รับเข้ามา
 function timespan($seconds = 1, $time = '')
{
 if ( ! is_numeric($seconds))
 {
  $seconds = 1;
 }
 
 if ( ! is_numeric($time))
 {
  $time = time();
 }
 
 if ($time <= $seconds)
 {
  $seconds = 1;
 }
 else
 {
  $seconds = $time - $seconds;
 }
 
 $str = '';
 $years = floor($seconds / 31536000);
 
 if ($years > 0)
 { 
  $str .= $years.' ปี, ';
 } 
 
 $seconds -= $years * 31536000;
 $months = floor($seconds / 2628000);
 
 if ($years > 0 OR $months > 0)
 {
  if ($months > 0)
  { 
   $str .= $months.' เดือน, ';
  } 
 
  $seconds -= $months * 2628000;
 }
 
 $weeks = floor($seconds / 604800);
 
 if ($years > 0 OR $months > 0 OR $weeks > 0)
 {
  if ($weeks > 0)
  { 
   $str .= $weeks.' สัปดาห์, ';
  }
 
  $seconds -= $weeks * 604800;
 }   
 
 $days = floor($seconds / 86400);
 
 if ($months > 0 OR $weeks > 0 OR $days > 0)
 {
  if ($days > 0)
  { 
   $str .= $days.' วัน, ';
  }
 
  $seconds -= $days * 86400;
 }
 
 $hours = floor($seconds / 3600);
 
 if ($days > 0 OR $hours > 0)
 {
  if ($hours > 0)
  {
   $str .= $hours.' ชั่วโมง, ';
  }
 
  $seconds -= $hours * 3600;
 }
 
 $minutes = floor($seconds / 60);
 
 if ($days > 0 OR $hours > 0 OR $minutes > 0)
 {
  if ($minutes > 0)
  { 
   $str .= $minutes.' นาที, ';
  }
 
  $seconds -= $minutes * 60;
 }
 
 if ($str == '')
 {
  $str .= $seconds.' วินาที';
 }
 
 return $years;
}
 
function msg($st){
	print "
	<form  name='form12' method='post' action='javascript:history.back()'>
	<table width='50%'  border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#0000FF'>
  <tr><td bgcolor='#0000FF'><font color='#FFFFFF' ><b>เกิดข้อผิดพลาด</b></font></td>
  </tr><tr>
    <td><br><font color='red'><center>".$st."</center></font><br>
	        <div align='center'>
          <input type='submit' name='Submit' value='ตกลง'   >
        </div>
          </td>
  </tr></table> </form> 
";
exit();
}

/*function dateThai($date){
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	}
	*/
function intToMoney($num){
$num=intval($num);
$ed=strlen($num)%3;
$str=substr($num,0,$ed); 
for($i=$ed;$i<strlen($num);$i+=3)
$str=$str.",".substr($num,$i,3);
if($ed==0)
$str=substr($str,1,strlen($str));
return $str;
}
function tDate($date) {
	list($Y,$m,$d) = split('-',$date); // แยกวันเป็น ปี เดือน วัน
	$Y = $Y-543; // เปลี่ยน ค.ศ. เป็น พ.ศ.
	
		return $Y."-".$m."-".$d;
}

?>
