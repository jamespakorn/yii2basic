<?php
//header("Content-type:text/html; charset=UTF-8");        
//header("content-type: application/x-javascript; charset=UTF-8");


	/*** By Weerachai Nukitram ***/
	/***  http://www.ThaiCreate.Com ***/

///////////////////////////////////
$strSearch = $_POST["mySearch"];
//include("include/con_db.php");
$objConnect = mysql_connect("localhost","root","123456") or die("Error Connect to Database");
mysql_query("SET NAMES utf8",$objConnect);
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");



$objDB = mysql_select_db("stock");

$strSQL = "SELECT * FROM item_type WHERE item_type_name LIKE '%".$strSearch."%' ORDER BY item_type_id ASC ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

?>
  <table width="90%" border="0" cellspacing="2" cellpadding="2">

<table width="900" border="0">
  <tr>
    <td width="250"><span class="style2">ชื่อพัสดุ</span></td>
    <td width="30"><div align="center"><span class="style2">หมวดย่อย</span></div></td>
    <td width="60"><div align="center"><span class="style2">รหัสอ้างอิง</span></div></td>
    <td width="80"><div align="center"><span class="style2">วันหมดอายุ:<br />
      คศ-เดือน-วัน</span></div></td>
    <td width="70"><span class="style2">หน่วยนับ</span></td>
    <td width="70"><div align="right"><span class="style2">ราคา</span></div></td>
    <td width="70"><div align="right"><span class="style2">ราคากลาง</span></div></td>
    <td width="70"><div align="center"><span class="style2">คงเหลือ</span></div></td>
    <td width="100"><span class="style2">วันที่แก้ไข
    </span></td>
    <td width="50"><span class="style2">ค่าเสื่อม</span></td>
  </tr>
 </table>
<? 		  $n=0; ?>
<table width="900" border="0">
 <tr>
 <td>
 <div align="left" id ="sub_<?=$i?>" ><?
              $sql_sub = "select * from item_type where  item_type_name LIKE '%".$strSearch."%' and  type_status = '0' order by ref_code ASC ";
			 // echo $sql_sub;
			  $result_sub = mysql_query($sql_sub) or die(mysql_error());
			  $i=0;
			  while($row_sub = mysql_fetch_array($result_sub))
			  {
			  ?>
 <table width="900" border="0">
    <tr>
    <td width="250" align="left"><a href="report_sub1.php?ref_code=<?=$row_sub['ref_code']?>"><strong><?=$row_sub['ref_code']?></strong></a> <?=$row_sub['item_type_name']?>&nbsp;</td>
      <td width="30"><div align="center">
      <?=$row_sub['head']?>
      &nbsp;</div></td>
  <td width="60"><div align="center">
      <?=$row_sub['item_type_id']?>
      &nbsp;</div></td>
    <td width="80"><?=$row_sub['lifetime']?>      &nbsp;</td>
    <td width="70"><?=$row_sub[unit]?>&nbsp;</td>
    <td width="70"><div align="right">
      <?=$row_sub[cost]?>
      &nbsp;</div></td>
    <td width="70"><div align="right">
      <?=$row_sub[cost_c]?>
      &nbsp;</div></td>
    <td width="70"> <div align="center">
      <?=$row_sub[start_number]?>
      &nbsp;  </div></td>
    <td width="100"><?=$row_sub['edit_date']?></td>
    <td width="50">
    <? if($status=="admin") { ?><a href="javascript:confirmDelete('edit_list_search.php?del_id=<?=$row_sub[item_type_id]?>')">ลบ</a>  <? }?>
    <a href="javascript:show_hide('edit_sub_<?=$i?>');">แก้ไข</a></td>
  </tr>
  </table>
</div>     
 <div align="left" id ="edit_sub_<?=$i?>" style="display:none;">

      <table width="900" border="0">
     <tr>
         <td width="250"><input type="text" name="edit_ref_code_<?=$row_sub[item_type_id]?>" id="edit_ref_code"_<?=$row_sub[item_type_id]?> value="<?=$row_sub[ref_code]?>" class="stext" /> : <input name="edit_text_<?=$row_sub[item_type_id]?>" type="text" value="<?=$row_sub[item_type_name]?>" />  </td>
       <td width="30">หมวดย่อย
      <input type="checkbox" name="edit_head_<?=$row_sub[item_type_id]?>" id="edit_head_<?=$row_sub[item_type_id]?>" value="1"  <? if($row_sub[head] == 1) echo checked;?> />
     <td width="70">รหัสรายการ<input type="text" name="edit_item_<?=$row_sub[item_type_id]?>" id="edit_item_<?=$row_sub[item_type_id]?>" value="<?=$row_sub[item_type_id]?>" class="stext" readonly="readonly" /></td>
      <td width="100">ปี-เดือน-วัน<input type="text" name="edit_lifetime_<?=$row_sub[item_type_id]?>"id="edit_lifetime_<?=$row_sub[item_type_id]?>"  value="<?=$row_sub[lifetime]?>" /></td>
      <td width="70">หน่วย <input type="text" name="edit_unit_<?=$row_sub[item_type_id]?>" id="edit_unit_<?=$row_sub[item_type_id]?>"  value="<?=$row_sub[unit]?>"  class="stext" /> </td>
      <td width="70">ราคา<input type="text" name="edit_cost_<?=$row_sub[item_type_id]?>" id="edit_cost_<?=$row_sub[item_type_id]?>" value="<?=$row_sub[cost]?>" class="stext" /></td>
      <td width="70">ราคากลาง<input type="text" name="edit_cost_c_<?=$row_sub[item_type_id]?>" id="edit_cost_c_<?=$row_sub[item_type_id]?>" value="<?=$row_sub[cost_c]?>"  class="stext" /></td>
      <td width="70">คงเหลือ<input type="text" name="edit_start_number_<?=$row_sub[item_type_id]?>" id="edit_start_number_<?=$row_sub[item_type_id]?>"  value="<?=$row_sub[start_number]?>" class="stext" /></td>
      <td width="100">วันที่
      
</td>
      <td width="50"> 
   <input name="edit_text_<?=$i?>" type="button" value="บันทึก" onclick="document.form1.sub_id_set.value='<?=$row_sub[item_type_id]?>';form1.submit();" />
   
</td>
            </tr>
  </table>     
                         
        </div>

                                     <?
			  $i++;
              }
			  
			  ?>

 </td>
 <table width="900" border="0">


</table>

  
                <br />
          </div></td>
    </tr>
            <tr>
              <td colspan="2" valign="top"><div align="center" style="border-bottom: solid #000000;"></div></td>
            </tr>

            
         </table>

<br />
       
          
          <label>
          <br />

          </label>
          <br />
          <br />
          <p>&nbsp;</p>

<?
mysql_close($objConnect);
?>
