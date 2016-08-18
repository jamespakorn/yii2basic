<?php include"head.php"; ?>
<?php 
if(empty($_GET['pt_id']))
{ $pt_id="";}
else { $pt_id=$_GET['pt_id'];}
?>

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
								//document.getElementById("pressure").value=datas[8]+ '/ '+datas[9];    
								document.getElementById("bps").value=datas[8];   
								document.getElementById("bpd").value=datas[9];    
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
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
		  
  if($pt_id<>"") {
     $sql_t1="SELECT * from pt_screen WHERE pt_id='". $pt_id . "'    ";
	 $result_t1 = mysql_query($sql_t1);
	 $Num_Rows  = mysql_num_rows($result_t1);
  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_t1))
		{						
$pt_name = $objResult['pt_name'];
$pt_hn = $objResult['pt_hn'];
$pt_cid=$objResult[pt_cid];
$pt_age=$objResult[pt_age];
$pt_sex=$objResult[pt_sex];
$pt_address=$objResult[pt_address];
$pt_weight=$objResult[pt_weight];
$pt_height=$objResult[pt_height];
$pt_waist=$objResult[pt_waist];
$pt_pulse=$objResult[pt_pulse];
$pt_occ=$objResult[pt_occ];
$p_tel=$objResult[p_tel];
$p_email=$objResult[p_email];
$p_line=$objResult[p_line];
$pt_bps=$objResult[pt_bps];
$pt_bpd=$objResult[pt_bpd];
// Lab investigation; 
$pt_bloodgrp=$objResult[pt_bloodgrp];
$pt_fbs=$objResult[pt_fbs];
$pt_hba1c=$objResult[pt_hba1c];
$pt_tg=$objResult[pt_tg];
$pt_hdl=$objResult[pt_hdl];
$pt_cho=$objResult[pt_cho];
$pt_ldl=$objResult[pt_ldl];
$pt_bun=$objResult[pt_bun];
$pt_cr=$objResult[pt_cr];
$pt_hct=$objResult[pt_hct];
$pt_date_screen=$objResult[pt_date_screen];
		}
  }
  else 
  {
  }
  }
?>
  <form action="form_c.php" method="post" name="frmMain">
<fieldset>

<legend>ข้อมูลส่วนตัว<span class="class">
<input type="tel" name="pt_id" id="pt_id"  maxlength="13"   style="color: #0000FF;"  value="<?php echo $_REQUEST['pt_id']; ?>" class="form-control css-require" readonly="readonly"/>
</span></legend>
<div class align="left">
  ID_Card :
    <input type="tel" name="id_card" id="id_card"  style="color: #0000FF;"   value="<?php echo $pt_cid; ?>" maxlength="13" placeholder="เลขบัตรประชาชน" onchange="showUser(this.value)" class="form-control css-require" />
    <br />
</div>
 <div class="form-group has-feedback">
<div class align="left">
Name : &nbsp;&nbsp;&nbsp;
<input type="text" name="spname" style="color: #0000FF;"    maxlength="50" placeholder="ชื่อ - สกุล" id="spname"  value="<?php echo $pt_name; ?>" class="form-control css-require" /> <br /></div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
</div>
<div id="txtHint4"></div>

<div class align="left">
HN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="hn" id="hn"  style="color: #0000FF;"  placeholder="เลข HN"  maxlength="11" value="<?php echo $pt_hn; ?>"  class="form-control css-require"/>
 <br /></div>


<div class align="left">
อายุ : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="age" id="age" style="color: #0000FF;"   placeholder="อายุ"  maxlength="3"  value="<?php echo $pt_age; ?>"  class="form-control css-require"/> <br /></div>

<div class align="left">
เพศ :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span  style="width:120px;">
<select name='sex' id='sex'    class="form-control css-require"  style="width:90px;color: #0000FF;">
  <option  value=""  <?php if($pt_sex == "0") echo "selected"; ?>>ไม่ระบุ</option>
  <option value="1"  <?php if($pt_sex == "1") echo "selected"; ?>>ชาย</option>
  <option value="2"  <?php if($pt_sex == "2") echo "selected"; ?>>หญิง</option>
</select>
</span><br />
</div><br />

<div class align="left">
ที่อยู่ :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea wrap="virtual" name="address"  style="color: #0000FF;"   placeholder="ที่อยู่" rows="5" cols="30"><?php echo $pt_address; ?> 
</textarea>

<div class align="left">
น้ำหนัก :&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="weight" id="weight" style="width:50px;color: #0000FF;text-align: right;" placeholder="น้ำหนัก" maxlength="8" value="<?php echo number_format($pt_weight,2); ?>"  class="form-control css-require" /> <br /></div>

<div class align="left">
ส่วนสูง :&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="height"  id="height" style="width:50px;color: #0000FF;text-align: right;" placeholder="ส่วนสูง" maxlength="8" value="<?php echo number_format($pt_height,2); ?>"  class="form-control css-require" /> <br /></div>

<div class align="left">
เส้นรอบเอว :&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="waist" id="waist" style="width:50px;color: #0000FF;text-align: right;" placeholder="เส้นรอบเอว" value="<?php echo number_format($pt_waist,2); ?>"  maxlength="8" /> <br /></div>

<div class align="left">
ชีพจรขณะพัก :&nbsp;
<input type="text" name="pulse" id="pulse" style="width:50px;color: #0000FF;text-align: right;" placeholder="ชีพจรขณะพัก" value="<?php echo number_format($pt_pulse,2); ?>"  maxlength="10"  />
<br />
</div>

<div class align="left">
ความดัน :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="bps" type="text" id="bps" style="width:70px;color: #0000FF;text-align: right;" value="<?php echo number_format($pt_bps,2); ?>" maxlength="5" placeholder="ค่าบน"  />
/
<input type="text" name="bpd" id="bpd" style="width:50px;color: #0000FF;text-align: right; " value="<?php echo number_format($pt_bpd,2); ?>" placeholder="ค่าล่าง" maxlength="5"  />
</div>

<div class align="left">
ข้อมูลวันที่ : &nbsp;&nbsp;
<input type="text" name="dateInput"  id="dateInput"  style="color: #0000FF;"   value="<?php echo $pt_date_screen; ?>"  />
</div>

</fieldset>

<hr />

<fieldset>

<legend>ผลการตรวจเลือด</legend>
<div class align="left">
Group : &nbsp;&nbsp;&nbsp;
<input type="text" name="blood" id="blood" style="width:50px;color: #0000FF;text-align: right;"  maxlength="50" value="<?php echo $pt_bloodgrp; ?>"  placeholder="BloodGroup" /> 
<br /></div>

<div class align="left">
FBS : &nbsp;&nbsp;&nbsp;
<input type="text" name="fbs" id="fbs"  maxlength="50" style="width:50px;color: #0000FF;text-align: right;" value="<?php echo number_format($pt_fbs,2) ; ?>" placeholder="FBS" /> <br /></div>

<div class align="left">
HbA1C :
  <input type="text" name="HbA1C" id="HbA1C" style="width:50px;color: #0000FF;text-align: right;" maxlength="50"value="<?php echo number_format($pt_hba1c,2); ?>"  placeholder="HbA1C" /> <br /></div>

<div class align="left">
TG : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="tg" id="tg" style="width:50px;color: #0000FF;text-align: right;" maxlength="50"value="<?php echo number_format($pt_tg,2); ?>"  placeholder="TG" /> <br /></div>

<div class align="left">
HDL : &nbsp;&nbsp;&nbsp;
<input type="text" name="hdl" id="hdl" style="width:50px;color: #0000FF;text-align: right;"  maxlength="50" value="<?php echo number_format($pt_hdl,2); ?>" placeholder="HDL" /> <br /></div>

<div class align="left">
CHO : &nbsp;&nbsp;
<input type="text" name="cho"id="cho" style="width:50px;color: #0000FF;text-align: right;"  maxlength="50" value="<?php echo number_format($pt_cho,2); ?>" placeholder="CHO" /> <br /></div>

<div class align="left">
LDL : &nbsp;&nbsp;&nbsp;
<input type="text" name="ldl" id="ldl" style="width:50px;color: #0000FF;text-align: right;" maxlength="50"value="<?php echo number_format($pt_ldl,2); ?>"  placeholder="LDL" /> <br /></div>

<div class align="left">
Bun : 
<input type="text" name="bun" id="bun"style="width:50px;color: #0000FF;text-align: right;"  maxlength="50"value="<?php echo number_format($pt_bun,2); ?>"  placeholder="Bun" />
<br />
</div>
<div class align="left">
Cr : &nbsp;&nbsp;
 <input type="text" name="cr" id="cr" style="width:50px;color: #0000FF;text-align: right;"  maxlength="50" value="<?php echo number_format($pt_cr,2); ?>" placeholder="cr" />
<br />
</div>


<div class align="left">
HCT : &nbsp;&nbsp;
<input type="text" name="hct" id="hct" style="width:50px;color: #0000FF;text-align: right;" maxlength="50"value="<?php echo $pt_hct; ?>"  placeholder="HCT" /> <br /></div>


</fieldset>

<hr />


<fieldset>

<legend>ข้อมูลเฉพาะตัว</legend>
<div class align="left">

 <input type="hidden"  name="pt_occ" placeholder="อาชีพ"  style="color: #0000FF;"  value="<?php echo $pt_occ; ?>" maxlength="10" id="pt_occ" /><br />
</div>

<div class align="left">
เบอร์โทรติดต่อ :&nbsp;&nbsp;
<input type="tel" name="tel" placeholder="เบอร์สำหรับติดต่อ"  style="color: #0000FF;"  value="<?php echo $p_tel; ?>"  maxlength="10" /> <br /></div>

<div class align="left">
Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="email" placeholder="อีเมล์" value="<?php echo $p_email; ?>" style="color: #0000FF;"    name="email"  /> <br /></div>

<div class align="left">
LineID :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="LineID"  value="<?php echo $p_line; ?>"  style="color: #0000FF;"   placeholder="ไลน์ไอดี" maxlength="30" /> <br /></div>

<p align="left">

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

</div>

<script src="js/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
$j= $.noConflict(true);
</script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>