<?php include('head.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
.style13 {font-family: "ms Sans Serif"; font-weight: bold; font-size: 12px; }
.style22 {font-family: Tahoma;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<div align="center">
<?  if($statusCheck!=""){ ?>
  <table width="1024" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8" height="9"><img src="img/gs_apponline_box2_1.gif" width="8" height="9" /></td>
    <td height="9" background="img/gs_apponline_box2_2.gif"></td>
    <td width="8" height="9"><img src="img/gs_apponline_box2_3.gif" width="10" height="9" /></td>
  </tr>
    <tr>
    <td background="img/gs_apponline_box2_8.gif">&nbsp;</td>
      <td><div align="center">
        <p>&nbsp;</p>
      </div>
        <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#666666" class="style13">
          <tr bgcolor="#FFCC33">
            <td width="5%" class="style6"><div align="center">ID</div></td>
            <td width="20%" class="style6"><div align="center">ชื่อหลักสูตร</div></td>
            <td width="20%" class="style6"><div align="center">ชื่อ - สกุล</div></td>
            <td width="5%" class="style6"><div align="center">เพศ</div></td>
            <td width="5%" class="style6"><div align="center">เส้นทาง</div></td>
            <td width="15%" class="style6"><div align="center">ตำแหน่ง</div></td>
            <td width="20%" class="style6"><div align="center">สังกัด</div></td>
            <td width="5%" class="style6"><div align="center">โอนเงิน<br>
            </div></td>
            <td width="5%" bgcolor="#FF9900" class="style6"><div align="center">สถานะ<br>
            </div></td>
          </tr>
          <? 
  if($statusCheck=="1") {
     $sql_t1="SELECT * FROM course c, register r  where  c.id=r.course_id and c.years='$P_year'   ";
  }
  else {
	$sql_t1="SELECT * FROM course c, register r  where  c.groups = '$groupCheck' and c.id=r.course_id and c.years='$P_year' ";
}		  
$Per_Page =30;
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
$sql_t1 .= "  ORDER BY r.id desc LIMIT $Page_start , $Per_Page";
//echo $sql_t1;
//ส่วนแสดงผล
if(empty($Num_Rows)) /* ตรวจสอบว่ามีอยู่หรือยัง */
{
echo"<td  colspan='6'> <center><br>ไม่พบข้อมูล </center></td>";
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
            <td valign="middle" class="style31"><div align="center"><span class="style35"><? echo $row->mid ;?></span></div></td>
            <td height="25" valign="middle" class="style31"><strong><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
              <?php 
				        $sql_c="SELECT name,price FROM course  WHERE id='$row->course_id'  ";
						$result_c=mysql_db_query($database_connect,$sql_c);
						 while($row_c=mysql_fetch_object($result_c)){
						 $course_name=$row_c->name;
			?>
            </font></strong><? echo $course_name;?><span class="style23">
            <? }?>
            </span></td>
            <td valign="middle" class="style31"><span class="style35">&nbsp;
              <?      if($statusCheck!=""){ ?>
              <a href="admit_add.php?what=edit&id=<? echo $row->id;?>&course=<? echo $row->course_id;?>" title="<? echo $row->detail;?>">
              <? } echo "$row->title$row->name  $row->s_name"  ; { ?>
              </a>
              <? }?>
            &nbsp; </span></td>
            <td valign="middle" class="style31"><div align="center"><span class="style35"><? echo $row->sex ;?></span></div></td>
            <td  valign="middle" class="style31"><div align="center"><span class="style35"><? echo number_format($row->road) ;?></span></div></td>
            <td  valign="middle" class="style31"><div align="left"><span class="style35"><? echo $row->position ;?></span></div></td>
            <td  valign="middle" class="style34"><div align="left"><span class="style35"> <? echo $row->company;?></span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style35"><? echo number_format($row->pay); ?></span></div></td>
            <td   valign="middle" class="style34"><div align="center"><span class="style13">
              <?				
if($row->status<>0)
{
?>
              <img src="images/apply_f2.png" width="12" height="12">
                  <? }  else  {?>
                  <img src="images/cancel.png" width="12" height="12">
          <? } ?>          </tr>
          <?
				$a++;
			}
			}
?>
        </table>
        
      <p><span class="style22">มีจำนวน สมาชิก ทั้งหมด
          <?= $Num_Rows;?>&nbsp;
คน 
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
      </span></p></td>
    <td background="img/gs_apponline_box2_4.gif">&nbsp;</td>
    </tr>
  <tr>
    <td><img src="img/gs_apponline_box2_7.gif" width="8" height="9" /></td>
    <td background="img/gs_apponline_box2_6.gif"></td>
    <td><img src="img/gs_apponline_box2_5.gif" width="10" height="9" /></td>
  </tr>
  </table>
  <? }?>
</div>
<p>&nbsp;</p>
</body>
</html>
