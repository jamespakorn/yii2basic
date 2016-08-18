<?php
$main_id = $_POST['main_id'];
$selected_id = $_POST['selected_id'];
//echo "selected_id id = $selected_id";
if($main_id != "")
{

	include("con_db.php");
	$sql = "select * from item_type where list_sub_id = '$main_id' and type_status = '0'";
	$result = mysql_query($sql) or die(mysql_error());
	$select_list = "<select name = 'item_id[]'   onChange='askdetail(this.options[this.selectedIndex].value1,this.options[this.selectedIndex].value2,this.options[this.selectedIndex].value3,$selected_id );'>";
	$num_rows = mysql_num_rows($result);
	if($num_rows > 0)
	{
		while($row = mysql_fetch_array($result))
		{
			$list_name = $row['item_type_name'];
			$list_cost = $row['cost'];
	    	$list_unit = $row['unit'];
	    	$list_start_number = $row['start_number'];
			$list_id = $row['item_type_id'];
			$selected = "";
			
			if($list_id == $selected_id)
			{
				$selected = "selected";
			}
			$list_cost2=0;
		if	($list_start_number<>""){$list_cost2 = "(". $list_start_number .")"; }
		$select_list.="<option value='$list_id' value1 ='$list_name' value2 ='$list_unit' value3 ='$list_cost' $selected>$list_name $list_cost2</option>";
			//print "$list_name $list_id  $selected <br />";
		}
	}
	else
	{
		$sql = "select * from item_type where item_type_id = '$main_id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$list_name = $row['item_type_name'];
		$list_cost = $row['cost'];
		$list_unit = $row['unit'];
		$list_id = $row['item_type_id'];
    	$list_start_number = $row['start_number'];
	$list_cost2=0;
		if	($list_cost<>""){$list_cost2 = "(". $list_cost .")"; }
		$select_list.="<option value='$list_id' value1 ='$list_name' value2 ='$list_unit' value3 ='$list_cost' $selected>$list_name $list_cost2</option>";
	}	
	$select_list.= "<option value=''>----</option>";
	$select_list.="</select>";
}

//print "option value='$list_id' $selected $list_name option";
	print $select_list;

?>