<?php include"head.php"; ?>
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">  
<link href="css/validator.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script  src="js/jquery-1.3.2.min.js"></script>
<script  src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script src="js/jquery.min.js"></script>
<script  src="js/bootstrap.js"></script>
<script type="text/JavaScript">
function checkboxxx() { //v3.0
            if (document.frmMain.targreement.checked == true) {
			document.getElementById("sex").value 
                document.frmMain.update.disabled = false;
            } else  if (document.frmMain.targreemente.checked == true) {
                document.frmMain.update.disabled = false;
            } else {
                document.frmMain.update.disabled = true;
            }
        }
</script>
<?php 
if(empty($_REQUEST['id_card']))
{ $id_card="";}
else { $id_card=$_REQUEST['id_card'];}
?>


<style type="text/css">  
.ui-datepicker{  
    width:150px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
}  
.style22 {font-family: Tahoma;
	font-size: 12px;
}
</style>  
<div class="container">
  <form action="search_form.php" method="post" name="frmMain">
<fieldset>

<legend>ข้อมูลส่วนตัว</legend>
<div class align="left">
  ID_Card :
    <input type="tel" name="id_card" id="id_card"  maxlength="13" placeholder="เลขบัตรประชาชน"  class="form-control css-require"  value="<?php echo $_REQUEST[id_card]; ?>" />
    <input type="submit" value="ค้นหา"/>
    <br />
</div>
 <div class="form-group has-feedback">
<div class align="left"><br />
  <br />
</div>
</div>
</fieldset>

</form>

<hr />
<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#666666" class="style13">
          <tr bgcolor="#FFCC33">
            <td width="5%" class="style6"><div align="center">ID</div></td>
            <td width="10%" class="style6"><div align="center">IDCard</div></td>
            <td width="14%" class="style6"><div align="center">ชื่อ - สกุล</div></td>
            <td width="3%" class="style6"><div align="center">อายุ</div></td>
            <td width="5%" class="style6"><div align="center">BMI</div></td>
            <td width="6%" class="style6"><div align="center">ความดัน</div></td>
            <td width="5%" class="style6"><div align="center">ลดน้ำหนัก</div></td>
            <td width="5%" class="style6"><div align="center">คุมน้ำตาล<br>
            </div></td>
            <td width="5%" class="style6"><div align="center">ลดความดัน<br />
            </div></td>
            <td width="5%" class="style6"><div align="center">ไขมันร้าย<br />
            </div></td>
            <td width="5%" class="style6"><div align="center">เพิ่มไขมันดี<br />
            </div></td>
            <td width="5%" class="style6"><div align="center">หัวใจ<br />
            </div></td>
            <td width="5%" class="style6"><div align="center">กล้ามเนื้อ<br />
            </div></td>
            <td width="5%" class="style6"><div align="center">เข่าเสื่อม<br />
            </div></td>
            <td width="5%" class="style6"><div align="center">เครียด<br />
            </div></td>
            <td width="15%" bgcolor="#FF9900" class="style6"><div align="center">จัดการ<br>
            </div></td>
    </tr>
 <?php 
include('dbconnect.php');
mysql_select_db($database_connect, $connect);
  if($id_card) {
     $sql_t1="SELECT * from v_screen WHERE pt_cid='". $id_card . "' and   hos_id like '". $_SESSION['hos_id'] . "'  ";
  }
  else {
     $sql_t1="SELECT * from v_screen where   hos_id like '". $_SESSION['hos_id'] . "'  ";
}	
//echo $sql_t1;	  
$Per_Page =10;
if(!$Page)
$Page=1;

$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$No=($Prev_Page*$Per_Page);
$result = mysql_query($sql_t1);	
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))
print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql_t1 .= " GROUP BY pt_id   order by date_pres desc  LIMIT $Page_start , $Per_Page";
//echo $sql_t1;
//ส่วนแสดงผล
if(empty($Num_Rows)) /* ตรวจสอบว่ามีอยู่หรือยัง */
{
echo"<td  colspan='16'> <center><br>ไม่พบข้อมูล </center></td>";
  }
else
{
	$result=mysql_query($sql_t1);
	 while($row=mysql_fetch_object($result)){
?>
          <?php
// การกำหนดสีของ แถว table
	if($bg=="#f2fbff")
				{		$bg="#ffffff";				}
			else 
				{		$bg="#f2fbff";				}
	echo "<tr bgcolor=$bg>";
?>
            <tr><td valign="middle" class="style31"><div align="center"><span class="style35"><?php echo $row->pt_id ;?></span></div></td>
            <form action="del_pt.php" method="post" name="frmMain" id="frmMain">
            <td height="25" valign="middle" class="style31"><span class="style35"><?php echo $row->pt_cid ;?>
                <span class="class">
                <input type="hidden"  name="pt_id"  value="<?php echo $row->pt_id; ?>" id="$row->pt_id" />
                </span>
             <input  name="targreement"  type="checkbox" id="targreement" onchange="checkboxxx()"  />
             <input name="update" type="submit" id="update" value="ลบ"   />
            </span></td>
            </form>
            <td valign="middle" class="style31"><span class="style35">&nbsp;<?php echo $row->pt_name ;?></span></td>
            <td valign="middle" class="style31"><div align="center"><span class="style35"><?php echo $row->pt_age ;?></span></div></td>
            <td  valign="middle" class="style31"><div align="center"><span class="style35"><?php echo number_format($row->pt_bmi, 2, '.', ''); ?></span></div></td>
            <td  valign="middle" class="style31"><div align="left"><span class="style35"><?php echo number_format($row->pt_bps, 0, '.', '')."/ ".number_format($row->pt_bpd, 0, '.', '') ;?></span></div></td>
            <td  valign="middle" class="style34"><div align="center"><span class="style35">
            <?php 		if($row->want_fit==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"> 
            <?php 		if($row->want_dm==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"> 
            <?php 		if($row->want_ht==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"> 
            <?php 		if($row->want_ldl==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"> 
            <?php 		if($row->want_hdl==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"> 
            <?php 		if($row->want_heart==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"> 
            <?php 		if($row->want_mas==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"> 
            <?php 		if($row->want_oa==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"> 
            <?php 		if($row->want_emotion==1){ echo " <img src='images/apply_f2.png' width='17' height='17'>";}?>
            </span></div></td>
            <td   valign="middle" class="style34">
            <a href="form.php?pt_id=<?php echo $row->pt_id; ?>">คัดกรอง</a> </br>
            <a href="form_disease.php?pt_id=<?php echo $row->pt_id; ?>">โรคประจำตัว </a></br>
            <a href="form_work.php?pt_id=<?php echo $row->pt_id; ?>"> กิจกรรมกาย </a></br>
            <a href="form_food.php?pt_id=<?php echo $row->pt_id; ?>">อาหาร + เครียด </a></br>
            <a href="form_prescription.php?pt_id=<?php echo $row->pt_id; ?>">ข้อตกลงร่วมกัน </a></br> 
            <a href="print_out.php?pt_id=<?php echo $row->pt_id; ?>">ใบสั่งสุขภาพ </a></br>           </td> 
    </tr>
         <?php 
				$a++;
			}
			}
?>
        </table>
        <span class="style22">มีจำนวน  ทั้งหมด
        <?= $Num_Rows;?>
        &nbsp;
รายการ 
รวมทั้งหมด : <b>
<?=$Num_Pages;?>
</b> หน้า :
<?/* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?Page=$Prev_Page&&course=$course'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)
echo "[<a href='$PHP_SELF?Page=$i&&course=$course'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?Page=$Next_Page&&course=$course'> หน้าถัดไป>> </a>";

?>
        </span>
        <hr />

</div>

</body>
</html>