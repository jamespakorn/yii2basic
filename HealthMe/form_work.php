<?php include"head.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap1.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
    <?php
$pt_id=$_REQUEST['pt_id'];
include('dbconnect.php');
mysql_select_db($database_connect, $connect);

$sql_c="SELECT pt_id,pt_cid,pt_name,pt_hn FROM pt_screen  WHERE pt_id='$pt_id' order by pt_id  ";
$result_c = mysql_query($sql_c, $connect);		
while($row_c=mysql_fetch_object($result_c)){
		$_SESSION['pt_id']=$row_c->pt_id;
		$_SESSION['pt_cid']=$row_c->pt_cid;
		$_SESSION['pt_name']=$row_c->pt_name;
		$_SESSION['pt_hn']=$row_c->pt_hn;
		}
// ตรวจสอบว่า ตาราง pt_disease มีค่าหรือไม่		
  if($pt_id<>"") {
     $sql_t1="SELECT * FROM pt_work w  WHERE w.pt_id='". $pt_id . "'    ";
//echo  $sql_t1;
	 $result_t1 = mysql_query($sql_t1);
	 $Num_Rows  = mysql_num_rows($result_t1);
  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_t1))
		{						
$p1 	= $objResult['p1'];
$p2 	= $objResult['p2'];
$p3   	= $objResult['p3'];
$p4  	= $objResult['p4'];
$p5   	= $objResult['p5'];
$p6   	= $objResult['p6'];
$p7   	= $objResult['p7'];
$p8   	= $objResult['p8'];
$p9   	= $objResult['p9'];
$p10   = $objResult['p10'];
$p11   = $objResult['p11'];
$p12   = $objResult['p12'];
$p13   = $objResult['p13'];
$p14   = $objResult['p14'];
$p15   = $objResult['p15'];
$p16   = $objResult['p16'];
	}	
// คำนวน หา ชม กับ นาที	
if($p3>=60)
  {
  $pp3=$p3;
  	for($i=0;$pp3>=60;$i++){ 	$pp3=($pp3-60);	}
	$p3m=$pp3;
	$p3h=$i;
  }
  else   if($p3>0)  {  $p3m=$p3;  }
  else { $p3m=""; }
  
if($p6>=60)
  {
  $pp6=$p6;
  	for($i=0;$pp6>=60;$i++){ 	$pp6=($pp6-60);	}
	$p6m=$pp6;
	$p6h=$i;
  }
  else   if($p6>0)  {  $p6m=$p6;  }
  else { $p6m=""; }

if($p9>=60)
  {
  $pp9=$p9;
  	for($i=0;$pp9>=60;$i++){ 	$pp9=($pp9-60);	}
	$p9m=$pp9;
	$p9h=$i;
  }
  else   if($p9>0)  {  $p9m=$p9;  }
  else { $p9m=""; }

if($p12>=60)
  {
  $pp12=$p12;
  	for($i=0;$pp12>=60;$i++){ 	$pp12=($pp12-60);	}
	$p12m=$pp12;
	$p12h=$i;
  }
  else   if($p12>0)  {  $p12m=$p12;  }
  else { $p12m=""; }
  
if($p15>=60)
  {
  $pp15=$p15;
  	for($i=0;$pp15>=60;$i++){ 	$pp15=($pp15-60);	}
	$p15m=$pp15;
	$p15h=$i;
  }
  else   if($p15>0)  {  $p15m=$p15;  }
  else { $p15m=""; }

if($p16>=60)
  {
  $pp16=$p16;
  	for($i=0;$pp16>=60;$i++){ 	$pp16=($pp16-60);	}
	$p16m=$pp16;
	$p16h=$i;
  }
  else   if($p16>0)  {  $p16m=$p16;  }
  else { $p16m=""; }
	
}
}		
?>

  <form action="form_workc.php" method="post" name="frmMain">
<fieldset>

<legend>ข้อมูลส่วนตัว<span class="class">
<input type="tel" name="pt_id" id="pt_id" style="width:200px; height:40px;" maxlength="13"  value="<?php echo $_SESSION['pt_id']; ?>" class="form-control css-require" readonly="readonly"/>
</span></legend>
<div class align="left">
  ID_Card :
  <input type="tel" name="id_cid" id="id_cid" style="width:200px; height:40px;" maxlength="13" placeholder="เลขบัตรประชาชน" onchange="showUser(this.value)" value="<?php echo $_SESSION['pt_cid']; ?>" class="form-control css-require" readonly="readonly"/>
  <br />
</div>
 <div class="form-group has-feedback">
<div class align="left">
Name : &nbsp;&nbsp;&nbsp;
<input type="text" name="spname" style="width:200px; height:40px;" maxlength="50" placeholder="ชื่อ - สกุล" id="spname" value="<?php echo $_SESSION['pt_name']; ?>"  class="form-control css-require" readonly="readonly"/> <br /></div>
</div>

<div class align="left">
HN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="hn" id="hn" placeholder="เลข HN" style="width:200px; height:40px;" maxlength="11" value="<?php echo $_SESSION['pt_hn']; ?>"  class="form-control css-require" readonly="readonly"/>
 <br /></div>

		

<fieldset>
				<legend>กิจกรรมในการทำงาน(Activity at work)</legend>	
            </fieldset>	
            <strong>"กิจกรรมที่มีความหนักค่อนช้างมาก"</strong> คือต้อง	หายใจถี่ขึ้นมาก หรืออัตราเต้นของหัวใจเพิ่มสุงขึ้นอย่างมาก 
            <p>	
            <strong>"กิจกรรมที่มีความหนักปานกลาง"</strong> คือต้อง	มีการหายใจถี่ขึ้นเล็กน้อย หรืออัตราการเต้นของหัวใจเพิ่มขึ้นเล็กน้อย </br>	
<table class="table table-bordered">
            	<thead>
      				<tr class="danger">
       					<th WIDTH="5%" class="text-center">No.</th>
        				<th WIDTH="70%" class="text-center">คำถาม</th>
        				<th WIDTH="25%" class="text-center">คำตอบ</th>
     			    </tr>
   				</thead>
                <tbody>
      				<tr class="info">
        				<td class="text-center">1.</td>
        				<td>
                        งานของท่านมีส่วนเกี่ยวข้องกับ <strong>"กิจกรรมที่มีความหนักค่อนข้างมาก"</strong>จนเป็นเหตุให้ต้องหายใจถี่ขึ้นมากหรืออัตราเต้นของหัวใจเพิ่มสูงขึ้นอย่างมาก เช่น งานยก/แบก/หามของหนัก งานขุดดิน หรือ งานก่อสร้าง ติดต่อกันอย่างน้อย10นาที									              			</td>
<td class="text-center">
                        	<input type="radio" class="css_radio" name="p1" value="1"  <?php if($p1 == 1) echo "checked"; ?>>
                       	  <font size="4"> ใช่ 
                            &nbsp;&nbsp;
                            <input type="radio" class="css_radio" name="p1" value="0" <?php if($p1 == 0) echo "checked"; ?>>
                          ไม่ใช่ </font>
                        </td>
      				</tr>
					<tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">2.</td>
        				<td class="css_chk4">
                        ท่านต้องทำ <strong>"กิจกรรมที่มีความหนักค่อนข้างมาก"</strong> ซึ่งเป็นส่วนหนึ่งของงานท่าน สัปดาห์ละกี่วัน                        </td>
       				  <td class="text-center"><input type="tel" name="p2" maxlength="1" placeholder="-" style="width:30px; height:40px;" id="p2" value="<?php echo $p2; ?>" class="dis1">
       				  วัน								       					</td>
    			 	</tr>
                    <tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">3.</td>
        				<td>
                        ท่านใช้เวลานานเพียงเท่าใดในการทำ <strong>"กิจกรรมที่มีความหนักค่อนข้างมาก" </strong>ในการทำงานแต่ละวัน                        </td>
<td class="text-center">
                        	<input type="tel" name="p3h" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p3h" value="<?php echo $p3h; ?>" class="dis1">
                        	ชม
                   	    &nbsp;&nbsp;
                            <input type="tel" name="p3m" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p3m"  value="<?php echo $p3m; ?>" class="dis1">
                            นาที
                        </td>
      				</tr>
                    <tr class="active">
        				<td class="text-center">4.</td>
        				<td>
                        งานของท่านมีส่วนเกี่ยวข้องกับ <strong>"กิจกรรมที่มีความหนักปานกลาง"</strong>ที่ทำให้ท่านมีการหายใจถี่ขึ้นเล็กน้อย หรืออัตราการเต้นของหัวใจเพิ่มขึ้นเล็กน้อย เช่น เดินเร็วๆ หรือมีการยกของเบาๆ ติดต่อกันเป็นเวลาอย่างน้อย10นาที									              			</td>
<td class="text-center">
                        	<input type="radio" name="p4" class="css_radio" value="1" <?php if($p4 == 1) echo "checked"; ?>>
                       	  <font size="4"> ใช่ 
                            &nbsp;&nbsp;
                            <input type="radio" name="p4" class="css_radio" value="0" <?php if($p4 == 0) echo "checked"; ?>>
                          ไม่ใช่ </font>
                        </td>
      				</tr>
               		<tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">5.</td>
        				<td>
                        ท่านต้องทำ <strong>"กิจกรรมที่มีความหนักปานกลาง"</strong> ซึ่งเป็นส่วนหนึ่งของงานท่าน สัปดาห์ละกี่วัน                        </td>
       				  <td class="text-center"><input type="tel" name="p5" maxlength="1" placeholder="วัน" style="width:30px; height:40px;" id="p5" class="dis4" value="<?php echo $p5; ?>" >
       				  วัน</td>
    			 	</tr>
                    <tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">6.</td>
        				<td>
                        ท่านใช้เวลานานเพียงเท่าใดในการทำ <strong>"กิจกรรมที่มีความหนักปานกลาง"</strong> ในการทำงานแต่ละวัน                        </td>
<td class="text-center">
                        	<input type="tel" name="p6h" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p6h" class="dis4" value="<?php echo $p6h; ?>"  >
ชม.                            &nbsp;&nbsp;
                            <input type="tel" name="p6m" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p6m" class="dis4"  value="<?php echo $p6m; ?>" > 
                            นาที
                        </td>
      				</tr>
          	  </tbody>
 		 </table>        
		
        
        
         <fieldset>
				<legend>การเดินทางไป-กลับ ที่ต่างๆ (Travel to and from places)</legend>	
         </fieldset>
		 <table class="table table-bordered">
            	<thead>
      				<tr class="danger">
       					<th WIDTH="5%" class="text-center">No.</th>
        				<th WIDTH="70%" class="text-center">คำถาม</th>
        				<th WIDTH="25%" class="text-center">คำตอบ</th>
     			    </tr>
   				</thead>
                <tbody>
                	<tr class="info">
        				<td class="text-center">7.</td>
        				<td>
                        ท่านต้องเดินทางไป-กลับ ยังที่ต่างๆโดยการเดิน หรือขี่จักรยาน ติดต่อกันอย่างน้อย 10 นาทีหรือไม่?								              			</td>
        				<td class="text-center">
                        	<input type="radio" name="p7" class="css_radio" value="1"<?php if($p7 == 1) echo "checked"; ?>>
                       	  <font size="4"> ใช่ 
                            &nbsp;&nbsp;
                            <input type="radio" name="p7" class="css_radio" value="0" <?php if($p7 == 0) echo "checked"; ?>>
                          ไม่ใช่ </font>
                        </td>
      				</tr>
                    <tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">8.</td>
        				<td>
                        ในแต่ละสัปดาห์ มีกี่วันที่ท่านได้เดินหรือขี่จักรยานไป-กลับ ยังที่ต่างๆติดต่อกันอย่างน้อย10นาที
                        </td>
        				<td class="text-center"><input type="tel" name="p8" maxlength="1" placeholder="-" style="width:30px; height:40px;" id="p8"  class="dis7"  value="<?php echo $p8; ?>" >
        				วัน</td>
    			 	</tr>
                    <tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">9.</td>
        				<td>
                        ในแต่ละวัน ท่านใช้เวลาเพื่อการเดิน หรือขี่จักรยานนานเพียงใด							              			
                        </td>
        				<td class="text-center">
                        	<input type="tel" name="p9h" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p9h"  class="dis7"  value="<?php echo $p9h; ?>" >
                        	ชม.                        	&nbsp;&nbsp;
                            <input type="tel" name="p9m" placeholder="-" style="width:50px; height:40px;" id="p9m"  class="dis7"  value="<?php echo $p9m; ?>" > 
                            นาที
                        </td>
      				</tr>
           	  </tbody>
 		 </table>    
         
         
         
         <fieldset>
				<legend>กิจกรรมนันทนาการ (Recreational activities)</legend>	
         </fieldset>
		 <table class="table table-bordered">
            	<thead>
      				<tr class="danger">
       					<th WIDTH="5%" class="text-center">No.</th>
        				<th WIDTH="70%" class="text-center">คำถาม</th>
        				<th WIDTH="25%" class="text-center">คำตอบ</th>
     			    </tr>
   				</thead>
                <tbody> 
                	<tr class="info">
        				<td class="text-center">10.</td>
        				<td>
                        ท่านได้เล่นกีฬา หรือฝึกหนักเพื่อเสริมสร้างความแข็งแรง หรือทำกิจกรรมนันทนาการยามว่าง ที่ต้องออกแรงค่อนข้างมากจนทำให้ท่านต้องหายใจถี่ขึ้น หรือหัวใจเต้นเร็วขึ้นอย่างมาก เช่น วิ่ง หรือเล่นฟุตบอล ติดต่อกันอย่างน้อย 10 นาที								
                        </td>
        				<td class="text-center">
                        	<input type="radio" name="p10" class="css_radio" value="1"<?php if($p10 == 1) echo "checked"; ?>>
                       	  <font size="4"> ใช่ 
                            &nbsp;&nbsp;
                            <input type="radio" name="p10" class="css_radio" value="0" <?php if($p10 == 0) echo "checked"; ?>>
                          ไม่ใช่ </font>
                        </td>
      				</tr>
                    <tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">11.</td>
        				<td>
                        ท่านได้เล่นกีฬา หรือฝึกหนักเพื่อเสริมสร้างความแข็งแรง หรือทำกิจกรรมนันทนาการยามว่าง ที่ต้องออกแรงค่อนข้างมากสัปดาห์ละกี่วัน?
                        </td>
        				<td class="text-center"><input type="tel" name="p11" maxlength="1" placeholder="-" style="width:30px; height:40px;" id="p11"  class="dis11"  value="<?php echo $p11; ?>" >
       				  วัน</td>
    			 	</tr>
                    <tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">12.</td>
        				<td>
                        ท่านได้เล่นกีฬา หรือฝึกหนักเพื่อเสริมสร้างความแข็งแรง หรือทำกิจกรมมนันทนาการยามว่าง ที่ต้องออกแรงค่อนข้างมากนานเท่าไหร่ในแต่ละวัน?				              			
                        </td>
        				<td class="text-center">
                        	<input type="tel" name="p12h" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p12h"  class="dis11"  value="<?php echo $p12h; ?>" >
                            ชม.&nbsp;&nbsp;
                            <input type="tel" name="p12m" placeholder="-" style="width:50px; height:40px;" class="dis11" id="p12m"  value="<?php echo $p12m; ?>" >
                            นาที
                        </td>
      				</tr>
                    <tr class="active">
        				<td class="text-center">13.</td>
        				<td>
                        ท่านได้เล่นกีฬา หรือฝึกเพื่อเสริมสร้างความแข็งแรง หรือทำกิจกรรมนันทนาการยามว่าง ที่ออกแรงปานกลาง ทำให้ท่านหายใจถี่ขึ้น หรือหัวใจเต้นเร็วขึ้นเล็กน้อย เช่น เดินเร็ว ขี่จักรยาน ว่ายน้ำ ฟุตบอล ติดต่อกันอย่างน้อย 10 นาที								
                        </td>
        				<td class="text-center">
                        	<input type="radio" name="p13" class="css_radio" value="1" <?php if($p13 == 1) echo "checked"; ?>>
                       	  <font size="4"> ใช่ 
                            &nbsp;&nbsp;
                            <input type="radio" name="p13" class="css_radio" value="0" <?php if($p13 == 0) echo "checked"; ?>>
                          ไม่ใช่ </font>
                        </td>
      				</tr>
                    <tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">14.</td>
        				<td>
                        ท่านได้เล่นกีฬา หรือฝึกเพื่อเสริมสร้างความแข็งแรง หรือทำกิจกรรมนันทนาการยามว่าง ที่ออกแรงปานกลาง สัปดาห์ละกี่วัน?
                        </td>
        				<td class="text-center"><input type="tel" name="p14" maxlength="1" placeholder="-" style="width:30px; height:40px;" id="p14" class="dis14"  value="<?php echo $p14; ?>" >
       				  วัน</td>
    			 	</tr>
                    <tr class="css_row" bgcolor="#F5FFFA">
        				<td class="text-center">15.</td>
        				<td>
                        ท่านได้เล่นกีฬา หรือฝึกเพื่อเสริมสร้างความแข็งแรง หรือทำกิจกรรมนันทนาการยามว่าง ที่ออกแรงปานกลาง นานเท่าไหร่ในแต่ละวัน?		              			
                        </td>
        				<td class="text-center">
                        	<input type="tel" name="p15h" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p15h" class="dis14"  value="<?php echo $p15h; ?>" >
                        	ชม.
                   	    &nbsp;&nbsp;
                            <input type="tel" name="p15m" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p15m" class="dis14"  value="<?php echo $p15m; ?>" >
                            นาที
                        </td>
      				</tr>
           	  </tbody>
 		 </table>  
         
         
         <fieldset>
				<legend>พฤติกรรมการนั่ง (Sedentary behavior)</legend>	
         </fieldset> 
         <table class="table table-bordered">
            	<thead>
      				<tr class="danger">
       					<th WIDTH="5%" class="text-center">No.</th>
        				<th WIDTH="70%" class="text-center">คำถาม</th>
        				<th WIDTH="25%" class="text-center">คำตอบ</th>
     			    </tr>
   				</thead>
                <tbody> 
                	<tr class="info">
        				<td class="text-center">16.</td>
        				<td>
                        ในแต่ละวัน ท่านใช้เวลาไปกับการนั่งๆนอนๆนานเพียงเท่าใด?		              			
                        </td>
        				<td class="text-center">
                        	<input type="tel" name="p16h" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p16h"  value="<?php echo $p16h; ?>" >
                        	ชม.
                        	&nbsp;&nbsp;
                            <input type="tel" name="p16m" maxlength="2" placeholder="-" style="width:50px; height:40px;" id="p16m"  value="<?php echo $p16m; ?>" >
                        นาที</td>
      				</tr>
           	  </tbody>
 		 </table>  
         <div align="center"><br />
           
		   <input name="update2" type="submit" id="update2" value="&lt;&lt; ย้อนกลับ" onclick="history.back()" />
		   <?php
 if($Num_Rows>0){
?>
           <input name="update" type="submit" id="update" value="ปรับปรุง" />
 
<script type="text/javascript">  
$(function(){  
    $(".css_radio").on("click",function(){  
        var radio_val = $(this).val();  // เก็บค่าของ radio ที่เราคลิก  
        var radio_name = $(this).attr("name"); // เก็บชื่อ radio ที่เราคลิก    // eq เริ่มนับค่าที่ 0  
        if(radio_val==1 && radio_name=="p1"){ 
			$(".dis1").val('').prop(false); 
            $(".css_row").eq(0).show();  
             $(".css_row").eq(1).show();  
        }  
        if(radio_val==0 && radio_name=="p1"){  
			$(".dis1").val('').prop(false); 
            $(".css_row").eq(0).hide();  
             $(".css_row").eq(1).hide();  
        }          
        if(radio_val==1 && radio_name=="p4"){
			$(".dis4").val('').prop(false);   
            $(".css_row").eq(2).show();  
             $(".css_row").eq(3).show();  
        }  
        if(radio_val==0 && radio_name=="p4"){
			$(".dis4").val('').prop(false);   
            $(".css_row").eq(2).hide();  
             $(".css_row").eq(3).hide();  
        }
		if(radio_val==1 && radio_name=="p7"){
			$(".dis7").val('').prop(false);   
            $(".css_row").eq(4).show();  
             $(".css_row").eq(5).show();  
        }  
        if(radio_val==0 && radio_name=="p7"){
			$(".dis7").val('').prop(false);   
            $(".css_row").eq(4).hide();  
             $(".css_row").eq(5).hide();  
        }      
		if(radio_val==1 && radio_name=="p10"){
			$(".dis10").val('').prop(false);   
            $(".css_row").eq(6).show();  
             $(".css_row").eq(7).show();  
        }  
        if(radio_val==0 && radio_name=="p10"){
			$(".dis10").val('').prop(false);   
            $(".css_row").eq(6).hide();  
             $(".css_row").eq(7).hide();  
        }      
		if(radio_val==1 && radio_name=="p13"){
			$(".dis13").val('').prop(false);   
            $(".css_row").eq(8).show();  
             $(".css_row").eq(9).show();  
        }  
        if(radio_val==0 && radio_name=="p13"){
			$(".dis13").val('').prop(false);   
            $(".css_row").eq(8).hide();  
             $(".css_row").eq(9).hide();  
        }                        
    });  
})      
</script> 
          
           <?php } else {?>
           <input name="insert" type="submit" id="insert" value="เพิ่มข้อมูล" />

<script type="text/javascript">  
$(function(){  
  	$(".css_row").hide();
    $(".css_radio").on("click",function(){  
        var radio_val = $(this).val();  // เก็บค่าของ radio ที่เราคลิก  
        var radio_name = $(this).attr("name"); // เก็บชื่อ radio ที่เราคลิก    // eq เริ่มนับค่าที่ 0  
        if(radio_val==1 && radio_name=="p1"){ 
			$(".dis1").val('').prop(false); 
            $(".css_row").eq(0).show();  
             $(".css_row").eq(1).show();  
        }  
        if(radio_val==0 && radio_name=="p1"){  
			$(".dis1").val('').prop(false); 
            $(".css_row").eq(0).hide();  
             $(".css_row").eq(1).hide();  
        }          
        if(radio_val==1 && radio_name=="p4"){
			$(".dis4").val('').prop(false);   
            $(".css_row").eq(2).show();  
             $(".css_row").eq(3).show();  
        }  
        if(radio_val==0 && radio_name=="p4"){
			$(".dis4").val('').prop(false);   
            $(".css_row").eq(2).hide();  
             $(".css_row").eq(3).hide();  
        }
		if(radio_val==1 && radio_name=="p7"){
			$(".dis7").val('').prop(false);   
            $(".css_row").eq(4).show();  
             $(".css_row").eq(5).show();  
        }  
        if(radio_val==0 && radio_name=="p7"){
			$(".dis7").val('').prop(false);   
            $(".css_row").eq(4).hide();  
             $(".css_row").eq(5).hide();  
        }      
		if(radio_val==1 && radio_name=="p10"){
			$(".dis10").val('').prop(false);   
            $(".css_row").eq(6).show();  
             $(".css_row").eq(7).show();  
        }  
        if(radio_val==0 && radio_name=="p10"){
			$(".dis10").val('').prop(false);   
            $(".css_row").eq(6).hide();  
             $(".css_row").eq(7).hide();  
        }      
		if(radio_val==1 && radio_name=="p13"){
			$(".dis13").val('').prop(false);   
            $(".css_row").eq(8).show();  
             $(".css_row").eq(9).show();  
        }  
        if(radio_val==0 && radio_name=="p13"){
			$(".dis13").val('').prop(false);   
            $(".css_row").eq(8).hide();  
             $(".css_row").eq(9).hide();  
        }                        
    });  
})      
</script> 
<script src="js/CheckBoxGroup.js"></script>
<script src="js/bootstrap.min.js"></script>
                      <?php } ?>
</div>
  </form>
</body>

</body>
</html>