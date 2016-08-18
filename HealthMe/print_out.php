<?php include"head.php";
$pt_id=$_REQUEST['pt_id'];
 ?><head>
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">  
<link href="css/validator.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Print_out</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<style type="text/css" media="all">
<!--

#apDiv0 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:1;
	background-image: url(tree/d0-0.png);
	visibility: visible;
}

#apDiv1 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:19;
	background-image: url(tree/d1-0.png);
	visibility: visible;
}
#apDiv2 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:18;
	background-image: url(tree/d2-0.png);
	visibility: visible;
}
#apDiv3 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:17;
	background-image: url(tree/d3-0.png);
	visibility: visible;
}

#apDiv4 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:16;
	background-image: url(tree/d4-0.png);
	visibility: visible;
}

#apDiv5 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:15;
	background-image: url(tree/d5-0.png);
	visibility: visible;
}
#apDiv6 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:14;
	background-image: url(tree/d6-0.png);
	visibility: visible;
}
#apDiv7 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:13;
	background-image: url(tree/d7-0.png);
	visibility: visible;
}
#apDiv8 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:12;
	background-image: url(tree/d8-0.png);
	visibility: visible;
}
#apDiv9 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:11;
	background-image: url(tree/r1-0.png);
	visibility: visible;
}
#apDiv10 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:10;
	background-image: url(tree/r2-0.png);
	visibility: visible;
}
#apDiv11 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:11;
	background-image: url(tree/r3-0.png);
	visibility: visible;
}
#apDiv12 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:12;
	background-image: url(tree/r4-0.png);
	visibility: visible;
}
#apDiv13 {
	position:absolute;
	width:500px;
	height:541px;
	z-index:13;
	background-image: url(tree/r5-0.png);
	visibility: visible;
}
-->
</style>
<body>
<div class="container">
	<br>
  <form method="post" action="">
  <?php
$pt_id=$_REQUEST['pt_id'];
include('dbconnect.php');
mysql_select_db($database_connect, $connect);

$sql_c="SELECT pt_id,pt_cid,pt_name,pt_hn,pt_age,pt_height,pt_weight,pt_bmi,pt_date_screen FROM pt_screen  WHERE pt_id='$pt_id' order by pt_id  ";
$result_c = mysql_query($sql_c, $connect);		
while($row_c=mysql_fetch_object($result_c)){
		$_SESSION['pt_id']=$row_c->pt_id;
		$_SESSION['pt_cid']=$row_c->pt_cid;
		$_SESSION['pt_name']=$row_c->pt_name;
		$_SESSION['pt_hn']=$row_c->pt_hn;
		$_SESSION['pt_age']=$row_c->pt_age;
		$_SESSION['pt_height']=$row_c->pt_height;
		$_SESSION['pt_weight']=$row_c->pt_weight;
		$_SESSION['pt_bmi']=$row_c->pt_bmi;
		$_SESSION['pt_date_screen']=$row_c->pt_date_screen;
		}
?>
<fieldset>
<legend>ข้อมูลส่วนตัว<span class="class">
<input type="tel" name="pt_id" id="pt_id" style="color: #0000FF;"  maxlength="13"  value="<?php echo $_SESSION['pt_id']; ?>" class="form-control css-require" readonly="readonly"/>
</span></legend>
<div class align="left">
  ID_Card :
  <input type="tel" name="id_cid" id="id_cid" style="color: #0000FF;"   maxlength="13" placeholder="เลขบัตรประชาชน" onChange="showUser(this.value)" value="<?php echo $_SESSION['pt_cid']; ?>" class="form-control css-require" readonly="readonly"/>
Name : &nbsp;&nbsp;&nbsp;
<input type="text" name="spname"  style="color: #0000FF;" maxlength="50" placeholder="ชื่อ - สกุล" id="spname" value="<?php echo $_SESSION['pt_name']; ?>"  class="form-control css-require" readonly="readonly"/>
HN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="hn" id="hn" placeholder="เลข HN" style="color: #0000FF;"  maxlength="11" value="<?php echo $_SESSION['pt_hn']; ?>"  class="form-control css-require" readonly="readonly"/>
<br />
</div>


<div class align="left">
  <?php

// ตรวจสอบว่า ตาราง v_s
  if($pt_id<>"") {
     $sql_t1="SELECT * FROM v_screen  WHERE pt_id='". $pt_id . "'    ";
//echo  $sql_t1;
	 $result_t1 = mysql_query($sql_t1);
	 $Num_Rows  = mysql_num_rows($result_t1);
  if($Num_Rows>0){
	  while($objResult = mysql_fetch_assoc($result_t1))
		{						
$d1 = $objResult['d1'];
$d2 = $objResult['d2'];
$d3   = $objResult['d3'];
$d4   = $objResult['d4'];
$d5   = $objResult['d5'];
$d6   = $objResult['d6'];
$d7   = $objResult['d7'];
$d8   = $objResult['d8'];
$d9   = $objResult['sigar'];
$d10   = $objResult['alcohol'];
$d11   = $objResult['emotion'];
$d12   = $objResult['food'];
$d13   = $objResult['work'];
$bmi   = $objResult['pt_bmi'];
$calorie   = $objResult['calorie'];

$want_fit = $objResult['want_fit'];
$want_dm = $objResult['want_dm'];
$want_ht = $objResult['want_ht'];
$want_ldl = $objResult['want_ldl'];
$want_hdl = $objResult['want_hdl'];
$want_heart = $objResult['want_heart'];
$want_mas = $objResult['want_mas'];
$want_oa = $objResult['want_oa'];
$want_emotion = $objResult['want_emotion'];
$sweet_t 	= $objResult['sugar_t'];
$salt_t 	= $objResult['salt_t'];
$fat_t 	    = $objResult['fat_t'];
$sweet 	= $objResult['sugar'];
$salt 	= $objResult['salt'];
$fat 	    = $objResult['fat'];
$ex1_text 	= $objResult['ex1_text'];
$ex2_text 	= $objResult['ex2_text'];
$ex1 	= $objResult['ex1'];
$ex2 	= $objResult['ex2'];
$p16 = $objResult['p16'];
$psum = $objResult['psum'];

if($calorie<1300)
{ $rice=array(6,2,2,2); $veg=array(5,1,2,2); $fruit=array(3,1,1,1); $meet=array(6,2,2,2); $milk=array(1,1,0,0);}
elseif($calorie<1400)
{ $rice=array(6,2,2,2); $veg=array(5,1,2,2); $fruit=array(4,1,2,1); $meet=array(7,3,2,2); $milk=array(1,1,0,0);}
elseif($calorie<1500)
{ $rice=array(7,3,2,2); $veg=array(5,1,2,2); $fruit=array(4,1,2,1); $meet=array(7,3,2,2); $milk=array(1,1,0,0);}
elseif($calorie<1600)
{ $rice=array(8,3,3,2); $veg=array(6,2,2,2); $fruit=array(4,1,2,1); $meet=array(7,3,2,2); $milk=array(1,1,0,0);}
elseif($calorie<1700)
{ $rice=array(8,3,3,2); $veg=array(6,2,2,2); $fruit=array(4,1,2,1); $meet=array(7,3,2,2); $milk=array(2,1,0,1);}
elseif($calorie<1800)
{ $rice=array(8,3,3,2); $veg=array(6,2,2,2); $fruit=array(5,2,2,1); $meet=array(8,3,3,2); $milk=array(2,1,0,1);}
elseif($calorie<1900)
{ $rice=array(9,4,3,2); $veg=array(6,2,2,2); $fruit=array(5,2,2,1); $meet=array(8,3,3,2); $milk=array(2,1,0,1);}
elseif($calorie<2000)
{ $rice=array(9,4,3,2); $veg=array(6,2,2,2); $fruit=array(5,2,2,1); $meet=array(9,3,3,3); $milk=array(2,1,0,1);}
elseif($calorie>=2000)
{ $rice=array(10,4,3,3); $veg=array(6,2,2,2); $fruit=array(5,2,2,1); $meet=array(10,4,3,3); $milk=array(2,1,0,1);}

}	}}
?>
  <br />
</div>
</fieldset>
<fieldset>
        <p><span class="class">BMI :
            <input type="tel" name="bmi" id="bmi" style="color: #0000FF; width:100px"   maxlength="13" placeholder="BMI" value="<?php echo number_format($_SESSION['pt_bmi'],2); ?>" class="form-control css-require" readonly="readonly"/>
ส่วนสูง :
<input type="tel" name="height" id="height" style="color: #0000FF; width:50px"   maxlength="3" placeholder="ส่วนสูง"  value="<?php echo number_format($_SESSION['pt_height'],2); ?>"  readonly="readonly"/>
นน. :
<input type="tel" name="hight2" id="hight2" style="color: #0000FF; width:50px"   maxlength="13" placeholder="น้ำหนัก" onChange="showUser(this.value)" value="<?php echo number_format($_SESSION['pt_weight'],2); ?>" class="form-control css-require" readonly="readonly"/>
        </span><span class="class"> อายุ :
            <input type="tel" name="age" id="age" style="color: #0000FF; width:50px"   maxlength="3" placeholder="อายุ"  value="<?php echo number_format($_SESSION['pt_age'],2); ?>"  readonly="readonly"/>
</span><span class="class">ข้อมูลคัดกรอง :
      <input type="tel" name="date_screen" id="date_screen" style="color: #0000FF;"   maxlength="13" placeholder="วันที่คัดกรอง"  value="<?php echo $_SESSION['pt_date_screen']; ?>" class="form-control css-require" readonly="readonly"/>
    </span></p>
        <table width="100%">
 <tr>
        <td valign="top" height="280px" >

        <?php if($_SESSION['pt_bmi']< 18.5) 
		{
		echo "<img src='img/1.jpg' width='270' />"."A ผอม";
		} 
		else  if($_SESSION['pt_bmi']< 22.9) 
		{
		echo "<img src='img/2.jpg' width='270'  />"."B ปกติ";
		}
		else  if($_SESSION['pt_bmi']< 24.9) 
		{
		echo "<img src='img/3.jpg' width='270'/>"."C ท้วม";
		}
		else  if($_SESSION['pt_bmi']< 29.9) 
		{
		echo "<img src='img/4.jpg'  width='270'  />"."D อ้วน";
		}
		else  if($_SESSION['pt_bmi']<= 34.9) 
		{
		echo "<img src='img/5.jpg'  width='270'/>"."E รูปร่างอ้วนมาก";
		}
		else  if($_SESSION['pt_bmi']> 34.9) 
		{
		echo "<img src='img/6.jpg'  width='270' />"."F รูปร่างอ้วนอันตราย";
		}
		?>
        </td>
        </tr>
        </table>
        </p>
</fieldset>


<fieldset>
        <legend>
       ผลสุขภาพ</legend>
</fieldset>

<table width="100%">
 <tr>
        <td valign="top" height="545px" >
          <p><iframe height="541" marginheight="0" src="tree.php?pt_id=<?php echo $pt_id;?>" frameborder="0" width="100%" marginwidth="0" scrolling="no" align="middle"></iframe>
          </p></td>
    </tr>
    </table>   
            <fieldset></fieldset> 
<fieldset>
  <legend>   กิจกรรมทางกาย
  

<?php 
if($psum >= 600){ echo "ท่านมีกิจกรรมทางกายเพียงพอ ผลรวมกิจกรรม= ".$psum." METS/สัปดาห์ ค่า GPAC = ".$p16 ; } 
if($psum < 600){ echo "ท่านมีกิจกรรมทางกายไม่เพียงพอ ผลรวมกิจกรรม= ".$psum." METS/สัปดาห์ ค่า GPAC = ".$p16 ; } 
?>
</legend>
</fieldset>

<fieldset>
  <legend>   ใบสั่ง  อาหารที่ควรบริโภค ต่อวัน</legend>
</fieldset>
     	
<table class="table table-bordered">
     			<tr class="info">
        			<td WIDTH="18%" class="text-center" rowspan="2" style="font-size:16px"><strong><br />
        			หมวดอาหาร/ วัน</strong></td>
       				<td WIDTH="20%" class="text-center" rowspan="2" style="font-size:16px"><div align="center"><strong><br />
   				    ปริมาณที่ได้รับใน 1 วัน <br>
   				    <?php echo number_format($calorie); ?> cal.</strong></div></td>
        			<td WIDTH="60%" class="text-center" colspan="5" style="font-size:18px;"><div align="center"><strong>มื้ออาหาร</strong></div></td>
      			</tr>
                <tr class="info">
                	<td WIDTH="12%" class="text-center"><div align="center"><strong>เช้า</strong></div></td>
                    <td WIDTH="12%" class="text-center"><div align="center"><strong>ว่าง</strong></div></td>
                    <td WIDTH="12%" class="text-center"><div align="center"><strong>กลางวัน</strong></div></td>
                    <td WIDTH="12%" class="text-center"><div align="center"><strong>ว่าง</strong></div></td>
                    <td WIDTH="12%" class="text-center"><div align="center"><strong>เย็น</strong></div></td>
                </tr>
                	<tr class="active">
        				<td class="text-center">ข้าว(ทัพพี)</td>
                        <td class="text-center"><div align="center">
                          <?php echo $rice[0]; ?>
                        </div></td>
                        <td class="text-center"><div align="center">
                         <?php echo $rice[1]; ?>
                        </div></td>
        				<td class="text-center"><div align="center">
        				 <?php echo '0'; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        				<?php echo $rice[2]; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        				<?php echo '0'; ?>
      				  </div></td>
                        <td class="text-center"><div align="center">
                      <?php echo $rice[3]; ?>
                        </div></td>
      				</tr>
                 	<tr class="warning">
        				<td class="text-center">ผัก (ทัพพี)</td>
                        <td class="text-center"><div align="center">
                          <?php echo $veg[0]; ?>
                        </div></td>
                        <td class="text-center"><div align="center">
                         <?php echo $veg[1]; ?>
                        </div></td>
        				<td class="text-center"><div align="center">
        				<?php echo '0'; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        				<?php echo $veg[2]; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        			<?php echo '0'; ?>
      				  </div></td>
                        <td class="text-center"><div align="center">
                     <?php echo $veg[3]; ?>
                        </div></td>
      				</tr>                   
                 	<tr class="active">
        				<td class="text-center">ผลไม้ (ส่วน)</td>
                        <td class="text-center"><div align="center">
                   <?php echo $fruit[0]; ?>
                        </div></td>
                        <td class="text-center"><div align="center">
                   <?php echo $fruit[1]; ?>
                        </div></td>
        				<td class="text-center"><div align="center">
        			<?php echo '0'; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        			<?php echo $fruit[2]; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        			<?php echo '0'; ?>
      				  </div></td>
                        <td class="text-center"><div align="center">
                      <?php echo $fruit[3]; ?>
                        </div></td>
      				</tr>                   
                 	<tr class="warning">
        				<td class="text-center">เนื้อสัตว์ (ช้อนกินข้าว)</td>
                        <td class="text-center"><div align="center">
                      <?php echo $meet[0]; ?>
                        </div></td>
                        <td class="text-center"><div align="center">
                    <?php echo $meet[1]; ?>
                        </div></td>
        				<td class="text-center"><div align="center">
        				<?php echo '0'; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        			<?php echo $meet[2]; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        			<?php echo '0'; ?>
      				  </div></td>
                        <td class="text-center"><div align="center">
                   <?php echo $meet[3]; ?>
                        </div></td>
      				</tr>                   
                 	<tr class="active">
        				<td class="text-center">นมไขมันต่ำ</td>
                        <td class="text-center"><div align="center">
                 <?php echo $milk[0]; ?>
                        </div></td>
                        <td class="text-center"><div align="center">
                <?php echo $milk[1]; ?>
                        </div></td>
        				<td class="text-center"><div align="center">
        		<?php echo '0'; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        	<?php echo $milk[2]; ?>
      				  </div></td>
        				<td class="text-center"><div align="center">
        	<?php echo '0'; ?>
      				  </div></td>
                        <td class="text-center"><div align="center">
             <?php echo $milk[3]; ?>
                        </div></td>
      				</tr>
	</table>
    <fieldset>
    <p><strong> น้ำมัน น้ำตาล และเกลือ กินแต่น้อยเท่าที่จำเป็น (น้ำมันและน้ำตาลไม่ควรเกิน 6 ชช./เกลือไม่ควรเกิน 1 ชช.)</strong></p>
    <p>&nbsp;</p>
    </fieldset>
              <fieldset></fieldset> 
  
<fieldset>
        <legend>
      ใบสั่ง ออกกำลังกาย</legend>
<div class="container">

<table class="table table-bordered" >
      			<tr class="info">
      			  <th class="text-center" style="background-color:#FFEBCD"><div align="center">
      			    <input name="ex1" type="checkbox" class="css_chkboxd4" id="ex1" onClick="ask4(this.value)" value="1" <?php if($ex1 == 1) echo "checked"; ?> readonly="yes">
      			    Cardiopulmonary                </div>
      			  <th class="text-center" style="background-color:#CCFFFF"><div align="center">
      			      <input name="ex2" type="checkbox" class="css_chkboxd5" id="ex2"  onClick="ask5(this.value)" value="1" <?php if($ex2 == 1) echo "checked"; ?> readonly="yes">
   			        ยืดเหยียดกล้ามเนื้อ                </div>
	    </tr>
      			<tr class="info">
        			<th WIDTH="33%" class="text-center" style="background-color:#FFEBCD">
        			  <?php echo $ex1_text; ?>
        			</td>
       				<th WIDTH="33%" class="text-center" style="background-color:#CCFFFF">
       				 <?php echo $ex2_text; ?>
		  </td>		  </tr>
    </table>
    
	<table class="table table-bordered">
    	<thead>
      		<tr style="background-color:#69F">
       			<th WIDTH="15%" class="text-center">โรค</th>
        		<th WIDTH="35%" class="text-center">เลือกชนิดของการออกกำลังกาย</th>
        		<th WIDTH="12.5%" class="text-center">ความหนัก</th>
                <th WIDTH="12.5%" class="text-center">เวลา(นาที)</th>
                <th WIDTH="12.5%" class="text-center">ต่อสัปดาห์</th>
                <th WIDTH="12.5%" class="text-center">ข้อระวัง</th>
     		</tr>
   		</thead>
        <tbody>

         <?php if($p16>=120) { ?>
           <tr style="background-color:#EAFFFC" class="dm8">
            	<td class="text-center">ท่านมีพฤติกรรมเนือยนิ่งมากไป</td>
        		<td class="text-center">ควรลุกขึ้นเดิน ยืน ทุกๆ 1-2 ชม.</td>
                <td class="text-center">เบา</td>
                <td class="text-center">ทุก 1 - 2 ชม/ ครั้งหากนั่งนานๆ</td>
                <td class="text-center">ทุกวัน</td>
                <td class="text-center">-</td>
      		</tr>
         <?php } else  if($p16>=60) {?>
           <tr style="background-color:#EAFFFC" class="dm8">
            	<td class="text-center">ท่านมีพฤติกรรมเนือยนิ่ง</td>
        		<td class="text-center">ควรลุกขึ้นเดิน ยืน ทุกๆ 1-2 ชม.</td>
                <td class="text-center">เบา</td>
                <td class="text-center">ทุก 1 - 2 ชม/ ครั้งหากนั่งนานๆ</td>
                <td class="text-center">ทุกวัน</td>
                <td class="text-center">-</td>
      		</tr>
         <?php } if($d2=="1") { ?>
        	<tr style="background-color:#EAFFFC" class="dm1">
        		<td class="text-center" rowspan="2">เบาหวาน</td>
        		<td class="text-center">แบบแรงต้าน ยกน้ำหนัก ลูกเหล็ก ถุงทราย ยางยืด</td>
                <td class="text-center">เท่าที่ยกได้</td>
                <td class="text-center">30 ครั้ง</td>
                <td class="text-center">2 - 3 วัน</td>
                <td class="text-center">ห้ามกลั้นหายใจ</td>
      		</tr>
        	<tr style="background-color:#EAFFFC" class="dm1">
        		<td class="text-center">แบบใช้กล้ามเนื้อหลายมัด เดิน จักรยาน แอโรบิค อนามัย30</td>
                <td class="text-center">สลับหนัก - เบา เช่น เดินเร็ว - ช้า</td>
                <td class="text-center">15 - 60 นาที</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">-</td>
      		</tr>
            <?php if ($d2_1=="1" || $d2_2=="1"||$d2_3=="1"||$d2_4=="1"||$d2_5=="1")  { ?>
           	<tr style="background-color:#EAFFFC" class="dm2">
            	<td class="text-center">เบาหวานมีโรคแทรก + ควบคุมน้ำตาล</td>
        		<td class="text-center">ไม่ใช้ทักษะมาก ไม่เปลี่ยนทิศทางเร็ว</td>
                <td class="text-center">เบา / ปานกลาง</td>
                <td class="text-center">15 - 60 นาที</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">ห้ามหนักมาก น้ำตาลจะสูงเป็นช่วงๆ</td>
      		</tr>
           <?php } }  if($d2_1=="1") { ?>
         	<tr style="background-color:#EAFFFC" class="dm3">
            	<td class="text-center">โรคหลอดเลือดส่วนปลายอุดตัน</td>
        		<td class="text-center">เดินลงน้ำหนัก ปั่นจักรยานอยู่กับที่ ออกกำลังแขน</td>
                <td class="text-center">เดินจนปวดขาเล็กน้อยแล้วพัก(เดิน2นาที พัก1นาที)</td>
                <td class="text-center">15 - 60 นาที</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">ห้ามออกกำลังจนปวดขามาก เสี่ยงต่อลิ่มเลือดแข็งตัว</td>
      		</tr>
            <?php }  if($d2_2=="1" ||$d5=="1") { ?>
           <tr style="background-color:#EAFFFC" class="dm4">
            	<td class="text-center">ไตเสื่อม</td>
        		<td class="text-center">ใช้กล้ามเนื้อมัดใหญ่ เดินกายบริหาร นั่งออกกำลังกาย</td>
                <td class="text-center">เบา / ปานกลาง</td>
                <td class="text-center">15 - 60 นาที</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">ห้ามทำแบบหนัก ออกแรงต้านมากความดันจะสูง</td>
      		</tr>
           <?php }  if($d2_4=="1") { ?>
           	<tr style="background-color:#EAFFFC" class="dm5">
            	<td class="text-center">ระบบประสาทอัตโนมัติเสื่อม</td>
        		<td class="text-center">ปั่นจักรยานอยู่กับที่ ว่ายน้ำ</td>
                <td class="text-center">เบา / ปานกลาง</td>
                <td class="text-center">15 - 60 นาที</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">ระวังหน้ามืด เวียนศีรษะล้ม</td>
      		</tr>
           <?php }  if($d2_3=="1") { ?>
            <tr style="background-color:#EAFFFC" class="dm6">
            	<td class="text-center" rowspan="2">ตาเสื่อม</td>
        		<td class="text-center">NPDR - มีแรงกระแทกต่ำ เดิน ขี่จักรยาน นั่งออกกำลังกาย</td>
                <td class="text-center">ไม่เปลี่ยนความหนักฉับพลัน</td>
                <td class="text-center">15 - 60 นาที</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">ห้ามทำแบบหนัก ออกแรงต้านมากความดันจะสูง</td>
      		</tr>			
            <tr style="background-color:#EAFFFC" class="dm6">
        		<td class="text-center">PDR - เลี่ยง การก้มๆเงยๆ มีการกระแทก เกร็งกล้ามเนื้อ</td>
                <td class="text-center">ไม่เปลี่ยนความหนักฉับพลัน</td>
                <td class="text-center">เบา / ปานกลาง</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">-</td>
      		</tr>	
            <?php }  if($d2_5=="1") { ?>
          	<tr style="background-color:#EAFFFC" class="dm7">
            	<td class="text-center">เท้าชา</td>
        		<td class="text-center">นั่งออกกำลังกาย ขี่จักรยานอยู่กับที่ บริหารกล้ามเนื้อส่วนเล็กของเท้า</td>
                <td class="text-center">เบา / ปานกลาง</td>
                <td class="text-center">15 - 60 นาที</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">-</td>
      		</tr>
            <?php }  if($d3=="1") { ?>
           <tr style="background-color:#EAFFFC" class="ht9">
            	<td class="text-center" rowspan="3">ความดันโลหิตสูง</td>
        		<td class="text-center">เคลื่อนไหวต่อเนื่อง เดินเร็ว วิ่งเหยาะๆ เต้นแอโรบิค ว่ายน้ำ ขี่จักรยาน อนามัน30 ควรสลับกิจกรรมไปเรื่อยๆ</td>
                <td class="text-center">ปานกลาง</td>
                <td class="text-center">15 - 60 นาที/ครั้ง สัปดาห์ละ 150 นาที</td>
                <td class="text-center">อย่างน้อย3วัน/สัปดาห์</td>
                <td class="text-center">-</td>
      		</tr>			
            <tr style="background-color:#EAFFFC" class="ht9">
        		<td class="text-center">แบบแรงต้าน ยกน้ำหนัก ลูกเหล็ก ถุงทราย ยางยืด</td>
                <td class="text-center">เท่าที่ยกได้</td>
                <td class="text-center">ทำ 3 รอบ รอบละ 8 - 12 ครั้ง</td>
                <td class="text-center">ทุก 2 - 3 วัน</td>
                <td class="text-center">ไม่กลั้นหายใจ ไม่เกร็งกล้ามเนื้อนานๆ หรือ ใช้น้ำหนักมากไป</td>
      		</tr>
            <tr style="background-color:#EAFFFC" class="ht9">
        		<td class="text-center">ยืดเหยียดกล้ามเนื้อ</td>
                <td class="text-center">ช้า</td>
                <td class="text-center">ทุกวัน</td>
                <td class="text-center">ท่าละ 10 วินาที ซ้ำกัน 3 รอบ</td>
                <td class="text-center">หายใจเข้าออก</td>
      		</tr>
           <?php }  if($d4=="1") { ?>
            <tr style="background-color:#EAFFFC" class="fat10">
            	<td class="text-center" rowspan="3">ไขมันในเลือดสูง</td>
        		<td class="text-center">เคลื่อนไหวต่อเนื่อง มีแรงกระแทกต่ำ เดินช้าเร็วสลับเร็ว วิ่งเหยาะๆ เต้นแอโรบิค ว่ายน้ำ ขี่จักรยาน อนามัย30 เพิ่มกิจกรรมทางกาย</td>
                <td class="text-center">ปานกลาง</td>
                <td class="text-center">40 - 60 นาที/วัน สัปดาห์ละ 280 นาที</td>
                <td class="text-center">อย่างน้อย3วัน/สัปดาห์</td>
                <td class="text-center">-</td>
      		</tr>			
            <tr style="background-color:#EAFFFC" class="fat10">
        		<td class="text-center">แบบแรงต้าน ยกน้ำหนัก ลูกเหล็ก ถุงทราย ยางยืด</td>
                <td class="text-center">เท่าที่ยกได้</td>
                <td class="text-center">ทำ 3 รอบ รอบละ 8 - 12 ครั้ง</td>
                <td class="text-center">ทุก 2 - 3 วัน</td>
                <td class="text-center">ไม่กลั้นหายใจ ไม่เกร็งกล้ามเนื้อนานๆ หรือ ใช้น้ำหนักมากไป</td>
      		</tr>
            <tr style="background-color:#EAFFFC" class="fat10">
        		<td class="text-center">ยืดเหยียดกล้ามเนื้อ</td>
                <td class="text-center">ช้า</td>
                <td class="text-center">ทุกวัน</td>
                <td class="text-center">ท่าละ 10 วินาที ซ้ำกัน 3 รอบ</td>
                <td class="text-center">หายใจเข้าออก</td>
      		</tr>   
           <?php }  if($d6=="1") { ?>
            <tr style="background-color:#EAFFFC" class="heart11">
            	<td class="text-center" rowspan="3">หัวใจ</td>
        		<td class="text-center">เคลื่อนไหวต่อเนื่อง เดินช้าสลับเร็ว วิ่งเหยาะๆ ปั่นจักรยานอยู่กับที่ อนามัย30 เพิ่มกิจกรรมทางกาย</td>
                <td class="text-center">ปานกลาง พูดคุยได้ เหนื่อยนิดๆ</td>
                <td class="text-center">20 - 60 นาที/ครั้ง สัปดาห์ละ 280 นาที</td>
                <td class="text-center">อย่างน้อย3วัน/สัปดาห์</td>
                <td class="text-center">-</td>
      		</tr>			
            <tr style="background-color:#EAFFFC" class="heart11">
        		<td class="text-center">แบบแรงต้าน ยกน้ำหนัก ลูกเหล็ก ถุงทราย ยางยืด</td>
                <td class="text-center">เท่าที่ยกได้</td>
                <td class="text-center">ทำ 3 รอบ รอบละ 8 - 12 ครั้ง</td>
                <td class="text-center">ทุก 2 - 3 วัน</td>
                <td class="text-center">ไม่กลั้นหายใจ ไม่เกร็งกล้ามเนื้อนานๆ หรือ ใช้น้ำหนักมากไป</td>
      		</tr>
            <tr style="background-color:#EAFFFC" class="heart11">
        		<td class="text-center">ยืดเหยียดกล้ามเนื้อ โยคะ</td>
                <td class="text-center">ช้า</td>
                <td class="text-center">ทุกวัน</td>
                <td class="text-center">ท่าละ 10 วินาที ซ้ำกัน 3 รอบ</td>
                <td class="text-center">หายใจเข้าออก</td>
      		</tr>  
            <?php } if ($d2<>"1" and $d3<>"1" and $d4<>"1" and $d5<>"1" and $d6<>"1" and $d2_1<>"1" and $d2_2<>"1" and $d2_3<>"1" and $d2_4<>"1" and $d2_5<>"1" ) 
			
			 { ?> 
            
                       <tr style="background-color:#EAFFFC" class="dm8">
            	<td class="text-center">ทุกคน</td>
        		<td class="text-center">ยืดเหยียดกล้ามเนื้อ</td>
                <td class="text-center">ช้า</td>
                <td class="text-center">ท่าละ 10 วินาที 3 รอบ</td>
                <td class="text-center">3+ วัน</td>
                <td class="text-center">-</td>
      		</tr> 
            <?php } ?>                                           	            
		</tbody>
    </table>

</div>    </fieldset>
    
<fieldset>
        <legend>
      ใบสั่ง เลือกทานอาหาร</legend>
    </fieldset>
<p>

</p>
<p> เป้าหมายร่วมกัน [ให้ผู้รับบริการเลือก สามารถเลือกได้มากกว่า 1 ข้อ เน้นว่าเป้นข้อที่อยากให้สำเร็จใน 3 เดือน]
</p>
    <?php if($want_fit == 1) { ?><li><input name="want_fit" type="checkbox" class="css_chk3" id="want_fit" value="1" <?php if($want_fit == 1) echo "checked"; ?> readonly="yes">
	&nbsp; ลดน้ำหนัก </li><?php } ?>
    <?php if($want_dm == 1) { ?><li><input name="want_dm" type="checkbox" class="css_chk3" id="want_dm" value="1" <?php if($want_dm == 1) echo "checked"; ?> readonly="yes">
    &nbsp; คุมระดับน้ำตาล </li><?php } ?>
   	<?php if($want_ht == 1) { ?><li><input name="want_ht" type="checkbox" class="css_chk3" id="want_ht" value="1" <?php if($want_ht == 1) echo "checked"; ?> readonly="yes">
    &nbsp; ลดความดันโลหิต</li><?php } ?>
    <?php if($want_ldl == 1) { ?><li><input name="want_ldl" type="checkbox" class="css_chk3" id="want_ldl" value="1" <?php if($want_ldl == 1) echo "checked"; ?> readonly="yes">
    &nbsp; ลดระดับไขมันตัวร้าย</li><?php } ?>
	<?php if($want_hdl == 1) { ?><li><input name="want_hdl" type="checkbox" class="css_chk3" id="want_hdl" value="1" <?php if($want_hdl == 1) echo "checked"; ?> readonly="yes">
	&nbsp; เพิ่มระดับไขมันดี</li><?php } ?>
    <?php if($want_heart == 1) { ?><li><input name="want_heart" type="checkbox" class="css_chk3" id="want_heart" value="1" <?php if($want_heart == 1) echo "checked"; ?> readonly="yes">
    &nbsp; เพิ่มความแข็งแรงของหัวใจ</li>
    <?php } ?>
   	<?php if($want_mas == 1) { ?><li><input name="want_mas" type="checkbox" class="css_chk3" id="want_mas" value="1" <?php if($want_mas == 1) echo "checked"; ?> readonly="yes">
    &nbsp; ลดอาการปวดกล้ามเนื้อ </li> <?php } ?>
    <?php if($want_oa == 1) { ?><li><input name="want_oa" type="checkbox" class="css_chk3" id="want_oa" value="1" <?php if($want_oa == 1) echo "checked"; ?> readonly="yes">
               	&nbsp; ชะลออาการเข่าเสื่อมป้องกันโรคแทรกซ้อน<br /> <?php } ?>
   <?php if($want_emotion == 1) { ?><li><input name="want_emotion" type="checkbox" class="css_chk3" id="want_emotion" value="1" <?php if($want_emotion == 1) echo "checked"; ?> readonly="yes">
               	&nbsp; ลดภาวะเครียดหรือเศร้า<br /> <?php } ?>
</fieldset>
<br />
<table class="table table-bordered" >
      			<tr class="info">
      			  <th class="text-center" style="background-color:#FFEBCD"><div align="center">
      			    <input type="checkbox" name="dis_sweet" class="css_chkboxd1" value="1" onClick="ask1(this.value)" <?php if($sweet == 1) echo "checked";  ?> readonly="yes">
      			    ลดหวาน                
      			  </div>
      			  <th class="text-center" style="background-color:#CCFFFF"><div align="center">
      			      <input type="checkbox" name="dis_salt" class="css_chkboxd2" value="1"  onClick="ask2(this.value)" <?php if($salt == 1) echo "checked"; ?> readonly="yes">
   			        ลดเค็ม                
   			    </div>
      			  <th class="text-center" style="background-color:#CCFF99"><div align="center">
      			      <input type="checkbox" name="dis_fat" class="css_chkboxd3" value="1"  onClick="ask3(this.value)" <?php if($fat == 1) echo "checked"; ?> readonly="yes" >
   			        ลดไขมัน</div></th>
	    </tr>
      			<tr class="info">
        			<th WIDTH="33%" class="text-center" style="background-color:#FFEBCD">
        			  
        			  <div align="left"><?php echo $sweet_t; ?>
        			    </td>
      			    </div>
        			<th WIDTH="33%" class="text-center" style="background-color:#CCFFFF">
       				  
   				      <div align="left">
       				    <?php echo $salt_t; ?>
   				        </td>
			          </div>
        			<th WIDTH="33%" class="text-center" style="background-color:#CCFF99">
       				  
   				      <div align="left">
       				   <?php echo $fat_t; ?>
		            </div></th>
		  </tr>
    </table>
    
    
      <p>
        <input name="update2" type="submit" id="update2" value="&lt;&lt; ย้อนกลับ" onClick="history.back()" />
        <input name="update" type="submit" id="update" value="<< Print >>" onClick="print();" /> 
    </p>
   
</form>  
</div>

<script src="js/bootstrap.min.js"></script> 
</body>
</html>