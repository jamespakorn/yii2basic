// JavaScript Document
    $j(document).ready(function () {  
          
  
          
    });  
    var setCheck = function(chkObj,cssObj){  
        var i_check=$j(chkObj).prop("checked");  
        if(i_check==true){  
            $j("."+cssObj).prop("disabled",true).attr('disabled', false);  
        }else{  
            $j("."+cssObj).attr('disabled', true);  
        }  
    };
$j(function a(){  
      
    $j(".css_groub_chk,.css_sub_chk").hide();       
    $j(".css_rad").on("click",function(){  
        var checkecd_ok = $j(".css_rad:checked").length;  
        var checked_val = $j(".css_rad:checked").val();  
        if(checkecd_ok==1 && checked_val==1){  
            $j(".css_groub_chk").show();  
        }else{  
            $j(".css_groub_chk").hide(); 
			$j(".css_data_item").prop("checked",false);                  
        }  
    });  
    $j(".css_chk").on("click",function(){  
        var chk_checked=$j(this).prop("checked");  
        var target_sub = $j(this).parent("li").next(".css_sub_chk");  
        if(chk_checked==true && target_sub.length>0){  
            target_sub.show();  
        }else{  
            target_sub.hide();  
            target_sub.find(":checkbox").prop("checked",false);  
        }  
    });  
})
$j(function b(){  
      
    $j(".css_groub_chk1,.css_sub_chk1").hide();       
    $j(".css_rad1").on("click",function(){  
        var checkecd_ok = $j(".css_rad1:checked").length;  
        var checked_val = $j(".css_rad1:checked").val();  
        if(checkecd_ok==1 && checked_val==1){  
            $j(".css_groub_chk1").show();  
        }else{  
			$j(".dist1").val('').prop(false);
			$j(".css_data_item1").prop("checked",false);   
			$j(".css_groub_chk1").hide();                
        }  
    });  
    $j(".css_chk1").on("click",function(){  
        var chk_checked=$j(this).prop("checked");  
        var target_sub = $j(this).parent("li").next(".css_sub_chk1");  
        if(chk_checked==true && target_sub.length>0){  
            target_sub.show();  
        }else{  
			$j(".css_subchk1").prop("checked",false);
			$j(".dist1").val('').prop(false);
            target_sub.hide();  
            target_sub.find(":checkbox").prop("checked",false);  
        }  
    });  
}) 
$j(function c(){  
      
    $j(".css_groub_chk2,.css_sub_chk2").hide();       
    $j(".css_rad2").on("click",function(){  
        var checkecd_ok = $j(".css_rad2:checked").length;  
        var checked_val = $j(".css_rad2:checked").val();  
        if(checkecd_ok==1 && checked_val==1){  
            $j(".css_groub_chk2").show();  
        }else{  
			$j(".css_subchk2").prop("checked",false);
			$j(".dist2").val('').prop(false);
			$j(".css_chk2").prop("checked",false); 
            $j(".css_groub_chk2").hide();
			  
	                
        }  
    });  
    $j(".css_chk2").on("click",function(){  
        var chk_checked=$j(this).prop("checked");  
        var target_sub = $j(this).parent("li").next(".css_sub_chk2");  
        if(chk_checked==true && target_sub.length>0){  
            target_sub.show();  
        }else{  
			$j(".css_subchk2").prop("checked",false);
			$j(".dist2").val('').prop(false);
            target_sub.hide();  
            target_sub.find(":checkbox").prop("checked",false); 
			 
        }  
    });  
}) 
$j(function d(){  
      
    $j(".css_groub_chk3,.css_sub_chk3").hide();       
    $j(".css_rad3").on("click",function(){  
        var checkecd_ok = $j(".css_rad3:checked").length;  
        var checked_val = $j(".css_rad3:checked").val();  
        if(checkecd_ok==1 && checked_val==1){  
            $j(".css_groub_chk3").show();  
        }else{  
			$j(".css_subchk3").prop("checked",false);
			$j(".css_chk3").prop("checked",false);
            $j(".css_groub_chk3").hide();                   
        }  
    });  
    $j(".css_chk3").on("click",function(){  
        var chk_checked=$j(this).prop("checked");  
        var target_sub = $j(this).parent("li").next(".css_sub_chk3");  
        if(chk_checked==true && target_sub.length>0){  
            target_sub.show();  
        }else{  
            target_sub.hide();  
            target_sub.find(":checkbox").prop("checked",false);  
        }  
    });  
})
  
$j(function () {  
      
    $j("#id_datetime_picker0").datetimepicker();   
      
     $j(".css_i_select").on("change",function(){    
        var i_select=$j(this).val();  
         if(i_select=="A"){  
            $j(this).parents("tr").find(".css_more").show();     
         }else{  
             $j(this).parents("tr").find(".css_more").hide();     
         }  
    });  
      
    
    $j("#addRow").on("click",function(){     
        // ส่วนของการ clone ข้อมูลด้วย jquery clone() ค่า true คือ      
        // การกำหนดให้ ไม่ต้องมีการ ดึงข้อมูลจากค่าเดิมมาใช้งาน      
        // รีเซ้ตเป็นค่าว่าง ถ้ามีข้อมูลอยู่แล้ว ทั้ง select หรือ input      
        
        $j(".datarow:eq(0)").clone(true)       
        .find("input").attr("value","").end()      
        .find("select").attr("value","").end()  //     
        .appendTo($j(".place-datarow"));       
        var lastIndex=$j(".css_datetime_picker").size()-1; // หา index ของตัว input ล่าสุด    
        var newId="id_datetime_picker"+lastIndex;  
        var objID="#"+newId;  
        var placeParent=$j(".css_datetime_picker:eq("+lastIndex+")").parents("td");      
        // แทนด้วย input ใหม่ ทับตัวเก่าไปเลย  
         $j(placeParent).html("<input type=\"text\" class=\"form-control css_datetime_picker\" name=\"date_product[]\" >");       
        $j(".css_datetime_picker:eq("+lastIndex+")")  
        .attr("id", newId) // - กำหนด id เป็นค่าใหม่  
        .unbind(); // - ยกเลิกการจัดการทั้งหมด ที่ได้มาจากตัว clone          
        $j(objID).datetimepicker(); // - เรียกใช้ datetimepicker() ใหม่อีกครั้ง            
            
    });   
      
    $j("#removeRow").on("click",function(){      
        // // ส่วนสำหรับการลบ      
        if($j(".place-datarow tr").size()>1){ // จะลบรายการได้ อย่างน้อย ต้องมี 1 รายการ      
            $j(".place-datarow tr:last").remove(); // ลบรายการสุดท้าย      
        }else{      
            // เหลือ 1 รายการลบไม่ได้      
            alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");      
        }      
    });      
});
