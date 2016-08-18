<?
$static_page[1] = "Teaching";
$static_page[2] = "Research";
$static_page[3] = "Education service";
$static_page[4] = "Cultural Promotion";		

$day[1] = "จันทร์";
$day[2] = "อังคาร";
$day[3] = "พุธ";
$day[4] = "พฤหัส";
$day[5] = "ศุกร์";
$day[6] = "เสาร์";
$day[7] = "อาทิตย์";

 	








$type_id[] = 1;
$type_id[] = 2;
$type_id[] = 3;
$type_id[] = 4;
$type_id[] = 5;
$type_id[] = 6;
$type_id[] = 7;
$type_id[] = 8;
$type_id[] = 9;
$type_id[] = 10;
$type_id[] = 11;


/*	global $Conn;
	$sql_type = "SELECT * FROM item_type WHERE list_sub_id='0' AND item_type ='1' order by item_type_id ASC";
	//echo "$sql_detail <br />";
	
	
	
	$result_type = mysql_query($sql_type) or die(mysql_error());
	while($row_type = mysql_fetch_array($result_type))
	{
		
		$type_id[]=$row_type[item_type_id];
		$type_name[]=$row_type[item_type_name];
		
	}*/


$type_name[] = "วัสดุ"; 
$type_name[] = "ครุภัณฑ์"; 
$type_name[] = "เหมาบริการ"; 
//$type_name[] = "ทรัพย์สิน"; 
$type_name[] = "ระบุ(หลายรายการ)"; 

$monney_type_id[] = 1;
$monney_type_id[] = 2;
$monney_type_id[] = 3;
$monney_type_id[] = 4;

$monney_type_name[] = "เงินงบประมาณ";
$monney_type_name[] = "เงินบำรุง";
$monney_type_name[] = "เงินอุดหนุน";
$monney_type_name[] = "อื่นๆ";


$how2rev_name[1] = "ตกลงราคา";
$how2rev_name[2] = "สอบราคา";
$how2rev_name[3] = "ประกวดราคาทางอิล็กทรอนิกส์";  
$how2rev_name[4] = "วิธีพิเศษ";  
$how2rev_name[5] = "รับบริจาค"; 
   
$how2rev_detail[1] = "รวมรายการทั้งหมดราคาไม่เกิน 100,000 บาท";
$how2rev_detail[2] = "รวมราคารายการทั้งหมดตั้งแต่ 100,000 แต่ไม่เกิน 1,999,999 บาท";
$how2rev_detail[3] = "รวมราคารายการทั้งหมดตั้งแต่ 2,000,000 บาทขึ้นไป";  
$how2rev_detail[4] = "";  
$how2rev_detail[5] = ""; 
  

      


?>