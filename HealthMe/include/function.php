
<?

//<!- ===============================================PHP function====================================== -->
function admin_login()
{
	global $_SESSION;
	if($_SESSION['status'] != "admin")
	{
		exit("ไม่สามารถใช้งานในเมนูนี้ได้");
	}
	
}



function get_momey_used($group_id,$year,$b_m,$b_id=0,$b_number_index="",$end_date="")
{
	global $Conn;
	$ly = (($year-1)+2500)-543;
	$all_ty = "'$ly-10-01' and '".(($year+2500)-543)."-09-30'";
	$sql_add = "";
	if($b_id != "0")
	{
		$sql_add=" and b_id != '$b_id' ";
	}
	if($b_number_index != "")
	{
		list($b_number_inc,$b_y) = preg_split("[/]",$b_number_index);
	}
	if($end_date != "")
	{
		//$sql_add.=" and start_date <= '$end_date' ";
	}
	$sql = "select b_id,b_number from book where (start_date  between $all_ty) and b_number != '' and b_m = '$b_m' and b_status='0' and b_g = '$group_id'  $sql_add
	 order by b_number ASC";
	$result =  mysql_query($sql) or die(mysql_error());
	$total_monney = 0;
	//echo $sql;
	$book_id_arr = "";
	$b_number_arr = "";
	$b_numbers = "";
	while($row = mysql_fetch_array($result))
	{	
		$b_number = $row[b_number];
		list($b_numbers,$b_y) = preg_split("[/]",$b_number);
		$book_id_arr[] = $row[b_id];		
		$b_number_arr[] = floatval($b_numbers);
		
		
	}
	//print_r($b_number_arr);
	//echo"<hr />";
	if($b_number_arr != "")
	{
		asort($b_number_arr);
	
		//print_r($b_number_arr);
		foreach($b_number_arr as $key => $value)
		{
			//echo"$key $value <br />";
			$mpid = 0;
			$book_id = $book_id_arr[$key];
			if($value < $b_number_inc or $b_number_index == "")
			{
				//echo"$key $value <br />";
				$sql_detail = "select * from book_detail where book_id = '$book_id' ";
				$result_detail = mysql_query($sql_detail) or die(mysql_error());
				$sql_vat = "select vat_type,vat,disc,distype from setting where book_id = '$book_id' ";
				$result_vat = mysql_query($sql_vat) or die(mysql_error());
				
				$row_vat = mysql_fetch_array($result_vat);
				$vat_type = $row_vat['vat_type'];
				$disc = $row_vat['disc'];
				$disctype = $row_vat['distype'];
				
				while($row_detail = mysql_fetch_array($result_detail))
				{
					$num = $row_detail[p_detail];
					$price = $row_detail[price_detail ];
					$cal_price = $num*$price;	
					
					if($vat_type==1)
					{
						
						$vat = $row_vat[vat];
						$cal_price=$cal_price+($cal_price*($vat/100));
					}		
					$mpid+=$cal_price;
					$total_monney+=$cal_price;
				}
				//คำนวนส่วนลด
				$dcm = 0;
				if($disc != 0)
				{
					if($disctype == "p")
					{
						$dcm = $mpid*($disc/100);
					}
					else
					{
						$dcm = $mpid-$disc;
					}
					$total_monney=$total_monney-$dcm;
				}
			}
		}
	}
	// used budget
	//echo "$group_id $year";
	$sql_u = "select * from budgets where pg_id = '$group_id' and bg_year = '$year' and  bg_type = '$b_m'";
	$result_u = mysql_query($sql_u) or die(mysql_error());
	$row_u = mysql_fetch_array($result_u);
	$bg_u = $row_u[bg_used];
	$total_monney = $total_monney+$bg_u;
	return $total_monney;
}

function get_budget($group_id,$year,$b_m)
{
	global $Conn;
	$sql = "select * from budgets where pg_id = '$group_id' and bg_year = '$year' and bg_type = '$b_m'";
	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());	 
	
	$row = mysql_fetch_array($result);
	
		
	$tv = $row[bg_total];
	//$tvu = $row[bg_used];
	//$total = $tv-$tvu;
	return $tv;		
	
}


function gen_detail_book_id($id)
{
	// gen detail
	global $Conn;
	$sql_detail = "select book_detail.*,item_type.ref_code
	from book_detail 
	LEFT OUTER JOIN item_type ON book_detail.book_detail_type = item_type.item_type_id
	where book_detail.book_id = '$id' 
	and item_type = '0'
	order by book_detail_id ASC";
	//echo "$sql_detail <br />";
	
	
	
	$result_detail = mysql_query($sql_detail) or die(mysql_error());
	$detail_book_id = "";
	$detail_num = "";
	$detail_name_code = "";
	$value="";
	while($row_detail = mysql_fetch_array($result_detail))
	{
		

		$value[detail_book_id][]=$row_detail[book_detail_id];
		$value[detail_num][]=$row_detail[p_detail];
		$value[detail_name_code][]=$row_detail[b_detail];
		$value[book_detail_type][]=$row_detail[ref_code];
		//echo $row_detail[ref_code];
		
		
	}
	return $value;
}

function gen_net_price($id,$vat,$disc,$vat_type=0,$distype)
{
	global $Conn;
	
	
	
			
	// gen detail
	$sql_detail = "select * from book_detail where book_id = '$id'";
	$result_detail = mysql_query($sql_detail) or die(mysql_error());
	$num_detail = mysql_num_rows($result_detail);
	
	//echo"dis type = $distype disc = $disc";
	while($row_detail = mysql_fetch_array($result_detail))
	{
		
		$total_price+=$row_detail['price_detail'] * $row_detail['p_detail'];
	}	
		
	$discount = $disc;
	if($distype == "p")
	{		
		$discount = ($disc / 100 ) * $total_price;
	}
	//echo "discount = $discount";
	$total_price = $total_price - $discount;
	
	if($vat_type == 2)
	{
		$net_price = $total_price;
	}
	else
	{
		$net_price = $total_price + $total_price*($vat/100);
	}
	
	
	
	
	return $net_price;
}

function gen_detail($index,$end,$id,$nn,$vat,$disc,$vat_type=0,$distype="p",$num_end=0,$show_type=0)
{
	// h book
	global $Conn;
	global $_REQUEST;
	$template_h = "template/$index";
	$myFile_h = $template_h;
	$fh_h = fopen($myFile_h, 'r');
	$body_h = fread($fh_h, filesize($myFile_h));
	
	//echo "distype= $distype num_end = $num_end";
			
	// gen detail
	$sql_detail = "SELECT * FROM book_detail d LEFT OUTER JOIN item_type t ON d.book_detail_type=t.item_type_id  where book_id = '$id' order by book_detail_id ASC";
	//$sql_detail = "select * from book_detail where book_id = '$id' order by book_detail_id ASC";
	$result_detail = mysql_query($sql_detail) or die(mysql_error());
	$num_detail = mysql_num_rows($result_detail);
	
	$gen_detail_h = $body_h.'
		<table width="720" border="1" cellspacing="0" cellpadding="0" align="center">
              <tr >
                <td width="5%" rowspan="2"><div align="center"><strong>ลำดับที่</strong></div></td>
                <td width="23%" rowspan="2"><div align="center"><strong>รายการ พัสดุ / ซื้อ / จ้าง<br />
                              (ขนาด ยี่ห้อและคุณลักษณะชัดเจน)</strong></div></td>
                <td width="7%" rowspan="2"><div align="center"><strong>ราคา<br>กลาง</strong></div></td>
                <td width="7%" rowspan="2"><div align="center"><strong>จำนวน<br>คงเหลือ</strong></div></td>
                <td width="11%" colspan="2"><div align="center"><strong>ราคาซื้อ/จ้าง<br>สุดท้ายใน 2 ปีงบฯ</strong></div></td>

                <td colspan="2"><div align="center"><strong>ราคาที่ขอซื้อ /จ้าง</strong></div></td>
                <td width="9%" rowspan="2"><div align="center"><strong>จำนวนเงิน</strong></div></td>
  </tr>
              <tr>
                 <td width="8%"><div align="center"><strong>วันเดือนปี</strong></div></td>
                <td width="8%"><div align="center"><strong>ราคา<br />
                 /หน่วย</strong></div></td>
                <td width="10%"><div align="center"><strong>จำนวน</strong></div></td>
                <td width="8%"><div align="center"><strong>ราคา<br />
                  /หน่วย</strong></div></td>
              </tr>
              
		';
		$n=0;
		$total_price=0;
		// จำนวนสั่งซื้อ
		$num_detail = mysql_num_rows($result_detail);
		$detail_book_id = "";
		$detail_num = "";
		$detail_name_code = "";
		$gen_detail = $gen_detail_h;
		$c=0;
		$p=0;
	while($row_detail = mysql_fetch_array($result_detail))
	{
		$n++;
		$x++;
		$total_price+=$row_detail['price_detail'] * $row_detail['p_detail'];
		$detail_book_id[]=$row_detail[book_detail_id];
		$detail_num[]=$row_detail[p_detail];
		$detail_name_code[]=$row_detail[b_detail];
		
		
		
		$r = floor($n/$nn);
		// type name
		if($show_type ==1)
		{
			$sql_type_name = "select item_type_name from item_type where item_type_id = '$row_detail[book_detail_type]'";
			$result_type_name = mysql_query($sql_type_name) or die(mysql_error());
			$row_type_name = mysql_fetch_array($result_type_name);
			$item_type_name = $row_type_name['item_type_name'];
		}
		$gen_detail.="
		<tr>
                <td><div align='center'>$x</div></td>
                <td><div align='left' style='margin-left:5px;'>".stripslashes($row_detail[b_detail])."</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>".$row_detail[t.start_number]."&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
                                        <td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>

            <td><div align='right'>".$row_detail[p_detail]." ".$row_detail[u_detail]."&nbsp;</div></td>
                <td><div align='right' style='margin-right:5px;'>".number_format($row_detail[price_detail],2)."</div></td>
                <td><div align='right' style='margin-right:5px;'>".number_format(($row_detail['price_detail'] * $row_detail['p_detail']),2)."</div></td>
  </tr>
           
		";
		
		if($r > 0 && $n < $num_detail)
		{
		
			
			if($n < $nn)
			{
				for($i=$n;$i<$nn;$i++)
				{
						$gen_detail.="
              						<tr>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
								<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
				<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='right' style='margin-right:5px;'>&nbsp;</div></td>
						<td><div align='right' style='margin-right:5px;'>&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
					  </tr>
				   
				";
							
						
				} //end for
			} // end if
			
			$r2 = floor($n/($nn+$num_end));
			
			
			$xx = ($num_end/2);
			if($n >= ($nn+$num_end) or ($num_detail-$p) < $nn)
			{
				$gen_detail.="
							
						  <tr>
							<td colspan='6'><div align='center' style='margin-right:5px;'><b>".$temp_price[$c-1]."</b></div></td>
							<td><div align='center'>รวม</div></td>
							<td><div align='right' style='margin-right:5px;'>".number_format($total_price,2)."</td>
							<td>&nbsp;</td>
						  </tr>
				
							";
				$gen_detail.=' </table>';
				$gen_detail.="<br style='clear:both;' /><div class='page-break'></div>";
				
				$gen_detail .= $gen_detail_h;
				
				$n=0;
				$p++;
				$temp_price[] = "ยอดยกมา ".number_format($total_price,2)." บาท";
				$c++;
				
			}
			
			
			
			
		}
		$p++;
		//echo "&nbsp;&nbsp;&nbsp;&nbsp;$l r = $r  $p=$p $c<br />";
		
	}// end while
	
	if($n < $nn)
			{
				for($i=$n;$i<$nn;$i++)
				{
						$gen_detail.="
              						<tr>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
								<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
				<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='right' style='margin-right:5px;'>&nbsp;</div></td>
						<td><div align='right' style='margin-right:5px;'>&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
					  </tr>
				   
				";
							
						
				} //end for
			} // end if
	$discount = $disc;
	if($distype == "p")
	{		
		$discount = ($disc / 100) * $total_price;
	}
	
	//echo "siscount = $discount";
	$total_pricex = $total_price;
	$vatx=100;
	if($vat_type == 2)
	{
		$vatx=100+$vat;
		$net_price = $total_price-$discount;
		$total_price_t = $net_price - ($net_price*($vat/$vatx));
	}
	else
	{
		$net_price = ($total_price-$discount) + (($total_price-$discount)*($vat/$vatx));
		$total_price_t = $total_price-$discount;
	}
	$vatshow = $vat;
	
	//$net_price=500001001000.10;
	$rows = 2;
	/*
	if($disc != 0)
	{
		$rows = 3;
	}
	*/
	$gen_detail.="
	<tr>
                <td colspan='8' rowspan='$rows' valign='top'><div align='center'>
		";
		if($disc != 0)
	 	{
			$gen_detail.="
				(ส่วนลด  ".number_format($discount,2)." บาท จาก ".number_format($total_pricex,2)." บาท เหลือ ".number_format(($total_price-$discount),2)." บาท) 		
				";
		}
				
		$gen_detail.="		รวมมูลค่าสินค้าก่อนคิด VAT</div>
				";
	
	$gen_detail.="	<div align='center'>ภาษีมูลค่าเพิ่ม $vatshow %</div>
				</td>
                <td><div align='right' style='margin-right:5px;'>".number_format($total_price_t,2)."</td>
              </tr>";
	/*
	if($disc != 0)
	{
		$gen_detail.="
	<tr>
                <td   valign='top'><div align='center'></div><div align='right'>".number_format($discount,2)."&nbsp; </div></td>
                <td><div align='right' style='margin-right:5px;'></td>
               
              </tr>";
			  
	}
	*/
    $gen_detail.="<tr>
	
                <td><div align='right' style='margin-right:5px;'>".number_format(($total_price-$discount)*($vat/$vatx),2)."</td>
              </tr>
              <tr>
                <td colspan='7'><div align='center' style='margin-right:5px;'><b>".monney2th(number_format($net_price, 2, '.', ''))."</b></div></td>
                <td><div align='center'>รวมทั้งสิ้น</div></td>
                <td><div align='right' style='margin-right:5px;'>".number_format($net_price,2)."</td>
              </tr>
	
	";
	$gen_detail.=' </table>';
	
	
	
	$template_b = "template/$end";
	$myFile_b = $template_b;
	$fh_b = fopen($myFile_b, 'r');
	$body_b = fread($fh_b, filesize($myFile_b));
	
	
	
	
	
	$gen_detail.=$body_b;
	return $gen_detail;
}

function gen_detail2($index,$end,$id,$nn,$vat,$disc,$vat_type=0,$distype="p",$num_end=0,$show_type=0)
{
	// h book
	global $Conn;
	global $_REQUEST;
	$template_h = "template/$index";
	$myFile_h = $template_h;
	$fh_h = fopen($myFile_h, 'r');
	$body_h = fread($fh_h, filesize($myFile_h));
	
	//echo "distype= $distype num_end = $num_end";
			
	// gen detail
	$sql_detail = "SELECT * FROM book_detail d LEFT OUTER JOIN item_type t ON d.book_detail_type=t.item_type_id  where book_id = '$id' order by book_detail_id ASC";
	//$sql_detail = "select * from book_detail where book_id = '$id' order by book_detail_id ASC";
	$result_detail = mysql_query($sql_detail) or die(mysql_error());
	$num_detail = mysql_num_rows($result_detail);
	
	$gen_detail_h = $body_h.'
		<table width="720" border="1" cellspacing="0" cellpadding="0" align="center">
              <tr >
                <td width="5%" rowspan="2"><div align="center"><strong>ลำดับที่</strong></div></td>
                <td width="23%" rowspan="2"><div align="center"><strong>รายการ</strong></div></td>
                <td width="7%" rowspan="2"><div align="center"><strong>หน่วยนับ</strong></div></td>
                <td width="7%" rowspan="2"><div align="center"><strong>ราคาต่อ<br>หน่วย</strong></div></td>
                <td width="11%" colspan="2"><div align="center"><strong>จำนวน</strong></div></td>
                <td width="10%" rowspan="2"><div align="center"><strong>ราคา<br>(บาท)</strong></div>                  </td>
                <td width="9%" rowspan="2"><div align="center"><strong>หมายเหตุ</strong></div></td>
  </tr>
              <tr>
                 <td width="8%"><div align="center"><strong>เบิก</strong></div></td>
                <td width="8%"><div align="center"><strong>จ่าย</strong></div></td>
              </tr>
		';
		$n=0;
		$total_price=0;
		// จำนวนสั่งซื้อ
		$num_detail = mysql_num_rows($result_detail);
		$detail_book_id = "";
		$detail_num = "";
		$detail_name_code = "";
		$gen_detail = $gen_detail_h;
		$c=0;
		$p=0;
	while($row_detail = mysql_fetch_array($result_detail))
	{
		$n++;
		$x++;
		if($row_detail['im_num'] != 0){ $im = $row_detail['im_num']; } else { $im = $row_detail['p_detail'];}

		
		$total_price+=$row_detail['price_detail'] * $im;
		$detail_book_id[]=$row_detail[book_detail_id];
		$detail_num[]=$row_detail[p_detail];
		$detail_name_code[]=$row_detail[b_detail];
		
		
		
		$r = floor($n/$nn);
		// type name
		if($show_type ==1)
		{
			$sql_type_name = "select item_type_name from item_type where item_type_id = '$row_detail[book_detail_type]'";
			$result_type_name = mysql_query($sql_type_name) or die(mysql_error());
			$row_type_name = mysql_fetch_array($result_type_name);
			$item_type_name = $row_type_name['item_type_name'];
		}
		$gen_detail.="
		<tr>
                <td><div align='center'>$x</div></td>
                <td><div align='left' style='margin-left:5px;'>".stripslashes($row_detail[b_detail])."</div></td>
				<td><div align='right'>".$row_detail[u_detail]."&nbsp;</div></td>
				<td><div align='right' style='margin-right:5px;'>".number_format($row_detail[price_detail],2)."</div></td>
				<td><div align='right'>".$row_detail[p_detail]."&nbsp;</div></td>
				<td><div align='right' style='color:#FF0000;'>".$im."&nbsp;</div></td>
               <td><div align='right' style='margin-right:5px;'>".number_format(($row_detail['price_detail'] * $row_detail['p_detail']),2)."</div></td>
                <td>&nbsp;</td>
  </tr>
		";
		
		if($r > 0 && $n < $num_detail)
		{
		
			
			if($n < $nn)
			{
				for($i=$n;$i<$nn;$i++)
				{
						$gen_detail.="
   		<tr>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='right' style='margin-right:5px;'>&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
					  </tr>
				";
							
						
				} //end for
			} // end if
			
			$r2 = floor($n/($nn+$num_end));
			
			
			$xx = ($num_end/2);
			if($n >= ($nn+$num_end) or ($num_detail-$p) < $nn)
			{
				$gen_detail.="
						  <tr>
							<td colspan='6'><div align='center' style='margin-right:5px;'><b>".$temp_price[$c-1]."</b></div></td>
							<td><div align='center'>รวม</div><div align='right' style='margin-right:5px;'>".number_format($total_price,2)."</div></td>
							<td>&nbsp;</td>
						  </tr>
				
							";
				$gen_detail.=' </table>';
				$gen_detail.="<br style='clear:both;' /><div class='page-break'></div>";
				
				$gen_detail .= $gen_detail_h;
				
				$n=0;
				$p++;
				$temp_price[] = "ยอดยกมา ".number_format($total_price,2)." บาท";
				$c++;
				
			}
			
			
			
			
		}
		$p++;
		//echo "&nbsp;&nbsp;&nbsp;&nbsp;$l r = $r  $p=$p $c<br />";
		
	}// end while
	
	if($n < $nn)
			{
				for($i=$n;$i<$nn;$i++)
				{
						$gen_detail.="
              						<tr>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='left' style='margin-left:5px;'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='center'>&nbsp;</div></td>
						<td><div align='right' style='margin-right:5px;'>&nbsp;</div></td>
						<td><div align='right' style='margin-right:5px;'>&nbsp;</div></td>
					  </tr>
				   
				";
							
						
				} //end for
			} // end if
	$discount = $disc;
	if($distype == "p")
	{		
		$discount = ($disc / 100) * $total_price;
	}
	
	//echo "siscount = $discount";
	$total_pricex = $total_price;
	$vatx=100;
	if($vat_type == 2)
	{
		$vatx=100+$vat;
		$net_price = $total_price-$discount;
		$total_price_t = $net_price - ($net_price*($vat/$vatx));
	}
	else
	{
		$net_price = ($total_price-$discount) + (($total_price-$discount)*($vat/$vatx));
		$total_price_t = $total_price-$discount;
	}
	$vatshow = $vat;
	
	//$net_price=500001001000.10;
	$rows = 2;
	/*
	if($disc != 0)
	{
		$rows = 3;
	}
	
	$gen_detail.="
	<tr>
                <td colspan='7' rowspan='$rows' valign='top'><div align='center'>
		";
		if($disc != 0)
	 	{
			$gen_detail.="
				(ส่วนลด  ".number_format($discount,2)." บาท จาก ".number_format($total_pricex,2)." บาท เหลือ ".number_format(($total_price-$discount),2)." บาท) 		
				";
		}
				
		$gen_detail.="		รวมมูลค่าสินค้าก่อนคิด VAT</div>
				";
	
	$gen_detail.="	<div align='center'>ภาษีมูลค่าเพิ่ม $vatshow %</div>
				</td>
                <td><div align='right' style='margin-right:5px;'>".number_format($total_price_t,2)."</td>
              </tr>";*/
	/*
	if($disc != 0)
	{
		$gen_detail.="
	<tr>
                <td   valign='top'><div align='center'></div><div align='right'>".number_format($discount,2)."&nbsp; </div></td>
                <td><div align='right' style='margin-right:5px;'></td>
               
              </tr>";
			  
	}
	*/
    $gen_detail.="
              <tr>
                <td colspan='2'><div align='center' style='margin-right:5px;'>รวมทั้งสิ้น</div></td>
                <td colspan='4'><div align='center'><b>".monney2th(number_format($net_price, 2, '.', ''))."</b></div></td>
                <td><div align='right' style='margin-right:5px;'>".number_format($net_price,2)."</div></td>
                <td><div align='center'>&nbsp;</div></td>
              </tr>
	
	";
	$gen_detail.=' </table>';
	
	
	
	$template_b = "template/$end";
	$myFile_b = $template_b;
	$fh_b = fopen($myFile_b, 'r');
	$body_b = fread($fh_b, filesize($myFile_b));
	
	
	
	
	
	$gen_detail.=$body_b;
	return $gen_detail;
}
function get_ptype($type_id)
{
	global $Conn;
	$sql = "select lifetime,ptype from item_type where item_type_id = '$type_id'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$type="";
	$type["lifetime"] = $row[lifetime];
	$type["ptype"] = $row[ptype];
	return $type;
}
function genbarcode_value($detail_book_id,$b_g,$num)
{
	// อธิบายหลักการตั้งบาร์โค้ต  มีทั้งหมด 12 หลัก หลักแรกนับจากทางซ้ายมือสุด คือเลขบอกจำนวนหลักของลำดับ หลักที่สองคือเลขบอกจำนวนหลักของรหัสพัสดุุ ซึ่งจะระบุไว้ด้านขวามือ
	if($detail_book_id)
	{
		$barcode_value = "";
		$number = 1;		
		for($i=0;$i<$num;$i++)
		{
			$len_id = strlen($detail_book_id);
			$len_number = strlen($number);
			$number_code = $number;
			if(($len_id+$len_number) > 10)
			{
				$len_id=0;
				$len_number=0;
				$number_code = 0;
			}
			
			$tid=$len_number.$len_id;
			$last_id_value=$number_code.$detail_book_id;
			$last_id = str_pad($last_id_value,12-strlen($tid),"0",STR_PAD_LEFT);
			
			$tid .=$last_id;		
			
			$barcode_value[] = $tid;
			$number++;
		}
		//echo "$num";
		return $barcode_value;
	}
	else
	{
		//echo "ไม่พบ detail_bookid";
	}
	
}

/*
function genbarcode_value($detail_book_id,$ref_code,$num)
{
	
	// 2 หลักแรก คือ หมวดหมู่  6 หลักถัดมาคือ รหัส 4 หลักสุดท้ายคือ ลำดับ
	global $Conn;
	$ref_code = floor($ref_code);
	$total_num = get_item_nums($detail_book_id);
	
	//echo $total_num;
	if($detail_book_id)
	{
		$barcode_value = "";
		$number = $total_num;		
		for($i=0;$i<$num;$i++)
		{
			
			$number_code = $number;			
			
			if(strlen($total_num) <= 4 and strlen($detail_book_id) <= 6 and strlen($ref_code) <= 2)
			{
				$tid=str_pad($ref_code,2,"0",STR_PAD_LEFT).str_pad($detail_book_id,6,"0",STR_PAD_LEFT).str_pad($number_code,4,"0",STR_PAD_LEFT);
			}
			else
			{
				$tid="9999".str_pad($detail_book_id,8,"0",STR_PAD_LEFT);
			}
			$barcode_value[] = $tid;
			$number++;
		}
		//echo "$num";
		return $barcode_value;
	}
	else
	{
		//echo "ไม่พบ detail_bookid";
	}
	
}


function genbarcode_value($detail_book_id,$ref_code,$num)
{
	if($detail_book_id)
	{
		$barcode_value = "";
			
		for($i=0;$i<$num;$i++)
		{
			
			$number_code = $number;			
			
			
			$tid=str_pad($detail_book_id,12,"0",STR_PAD_LEFT);
			
			$barcode_value[] = $tid;
			$number++;
		}
		//echo "$num";
		return $barcode_value;
	}
	else
	{
		//echo "ไม่พบ detail_bookid";
	}
	
}
*/
function get_item_nums($detail_book_id)
{
	global $Conn;
// หาประเภท
	$sql_type = "select book_detail_type from book_detail where book_detail_id = '$detail_book_id'";
	$result_type = mysql_query($sql_type) or die(mysql_error());
	$row_type = mysql_fetch_array($result_type);
	$book_detail_type = $row_type[book_detail_type];
	// จำนวนเริ่มต้น
	$sql_start = "select start_number from item_type where item_type_id = '$book_detail_type '";
	$result_start = mysql_query($sql_start) or die(mysql_error());
	$row_start = mysql_fetch_array($result_start);
	$start_number = $row_start[start_number];
	// นับจำนวนทั้บหมด
	$sql  = "select p_detail,book_detail_id from book_detail where book_detail_id <= '$detail_book_id' and book_detail_type = '$book_detail_type' order by book_detail_id ASC";
	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());
	$total_num = $start_number;
	while($row=mysql_fetch_array($result))
	{
		$total_num+=$row[p_detail];
	}
	
	return $total_num;
}

/*
function get_barcode_id($barcode_value,$type)
{
	$barcode_value = $barcode_value*1;
	//echo $barcode_value;
	return $barcode_value;
}
*/
function get_barcode_id($barcode_value,$type)
{
	$len_number = substr($barcode_value,0,1);
	$len_id = substr($barcode_value,1,1);
	//echo"$barcode_value <br />";
	$number = substr($barcode_value,12-($len_number+$len_id),$len_number);
	$id = substr($barcode_value,12-($len_id),$len_id);
	//echo "number = $number id = $id";
	if($type == "number")
	{
		return $number;
	}
	else
	{
		return $id;
	}
	
}


function get_fy($m,$y)
{
	if($m > 9 )
	{
		$y=$y+1;
	}
	return $y;
}


function monney2th($monney)
{
	list($font,$back) = split("[.]",$monney);
	$a=read_monney($font);
	$b=read_monney($back);
	if($a != ""){$a.="บาท";}
	if($b != ""){$b.="สตางค์";}
	$value="$a$b";
	return $value;
}

function read_monney($monney)
{	
	$word_monney="";
	for($i=0;$i<strlen($monney);$i++)
	{
		$n = substr($monney,$i,1);
		//echo"$n<br />";
		$fword = int2str($n);
		$r=strlen($monney)-$i;
		//echo "$r<br />";
		$nword = intn2str($r-1);
		
		
		if($r==2 and $n==1) // fix หลักสิบเลข 1 ไม่ต้องอ่าน
		{
			$fword="";
		}
		if($r==2 and $n==2) // fix หลักสิบเลข 1 ไม่ต้องอ่าน
		{
			$fword="ยี่";
		}
		if($n==0)// ไม่อ่านเลข 0
		{
			$fword="";
			if(($i%5) != 0 or $nword == "สิบ")
			{
				$nword="";
			}
		}
		if($i==strlen($monney)-1 and $n==1 and $i>0) // อ่านเลข 1 สุดท้ายว่าเอ็ด
		{
			$fword="เอ็ด";
		}
		
		$word_monney.="$fword$nword";
	}
	return $word_monney;
}
function read_back_monney($monney)
{
	$word_monney="";
	for($i=0;$i<strlen($monney);$i++)
	{
	}
	return $word_monney;
}
function int2str($n)
{
	
	$arr[] = "ศูนย์";
	$arr[] = "หนึ่ง";
	$arr[] = "สอง";
	$arr[] = "สาม";
	$arr[] = "สี่";
	$arr[] = "ห้า";
	$arr[] = "หก";
	$arr[] = "เจ็ด";
	$arr[] = "แปด";	
	$arr[] = "เก้า";
	$value=$arr[$n];
	
	return $value;
}
function intn2str($n)
{
	if($n>6)
	{
		$n=$n%6;
		//echo "n = $n<br />";
	}
	$arr[] = "";
	$arr[] = "สิบ";
	$arr[] = "ร้อย";
	$arr[] = "พัน";
	$arr[] = "หมื่น";
	$arr[] = "แสน";
	$arr[] = "ล้าน";
	$value = $arr[$n];
	
	return $value;
	
}



function total_monney($book_id)
{
	global $Conn;
	$sql = "select p_detail,price_detail from book_detail where book_id = '$book_id'"; 
	$result = mysql_query($sql) or die(mysql_error());
	$total = 0;
	while($row = mysql_fetch_array($result))
	{
		$n = $row[p_detail];
		$m = $row[price_detail];
		$total+= $n*$m;
	}
	
	return $total;
}

function th_date($date,$date_format=0)
{
	list($y,$m,$d) = split("[-]",$date);
	$th_month[] = "มกราคม";
	$th_month[] = "กุมภาพันธ์";
	$th_month[] = "มีนาคม";
	$th_month[] = "เมษายน";
	$th_month[] = "พฤษภาคม";
	$th_month[] = "มิถุนายน";
	$th_month[] = "กรกฎาคม";
	$th_month[] = "สิงหาคม";
	$th_month[] = "กันยายน";
	$th_month[] = "ตุลาคม";
	$th_month[] = "พฤศจิกายน";
	$th_month[] = "ธันวาคม";
	
	$y = $y+543;
	$m = $th_month[$m-1];
	
	$value = "$d $m $y";
	return $value;
	
}


function permission_test($permission_value)
{
	global $_SESSION;
	$permission = "No";
	//$thiii =  $permission_value  % $_SESSION['SS_ADMIN_LEVEL'];
	//echo $_SESSION['SS_ADMIN_LEVEL']." % $permission_value = $thiii";
	//exit();
	if(($permission_value % $_SESSION['SS_ADMIN_LEVEL']) == $permission_value)
	{
		$permission = "Yes";
	}
	return $permission;
}

function getRealIpAddr()
	{
		global $_SERVER;
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
} 

function numday($start_date)
{
	list($y,$m,$d) = split("[-]",$start_date);
	
	 $start = GregorianToJD(date('m'),date('d'),date('Y'));
	 $end = GregorianToJD($m,$d,$y);
	 //echo "start_date = $start_date   start = $start  end = $end   ";
	 $num = $start-$end;
	return $num;
}
function calh($min)
{
	if(($min%60) > 0)
	{
		$h = floor($min/60).".".($min%60);
		
		return $h;
	}
	else
	{
		return $min/60;
	}
}
function calmin($t1,$t2,$t3,$t4)
{
	$min = 0;
	//echo "$t3 $t4";
	//exit();
	if($t1 != "")
	{
		list($ft1,$bt1) = split("[.]",$t1);
		list($ft2,$bt2) = split("[.]",$t2);		
		$min = ($ft2-$ft1) * 60;
		$min+= ($bt2-$bt1);
	}
	if($t3 != "")
	{
		list($ft3,$bt3) = split("[.]",$t3);
		list($ft4,$bt4) = split("[.]",$t4);
		$min+= ($ft4-$ft3) * 60;
		$min+= ($bt4-$bt3) * 10;
	}
	//echo $min;
	//exit();
return $min;
}


function check_login()
{
	global $_SESSION;
	global $_REQUEST;
	$barcode=$_REQUEST[barcode];
	
	if($_SESSION['user'] == "")
	{
		echo"<center>คุณยังไม่ได้เข้าสู่ระบบ  <br /> <a href='index.php?barcode=$barcode'>คลิกที่นี่เพื่อเข้าสู่ระบบ</center>";
	//	echo"<meta http-equiv='refresh' content='2;URL=index.php?barcode=$barcode'>";
		exit();
	}
}

function add_read_view($page_id)
{
	if($page_id != "")
	{
		global $Conn;
		//echo $page_id;
		$sql = "update lessons set read_view = read_view+1 where lesson_id = '$page_id';";
		//mysql_query($sql) or die(mysql_error());
	}
}

function get_page($this_page)
{	
	$cpage = split("[/]",$this_page);
	$page_count = count($cpage);
	$this_page=$cpage[$page_count-1];
	return $this_page;
}

function get_pic($pic)
{	
	$pic = split("[_]",$pic);
	$pic_count = count($pic);
	$value=$pic[$pic_count-1];
	return $value;
}

function show_star($num,$root)
{	
	$n=0;
	$value = "";
if($num < 6)
	{
		while($n < $num)
		{
			$value .= "<img src='$root"."star.gif'>";
			$n++;
		}
		return $value;
	}
	else
	{
		$num_s = substr($num,0,1);
		while($n < $num_s)
		{
			$value .= "<img src='$root"."star.gif'>";
			$n++;
		}
		$value .= "<img src='$root"."star_h.gif'>";
		return $value;
	}

}








function add_day($date_start,$add)
{
//	$value = date("Y-m-d", strtotime("$date_start + $add day"));
	$value = $date_start;
	$add = $add*1;
	//echo "add = $add";
	if(!empty($add))
	{
		$value = date("Y-m-d", strtotime("+ $add day", strtotime($date_start)));
	}
	//echo $value;
	return $value;
}

function out_day($date_start,$out)
{
	//$value = date("Y-m-d", strtotime("$date_start - $out day"));
	$value = $date_start;
	$out = $out*1;
	if($out != "")
	{
		$value = date("Y-m-d", strtotime("-$out day", strtotime($date_start)));
	}
	//$value = strtotime("-$out day", $date_start);
	return $value;
}


function month_int2str($m)
{
	//echo $m;
	$month[1] = "Jan";
	$month[2] = "Feb";
	$month[3] = "Mar";
	$month[4] = "Apr";
	$month[5] = "May";
	$month[6] = "Jun";
	$month[7] = "Jul";
	$month[8] = "Aug";
	$month[9] = "Sep";
	$month[10] = "Oct";
	$month[11] = "Nov";
	$month[12] = "Dec";
	$value = $month[$m];
	//echo "value = $value";
	return $value;
}

function full_date($txt_date)
{
	//echo $txt_date;
	list($y,$m,$d) = split("[/-]",$txt_date);
	$m = $m*1;
	$m = month_int2str($m);
	$value = "$d $m $y";
	return $value;
}

function check_member_login($mem_id)
{
	if($mem_id == "")
	{
		echo"<script language='javascript'>";
		echo"window.alert('Please Sign in First')";
		echo"</script>";
		echo"<meta http-equiv='refresh' content='0;URL=signin.php'>";
		exit();
	}	
}




function ymd($value)
{
	list($d,$m,$y) = split("[/]",$value);
	$value = "$y-$m-$d";
return $value;
}
function dmy($value)
{
	list($y,$m,$d) = split("[-]",$value);
	$value = "$d/$m/$y";
return $value;
}

function mailing($to, $name, $from, $subj, $body, $cc , $bcc , $charset , $format) {
	$recipient = $to;
	
	$headers = "MIME-Version:1.0\n";
	if ($format == "html") {
		$headers.= "Content-Type: text/html; charset=".$charset."\n";
	} else {
		$body = nl2br($body);
		$headers.= "Content-Type: text/plain; charset=".$charset."\n";
	}
	$headers.= "From: ".$from."\n";
	if($cc != "") $headers.= "Cc: ".$cc."\n";
	if($bcc != "") $headers.= "Bcc: ".$bcc."\n";
	mail($recipient, $subj, $body, $headers);
}


function resize_pic($photo,$h,$path,$pic_name,$dotname)
{
 $d=$pic_name;
 $target_path = "$path";
 $p_picture = $target_path.$d.".".$dotname;
$images = $photo; 
if(($dotname == "jpg" or $dotname == "JPG") and $h != 0)
	{
//กำหนดคงามสูงของรูปใหม่ สำหรับความกว้างไม่ต้องกำหนดครับ
// เพราะโปรแกรมจะทำการคำรวณความกว้างให้พอดีกับขนาดของรูปที่ได้ทำการ Resize
$height=$h;
$size=GetimageSize($images);
$width=round($height*$size[0]/$size[1]);
$images_orig = ImageCreateFromJPEG($images);
$photoX = ImagesX($images_orig);
$photoY = ImagesY($images_orig); 
$images_fin = ImageCreateTrueColor($width, $height); 
ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY); 
ImageJPEG($images_fin,"$target_path".$d.".".$dotname); // ชื่อไฟล์ใหม่
ImageDestroy($images_orig);
ImageDestroy($images_fin);
 //copy($images,$p_picture);
 $new_name = $d.".".$dotname;
	}
	else
	{
		//$new_name = $d.".".$dotname;
		copy($images,"$target_path".$d.".".$dotname); 
		
	}
 return $new_name;
}
function get_type_pic($photo_name)
{
 $photo = split("[.]",$photo_name);
 $c = count($photo);
 $dotname = $photo[$c-1];
 return $dotname;
}

///		
?>


