<script language="JavaScript">
<!--
function ValidateForm(obj) {
   if (obj.user.value == "") {
      alert("กรุณากรอกข้อมูล Username ค่ะ")
      obj.user.focus()
      return false;
   }
   if (obj.pass.value == "") {
      alert("กรุณากรอกข้อมูล Password ค่ะ")
      obj.pass.focus()
      return false;
   }
   	return true;
    }
//-->
</script>
<style type="text/css">
<!--
.style1 {color: #0303FF}
.style2 {FONT-SIZE: 8pt; FONT-WEIGHT: bolder; font-family: 'Microsoft Sans Serif', 'MS Sans Serif';}
-->
</style>
<table width="100%">
  <tr>
    <td width="100%" height="40" align="center" bgcolor="#66CC66"><div align="center"><span class="bl13"><strong>ลงชื่อผู้ใช้
    (Login)&nbsp;</strong></span></div></td>
  </tr>
  <tr>
    <td><div align="center"></div>      
      <form name="form1" method="post" action="loginchk.php" onSubmit="return ValidateForm(this)">
        <table width="100%">
          <tr>
            <td width="52%" valign="middle"><div align="right"><span class="cfont">ชื่อผู้ใช้
            : </span></div></td>
            <td width="48%"><input type="text" name="users" id="users" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td width="52%" valign="middle"><div align="right"><span class="cfont">Password: </span></div></td>
            <td width="48%"><input type="password" name="pass" id="pass" size="20" maxlength="15">                </td>
          </tr>
          <tr>
            <td width="52%">&nbsp;</td>
            <td width="48%">
              <div align="left">
                <input name="Submit" type="submit" class="byellow" value="ตกลง">
              </div></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center"><font color="#FF0000"><?php echo $_SESSION['x'];?></font></div></td>
          </tr>
        </table>
      </form>    </td>
  </tr>
</table>
<div align="center"><a href="register.php">ลงทะเบียนสมาชิกใหม่
</a></div>
