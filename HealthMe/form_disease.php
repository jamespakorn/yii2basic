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
     $sql_t1="SELECT * FROM pt_disease d LEFT JOIN  pt_life l ON d.pt_id=l.pt_id  WHERE d.pt_id='". $pt_id . "'    ";
//echo  $sql_t1;
	 $result_t1 = mysql_query($sql_t1);
	 $Num_Rows  = mysql_num_rows($result_t1);
  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_t1))
		{						
$d0 = $objResult['d0'];
$d1 = $objResult['d1'];
$d2 = $objResult['d2'];
$d2_1 = $objResult['d2_1'];
$d2_2 = $objResult['d2_2'];
$d2_3 = $objResult['d2_3'];
$d2_4 = $objResult['d2_4'];
$d2_5 = $objResult['d2_5'];
$d3   = $objResult['d3'];
$d4   = $objResult['d4'];
$d5   = $objResult['d5'];
$d6   = $objResult['d6'];
$d6_1 = $objResult['d6_1'];
$d6_2 = $objResult['d6_2'];
$d6_3 = $objResult['d6_3'];
$d6_4 = $objResult['d6_4'];
$d6_5 = $objResult['d6_5'];
$d7   = $objResult['d7'];
$d7_1 = $objResult['d7_1'];
$d7_2 = $objResult['d7_2'];
$d8   = $objResult['d8'];
$d9   = $objResult['d9'];
$life_type   = $objResult['life_type'];
$history_family   = $objResult['history_family'];
$df1 	= $objResult['df1'];
$df2 	= $objResult['df2'];
$df3   	= $objResult['df3'];
$df4   	= $objResult['df4'];
$df5   	= $objResult['df5'];
$df6   	= $objResult['df6'];
$df7   	= $objResult['df7'];
$df8   	= $objResult['df8'];
$df9   	= $objResult['df9'];
$df10   = $objResult['df10'];
$df11   = $objResult['df11'];
$sigar  = $objResult['sigar'];
$s1   = $objResult['s1'];
$s2   = $objResult['s2'];
$s3   = $objResult['s3'];
$s1a   = $objResult['s1a'];
$s3a   = $objResult['s3a'];
$s3b   = $objResult['s3b'];
$alcohol   = $objResult['alcohol'];
$a1   = $objResult['a1'];
$a1a   = $objResult['a1a'];
$a2   = $objResult['a2'];
$a3   = $objResult['a3'];
$a3a   = $objResult['a3a'];
$a3b1   = $objResult['a3b1'];
$a3c1   = $objResult['a3c1'];
$a3b2   = $objResult['a3b2'];
$a3c2   = $objResult['a3c2'];
$a3b3   = $objResult['a3b3'];
$a3c3   = $objResult['a3c3'];
$a3b4   = $objResult['a3b4'];
$a3c4   = $objResult['a3c4'];
	}	
}
}
?>
  <form action="form_diseasec.php" method="post" name="frmMain">
<fieldset>

<legend>ข้อมูลส่วนตัว<span class="class">
<input type="tel" name="pt_id" id="pt_id" style="color: #0000FF;"  maxlength="13"  value="<?php echo $_SESSION['pt_id']; ?>" class="form-control css-require" readonly="readonly"/>
</span></legend>
<div class align="left">
  ID_Card :
  <input type="tel" name="id_cid" id="id_cid"style="color: #0000FF;"   maxlength="13" placeholder="เลขบัตรประชาชน" onchange="showUser(this.value)" value="<?php echo $_SESSION['pt_cid']; ?>" class="form-control css-require" readonly="readonly"/>
  <br />
</div>
 <div class="form-group has-feedback">
<div class align="left">
Name : &nbsp;&nbsp;&nbsp;
<input type="text" name="spname"  style="color: #0000FF;" maxlength="50" placeholder="ชื่อ - สกุล" id="spname" value="<?php echo $_SESSION['pt_name']; ?>"  class="form-control css-require" readonly="readonly"/> <br /></div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
</div>

<div class align="left">
HN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="hn" id="hn" placeholder="เลข HN" style="color: #0000FF;"  maxlength="11" value="<?php echo $_SESSION['pt_hn']; ?>"  class="form-control css-require" readonly="readonly"/>
 <br /></div>


<div class align="left"><br />
</div>
</fieldset>

<fieldset>
<div class align="left">
<h5> มีโรคประจำตัว </h5>
	<ul>
    	<li><input type="radio" name="d0" class="css_rad3" value="0" <?php if($d0 == 0) echo "checked"; ?> />
   	&nbsp; ไม่มี</li>
		<li><input type="radio" name="d0" class="css_rad3" value="1"<?php if($d0 == 1) echo "checked"; ?> />
	&nbsp; มี</li>
        	<ul  class="css_groub_chk3">
				<li><input name="d1" type="checkbox" class="css_chk3" id="d1" value="1" <?php if($d1 == 1) echo "checked"; ?>>
	&nbsp; อ้วนลงพุง </li>
                <li><input name="d2" type="checkbox" class="css_chk3" id="d2" value="1" <?php if($d2 == 1) echo "checked"; ?>>
    &nbsp; เบาหวาน </li>
                	<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="d2_1" type="checkbox" class="css_subchk3" id="d2_1" value="1" <?php if($d2_1 == 1) echo "checked"; ?>>
                       	  &nbsp; หลอดเลือดส่วนปลายอุดตัน</li>
							<li><input name="d2_2" type="checkbox" class="css_subchk3" id="d2_2" value="1" <?php if($d2_2 == 1) echo "checked"; ?>>
						  &nbsp; ไตเสื่อม</li>
							<li><input name="d2_3" type="checkbox" class="css_subchk3" id="d2_3" value="1" <?php if($d2_3 == 1) echo "checked"; ?>>
						  &nbsp; ตาเสื่อม</li>
							<li><input name="d2_4" type="checkbox" class="css_subchk3" id="d2_4" value="1" <?php if($d2_4 == 1) echo "checked"; ?>>
						  &nbsp; ระบบประสาทอัตโนมัติเสื่อม</li>
							<li><input name="d2_5" type="checkbox" class="css_subchk3" id="d2_5" value="1" <?php if($d2_5 == 1) echo "checked"; ?>>
						  &nbsp; เท้าชา</li>
						</ul>
                    </li>
                <li><input name="d3" type="checkbox" class="css_chk3" id="d3" value="1" <?php if($d3 == 1) echo "checked"; ?>>
    &nbsp; ความดันโลหิตสูง</li>
                <li><input name="d4" type="checkbox" class="css_chk3" id="d4" value="1" <?php if($d4 == 1) echo "checked"; ?>>
    &nbsp; ไขมันในเลือดสูง</li>
				<li><input name="d5" type="checkbox" class="css_chk3" id="d5" value="1" <?php if($d5 == 1) echo "checked"; ?>>
	&nbsp; ไตเสื่อม/ไตวายเรื้อรัง</li>
                <li><input name="d6" type="checkbox" class="css_chk3" id="d6" value="1" <?php if($d6 == 1) echo "checked"; ?>>
    &nbsp; หัวใจ</li>
                	<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="d6_1" type="checkbox" class="css_subchk3" id="d6_1" value="1" <?php if($d6_1 == 1) echo "checked"; ?>>
                       	  &nbsp; หัวใจโต</li>
							<li><input name="d6_2" type="checkbox" class="css_subchk3" id="d6_2" value="1" <?php if($d6_2 == 1) echo "checked"; ?>>
						  &nbsp; หัวใจขาดเลือด</li>
							<li><input name="d6_3" type="checkbox" class="css_subchk3" id="d6_3" value="1" <?php if($d6_3 == 1) echo "checked"; ?>>
						  &nbsp; หัวใจล้มเหลวเรื้อรัง</li>
							<li><input name="d6_4" type="checkbox" class="css_subchk3" id="d6_4" value="1" <?php if($d6_4 == 1) echo "checked"; ?>>
						  &nbsp; หัวใจเต้นผิดจังหว่ะ</li>
							<li><input name="d6_5" type="checkbox" class="css_subchk3" id="d6_5" value="1" <?php if($d6_5 == 1) echo "checked"; ?>>
						  &nbsp; ลิ้นหัวใจรั่ว/ตีบ</li>
						</ul>
                    </li>
                <li><input name="d7" type="checkbox" class="css_chk3" id="d7" value="1" <?php if($d7 == 1) echo "checked"; ?>>
    &nbsp; หลอดเลือดในสมอง </li>
					<li class="css_sub_chk3">
                    	<ul>
                        	<li><input name="d7_1" type="checkbox" class="css_subchk3" id="d7_1" value="1" <?php if($d7_1 == 1) echo "checked"; ?>>
                       	  &nbsp; หลอดเลือดในสมองตีบ</li>
							<li><input name="d7_2" type="checkbox" class="css_subchk3" id="d7_2" value="1" <?php if($d7_2 == 1) echo "checked"; ?>>
						  &nbsp; หลอดเลือดในสมองแตก</li>
						</ul>
                    </li>
               	<li><input name="d8" type="checkbox" class="css_chk3" id="d8" value="1"<?php if($d8 == 1) echo "checked"; ?>>
               	&nbsp; เข่าเสื่อม<br />  </li>
               	<li><input name="d9" type="checkbox" class="css_chk3" id="d9" value="1"<?php if($d9 == 1) echo "checked"; ?>>
               	&nbsp; อื่นๆ<br />  </li></fieldset>
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
    	<li><input type="radio" name="life_type" value="1" <?php if($life_type == 1) echo "checked"; ?> />
    	&nbsp; เพศหญิง 26-60 ปี (กิจกรรมทางกายน้อย) ผู้สูงอายุ 60 ปี  </li>
		<li>
		  <input type="radio" name="life_type" value="2"  <?php if($life_type == 2) echo "checked"; ?>/>
	    &nbsp; เพศชาย 26-60 ปี เพศชาย - หญิง (14-25 ปี) และ หญิง 26 - 60 ปี กิจกรรมปานกลาง งาน Office </li>
		<li><input type="radio" name="life_type" value="3" <?php if($life_type == 3) echo "checked"; ?> />
		&nbsp; ผู้ใช้พลังงานมาก ออกกำลังกาย นักกีฬา ผู้ใช้แรงงาน </li>
    </ul>
    
    <h5> ครอบครัว </h5>
    
    <ul>
    	<li><input type="radio" name="history_family" class="css_rad" value="0" <?php if($history_family == 0) echo "checked"; ?> /> ไม่มีโรคประจำตัว(ในครอบครัว)</li>
		<li><input type="radio" name="history_family" class="css_rad" value="1" <?php if($history_family == 1) echo "checked"; ?> /> มีโรคประจำตัว </li>
        	<ul  class="css_groub_chk">
            	<li>-&nbsp;&nbsp;&nbsp;<input name="df1" type="checkbox" id="df1"  value="1" <?php if($df1 == 1) echo "checked"; ?> class="css_data_item"  >
           	  &nbsp; เบาหวาน</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df2" type="checkbox" id="df2"  value="1" <?php if($df2 == 1) echo "checked"; ?> class="css_data_item" />
              &nbsp; ความดันโลหิตสูง</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df3" type="checkbox" id="df3"  value="1" <?php if($df3 == 1) echo "checked"; ?> class="css_data_item" />
              &nbsp; ไขมัน</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df4" type="checkbox" id="df4"  value="1" <?php if($df4 == 1) echo "checked"; ?> class="css_data_item" />
              &nbsp; ไตวาย</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df5" type="checkbox" id="df5"  value="1" <?php if($df5 == 1) echo "checked"; ?> class="css_data_item" />
              &nbsp; โรคหัวใจ</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df6" type="checkbox" id="df6"  value="1" <?php if($df6 == 1) echo "checked"; ?> class="css_data_item" />
              &nbsp; โรคมะเร็งเต้านม</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df7" type="checkbox" id="df7"  value="1" <?php if($df7 == 1) echo "checked"; ?> class="css_data_item" />
              &nbsp; โรคมะเร็งลำไส้ใหญ่</li>
                <li>-&nbsp;&nbsp;&nbsp;<input name="df8" type="checkbox" id="df8"  value="1" <?php if($df8 == 1) echo "checked"; ?> class="css_data_item" />
              &nbsp; โรคมะเร็งตับ</li>
            </ul>
    </ul>
    
    <h5> สูบบุหรี่ </h5>
    
    <ul>
    	<li><input type="radio" name="sigar" id="sigar" class="css_rad1" value="0"  <?php if($sigar == 0) echo "checked"; ?>/>&nbsp; ไม่เคยสูบเลย</li>
        <li>
          <input type="radio" name="sigar" id="sigar" class="css_rad1" value="1"  <?php if($sigar == 1) echo "checked"; ?> />
        &nbsp; เคยสูบ / สูบ</li>
  <ul class="css_groub_chk1">
            	<li><input type="radio" name="s1" value="1"  <?php if($s1 == 1) echo "checked"; ?> class="css_data_item1"/>
            	  &nbsp; เคยสูบแต่เลิกแล้ว (ระยะเวลาที่เคยสูบ
            	  <input type="tel" name="s1a" placeholder="ปี" maxlength="2" style="color: #0000FF;width:20px;text-align: right;" id="s1a" value="<?php echo $s1a; ?>"  />
            	  ปี )</li>
                <li><input type="radio" name="s1" value="2"  <?php if($s1 == 2) echo "checked"; ?> class="css_data_item1"/>
          &nbsp; สูบไม่สม่ำเสมอ บางวัน/บางสถานะการณ์</li>
                <li><input type="radio" name="s1" value="3"  <?php if($s1 == 3) echo "checked"; ?> class="css_data_item1"/>
                &nbsp; สูบประจำ วันละ
                  <input type="tel" name="s3a" placeholder="มวน" maxlength="2" style="color: #0000FF;width:20px;text-align: right;" id="s3a" value="<?php echo $s3a; ?>"  />
                มวน สูบมา
                <input type="tel" name="s3b" placeholder="ปี" maxlength="2" style="color: #0000FF;width:20px;text-align: right;" id="s3b" value="<?php echo $s3b; ?>"  />
                ปี [ควรเลิกสูบ]</li>
            </ul>
	</ul>
    
    <h5> สุรา </h5>
    
    <ul>
    	<li><input type="radio" name="alcohol" id="alcohol" class="css_rad2" value="0"  <?php if($alcohol == 0) echo "checked"; ?>/>
    	&nbsp; ไม่เคยดื่มเลย</li>
        <li><input type="radio" name="alcohol" id="alcohol"  class="css_rad2" value="1" <?php if($alcohol == 1) echo "checked"; ?> />
        &nbsp; เคยดื่ม / ดื่ม</li>
        	<ul class="css_groub_chk2">
            	<li><input type="radio" name="a1" class="css_chk2" value="1" <?php if($a1 == 1) echo "checked"; ?>/>
           	  &nbsp; เคยดื่มแต่เลิกมาแล้ว (ระยะเวลาที่เคยดื่ม
           	    <input type="tel" name="a1a"  maxlength="2" style="color: #0000FF;width:20px;text-align: right;" id="a1a" />
       	      ปี )</li>
                <li><input type="radio" name="a1" class="css_chk2" value="2" <?php if($a1 == 2) echo "checked"; ?>/>
              &nbsp; ดื่มบางครั้ง/บางสถานะการณ์</li>
                <li><input type="radio" name="a1" class="css_chk2" value="3" <?php if($a1 == 3) echo "checked"; ?>/>
              &nbsp; ดื่มประจำ (มากกว่า 3วัน/สัปดาห์) นับใน 1 สัปดาห์ ดื่มประมาณ</li> 
                	<li class="css_sub_chk2"> 
                		<ul>
            				<li><input name="a3b1" type="checkbox" class="css_subchk2" id="a3b1" value="1"<?php if($a3b1 == 1) echo "checked"; ?>>&nbsp; เบียร์ 
            				  <input name="a3c1" type="tel" id="a3c1" style="color: #0000FF;width:20px;text-align: right;" value="<?php echo $a3c1; ?>" maxlength="2"  /> 
           				    ขวด</li>
                			<li><input name="a3b2" type="checkbox" class="css_subchk2" id="a3b2" value="1"<?php if($a3b2 == 1) echo "checked"; ?>>
                			&nbsp; ไวน์
<input name="a3c2" type="tel" id="a3c2" style="color: #0000FF;width:20px;text-align: right;" value="<?php echo $a3c2; ?>" maxlength="2" /> 
               			    ขวด</li>
               				<li><input name="a3b3" type="checkbox" class="css_subchk2" id="a3b3" value="1"<?php if($a3b3 == 1) echo "checked"; ?>>
               				&nbsp; เหล้า
<input name="a3c3" type="tel" id="a3c3" style="color: #0000FF;width:20px;text-align: right;" value="<?php echo $a3c3; ?>" maxlength="2"  /> 
           				    ขวด</li>
               				<li><input name="a3b4" type="checkbox" class="css_subchk2" id="a3b4" value="1"<?php if($a3b4 == 1) echo "checked"; ?>>
               				&nbsp; เหล้าขาว
<input name="a3c4" type="tel" id="a3c4" style="color: #0000FF;width:20px;text-align: right;" value="<?php echo $a3c4; ?>" maxlength="2"  /> 
           				    ขวด</li>  
                    	</ul>
                    </li>
            </ul>
    </ul>                  	           	
    	                
</div>

</fieldset>

<hr />

<p align="left">

<br />

	  <input name="update2" type="submit" id="update2" value="&lt;&lt; ย้อนกลับ" onclick="history.back()" />
	  <?php
 if($Num_Rows>0){
?>
<input name="update" type="submit" id="update" value="ปรับปรุง" />

<?php } else {?>
<input name="insert" type="submit" id="insert" value="เพิ่มข้อมูล" />

<script src="js/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
$j= $.noConflict(true);
</script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<?php } ?>
</p>

</form>

<hr />

</div>
</body>
</html>