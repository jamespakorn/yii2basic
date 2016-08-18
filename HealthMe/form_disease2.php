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
  <form action="form_diseasec.php" method="post" name="frmMain">
<fieldset>

<legend>ข้อมูลส่วนตัว<span class="class">
<input type="tel" name="pt_id" id="pt_id"  maxlength="13"  value="<?php echo $_SESSION['pt_id']; ?>" class="form-control css-require"/>
</span></legend>
<div class align="left">
  ID_Card :
  <input type="tel" name="id_card" id="id_card"  maxlength="13" placeholder="เลขบัตรประชาชน" onchange="showUser(this.value)" value="<?php echo $_SESSION['pt_cid']; ?>" class="form-control css-require"/>
  <br />
</div>
 <div class="form-group has-feedback">
<div class align="left">
Name : &nbsp;&nbsp;&nbsp;
<input type="text" name="spname"  maxlength="50" placeholder="ชื่อ - สกุล" id="spname" value="<?php echo $_SESSION['pt_name']; ?>"  class="form-control css-require" /> <br /></div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
</div>

<div class align="left">
HN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="hn" id="hn" placeholder="เลข HN"  maxlength="11" value="<?php echo $_SESSION['pt_hn']; ?>"  class="form-control css-require"/>
 <br /></div>


<div class align="left"><br />
</div>
</fieldset>

<fieldset>
<div class align="left">
<h5> มีโรคประจำตัว </h5>
	<ul>
    	<li><input type="radio" name="d0" class="css_rad3" value="0" checked="checked" />
   	&nbsp; ไม่มี</li>
		<li><input type="radio" name="d0" class="css_rad3" value="1" />
	&nbsp; มี</li>
        	<ul  class="css_groub_chk3">
				<li><input name="d1" type="checkbox" class="css_chk3" id="d1" value="">&nbsp; อ้วนลงพุง </li>
                <li><input name="d2" type="checkbox" class="css_chk3" id="d2" value="">
    &nbsp; เบาหวาน </li>
                	<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="d2_1" type="checkbox" class="css_subchk3" id="d2_1" value="">
                       	  &nbsp; หลอดเลือดส่วนปลายอุดตัน</li>
							<li><input name="d2_2" type="checkbox" class="css_subchk3" id="d2_2" value="">
						  &nbsp; ไตเสื่อม</li>
							<li><input name="d2_3" type="checkbox" class="css_subchk3" id="d2_3" value="">
						  &nbsp; ตาเสื่อม</li>
							<li><input name="d2_4" type="checkbox" class="css_subchk3" id="d2_4" value="">
						  &nbsp; ระบบประสาทอัตโนมัติเสื่อม</li>
							<li><input name="d2_5" type="checkbox" class="css_subchk3" id="d2_5" value="">
						  &nbsp; เท้าชา</li>
						</ul>
                    </li>
                <li><input name="d3" type="checkbox" class="css_chk3" id="d3" value="">
    &nbsp; ความดันโลหิตสูง</li>
                <li><input name="d4" type="checkbox" class="css_chk3" id="d4" value="">
    &nbsp; ไขมันในเลือดสูง</li>
				<li><input name="d5" type="checkbox" class="css_chk3" id="d5" value="">
	&nbsp; ไตเสื่อม/ไตวายเรื้อรัง</li>
                <li><input name="d6" type="checkbox" class="css_chk3" id="d6" value="">
    &nbsp; หัวใจ</li>
                	<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="d6_1" type="checkbox" class="css_subchk3" id="d6_1" value="">
                       	  &nbsp; หัวใจโต</li>
							<li><input name="d6_2" type="checkbox" class="css_subchk3" id="d6_2" value="">
						  &nbsp; หัวใจขาดเลือด</li>
							<li><input name="d6_3" type="checkbox" class="css_subchk3" id="d6_3" value="">
						  &nbsp; หัวใจล้มเหลวเรื้อรัง</li>
							<li><input name="d6_4" type="checkbox" class="css_subchk3" id="d6_4" value="">
						  &nbsp; หัวใจเต้นผิดจังหว่ะ</li>
							<li><input name="d6_5" type="checkbox" class="css_subchk3" id="d6_5" value="">
						  &nbsp; ลิ้นหัวใจรั่ว/ตีบ</li>
						</ul>
                    </li>
                <li><input name="d7" type="checkbox" class="css_chk3" id="d7" value="">
    &nbsp; หลอดเลือดในสมอง </li>
					<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="d7_1" type="checkbox" class="css_subchk3" id="d7_1" value="">
                       	  &nbsp; หลอดเลือดในสมองตีบ</li>
							<li><input name="d7_2" type="checkbox" class="css_subchk3" id="d7_2" value="">
						  &nbsp; หลอดเลือดในสมองแตก</li>
						</ul>
                    </li>
               	<li><input name="d8" type="checkbox" class="css_chk3" id="d8" value="">
               	&nbsp; เข่าเสื่อม<br />
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
    	<li><input type="radio" name="life_type" value="1" />
    	&nbsp; เพศหญิง 26-60 ปี (กิจกรรมทางกายน้อย) ผู้สูงอายุ 60 ปี  </li>
		<li><input type="radio" name="life_type" value="2" />
		&nbsp; เพศชาย 26-60 ปี เพศชาย - หญิง (14-25 ปี) และ หญิง 26 - 60 ปี กิจกรรมปานกลาง งาน Office </li>
		<li><input type="radio" name="life_type" value="3" />&nbsp; ผู้ใช้พลังงานมาก ออกกำลังกาย นักกีฬา ผู้ใช้แรงงาน </li>
    </ul>
    
    <h5> ครอบครัว </h5>
    
    <ul>
    	<li><input type="radio" name="history_family" class="css_rad" value="0" checked="checked" /> ไม่มีโรคประจำตัว(ในครอบครัว)</li>
		<li><input type="radio" name="history_family" class="css_rad" value="1" /> มีโรคประจำตัว </li>
        	<ul  class="css_groub_chk">
            	<li>-&nbsp;&nbsp;&nbsp;<input name="df1" type="checkbox" id="df1" class="css_data_item" value="2">
           	  &nbsp; เบาหวาน</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df2" type="checkbox" id="df2" class="css_data_item" value="3">
              &nbsp; ความดันโลหิตสูง</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df3" type="checkbox" id="df3" class="css_data_item" value="4">
              &nbsp; ไขมัน</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df4" type="checkbox" id="df4" class="css_data_item" value="5">
              &nbsp; ไตวาย</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df5" type="checkbox" id="df5" class="css_data_item" value="6">
              &nbsp; โรคหัวใจ</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df6" type="checkbox" id="df6" class="css_data_item" value="9">
              &nbsp; โรคมะเร็งเต้านม</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df7" type="checkbox" id="df7" class="css_data_item" value="10">
              &nbsp; โรคมะเร็งลำไส้ใหญ่</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df8" type="checkbox" id="df8" class="css_data_item" value="11">
              &nbsp; โรคมะเร็งตับ</li>
            </ul>
    </ul>
    
    <h5> สูบบุหรี่ </h5>
    
    <ul>
    	<li><input type="radio" name="sigar" class="css_rad1" value="0" checked="checked" />&nbsp; ไม่เคยสูบเลย</li>
        <li>
          <input type="radio" name="sigar" class="css_rad1" value="1" />
        &nbsp; เคยสูบ / สูบ</li>
  <ul class="css_groub_chk1">
            	<li><input type="radio" name="s1" class="css_data_item1" value="1" />
            	  &nbsp; เคยสูบแต่เลิกแล้ว (ระยะเวลาที่เคยสูบ
            	  <input type="tel" name="s1a" maxlength="10" class="dist1" style="width:10px;" id="s1a" />
            	  ปี )</li>
                <li><input type="radio" name="s1" class="css_data_item1" value="1" />
          &nbsp; สูบไม่สม่ำเสมอ บางวัน/บางสถานะการณ์</li>
                <li><input type="radio" name="s1" class="css_data_item1" value="1" />
                &nbsp; สูบประจำ วันละ
                  <input type="tel" name="s3a" maxlength="10" class="dist1" style="width:10px;" id="s3a" />
                มวน สูบมา
                <input type="tel" name="s3b" maxlength="10" class="dist1" style="width:10px;" id="s3b" />
                ปี [ควรเลิกสูบ]</li>
            </ul>
	</ul>
    
    <h5> สุรา </h5>
    
    <ul>
    	<li><input type="radio" name="alcohol" class="css_rad2" value="0" checked="checked" />
    	&nbsp; ไม่เคยดื่มเลย</li>
        <li><input type="radio" name="alcohol" class="css_rad2" value="1" />
        &nbsp; เคยดื่ม / ดื่ม</li>
        	<ul class="css_groub_chk2">
            	<li><input type="radio" name="a1" class="css_chk2" value="1" />
           	  &nbsp; เคยดื่มแต่เลิกมาแล้ว (ระยะเวลาที่เคตยดื่ม
           	    <input type="tel" name="a1a" maxlength="10" class="dist2" style="width:10px;" id="a1a" />
       	      ปี )</li>
                <li><input type="radio" name="a1" class="css_chk2" value="1" />
              &nbsp; ดื่มบางครั้ง/บางสถานะการณ์</li>
                <li><input type="radio" name="a1" class="css_chk2" value="1" />
              &nbsp; ดื่มประจำ (มากกว่า 3วัน/สัปดาห์) นับใน 1 สัปดาห์ ดื่มประมาณ</li> 
                	<li class="css_sub_chk2"> 
                		<ul>
            				<li><input name="a3b1" type="checkbox" class="css_subchk2" id="a3b1" value="1">&nbsp; เบียร์ 
            				  <input type="tel" name="a3c1" maxlength="10" class="dist2" style="width:10px;" id="a3c1" /> 
           				    ขวด</li>
                			<li><input name="a3b2" type="checkbox" class="css_subchk2" id="a3b2" value="2">&nbsp; ไวน์ 
                			  <input type="tel" name="a3c2" maxlength="10" class="dist2" style="width:10px;" id="a3c2" /> 
               			    ขวด</li>
               				<li><input name="a3b3" type="checkbox" class="css_subchk2" id="a3b3" value="3">&nbsp; เหล้า 
               				  <input type="tel" name="a3c3" maxlength="10" class="dist2" style="width:10px;" id="a3c3" /> 
           				    ขวด</li>
               				<li><input name="a3b4" type="checkbox" class="css_subchk2" id="a3b4" value="4">&nbsp; เหล้าขาว 
               				  <input type="tel" name="a3c4" maxlength="10" class="dist2" style="width:10px;" id="a3c4" /> 
           				    ขวด</li>  
                    	</ul>
                    </li>
            </ul>
    </ul>                  	           	
    	                
</div>

</fieldset>

<hr />

<p align="center">

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