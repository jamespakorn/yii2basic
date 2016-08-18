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
<br>

<div class="container">
    <?php
if($_SESSION['pt_id'])
{$pt_id=$_SESSION['pt_id'];}
else {	
$pt_id=$_REQUEST['pt_id'];
}
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
     $sql_t1="SELECT * FROM pt_ask a  WHERE a.pt_id='". $pt_id . "'    ";
//echo  $sql_t1;
	 $result_t1 = mysql_query($sql_t1);
	 $Num_Rows  = mysql_num_rows($result_t1);
  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_t1))
		{						
$food 	    = $objResult['food'];
$emotion 	= $objResult['emotion'];
	}	
}
}		
?>

<form action="form_foodc.php" method="post" name="frmMain" id="frmMain">
<fieldset>

<legend>ข้อมูลส่วนตัว<span class="class">
<input type="tel" name="pt_id" id="pt_id" style="width:200px; height:40px;" maxlength="13"  value="<?php echo $pt_id; ?>" class="form-control css-require" readonly="readonly"/>
</span></legend>
<div class align="left">
  ID_Card :
  <input type="tel" name="id_card" id="id_card" style="width:200px; height:40px;" maxlength="13" placeholder="เลขบัตรประชาชน" onchange="showUser(this.value)" value="<?php echo $_SESSION['pt_cid']; ?>" class="form-control css-require" readonly="readonly"/>
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
    <legend>คัดกรองอาหาร  <?php if($food){echo $food." คะแนน" ; } ?></legend>	
    <br /> ท่านได้มีพฤติกรรมการบริโภคดังกล่าว กี่วัน ใน 1 สัปดาห์
 <?php
 if($Num_Rows>0){
?>
    <legend>  <input  name="targreement"  type="checkbox" id="targreement" onchange="checkboxxx()"  />
    ยืนยัน ปรับปรุงข้อมูลความอาหาร  
    </legend>
<?php } ?>    
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0-8	หมายถึง ท่านมีพฤติกรรมการทานอาหารที่ไม่เหมาะสม เป็นส่วนใหญ่<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9-17 	หมายถึง ท่านมีพฤติกรรมการทานอาหารที่ไม่เหมาะสม บางส่วน<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18-24	หมายถึง ท่านมีพฤติกรรมการทานอาหารที่เหมาะสม<br />
    </fieldset>	

  <table class="table table-bordered">
    <thead>
      <tr class="danger">
        <th WIDTH="55%" class="text-center">คัดกรองอาหาร</th>
        <th WIDTH="15%" class="text-center">ประจำ<br>(5-7วันต่อสัปดาห์)</th>
        <th WIDTH="15%" class="text-center">ครั้งคราว<br>(1-4วันต่อสัปดาห์)</th>
        <th WIDTH="15%" class="text-center">ไม่เคย</th>
      </tr>
    </thead>
    <tbody>
      <tr class="active">
        <td>1. กินอาหารครบ 5 หมู่ (ข้าว,ผัก,ผลไม้,เนื้อสัตว์,นม)</td>
        <td class="text-center"><input type="checkbox" name="food1" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food1" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food1" value="0"></td>
      </tr>
      <tr class="info">
        <td>2. กินอาหาร วันละ 3 มื้อ หนักเช้า เบาเที่ยง เลี่ยงเย็น</td>
        <td class="text-center"><input type="checkbox" name="food2" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food2" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food2" value="0"></td>
      </tr>
      <tr class="active">
        <td>3. กินผักมากกว่าวันละ 3 ทัพพี หรือ 1 ชาม</td>
        <td class="text-center"><input type="checkbox" name="food3" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food3" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food3" value="0"></td>
      </tr>
      <tr class="info">
        <td>4. กินผลไม้วันละ 2-3 ส่วน เช่น แอปเปิ้ล ฟรั่ง 2 ลูก มะละกอ ครึ่งลูก</td>
        <td class="text-center"><input type="checkbox" name="food4" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food4" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food4" value="0"></td>
      </tr>
      <tr class="active">
        <td>5. กินปลาอย่างน้อยวันละ 1 มื้อ</td>
        <td class="text-center"><input type="checkbox" name="food5" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food5" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food5" value="0"></td>
      </tr>
      <tr class="info">
        <td>6. ดื่มนมขาดมันเนยวันละ 1-2 แก้ว</td>
        <td class="text-center"><input type="checkbox" name="food6" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food6" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food6" value="0"></td>
      </tr>
      <tr class="active">
        <td>7. กินอาหารประเภทต้ม นึ่ง อบ ยำ ย่าง ลวก ตุ๋น</td>
        <td class="text-center"><input type="checkbox" name="food7" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food7" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food7" value="0"></td>
      </tr>
      <tr class="info">
        <td>8. หลีกเลี่ยงอาหารไขมันสูง เช่น เนื้อสัตว์ติดมัน กะทิ อาหารผัด ทอด</td>
        <td class="text-center"><input type="checkbox" name="food8" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food8" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food8" value="0"></td>
      </tr>
      <tr class="active">
        <td>9. หลีกเลี่ยงของหวานและขนม ที่มีแป้งและน้ำตาลมาก</td>
        <td class="text-center"><input type="checkbox" name="food9" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food9" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food9" value="0"></td>
      </tr>
      <tr class="info">
        <td>10. ไม่ปรุงน้ำปลาหรือเกลือในอาหารเพิ่ม</td>
        <td class="text-center"><input type="checkbox" name="food10" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food10" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food10" value="0"></td>
      </tr>
      <tr class="active">
        <td>11. เลือกดื่มน้ำเปล่าแทนน้ำอัดลม/น้ำหวาน/กาแฟ หรือ เครื่องดื่มต่างๆ</td>
        <td class="text-center"><input type="checkbox" name="food11" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food11" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food11" value="0"></td>
      </tr>
        <tr class="info">
        <td>12. อาหารว่างเลือกผลไม้แทนขนมหวาน</td>
        <td class="text-center"><input type="checkbox" name="food12" value="2"></td>
        <td class="text-center"><input type="checkbox" name="food12" value="1"></td>
        <td class="text-center"><input type="checkbox" name="food12" value="0"></td>
      </tr>
    </tbody>
  </table>
  					
    				<div align="center"></div>
<fieldset>

<legend>คัดกรองความเครียด  <?php if($emotion==1){echo "คุณมีความเครียดเล็กน้อย = ".$emotion." คะแนน" ; }
	elseif($emotion==2){echo "คุณมีความเครียดมากกว่าปกติ = ".$emotion." คะแนน" ; }
	elseif($emotion==0){echo "คุณมีไม่มีความเครียด = ".$emotion." คะแนน" ; }
	 ?>
<?php
 if($Num_Rows>0){
?>     
     </legend>	
    <legend>  <input  name="targreemente"  type="checkbox" id="targreemente" onchange="checkboxxx()"  />
    ยืนยัน ปรับปรุงข้อมูลความเครียด  
    </legend>
    <?php } ?>     
            <h5>โปรดทำเครื่องหมาย &#10003; ลงในช่องว่าง หรือ เดินให้ตรงกับสภาพความเป็นจริงของคุณ</h5>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ไม่เคยเลย	หมายถึง ไม่มีอาการ <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เป็นครั้งคราว 	หมายถึง มีอาการพฤติกรรม หรือความรู้สึก 1-2 วัน/สัปดาห์ <br />
		ในระยะเวลา 2 สัปดาห์ ที่ผ่านมา คุณมีอาการ พฤติกรรม หรือความรู้สึกต่อไปนี้มากน้อยเพียงใด
    </fieldset>	

  		<table class="table table-bordered">
     			<tr class="info">
        			<td WIDTH="5%" class="text-center" rowspan="2" style="font-size:20px"><br />ลำดับ</td>
       				<td WIDTH="40%" class="text-center" rowspan="2" style="font-size:20px"><br />อาการ พฤติกรรมหรือความรู้สึก</td>
        			<td WIDTH="40%" class="text-center" colspan="4" style="font-size:20px;">ระดับอาการ</td>
      			</tr>
                <tr class="info">
                	<td WIDTH="30%" class="text-center">มี</td>
                    <td WIDTH="30%" class="text-center">ไม่มี</td>
                </tr>
                	<tr class="active">
        				<td class="text-center">1</td>
                        <td>ใน 2 สัปดาห์ที่ผ่านมารวมวันนี้ท่านรู้สึกหดหู่ เศร้า หรือท้อแท้สิ้นหวังหรือไม่</td>
                        <td class="text-center"><input type="checkbox" name="emotion1" value="1"></td>
        				<td class="text-center"><input type="checkbox" name="emotion1" value="0"></td>
      				</tr>
                	<tr class="warning">
        				<td class="text-center">2</td>
                        <td>ใน 2 สัปดาห์ที่ผ่านมารวมวันนี้ท่านรู้สึกเบื่อ ทำอะไร ก็ไม่เพลิดเพลินเหรือไม่</td>
                        <td class="text-center"><input type="checkbox" name="emotion2" value="1"></td>
        				<td class="text-center"><input type="checkbox" name="emotion2" value="0"></td>
      				</tr>
		</table>
        
<div align="center">
  <p>&nbsp;</p>
  <p>
                        <input name="update2" type="submit" id="update2" value="&lt;&lt; ย้อนกลับ" onclick="history.back()" />
                        <?php
 if($Num_Rows>0){
?>
                        <input name="update" type="submit" id="update" value="ปรับปรุง"  disabled="disabled"  />
                        <?php } else {?>
                        <input name="insert" type="submit" id="insert" value="เพิ่มข้อมูล" />
                        <?php } ?>
                      </p>
</div>
                    
  </form>
</div>
<script type="text/JavaScript">
function checkboxxx() { //v3.0
            if (document.frmMain.targreement.checked == true) {
                document.frmMain.update.disabled = false;
            } else  if (document.frmMain.targreemente.checked == true) {
                document.frmMain.update.disabled = false;
            } else {
                document.frmMain.update.disabled = true;
            }
        }

</script>
<script>
$(document).ready(function(){
    var whichOne,current;
    $(":checkbox").click(function(){
        current = $(this);
        curact = current.attr("checked");
        whichOne = current.attr("name"); 
        $("input[name='"+whichOne+"']:checkbox")
        .removeAttr("checked");
        current.prop('checked',true);      
    });
});
</script>
<script src="js/CheckBoxGroup.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>