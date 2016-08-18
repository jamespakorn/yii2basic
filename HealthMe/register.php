<?php 
include"head.php"; 
$_SESSION['security_number']=rand(10000,99999);
 ?>
 <!DOCTYPE html>
<html lang="en">
	<meta charset="UTF-8">

<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">  
<link href="css/system.css" rel="stylesheet">
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>     
<script>
 $.validate({
 modules: 'security, file',
 onModulesLoaded: function () {
 $('input[name="pass_confirmation"]').displayPasswordStrength();
 }
 });
 </script>   
<script type="text/javascript">
       function showUser(str) {
            if (str == "") {
                document.getElementById("spname").innerHTML = "";
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
       function showUser0(str) {
            if (str == "") {
                document.getElementById("hospital").innerHTML = "";
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
					document.getElementById("hospital").value = xmlhttp.responseText;

				}
			}
            xmlhttp.open("GET", "regisgetHos.php?q=" + str, true);
            xmlhttp.send();
        }

</script>

<br>


	<form name="frmMain" id="frmMain" method="post" action="register_c.php"  onsubmit="javascript:return validate()">
<fieldset>
				<legend>ลงทะเบียนใช้งานสำหรับ ผู้ใช้ใหม่</legend>	
      </fieldset>	
<div class align="left">
                Username : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   	  <input type="text" name="loginname" id="loginname" maxlength="20" placeholder="Username" style="height:30px" onKeyUp="showUser(this.value)" class="validate[required,custom[noSpecialCaracters],length[0,20]]" />
      </div>
<div class align="left"> ผลตรวจสอบ : &nbsp;&nbsp;&nbsp;&nbsp;
   	  <input name="spname" type="text" id="spname" style="height:30px" maxlength="50" readonly />
   	 </div>
                

<div class align="left">
                Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   	  <input type="text" name="password" id="password"  maxlength="50" placeholder="Password" style="height:30px"class="validate[required,custom[noSpecialCaracters],length[0,50]]" />
      </div>
                
                <div class align="left">
                ชื่อ - สกุล :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="name"  id="name" maxlength="100" placeholder="ชื่อ-สกุล" style="height:30px"  class="validate[required,length[0,100]] text-input" />
                </div>
                
                <div class align="left">
                ตำแหน่ง : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="position" placeholder="ตำแหน่ง" style="height:30px"class="validate[required,length[0,100]] text-input" />
                </div>
                
                <div class align="left">
                รหัส รพ./รพ.สต :&nbsp;
                <input type="text" name="hos_id" id="hos_id"  placeholder="รหัส รพ." style="height:30px" class="validate[required,custom[onlyNumber]"  onKeyUp="showUser0(this.value)"/>
                </div>
                
                <div class align="left">
                ชื่อสังกัด : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="hospital"  id="hospital" placeholder="ชื่อสังกัด" style="height:30px" />
                </div>
                
<div class="form-group">
                เบอร์โทร : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="tel"id="tel"  maxlength="11" placeholder="เบอร์โทร" style="height:30px" class="validate[required,custom[telephone],length[0,10]] text-input" />
</div>
                
                <div class align="left">
                E-mail : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="email"  id="email" placeholder="Email" style="height:30px" class="validate[required,custom[email]] text-input"/>
                </div>
                
                <p><div class="secureImage"><img src="image.php"   alt="well, this is out capcha image"/></div>
                <div align="left"><br />
                  <input name="txtcapchar" type="password" id="txtcapchar" placeholder="Security Code" value="" class="form-control input-sm chat-input"/>
                </div>
                <p>
                  <?php
                                            if (!empty($_SESSION['security_error'])) {
                                                echo $_SESSION['security_error'];
                                            }
                                            ?>
                  <br/>
                </p>
                <p align="left">
       <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
      </p>
  </form>
