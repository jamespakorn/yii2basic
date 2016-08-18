<?php include"head.php"; ?>

<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">  
<script  src="js/jquery-1.3.2.min.js"></script>
<script  src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script  src="js/bootstrap.js"></script>

<script type="text/javascript">
	$(function(){  
    // แทรกโค้ต jquery  
    $("#dateInput").datepicker({ dateFormat: 'yy-mm-dd' });  
    // รูปแบบวันที่ที่ได้จะเป็น 2009-08-16  
});  
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
                    document.getElementById("spname").value = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "regisgetuser.php?q=" + str, true);
            xmlhttp.send();
        }

        function checkid(str) {

            if (str == "") {
                document.getElementById("txtHint4").innerHTML = "";
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
                    document.getElementById("txtHint4").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "regischeckCard.php?q=" + str, true);
            xmlhttp.send();
        }

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
  <form action="" method="post" name="form1">
<fieldset>

<legend>ข้อมูลส่วนตัว</legend>
<div class align="left">
ID_Card :
<input name="SPONSORID" type="text" id="SPONSORID"
                                                       onkeyup="showUser(this.value)" class="form-control css-require"/>
<input type="tel" name="id_card"  maxlength="13" placeholder="เลขบัตรประชาชน" /> <br /></div>

<div class align="left">
Name : &nbsp;&nbsp;&nbsp;
<input type="text" name="name"  maxlength="50" placeholder="ชื่อ - สกุล" /> <br /></div>

<div class align="left">
HN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="HN" placeholder="เลข HN"  maxlength="11" /> <br /></div>


<div class align="left">
อายุ : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="age" placeholder="อายุ"  maxlength="3" /> <br /></div>

<div class align="left">
เพศ :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="sex" value="1" /> ชาย &nbsp;&nbsp;&nbsp;
<input type="radio" name="sex" value="2" /> หญิง <br /></div><br />

<div class align="left">
ที่อยู่ :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea wrap="virtual" name="address" placeholder="ที่อยู่" rows="5" cols="30">
</textarea>

<div class align="left">
น้ำหนัก :&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="weight" placeholder="น้ำหนัก" maxlength="8" /> <br /></div>

<div class align="left">
ส่วนสูง :&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="height" placeholder="ส่วนสูง" maxlength="8" /> <br /></div>

<div class align="left">
เส้นรอบเอว :&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="waist" placeholder="เส้นรอบเอว" maxlength="8" /> <br /></div>

<div class align="left">
ชีพจรขณะพัก :&nbsp;
<input type="text" name="pulse" placeholder="ชีพจรขณะพัก" maxlength="10"  /> <br /></div>

<div class align="left">
ความดัน :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="pressure" placeholder="ค่าความดัน" maxlength="10"  /> <br /></div>

<div class align="left">
วันที่ประเมิน : &nbsp;&nbsp;
<input type="text" name="dateInput" id="dateInput" value="<?php echo date("Y-m-d");?>" />  

</div>

</fieldset>

<hr />

<fieldset>

<legend>ผลการตรวจเลือด</legend>

<div class align="left">
FBS : &nbsp;&nbsp;&nbsp;
<input type="text" name="FBS"  maxlength="50" placeholder="FBS" /> <br /></div>

<div class align="left">
TG : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="TG"  maxlength="50" placeholder="TG" /> <br /></div>

<div class align="left">
HDL : &nbsp;&nbsp;&nbsp;
<input type="text" name="HDL"  maxlength="50" placeholder="HDL" /> <br /></div>

<div class align="left">
CHO : &nbsp;&nbsp;
<input type="text" name="CHO"  maxlength="50" placeholder="CHO" /> <br /></div>

<div class align="left">
LDL : &nbsp;&nbsp;&nbsp;
<input type="text" name="LDL"  maxlength="50" placeholder="LDL" /> <br /></div>

<div class align="left">
Bun/cr : 
<input type="text" name="Bun_cr"  maxlength="50" placeholder="Bun/cr" /> <br /></div>

<div class align="left">
HCT : &nbsp;&nbsp;
<input type="text" name="HCT"  maxlength="50" placeholder="HCT" /> <br /></div>


</fieldset>

<hr />


<fieldset>

<legend>ข้อมูลเฉพาะตัว</legend>

<div class align="left">
เบอร์โทรติดต่อ :&nbsp;&nbsp;
<input type="tel" name="tel" placeholder="เบอร์สำหรับติดต่อ" maxlength="10" /> <br /></div>

<div class align="left">
Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="email" placeholder="อีเมล์" name="email"  /> <br /></div>

<div class align="left">
LineID :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="LineID" placeholder="ไลน์ไอดี" maxlength="30" /> <br /></div>

<div class align="left">
<h5> มีโรคประจำตัว </h5>
	<ul>
    	<li><input type="radio" name="disease" class="css_rad3" value="0" checked="checked" />&nbsp; ไม่มี</li>
		<li><input type="radio" name="disease" class="css_rad3" value="1" />&nbsp; มี</li>
        	<ul  class="css_groub_chk3">
				<li><input name="di1" type="checkbox" class="css_chk3" id="di1" value="">&nbsp; อ้วนลงพุง </li>
                <li><input name="di2" type="checkbox" class="css_chk3" id="di2" value="">&nbsp; เบาหวาน </li>
                	<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="di2_1" type="checkbox" class="css_subchk3" id="di2_1" value="">&nbsp; หลอดเลือดส่วนปลายอุดตัน</li>
							<li><input name="di2_2" type="checkbox" class="css_subchk3" id="di2_2" value="">&nbsp; ไตเสื่อม</li>
							<li><input name="di2_3" type="checkbox" class="css_subchk3" id="di2_3" value="">&nbsp; ตาเสื่อม</li>
							<li><input name="di2_4" type="checkbox" class="css_subchk3" id="di2_4" value="">&nbsp; ระบบประสาทอัตโนมัติเสื่อม</li>
							<li><input name="di2_5" type="checkbox" class="css_subchk3" id="di2_5" value="">&nbsp; เท้าชา</li>
						</ul>
                    </li>
                <li><input name="di3" type="checkbox" class="css_chk3" id="di3" value="">&nbsp; ความดันโลหิตสูง</li>
                <li><input name="di4" type="checkbox" class="css_chk3" id="di4" value="">&nbsp; ไขมันในเลือดสูง</li>
				<li><input name="di5" type="checkbox" class="css_chk3" id="di5" value="">&nbsp; ไตเสื่อม/ไตวายเรื้อรัง</li>
                <li><input name="di6" type="checkbox" class="css_chk3" id="di6" value="">&nbsp; หัวใจ</li>
                	<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="di6_1" type="checkbox" class="css_subchk3" id="di6_1" value="">&nbsp; หัวใจโต</li>
							<li><input name="di6_2" type="checkbox" class="css_subchk3" id="di6_2" value="">&nbsp; หัวใจขาดเลือด</li>
							<li><input name="di6_3" type="checkbox" class="css_subchk3" id="di6_3" value="">&nbsp; หัวใจล้มเหลวเรื้อรัง</li>
							<li><input name="di6_4" type="checkbox" class="css_subchk3" id="di6_4" value="">&nbsp; หัวใจเต้นผิดจังหว่ะ</li>
							<li><input name="di6_5" type="checkbox" class="css_subchk3" id="di6_5" value="">&nbsp; ลิ้นหัวใจรั่ว/ตีบ</li>
						</ul>
                    </li>
                <li><input name="di7" type="checkbox" class="css_chk3" id="di7" value="">&nbsp; หลอดเลือดในสมอง </li>
					<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="di7_1" type="checkbox" class="css_subchk3" id="di7_1" value="">&nbsp; หลอดเลือดในสมองตีบ</li>
							<li><input name="di7_2" type="checkbox" class="css_subchk3" id="di7_2" value="">&nbsp; หลอดเลือดในสมองแตก</li>
						</ul>
                    </li>
               	<li><input name="di8" type="checkbox" class="css_chk3" id="di8" value="">&nbsp; เข่าเสื่อม<br />
</div>

</fieldset>

<hr />

<fieldset>

<legend>ชีวิตประจำวัน</legend>

<div class align="left">
<style type="text/css">  
        .css_groub_chk{  
            padding: 0px;  
            margin: 0px;  
            list-style: none;  
        }   
</style>
  
	<h5> เลือก </h5>
    
	<ul>
    	<li><input type="radio" name="type_life" value="1" />&nbsp; เพศหญิง 26-60 ปี (กิจกรรมทางกายน้อย) ผู้สูงอายุ 60 ปี  </li>
		<li><input type="radio" name="type_life" value="2" />&nbsp; เพศชาย 26-60 ปี เพศชาย - หญิง (14-25 ปี) และ หญิง 26 - 60 ปี กิจกรรมปานกลาง งาน Office </li>
		<li><input type="radio" name="type_life" value="3" />&nbsp; ผู้ใช้พลังงานมาก ออกกำลังกาย นักกีฬา ผู้ใช้แรงงาน </li>
    </ul>
    
    <h5> ครอบครัว </h5>
    
    <ul>
    	<li><input type="radio" name="history_family" class="css_rad" value="0" checked="checked" /> ไม่มีโรคประจำตัว(ในครอบครัว)</li>
		<li><input type="radio" name="history_family" class="css_rad" value="1" /> มีโรคประจำตัว </li>
        	<ul  class="css_groub_chk">
            	<li>-&nbsp;&nbsp;&nbsp;<input name="d1" type="checkbox" id="d1" value="2">&nbsp; เบาหวาน</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="d2" type="checkbox" id="d2" value="3">&nbsp; ความดันโลหิตสูง</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="d3" type="checkbox" id="d3" value="4">&nbsp; ไขมัน</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="d4" type="checkbox" id="d4" value="5">&nbsp; ไตวาย</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="d5" type="checkbox" id="d5" value="6">&nbsp; โรคหัวใจ</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="d6" type="checkbox" id="d6" value="9">&nbsp; โรคมะเร็งเต้านม</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="d7" type="checkbox" id="d7" value="10">&nbsp; โรคมะเร็งลำไส้ใหญ่</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="d8" type="checkbox"	id="d8" value="11">&nbsp; โรคมะเร็งตับ</li>
            </ul>
    </ul>
    
    <h5> สูบบุหรี่ </h5>
    
    <ul>
    	<li><input type="radio" name="ci1" class="css_rad1" value="0" checked="checked" />&nbsp; ไม่เคยสูบเลย</li>
        <li><input type="radio" name="ci1" class="css_rad1" value="1" />&nbsp; เคยสูบ / สูบ</li>
        	<ul class="css_groub_chk1">
            	<li><input type="radio" name="ci2" value="1" />&nbsp; เคยสูบแต่เลิกแล้ว (ระยะเวลาที่เคตยสูบ__ปี )</li>
                <li><input type="radio" name="ci2" value="2" />&nbsp; สูบไม่สม่ำเสมอ บางวัน/บางสถานะการณ์</li>
                <li><input type="radio" name="ci2" value="3" />&nbsp; สูบประจำ วันละ__มวน สูบมา__ปี [ควรเลิกสูบ]</li>
            </ul>
	</ul>
    
    <h5> สุรา </h5>
    
    <ul>
    	<li><input type="radio" name="al" class="css_rad2" value="0" checked="checked" />&nbsp; ไม่เคยดื่มเลย</li>
        <li><input type="radio" name="al" class="css_rad2" value="1" />&nbsp; เคยดื่ม / ดื่ม</li>
        	<ul class="css_groub_chk2">
            	<li><input type="radio" name="al2" class="css_chk2" value="1" />&nbsp; เคยดื่มแต่เลิกมาแล้ว (ระยะเวลาที่เคตยดื่ม__ปี )</li>
                <li><input type="radio" name="al2" class="css_chk2" value="2" />&nbsp; ดื่มบางครั้ง/บางสถานะการณ์</li>
                <li><input type="radio" name="al2" class="css_chk2" value="3" />&nbsp; ดื่มประจำ (มากกว่า 3วัน/สัปดาห์) </li> 
                	<li class="css_sub_chk2"> 
                		<ul>
            				<li><input name="al3" type="checkbox" class="css_subchk2" id="al3" value="1">&nbsp; เบียร์ _ ขวด</li>
                			<li><input name="al3" type="checkbox" class="css_subchk2" id="al3" value="2">&nbsp; ไวน์ _ ขวด</li>
               				<li><input name="al3" type="checkbox" class="css_subchk2" id="al3" value="3">&nbsp; เหล้า _ ขวด</li>
               				<li><input name="al3" type="checkbox" class="css_subchk2" id="al3" value="4">&nbsp; เหล้าขาว _ ขวด</li>  
                    	</ul>
                    </li>
            </ul>
    </ul>                  	           	
    	                
</div>

</fieldset>

<hr />

<p align="left">

<br />

<input type="submit" value="Submit" />

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