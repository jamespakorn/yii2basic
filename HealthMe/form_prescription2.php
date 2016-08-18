<?php include"head.php"; ?>
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">  
<link href="css/validator.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script  src="js/jquery-1.3.2.min.js"></script>
<script  src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script src="js/jquery.min.js"></script>
<script  src="js/bootstrap.js"></script>
<script type="text/javascript">

        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//	document.getElementById("spname").value = xmlhttp.responseText;
						var ret=xmlhttp.responseText; //รับค่ากลับมา
								datas=ret.split(',') ;//แยกกลับเป็น Array เหมือนเดิม
								document.getElementById("spname").value=datas[0]; //แสดงผล               }
								document.getElementById("hn").value=datas[1]; //แสดงผล               }
								document.getElementById("age").value = datas[2];
								document.getElementById("sex").value = datas[3];
								document.getElementById("weight").value=datas[4]; //แสดงผล               }
								document.getElementById("height").value=datas[5]; //แสดงผล               }
								document.getElementById("waist").value=datas[6]; //แสดงผล               }
								document.getElementById("pulse").value=datas[7]; //แสดงผล               }
								document.getElementById("pressure").value=datas[8]+ '/ '+datas[9];    
								document.getElementById("pt_bps").value=datas[8];   
								document.getElementById("pt_bpd").value=datas[9];    
								document.getElementById("pt_occ").value=datas[10]; 
								document.getElementById("dateInput").value=datas[11]; 
								document.getElementById("fbs").value=datas[12]; 
								document.getElementById("tg").value=datas[13]; 
								document.getElementById("hdl").value=datas[14]; 
								document.getElementById("cho").value=datas[15]; 
								document.getElementById("ldl").value=datas[16]; 
								document.getElementById("bun").value=datas[17]; 
								document.getElementById("cr").value=datas[18]; 
								document.getElementById("hct").value=datas[19]; 
				}
			}
            xmlhttp.open("GET", "regisgetIDCard.php?q=" + str, true);
            xmlhttp.send();
        }
</script>

<script type="text/javascript">
	$(function(){  
    // แทรกโค้ต jquery  
    $("#dateInput").datepicker({ dateFormat: 'yy-mm-dd' });  
    // รูปแบบวันที่ที่ได้จะเป็น 2009-08-16  
});  
	        function checkboxxx(){ //v3.0
            if (document.frmMain.MemArgeement.checked==true)
            {
                document.frmMain.btnsave.disabled=false;
            }else{
                document.frmMain.btnsave.disabled=true;
            }
        }
        $(function () {
            var obj_check = $(".css-require");
            $("#frmMain").on("submit", function () {
                obj_check.each(function (i, k) {
                    var status_check = 0;
                    if (obj_check.eq(i).find(":radio").length > 0 || obj_check.eq(i).find(":checkbox").length > 0) {
                        status_check = (obj_check.eq(i).find(":checked").length == 0) ? 0 : 1;
                    } else {
                        status_check = ($.trim(obj_check.eq(i).val()) == "") ? 0 : 1;
                    }
                    formCheckStatus($(this), status_check);
                });
                if ($(this).find(".has-error").length > 0) {
                    return false;
                }
            });

            obj_check.on("change", function () {
                var status_check = 0;
                if ($(this).find(":radio").length > 0 || $(this).find(":checkbox").length > 0) {
                    status_check = ($(this).find(":checked").length == 0) ? 0 : 1;
                } else {
                    status_check = ($.trim($(this).val()) == "") ? 0 : 1;
                }
                formCheckStatus($(this), status_check);
            });

            var formCheckStatus = function (obj, status) {
                if (status == 1) {
                    obj.parent(".form-group").removeClass("has-error").addClass("has-success");
                    obj.next(".glyphicon").removeClass("glyphicon-warning-sign").addClass("glyphicon-ok");
                } else {
                    obj.parent(".form-group").removeClass("has-success").addClass("has-error");
                    obj.next(".glyphicon").removeClass("glyphicon-ok").addClass("glyphicon-warning-sign");
                }
            }

        });

</script>  
<style type="text/css">  
.ui-datepicker{  
    width:150px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
}  
</style>  
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
     $sql_t1="SELECT * FROM pt_precription p   WHERE p.pt_id='". $pt_id . "'    ";
//echo  $sql_t1;
	 $result_t1 = mysql_query($sql_t1);
	 $Num_Rows  = mysql_num_rows($result_t1);
  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_t1))
		{						
$want_fit = $objResult['want_fit'];
$want_dm = $objResult['want_dm'];
$want_ht = $objResult['want_ht'];
$want_ldl = $objResult['want_ldl'];
$want_hdl = $objResult['want_hdl'];
$want_heart = $objResult['want_heart'];
$want_mas = $objResult['want_mas'];
$want_oa = $objResult['want_oa'];
$want_emotion = $objResult['want_emotion'];
$sweet 	= $objResult['sugar'];
$sweet_t 	= $objResult['sugar_t'];
$salt 	= $objResult['salt'];
$salt_t 	= $objResult['salt_t'];
$fat 	= $objResult['fat'];
$fat_t 	= $objResult['fat_t'];
$ex1 	= $objResult['ex1'];
$ex1_text 	= $objResult['ex1_text'];
$ex2 	= $objResult['ex2'];
$ex2_text 	= $objResult['ex2_text'];
	}	
}
}
?>
  <form action="form_prescriptionc.php" method="post" name="frmMain">
<fieldset>

<legend>ข้อมูลส่วนตัว<span class="class">
<input type="tel" name="pt_id" id="pt_id"  maxlength="13"  value="<?php echo $_SESSION['pt_id']; ?>" class="form-control css-require" readonly="readonly"/>
</span></legend>
<div class align="left">
  ID_Card :
  <input type="tel" name="id_cid" id="id_cid"  maxlength="13" placeholder="เลขบัตรประชาชน" onchange="showUser(this.value)" value="<?php echo $_SESSION['pt_cid']; ?>" class="form-control css-require" readonly="readonly"/>
  <br />
</div>
 <div class="form-group has-feedback">
<div class align="left">
Name : &nbsp;&nbsp;&nbsp;
<input type="text" name="spname"  maxlength="50" placeholder="ชื่อ - สกุล" id="spname" value="<?php echo $_SESSION['pt_name']; ?>"  class="form-control css-require" readonly="readonly"/> <br /></div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
</div>

<div class align="left">
HN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="hn" id="hn" placeholder="เลข HN"  maxlength="11" value="<?php echo $_SESSION['pt_hn']; ?>"  class="form-control css-require" readonly="readonly"/>
 <br /></div>


<div class align="left"><br />
</div>
</fieldset>

<fieldset>
<div class align="left">
<h5>เลือกใบสั่งสุขภาพ </h5>
<h5>เป้าหมายร่วมกัน [ให้ผู้รับบริการเลือก สามารถเลือกได้มากกว่า 1 ข้อ เน้นว่าเป้นข้อที่อยากให้สำเร็จใน 3 เดือน]</h5>
	<li><input name="want_fit" type="checkbox" class="css_chk3" id="want_fit" value="1" <?php if($want_fit == 1) echo "checked"; ?>>
	&nbsp; ลดน้ำหนัก </li>
                <li><input name="want_dm" type="checkbox" class="css_chk3" id="want_dm" value="1" <?php if($want_dm == 1) echo "checked"; ?>>
    &nbsp; คุมระดับน้ำตาล </li>
   	<li><input name="want_ht" type="checkbox" class="css_chk3" id="want_ht" value="1" <?php if($want_ht == 1) echo "checked"; ?>>
    &nbsp; ลดความดันโลหิต</li>
                <li><input name="want_ldl" type="checkbox" class="css_chk3" id="want_ldl" value="1" <?php if($want_ldl == 1) echo "checked"; ?>>
    &nbsp; ลดระดับไขมันตัวร้าย</li>
				<li><input name="want_hdl" type="checkbox" class="css_chk3" id="want_hdl" value="1" <?php if($want_hdl == 1) echo "checked"; ?>>
	&nbsp; เพิ่มระดับไขมันดี</li>
                <li><input name="want_heart" type="checkbox" class="css_chk3" id="want_heart" value="1" <?php if($want_heart == 1) echo "checked"; ?>>
    &nbsp; เพิ่มความแข็งแรงของหัวใจ</li>
   	<li><input name="want_mas" type="checkbox" class="css_chk3" id="want_mas" value="1" <?php if($want_mas == 1) echo "checked"; ?>>
    &nbsp; ลดอาการปวดกล้ามเนื้อ </li>
<li><input name="want_oa" type="checkbox" class="css_chk3" id="want_oa" value="1" <?php if($want_oa == 1) echo "checked"; ?>>
               	&nbsp; ชะลออาการเข่าเสื่อมป้องกันโรคแทรกซ้อน<br />

<li><input name="want_emotion" type="checkbox" class="css_chk3" id="want_emotion" value="1" <?php if($want_emotion == 1) echo "checked"; ?>>
               	&nbsp; ลดภาวะเครียดหรือเศร้า<br />
</fieldset>
<br />

	  <input name="update2" type="submit" id="update2" value="&lt;&lt; ย้อนกลับ" onclick="history.back()" />
	  <?php
 if($Num_Rows>0){
?>
<input name="update" type="submit" id="update" value="ปรับปรุง" />

<?php } else {?>
<input name="insert" type="submit" id="insert" value="เพิ่มข้อมูล" />
<?php } ?>
</p>

</form>


<hr />
<form method="post" action="form_agreementc.php" name="form1" id="form1">  
<fieldset>
<?php
  if($pt_id<>"") {
     $sql_t1="SELECT * FROM pt_precription a  WHERE a.pt_id='". $pt_id . "'    ";
//echo  $sql_t1;
	 $result_t1 = mysql_query($sql_t1);
	 $Num_Rows  = mysql_num_rows($result_t1);
  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_t1))
		{						
$sweet_t 	= $objResult['sugar_t'];
$salt_t 	= $objResult['salt_t'];
$fat_t 	    = $objResult['fat_t'];
$sweet 	= $objResult['sugar'];
$salt 	= $objResult['salt'];
$fat 	    = $objResult['fat'];

	}	
}
}		
?>

				<legend>ตัวเลือกลักษณะนิสัยการทานอาหาร<span class="class">
				<input type="hidden" name="pt_id" id="pt_id"  maxlength="13"  value="<?php echo $_SESSION['pt_id']; ?>" class="form-control css-require" />
				</span></legend>	
   	</fieldset>	
		<table class="table table-bordered" >
      			<tr class="info">
        			<th WIDTH="33%" class="text-center" style="background-color:#FFEBCD">
        			  <textarea name="box1" id="box1" cols="50" rows="5"><?php echo $sweet_t; ?></textarea>
        			</td>
       				<th WIDTH="33%" class="text-center" style="background-color:#CCFFFF">
       				  <textarea name="box2" id="box2" cols="50" rows="5"><?php echo $salt_t; ?></textarea>
   				  </td>
       				<th WIDTH="33%" class="text-center" style="background-color:#CCFF99">
       				  <textarea name="box3" id="box3" cols="50" rows="5"><?php echo $fat_t; ?></textarea>
       				</th>
		  </tr>
                
    </table>
		<table class="table table-bordered">
    		<thead>

      			<tr class="info">
        			<th WIDTH="33%" class="text-center">
                    <input type="checkbox" name="dis_sweet" class="css_chkboxd1" value="1" onClick="ask1(this.value)" <?php if($sweet == 1) echo "checked"; ?>>&nbsp;&nbsp;หวาน</th>
        			<th WIDTH="33%" class="text-center">
                    <input type="checkbox" name="dis_salt" class="css_chkboxd2" value="1"  onClick="ask2(this.value)" <?php if($salt == 1) echo "checked"; ?>>&nbsp;&nbsp;เค็ม</th>
        			<th WIDTH="33%" class="text-center">
                    <input type="checkbox" name="dis_fat" class="css_chkboxd3" value="1"  onClick="ask3(this.value)" <?php if($fat == 1) echo "checked"; ?> >&nbsp;&nbsp;ไขมัน</th>
      			</tr>
    		</thead>
    	<tbody>
       <?php 
 if($Num_Rows>0){	   
	   ?>

      <?php } ?>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd1">
                    <input type="checkbox" name="sweet1" id="sweet1" class="css_dis_main1" value="ลดการเติมน้ำตาลเพิ่ม"  onClick="ask1(this.value)" >&nbsp;&nbsp;ลดการเติมน้ำตาลเพิ่ม</div></td>
       				<td style="background-color:#CCFFFF"><div class="css_rowd2">
                    <input type="checkbox" name="salt1" class="css_dis_main2" value="ลดการเติมน้ำปลาเพิ่ม" onClick="ask2(this.value)">&nbsp;&nbsp;ลดการเติมน้ำปลาเพิ่ม</div></td>
       				<td style="background-color:#CCFF99"><div class="css_rowd3">
       				  <input type="checkbox" name="fat1" id="fat1" class="css_dis_main3" value="ใช้น้ำมันพืชประกอบอาหาร" onclick="ask3(this.value)" >
       				  &nbsp;&nbsp;ใช้น้ำมันพืชประกอบอาหาร</div></td>
      			</tr>                <tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd1">
                    <input type="checkbox" name="sweet2"id="sweet2" class="css_dis_main1" value="ลดข้าวเหนียวลงไม่เกิน มื้อละ 3 ปั้น"onclick="ask1(this.value)"  >&nbsp;&nbsp;ลดข้าวเหนียวลงไม่เกิน มื้อละ 3 ปั้น</div></td>
       				<td style="background-color:#CCFFFF"><div class="css_rowd2">
                    <input type="checkbox" name="salt2" class="css_dis_main2" value="ใช้เกลือ น้ำปลา ซีอิ๊ว ซอสหอยนางรม ซอสถั่วเหลืองให้น้อย"onclick="ask2(this.value)">&nbsp;&nbsp;ใช้เกลือ น้ำปลา ซีอิ๊ว ซอสหอยนางรม ซอสถั่วเหลืองให้น้อย</div></td>
       				<td style="background-color:#CCFF99"><div class="css_rowd3">
       				  <input type="checkbox" name="fat2" class="css_dis_main3" value="ทานอกไก่ ปลา หมูสันใน" onclick="ask3(this.value)" >
       				  &nbsp;&nbsp;ทานอกไก่ ปลา หมูสันใน</div></td>
      			</tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd1">
        			  <input type="checkbox" name="sweet3" id="sweet3" class="css_dis_main1" value="ทานข้าวเจ้าหรือข้าวกล้องไม่เกินวันละ 6 ทัพพี" onclick="ask1(this.value)" />
        			  &nbsp;&nbsp;ทานข้าวเจ้าหรือข้าวกล้องไม่เกินวันละ 6 ทัพพี</div></td>
       				<td style="background-color:#CCFFFF"><div class="css_rowd2">
                    <input type="checkbox" name="salt3" class="css_dis_main2" value="เลี่ยงผงชูรส" onClick="ask2(this.value)">&nbsp;&nbsp;เลี่ยงผงชูรส</div></td>
       				<td style="background-color:#CCFF99"><div class="css_rowd3">
                    <input type="checkbox" name="fat3" class="css_dis_main3" value="ทานไข่ได้สัปดาห์ละ 3 ฟอง" onClick="ask3(this.value)">&nbsp;&nbsp;ทานไข่ได้สัปดาห์ละ 3 ฟอง</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd1">
                    <input type="checkbox" name="sweet4" id="sweet4" class="css_dis_main1" value="สั่งหวานน้อย" onclick="ask1(this.value)" >&nbsp;&nbsp;สั่งหวานน้อย</div></td>
       				<td style="background-color:#CCFFFF"><div class="css_rowd2">
                    <input type="checkbox" name="salt4" class="css_dis_main2" value="สั่งอาหารเค็มน้อย" onClick="ask2(this.value)">&nbsp;&nbsp;สั่งอาหารเค็มน้อย</div></td>
       				<td style="background-color:#CCFF99"><div class="css_rowd3">
                    <input type="checkbox" name="fat4" class="css_dis_main3" value="ดื่มนมสดไขมันต่ำ วันละแก้ว" onClick="ask3(this.value)">&nbsp;&nbsp;ดื่มนมสดไขมันต่ำ วันละแก้ว</div></td>
      			</tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd1">
                    <input type="checkbox" name="sweet5" class="css_dis_main1" value="ทาน ฝรั่ง ชมพู่ แอปเปิ้ล" onclick="ask1(this.value)">&nbsp;&nbsp;ทาน ฝรั่ง ชมพู่ แอปเปิ้ล</div></td>
       				<td style="background-color:#FF9999"><div class="css_rowd2">&nbsp;&nbsp;ระวัง</div></td>
       				<td style="background-color:#CCFF99"><div class="css_rowd3">
                    <input type="checkbox" name="fat5" class="css_dis_main3" value="งดเนื้อสัตว์ติดมัน,หนัง" onClick="ask3(this.value)">&nbsp;&nbsp;งดเนื้อสัตว์ติดมัน/หนัง</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FF9999"><div class="css_rowd1">&nbsp;&nbsp;ระวัง</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
       				  <input type="checkbox" name="salt6" class="css_dis2" value="ระวังไส้กรอก" onclick="ask2(this.value)" />
       				  &nbsp;&nbsp;ไส้กรอก</div></td>
       				<td style="background-color:#CCFF99"><div class="css_rowd3">
                    <input type="checkbox" name="fat6" class="css_dis_main3" value="ทานอาหาหรนึ่ง ต้ม ตุ๋น อบ ย่าง" onClick="ask3(this.value)">&nbsp;&nbsp;ทานอาหาหรนึ่ง ต้ม ตุ๋น อบ ย่าง</div></td>
      			</tr>                	
				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet7" class="css_dis1" value="ระวังกาแฟทรีอินวัน" onclick="ask1(this.value)">&nbsp;&nbsp;กาแฟทรีอินวัน</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt7" class="css_dis2" value="ระวังเบคอน"onClick="ask2(this.value)">&nbsp;&nbsp;เบคอน</div></td>
       				<td style="background-color:#CCFF99"><div class="css_rowd3">
                    <input type="checkbox" name="fat7" class="css_dis_main3" value="ทานฝรั่ง ชมพู่ แอปเปิ้ล"onClick="ask3(this.value)">&nbsp;&nbsp;ทานฝรั่ง ชมพู่ แอปเปิ้ล</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet8" class="css_dis1" value="ระวังน้ำอัดลม" onClick="ask1(this.value)">&nbsp;&nbsp;น้ำอัดลม</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt8" class="css_dis2" value="ระวังหมูยอ" onClick="ask2(this.value)">&nbsp;&nbsp;หมูยอ</div></td>
       				<td style="background-color:#FF9999"><div class="css_rowd3">&nbsp;&nbsp;ระวัง</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet9" class="css_dis1" value="ระวังชาเขียว" onClick="ask1(this.value)">&nbsp;&nbsp;ชาเขียว</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt9" class="css_dis2" value="ระวังกุนเเชียง" onClick="ask2(this.value)">&nbsp;&nbsp;กุนเเชียง</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat9" class="css_dis3" value="ระวังกาแฟทรีอินวัน" onClick="ask3(this.value)">&nbsp;&nbsp;กาแฟทรีอินวัน</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet10" class="css_dis1" value="เระวังครื่องดื่มถุงใส่นมข้นหวาน" onClick="ask1(this.value)">&nbsp;&nbsp;เครื่องดื่มถุงใส่นมข้นหวาน</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt10" class="css_dis2" value="ระวังแหนม" onClick="ask2(this.value)">&nbsp;&nbsp;แหนม</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat10" class="css_dis3" value="ระวังน้ำอัดลม"onClick="ask3(this.value)">&nbsp;&nbsp;น้ำอัดลม</div></td>
      			</tr>
				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet11" class="css_dis1" value="ระวังนมเปรี้ยว" onClick="ask1(this.value)">&nbsp;&nbsp;นมเปรี้ยว</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt11" class="css_dis2" value="ระวังไข่เค็ม" onClick="ask2(this.value)">&nbsp;&nbsp;ไข่เค็ม</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat11" class="css_dis3" value="ระวังชาเขียว"onClick="ask3(this.value)">&nbsp;&nbsp;ชาเขียว</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet12" class="css_dis1" value="ระวังขนมขบเคี้ยว" onClick="ask1(this.value)">&nbsp;&nbsp;ขนมขบเคี้ยว</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt12" class="css_dis2" value="ระวังปลาเค็ม" onClick="ask2(this.value)">&nbsp;&nbsp;ปลาเค็ม</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat12" class="css_dis3" value="ระวังเครื่องดื่มถุงใส่นมข้นหวาน" onClick="ask3(this.value)">&nbsp;&nbsp;เครื่องดื่มถุงใส่นมข้นหวาน</div></td>
      			</tr>
				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet13" class="css_dis1" value="ระวังเค้ก" onClick="ask1(this.value)">&nbsp;&nbsp;เค้ก</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt13" class="css_dis2" value="ระวังกะปิ" onClick="ask2(this.value)">&nbsp;&nbsp;กะปิ</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat13" class="css_dis3" value="ระวังนมเปรี้ยว" onClick="ask3(this.value)">&nbsp;&nbsp;นมเปรี้ยว</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet14" class="css_dis1" value="ระวังคุกกี้" onClick="ask1(this.value)">&nbsp;&nbsp;คุกกี้</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt14" class="css_dis2" value="ระวังปลาร้า" onClick="ask2(this.value)">&nbsp;&nbsp;ปลาร้า</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat14" class="css_dis3" value="ไระวังส้กรอก" onClick="ask3(this.value)">&nbsp;&nbsp;ไส้กรอก</div></td>
      			</tr>                
				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet15" class="css_dis1" value="ระวังโดนัท" onClick="ask1(this.value)">&nbsp;&nbsp;โดนัท</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt15" class="css_dis2" value="ระวังแจ่ว" onClick="ask2(this.value)">&nbsp;&nbsp;แจ่ว</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat15" class="css_dis3" value="ระวังเบคอน" onClick="ask1(this.value)">&nbsp;&nbsp;เบคอน</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet16" class="css_dis1" value="ระวังขนมหวานใส่กะทิ" onClick="ask1(this.value)">&nbsp;&nbsp;ขนมหวานใส่กะทิ</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt16" class="css_dis2" value="ระวังเฟรนช์ฟรายส์" onClick="ask2(this.value)">&nbsp;&nbsp;เฟรนช์ฟรายส์</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat16" class="css_dis3" value="ระวังหมูยอ" onClick="ask3(this.value)">&nbsp;&nbsp;หมูยอ</div></td>
      			</tr> 
				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet17" class="css_dis1" value="ระวังชานมไข่มุก"  onClick="ask1(this.value)">&nbsp;&nbsp;ชานมไข่มุก</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt17" class="css_dis2" value="ระวังแฮมเบอร์เกอร์"  onClick="ask2(this.value)">&nbsp;&nbsp;แฮมเบอร์เกอร์</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat17" class="css_dis3" value="ระวังกุนเชียง"  onClick="ask3(this.value)">&nbsp;&nbsp;กุนเชียง</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet18" class="css_dis1" value="ระวังไอศครีม" onClick="ask1(this.value)">&nbsp;&nbsp;ไอศครีม</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt18" class="css_dis2" value="ระวังขนมขบเคี้ยว" onClick="ask2(this.value)">&nbsp;&nbsp;ขนมขบเคี้ยว</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat18" class="css_dis3" value="ระวังแหนม"  onClick="ask3(this.value)">&nbsp;&nbsp;แหนม</div></td>
      			</tr>                
				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet19" class="css_dis1" value="ระวังทองหยิบทองหยอด" onClick="ask1(this.value)">&nbsp;&nbsp;ทองหยิบทองหยอด</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt19" class="css_dis2" value="ระวังพาย ขนมปัง" onClick="ask2(this.value)">&nbsp;&nbsp;พาย ขนมปัง</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat19" class="css_dis3" value="ระวังปาท่องโก๋" onClick="ask3(this.value)">&nbsp;&nbsp;ปาท่องโก๋</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet20" class="css_dis1" value="ระวังทุเรียน" onClick="ask1(this.value)">&nbsp;&nbsp;ทุเรียน</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt20" class="css_dis2" value="ระวังข้าวคลุกกะปิ" onClick="ask2(this.value)">&nbsp;&nbsp;ข้าวคลุกกะปิ</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat20" class="css_dis3" value="ระวังเนย มาการีน มายองเนส" onClick="ask3(this.value)">&nbsp;&nbsp;เนย มาการีน มายองเนส</div></td>
      			</tr>                
				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet21" class="css_dis1" value="ระวังแตงโม" onClick="ask1(this.value)">&nbsp;&nbsp;แตงโม</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt21" class="css_dis2" value="ระวังบะหมี่กึ่งสำเร็จรูป"  onClick="ask2(this.value)">&nbsp;&nbsp;บะหมี่กึ่งสำเร็จรูป</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat21" class="css_dis3" value="ระวังกล้วย,มัน,เผือกทอด" onClick="ask3(this.value)">&nbsp;&nbsp;กล้วย,มัน,เผือกทอด</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet22" class="css_dis1" value="ระวังสับปะรด"  onClick="ask1(this.value)">&nbsp;&nbsp;สับปะรด</div></td>
       				<td style="background-color:#F0FFF0"><div class="css_row2">
                    <input type="checkbox" name="salt22" class="css_dis2" value="ระวังอาหารหมัก,ดอง"  onClick="ask2(this.value)">&nbsp;&nbsp;อาหารหมัก/ดอง</div></td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat22" class="css_dis3" value="ระวังเฟรนช์ฟรายส์"  onClick="ask3(this.value)">&nbsp;&nbsp;เฟรนช์ฟรายส์</div></td>
      			</tr>                
				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet23" class="css_dis1" value="ระวังแก้วมังกร"  onClick="ask1(this.value)">&nbsp;&nbsp;แก้วมังกร</div></td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat23" class="css_dis3" value="ระวังแฮมเบอร์เกอร์"  onClick="ask3(this.value)">&nbsp;&nbsp;แฮมเบอร์เกอร์</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet24" class="css_dis1" value="ระวังลองกอง , ลำไย"  onClick="ask1(this.value)">&nbsp;&nbsp;ลองกอง , ลำไย</div></td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat24" class="css_dis3" value="ระวังน้ำครีมสลัด"  onClick="ask3(this.value)">&nbsp;&nbsp;น้ำครีมสลัด</div></td>
      			</tr>                
 				<tr>
        			<td style="background-color:#FFFFCC"><div class="css_row">
                    <input type="checkbox" name="sweet25" class="css_dis1" value="ระวังองุ่น"  onClick="ask1(this.value)">&nbsp;&nbsp;องุ่น</div></td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat25" class="css_dis3" value="ระวังขนมขบเคี้ยว" onClick="ask3(this.value)">&nbsp;&nbsp;ขนมขบเคี้ยว</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat26" class="css_dis3" value="ระวังเค้ก"onClick="ask3(this.value)">&nbsp;&nbsp;เค้ก</div></td>
      			</tr> 
				<tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat27" class="css_dis3" value="ระวังคุกกี้"onClick="ask3(this.value)">&nbsp;&nbsp;คุกกี้</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat28" class="css_dis3" value="โระวังดนัท"onClick="ask3(this.value)">&nbsp;&nbsp;โดนัท</div></td>
      			</tr>
				<tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat29" class="css_dis3" value="ระวังพาย"onClick="ask3(this.value)">&nbsp;&nbsp;พาย</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat30" class="css_dis3" value="ระวังขนมปัง"onClick="ask3(this.value)">&nbsp;&nbsp;ขนมปัง</div></td>
      			</tr>                                              
				<tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat31" class="css_dis3" value="ระวังขนมหวานใส่กะทิ"onClick="ask3(this.value)">&nbsp;&nbsp;ขนมหวานใส่กะทิ</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat32" class="css_dis3" value="ระวังชานมไข่มุก"onClick="ask3(this.value)">&nbsp;&nbsp;ชานมไข่มุก</div></td>
      			</tr>
				<tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat33" class="css_dis3" value="ระวังไอศครีม"onClick="ask3(this.value)">&nbsp;&nbsp;ไอศครีม</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat34" class="css_dis3" value="ระวังทองหยิบทองหยอด"onClick="ask3(this.value)">&nbsp;&nbsp;ทองหยิบทองหยอด</div></td>
      			</tr>                
				<tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat35" class="css_dis3" value="ระวังทุเรียน"onClick="ask3(this.value)">&nbsp;&nbsp;ทุเรียน</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat36" class="css_dis3" value="ระวังอาหารทะเลที่ไม่ใช่ปลา"onClick="ask3(this.value)">&nbsp;&nbsp;อาหารทะเลที่ไม่ใช่ปลา</div></td>
      			</tr>
				<tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat37" class="css_dis3" value="ระวังแกงที่มีกะทิ"onClick="ask3(this.value)">&nbsp;&nbsp;แกงที่มีกะทิ</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat38" class="css_dis3" value="ระวังข้าวมันไก่"onClick="ask3(this.value)">&nbsp;&nbsp;ข้าวมันไก่</div></td>
      			</tr>                
				<tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat39" class="css_dis3" value="ระวังหอยทอด ผัดไทย"onClick="ask3(this.value)">&nbsp;&nbsp;หอยทอด ผัดไทย</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat40" class="css_dis3" value="ระวังไข่เจียว,ไข่ดาว"onClick="ask3(this.value)">&nbsp;&nbsp;ไข่เจียว/ไข่ดาว</div></td>
      			</tr>
				<tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat41" class="css_dis3" value="ระวังข้าวขาหมู"onClick="ask3(this.value)">&nbsp;&nbsp;ข้าวขาหมู</div></td>
      			</tr>
                <tr>
        			<td style="background-color:#FFFFCC">                    </td>
       				<td style="background-color:#F0FFF0">                    </td>
       				<td style="background-color:#FFE3EE"><div class="css_row3">
                    <input type="checkbox" name="fat42" class="css_dis3" value="ระวังข้าวคลุกกะปิ"onClick="ask3(this.value)">&nbsp;&nbsp;ข้าวคลุกกะปิ</div></td>
      			</tr> 
		  </tbody>                
		</table>  
   				<legend>ตัวเลือก การออกกำลังกาย </legend>
     
        
        <table class="table table-bordered" >
      			<tr class="info">
        			<th WIDTH="33%" class="text-center" style="background-color:#FFEBCD">
        			  <textarea name="box4" id="box4" cols="150" rows="5"><?php echo $ex1_text; ?></textarea>
        			</td>
       				<th WIDTH="33%" class="text-center" style="background-color:#CCFFFF">
       				  <textarea name="box5" id="box5" cols="150" rows="5"><?php echo $ex2_text; ?></textarea>
   				  </td>
		  </tr>
                
    </table> 
    <table class="table table-bordered">
    		<thead>

      			<tr class="info">
        			<th WIDTH="33%" class="text-center">
                    <input name="ex1" type="checkbox" class="css_chkboxd4" id="ex1" onClick="ask4(this.value)" value="1" <?php if($ex1 == 1) echo "checked"; ?>>
                    &nbsp;&nbsp;Cardiopulmonary</th>
        			<th WIDTH="33%" class="text-center">
                    <input name="ex2" type="checkbox" class="css_chkboxd5" id="ex2"  onClick="ask5(this.value)" value="1" <?php if($ex2 == 1) echo "checked"; ?>>
&nbsp;&nbsp;ยืดเหยียดกล้ามเนื้อ</th>
       			</tr>
    		</thead>
    	<tbody>
       <?php 
 if($Num_Rows>0){	   
	   ?>

      <?php } ?>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_1" id="ex1_1" class="css_dis_main4" value="เดินเร็ว"  onClick="ask4(this.value)" >
                    &nbsp;&nbsp;เดินเร็ว</div></td>
       				<td style="background-color:#CCFFFF"><div class="css_rowd5">
                    <input type="checkbox" name="ex2_1" id="ex2_1" class="css_dis_main5" value="โยคะ" onClick="ask5(this.value)" >
                    &nbsp;&nbsp;โยคะ</div></td>
   				</tr>                <tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_2"id="ex1_2" class="css_dis_main4" value="วิ่ง"onclick="ask4(this.value)"  >
                    &nbsp;&nbsp;วิ่ง</div></td>
       				<td style="background-color:#CCFFFF"><div class="css_rowd5">
                    <input type="checkbox" name="ex2_2"  id="ex2_2" class="css_dis_main5" value="อื่นๆ"onclick="ask5(this.value)">
                    &nbsp;&nbsp;อื่นๆ</div></td>
       				</tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
        			  <input type="checkbox" name="ex1_3" id="ex1_3" class="css_dis_main4" value="ว่ายน้ำ" onclick="ask4(this.value)" />
        			  &nbsp;&nbsp;ว่ายน้ำ</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
   				</tr>
                <tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_4" id="ex1_4" class="css_dis_main4" value="แอโรบิค" onclick="ask4(this.value)" >
                    &nbsp;&nbsp;แอโรบิค</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
   				</tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_5" class="css_dis_main4" value="ปั่นจักรยาน" onclick="ask4(this.value)" id="ex1_5">
                    &nbsp;&nbsp;ปั่นจักรยาน</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
   				</tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_6" class="css_dis_main4" value="ลีลาส" onclick="ask4(this.value)" id="ex1_6">
                    &nbsp;&nbsp;ลีลาส</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_7" class="css_dis_main4" value="ฮูลาฮูป" onclick="ask4(this.value)" id="ex1_7">
                    &nbsp;&nbsp;ฮูลาฮูป</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_8" class="css_dis_main4" value="อนามัย 30" onclick="ask4(this.value)" id="ex1_8">
                    &nbsp;&nbsp;อนามัย 30</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_9" class="css_dis_main4" value="แกว่งแขน" onclick="ask4(this.value)" id="ex1_9">
                    &nbsp;&nbsp;แกว่งแขน</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_10" class="css_dis_main4" value="เดินสเต็ป" onclick="ask4(this.value)" id="ex1_10">
                    &nbsp;&nbsp;เดินสเต็ป</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
   				</tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_11" class="css_dis_main4" value="ฟิตเนส" onclick="ask4(this.value)" id="ex1_11">
                    &nbsp;&nbsp;ฟิตเนส</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
   				</tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_12" class="css_dis_main4" value="ฟุตบอล" onclick="ask4(this.value)" id="ex1_12">
                    &nbsp;&nbsp;ฟุตบอล</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_13" class="css_dis_main4" value="แบดมินตัน" onclick="ask4(this.value)" id="ex1_13">
                    &nbsp;&nbsp;แบดมินตัน</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd1">
                    <input type="checkbox" name="ex1_14" class="css_dis_main1" value="บาสเกตบอล" onclick="ask4(this.value)" id="ex1_14">
                    &nbsp;&nbsp;บาสเกตบอล</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_15" class="css_dis_main4" value="ตะกร้อ" onclick="ask4(this.value)" id="ex1_15">
                    &nbsp;&nbsp;ตะกร้อ</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_16" class="css_dis_main4" value="ไทเก็ก" onclick="ask4(this.value)" id="ex1_16">
                    &nbsp;&nbsp;ไทเก็ก</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_17" class="css_dis_main4" value="โยคะ" onclick="ask4(this.value)" id="ex1_17">
                    &nbsp;&nbsp;โยคะ</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
   				</tr>
				<tr>
        			<td style="background-color:#FFEBCD"><div class="css_rowd4">
                    <input type="checkbox" name="ex1_18" class="css_dis_main4" value="อื่นๆ" onclick="ask4(this.value)" id="ex1_18">
                    &nbsp;&nbsp;อื่นๆ</div></td>
       				<td style="background-color:#CCFFFF">&nbsp;</td>
		  </tr>
		  </tbody>                
		</table>
<div align="center">
        			  <input name="update2" type="submit" id="update2" value="&lt;&lt; ย้อนกลับ" onclick="history.back()" />
                      <?php
 if($Num_Rows>0){
?>
                      <input name="update" type="submit" id="update" value="ปรับปรุง" />

                      <?php } else {?>
                      <input name="insert" type="submit" id="insert" value="เพิ่มข้อมูล" />

                      <?php } ?>
</div>             
  </form>
</div>
<script>

$(function a1(){  
    $(".css_chkbox").on("click",function(){  
		var checkecd_ok = $(".css_chkbox:checked").length;  
        var checked_val = $(".css_chkbox:checked").val();  

        if(checkecd_ok==1 && checked_val==1){ 
			$(".css_dis1").prop("checked",false);  
            $(".css_row").show();   
        }  
        else{  
			$(".css_dis1").prop("checked",false);
            $(".css_row").hide();    
        }                          
    });  
}) 
$(function a2(){  
    $(".css_chkbox2").on("click",function(){  
		var checkecd_ok = $(".css_chkbox2:checked").length;  
        var checked_val = $(".css_chkbox2:checked").val();  

        if(checkecd_ok==1 && checked_val==1){
			$(".css_dis2").prop("checked",false);   
            $(".css_row2").show();   
        }  
        else{  
			$(".css_dis2").prop("checked",false); 
            $(".css_row2").hide();    
        }                          
    });  
})
$(function a3(){  
    $(".css_chkbox3").on("click",function(){  
		var checkecd_ok = $(".css_chkbox3:checked").length;  
        var checked_val = $(".css_chkbox3:checked").val();  

        if(checkecd_ok==1 && checked_val==1){
			$(".css_dis3").prop("checked",false);   
            $(".css_row3").show();   
        }  
        else{ 
			$(".css_dis3").prop("checked",false);  
            $(".css_row3").hide();    
        }                          
    });  
})
$(function d1(){  
			$(".css_row").hide(); 
			$(".css_dis1").prop("checked",false); 
			$(".css_chkbox").prop("checked",false);
			$(".css_dis_main1").prop("checked",false);  
            $(".css_rowd1").hide();    
    $(".css_chkboxd1").on("click",function(){  
		var checkecd_ok = $(".css_chkboxd1:checked").length;  
        var checked_val = $(".css_chkboxd1:checked").val();  

        if(checkecd_ok==1 && checked_val==1){
			$(".css_dis_main1").prop("checked",false); 
            $(".css_rowd1").show();   
			$(".css_row").show(); 
        }  
        else{
			$(".css_row").hide(); 
			$(".css_dis1").prop("checked",false); 
			$(".css_chkbox").prop("checked",false);
			$(".css_dis_main1").prop("checked",false);  
            $(".css_rowd1").hide();    
        }                          
    });  
  
  
})
$(function d2(){  
			$(".css_row2").hide(); 
			$(".css_dis2").prop("checked",false); 
			$(".css_chkbox2").prop("checked",false);  
			$(".css_dis_main2").prop("checked",false); 
            $(".css_rowd2").hide();    
    $(".css_chkboxd2").on("click",function(){  
		var checkecd_ok = $(".css_chkboxd2:checked").length;  
        var checked_val = $(".css_chkboxd2:checked").val();  

        if(checkecd_ok==1 && checked_val==1){
			$(".css_dis_main2").prop("checked",false);   
            $(".css_rowd2").show();   
			$(".css_row2").show(); 
        }  
        else{
			$(".css_row2").hide(); 
			$(".css_dis2").prop("checked",false); 
			$(".css_chkbox2").prop("checked",false);  
			$(".css_dis_main2").prop("checked",false); 
            $(".css_rowd2").hide();    
        }                          
    });  
})
$(function d3(){ 
			$(".css_row3").hide(); 
			$(".css_dis3").prop("checked",false); 
			$(".css_chkbox3").prop("checked",false);
			$(".css_dis_main3").prop("checked",false);   
            $(".css_rowd3").hide();    
    $(".css_chkboxd3").on("click",function(){  
		var checkecd_ok = $(".css_chkboxd3:checked").length;  
        var checked_val = $(".css_chkboxd3:checked").val();  

        if(checkecd_ok==1 && checked_val==1){ 
			$(".css_dis_main3").prop("checked",false);  
            $(".css_rowd3").show();   
			$(".css_row3").show(); 
        }  
        else{
			$(".css_row3").hide(); 
			$(".css_dis3").prop("checked",false); 
			$(".css_chkbox3").prop("checked",false);
			$(".css_dis_main3").prop("checked",false);   
            $(".css_rowd3").hide();    
        }                          
    });  
}) 
$(function d4(){ 
			$(".css_row4").hide(); 
			$(".css_dis4").prop("checked",false); 
			$(".css_chkbox4").prop("checked",false);
			$(".css_dis_main4").prop("checked",false);   
            $(".css_rowd4").hide();    
    $(".css_chkboxd4").on("click",function(){  
		var checkecd_ok = $(".css_chkboxd4:checked").length;  
        var checked_val = $(".css_chkboxd4:checked").val();  

        if(checkecd_ok==1 && checked_val==1){ 
			$(".css_dis_main4").prop("checked",false);  
            $(".css_rowd4").show();   
			$(".css_row4").show(); 
        }  
        else{
			$(".css_row4").hide(); 
			$(".css_dis4").prop("checked",false); 
			$(".css_chkbox4").prop("checked",false);
			$(".css_dis_main4").prop("checked",false);   
            $(".css_rowd4").hide();    
        }                          
    });  
}) 

$(function d5(){ 
			$(".css_row5").hide(); 
			$(".css_dis5").prop("checked",false); 
			$(".css_chkbox5").prop("checked",false);
			$(".css_dis_main5").prop("checked",false);   
            $(".css_rowd5").hide();    
    $(".css_chkboxd5").on("click",function(){  
		var checkecd_ok = $(".css_chkboxd5:checked").length;  
        var checked_val = $(".css_chkboxd5:checked").val();  

        if(checkecd_ok==1 && checked_val==1){ 
			$(".css_dis_main5").prop("checked",false);  
            $(".css_rowd5").show();   
			$(".css_row5").show(); 
        }  
        else{
			$(".css_row5").hide(); 
			$(".css_dis5").prop("checked",false); 
			$(".css_chkbox5").prop("checked",false);
			$(".css_dis_main5").prop("checked",false);   
            $(".css_rowd5").hide();    
        }                          
    });  
}) 

</script> 
<script type="text/javascript">
function ask1(sweet) {
			 var text="";
	if(document.form1.dis_sweet.checked==true) {text="";}
	if(document.form1.sweet1.checked==true) {text=text+"-"+document.form1.sweet1.value+"\n";}
	if(document.form1.sweet2.checked==true) {text=text+"-"+document.form1.sweet2.value+"\n";}
	if(document.form1.sweet3.checked==true) {text=text+"-"+document.form1.sweet3.value+"\n";}
	if(document.form1.sweet4.checked==true) {text=text+"-"+document.form1.sweet4.value+"\n";}
	if(document.form1.sweet5.checked==true) {text=text+"-"+document.form1.sweet5.value+"\n";}
	if(document.form1.sweet7.checked==true) {text=text+"-"+document.form1.sweet7.value+"\n";}
	if(document.form1.sweet8.checked==true) {text=text+"-"+document.form1.sweet8.value+"\n";}
	if(document.form1.sweet9.checked==true) {text=text+"-"+document.form1.sweet9.value+"\n";}
	if(document.form1.sweet10.checked==true) {text=text+"-"+document.form1.sweet10.value+"\n";}
	if(document.form1.sweet11.checked==true) {text=text+"-"+document.form1.sweet11.value+"\n";}
	if(document.form1.sweet12.checked==true) {text=text+"-"+document.form1.sweet12.value+"\n";}
	if(document.form1.sweet13.checked==true) {text=text+"-"+document.form1.sweet13.value+"\n";}
	if(document.form1.sweet14.checked==true) {text=text+"-"+document.form1.sweet14.value+"\n";}
	if(document.form1.sweet15.checked==true) {text=text+"-"+document.form1.sweet15.value+"\n";}
	if(document.form1.sweet16.checked==true) {text=text+"-"+document.form1.sweet16.value+"\n";}
	if(document.form1.sweet17.checked==true) {text=text+"-"+document.form1.sweet17.value+"\n";}
	if(document.form1.sweet18.checked==true) {text=text+"-"+document.form1.sweet18.value+"\n";}
	if(document.form1.sweet19.checked==true) {text=text+"-"+document.form1.sweet19.value+"\n";}
	if(document.form1.sweet20.checked==true) {text=text+"-"+document.form1.sweet20.value+"\n";}
	if(document.form1.sweet21.checked==true) {text=text+"-"+document.form1.sweet21.value+"\n";}
	if(document.form1.sweet22.checked==true) {text=text+"-"+document.form1.sweet22.value+"\n";}
	if(document.form1.sweet23.checked==true) {text=text+"-"+document.form1.sweet23.value+"\n";}
	if(document.form1.sweet24.checked==true) {text=text+"-"+document.form1.sweet24.value+"\n";}
	if(document.form1.sweet25.checked==true) {text=text+"-"+document.form1.sweet25.value+"\n";}
			  
				document.getElementById("box1").value = text
			 
			if(sweet==1) {
				document.getElementById("box1").value = ""
				}
		}
function ask2(salt) {
			 var text="";
	if(document.form1.dis_salt.checked==true) {text="";}
	if(document.form1.salt1.checked==true) {text=text+"-"+document.form1.salt1.value+"\n";}
	if(document.form1.salt2.checked==true) {text=text+"-"+document.form1.salt2.value+"\n";}
	if(document.form1.salt3.checked==true) {text=text+"-"+document.form1.salt3.value+"\n";}
	if(document.form1.salt4.checked==true) {text=text+"-"+document.form1.salt4.value+"\n";}
	if(document.form1.salt6.checked==true) {text=text+"-"+document.form1.salt6.value+"\n";}
	if(document.form1.salt7.checked==true) {text=text+"-"+document.form1.salt7.value+"\n";}
	if(document.form1.salt8.checked==true) {text=text+"-"+document.form1.salt8.value+"\n";}
	if(document.form1.salt9.checked==true) {text=text+"-"+document.form1.salt9.value+"\n";}
	if(document.form1.salt10.checked==true) {text=text+"-"+document.form1.salt10.value+"\n";}
	if(document.form1.salt11.checked==true) {text=text+"-"+document.form1.salt11.value+"\n";}
	if(document.form1.salt12.checked==true) {text=text+"-"+document.form1.salt12.value+"\n";}
	if(document.form1.salt13.checked==true) {text=text+"-"+document.form1.salt13.value+"\n";}
	if(document.form1.salt14.checked==true) {text=text+"-"+document.form1.salt14.value+"\n";}
	if(document.form1.salt15.checked==true) {text=text+"-"+document.form1.salt15.value+"\n";}
	if(document.form1.salt16.checked==true) {text=text+"-"+document.form1.salt16.value+"\n";}
	if(document.form1.salt17.checked==true) {text=text+"-"+document.form1.salt17.value+"\n";}
	if(document.form1.salt18.checked==true) {text=text+"-"+document.form1.salt18.value+"\n";}
	if(document.form1.salt19.checked==true) {text=text+"-"+document.form1.salt19.value+"\n";}
	if(document.form1.salt20.checked==true) {text=text+"-"+document.form1.salt20.value+"\n";}
	if(document.form1.salt21.checked==true) {text=text+"-"+document.form1.salt21.value+"\n";}
			  
				document.getElementById("box2").value = text
			if(salt==1) {
				document.getElementById("box2").value = ""
				}
		}
function ask3(fat) {
			 var text="";
			
	if(document.form1.dis_fat.checked==true) {text="";}
	if(document.form1.fat1.checked==true) {text=text+"-"+document.form1.fat1.value+"\n";}
	if(document.form1.fat2.checked==true) {text=text+"-"+document.form1.fat2.value+"\n";}
	if(document.form1.fat3.checked==true) {text=text+"-"+document.form1.fat3.value+"\n";}
	if(document.form1.fat4.checked==true) {text=text+"-"+document.form1.fat4.value+"\n";}
	if(document.form1.fat5.checked==true) {text=text+"-"+document.form1.fat5.value+"\n";}
	if(document.form1.fat6.checked==true) {text=text+"-"+document.form1.fat6.value+"\n";}
	if(document.form1.fat7.checked==true) {text=text+"-"+document.form1.fat7.value+"\n";}
	if(document.form1.fat9.checked==true) {text=text+"-"+document.form1.fat9.value+"\n";}
	if(document.form1.fat10.checked==true) {text=text+"-"+document.form1.fat10.value+"\n";}
	if(document.form1.fat11.checked==true) {text=text+"-"+document.form1.fat11.value+"\n";}
	if(document.form1.fat12.checked==true) {text=text+"-"+document.form1.fat12.value+"\n";}
	if(document.form1.fat13.checked==true) {text=text+"-"+document.form1.fat13.value+"\n";}
	if(document.form1.fat14.checked==true) {text=text+"-"+document.form1.fat14.value+"\n";}
	if(document.form1.fat15.checked==true) {text=text+"-"+document.form1.fat15.value+"\n";}
	if(document.form1.fat16.checked==true) {text=text+"-"+document.form1.fat16.value+"\n";}
	if(document.form1.fat17.checked==true) {text=text+"-"+document.form1.fat17.value+"\n";}
	if(document.form1.fat18.checked==true) {text=text+"-"+document.form1.fat18.value+"\n";}
	if(document.form1.fat19.checked==true) {text=text+"-"+document.form1.fat19.value+"\n";}
	if(document.form1.fat20.checked==true) {text=text+"-"+document.form1.fat20.value+"\n";}
	if(document.form1.fat21.checked==true) {text=text+"-"+document.form1.fat21.value+"\n";}
	if(document.form1.fat22.checked==true) {text=text+"-"+document.form1.fat22.value+"\n";}
	if(document.form1.fat23.checked==true) {text=text+"-"+document.form1.fat23.value+"\n";}
	if(document.form1.fat24.checked==true) {text=text+"-"+document.form1.fat24.value+"\n";}
	if(document.form1.fat25.checked==true) {text=text+"-"+document.form1.fat25.value+"\n";}
	if(document.form1.fat26.checked==true) {text=text+"-"+document.form1.fat26.value+"\n";}
	if(document.form1.fat27.checked==true) {text=text+"-"+document.form1.fat27.value+"\n";}
	if(document.form1.fat28.checked==true) {text=text+"-"+document.form1.fat28.value+"\n";}
	if(document.form1.fat29.checked==true) {text=text+"-"+document.form1.fat29.value+"\n";}
	if(document.form1.fat30.checked==true) {text=text+"-"+document.form1.fat30.value+"\n";}
	if(document.form1.fat31.checked==true) {text=text+"-"+document.form1.fat31.value+"\n";}
	if(document.form1.fat32.checked==true) {text=text+"-"+document.form1.fat32.value+"\n";}
	if(document.form1.fat33.checked==true) {text=text+"-"+document.form1.fat33.value+"\n";}
	if(document.form1.fat34.checked==true) {text=text+"-"+document.form1.fat34.value+"\n";}
	if(document.form1.fat35.checked==true) {text=text+"-"+document.form1.fat35.value+"\n";}
	if(document.form1.fat36.checked==true) {text=text+"-"+document.form1.fat36.value+"\n";}
	if(document.form1.fat37.checked==true) {text=text+"-"+document.form1.fat37.value+"\n";}
	if(document.form1.fat38.checked==true) {text=text+"-"+document.form1.fat38.value+"\n";}
	if(document.form1.fat39.checked==true) {text=text+"-"+document.form1.fat39.value+"\n";}
	if(document.form1.fat40.checked==true) {text=text+"-"+document.form1.fat40.value+"\n";}
	if(document.form1.fat41.checked==true) {text=text+"-"+document.form1.fat41.value+"\n";}
	if(document.form1.fat42.checked==true) {text=text+"-"+document.form1.fat42.value+"\n";}
			  
				document.getElementById("box3").value = text
			 
			if(fat==1) {
				document.getElementById("box3").value = ""
				}
		}
function ask4(ex4) {
			 var text="";
	if(document.form1.ex1.checked==true) {text="";}
	if(document.form1.ex1_1.checked==true) {text=text+"-"+document.form1.ex1_1.value+"\n";}
	if(document.form1.ex1_2.checked==true) {text=text+"-"+document.form1.ex1_2.value+"\n";}
	if(document.form1.ex1_3.checked==true) {text=text+"-"+document.form1.ex1_3.value+"\n";}
	if(document.form1.ex1_4.checked==true) {text=text+"-"+document.form1.ex1_4.value+"\n";}
	if(document.form1.ex1_5.checked==true) {text=text+"-"+document.form1.ex1_5.value+"\n";}
	if(document.form1.ex1_6.checked==true) {text=text+"-"+document.form1.ex1_6.value+"\n";}
	if(document.form1.ex1_7.checked==true) {text=text+"-"+document.form1.ex1_7.value+"\n";}
	if(document.form1.ex1_8.checked==true) {text=text+"-"+document.form1.ex1_8.value+"\n";}
	if(document.form1.ex1_9.checked==true) {text=text+"-"+document.form1.ex1_9.value+"\n";}
	if(document.form1.ex1_10.checked==true) {text=text+"-"+document.form1.ex1_10.value+"\n";}
	if(document.form1.ex1_11.checked==true) {text=text+"-"+document.form1.ex1_11.value+"\n";}
	if(document.form1.ex1_12.checked==true) {text=text+"-"+document.form1.ex1_12.value+"\n";}
	if(document.form1.ex1_13.checked==true) {text=text+"-"+document.form1.ex1_13.value+"\n";}
	if(document.form1.ex1_14.checked==true) {text=text+"-"+document.form1.ex1_14.value+"\n";}
	if(document.form1.ex1_15.checked==true) {text=text+"-"+document.form1.ex1_15.value+"\n";}
	if(document.form1.ex1_16.checked==true) {text=text+"-"+document.form1.ex1_16.value+"\n";}
	if(document.form1.ex1_17.checked==true) {text=text+"-"+document.form1.ex1_17.value+"\n";}
	if(document.form1.ex1_18.checked==true) {text=text+"-"+document.form1.ex1_18.value+"\n";}
			  
				document.getElementById("box4").value = text
			 
			if(ex4==1) {
				document.getElementById("box4").value = ""
				}
		}
function ask5(ex5) {
			 var text="";
	if(document.form1.ex2.checked==true) {text="";}
	if(document.form1.ex2_1.checked==true) {text=text+"-"+document.form1.ex2_1.value+"\n";}
	if(document.form1.ex2_2.checked==true) {text=text+"-"+document.form1.ex2_2.value+"\n";}
			  
				document.getElementById("box5").value = text
			 
			if(ex5==1) {
				document.getElementById("box5").value = ""
				}
		}

</script>
<script type="text/javascript" src="script.js"></script>
<script src="js/bootstrap.min.js"></script>                                                                        

</body>
</html>