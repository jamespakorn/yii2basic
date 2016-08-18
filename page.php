<?php
    ob_start();
    session_start();
		$sid=$_SESSION['sid'];
		$stname=$_SESSION['stname'];

		$ssid=$_REQUEST['sid'];
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
<script  src="assets/js/jquery.min.js"></script>
<script  src="assets/js/bootstrap.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                    document.getElementById("stname").value = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "regisgetID.php?q=" + str, true);
            xmlhttp.send();
        }

</script>

</head>
<body>

<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<div class="container">
    <?php 
	$u=$_REQUEST['u'];
if($u=="content_01.php"){ $tt='f1';$ttt='l1';}	
if($u=="content_02.php"){ $tt='f2';$ttt='l2';}	
if($u=="content_03.php"){ $tt='f3';$ttt='l3';}	
if($u=="content_04.php"){ $tt='f4';$ttt='l4';}	
if($u=="content_05.php"){ $tt='f5';$ttt='l5';}	
if($u=="content_06.php"){ $tt='f6';$ttt='l6';}	
	include($u)
	?>

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">

            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>

<?php 
include('conn.php');
$query_rsTest = "SELECT * FROM xtest  WHERE sid='". $_SESSION["stid"] . "'   ";
    $rsTest = mysql_query($query_rsTest);
	while($obj = mysql_fetch_assoc($rsTest))
					{
						$ftest = $obj[$tt];
						$ltest = $obj[$ttt];
						$sid = $obj['sid'];
						$stname = $obj['stname'];
$fsum=	$obj['f1']+$obj['f2']+$obj['f3']+$obj['f4']+$obj['f5']+$obj['f6'];
$lsum=	$obj['l1']+$obj['l2']+$obj['l3']+$obj['l4']+$obj['l5']+$obj['l6'];
$xsum = $fsum+$lsum;
					}
					
if(!isset($ftest))	{
	if($u=="content_01.php"){
?>
    <h4>แบบทดสอบก่อนเรียน </h4>
                        <h4>เรื่อง ความรู้พื้นฐานเรื่องการเปลี่ยนแปลงของสาร </h4>
                          <form action="first_test1.php?sid=<?php echo $sid; ?>" class="form-inline">
                            <div class="form-group">
                                  <label for="exampleInputName2">รหัสนักเรียน</label>
                                  <input type="text" class="form-control" id="sid" name="sid"
                                           placeholder="ID" onKeyUp="showUser(this.value)">
                                           
                                  <label for="exampleInputName2">ชื่อนักเรียน</label>
                                  <input type="text" class="form-control" id="stname" name="stname"
                                           placeholder="ชื่อนักเรียน">
                            </div>
                              
                             <input type="submit" value="ทำแบบทดสอบก่อนเรียน" name="ok"/>
                          </form>
   <?php } elseif($u=="content_02.php"){ ?>
       <h4>แบบทดสอบก่อนเรียน</h4>
                        <h4>เรื่อง การเปลี่ยนแปลงที่ทำให้เกิดภาวะสมดุล </h4>
                          <form action="first_test2.php?sid=<?php echo $sid; ?>" class="form-inline">
                            <div class="form-group">
                                  <label for="exampleInputName2">รหัสนักเรียน</label>
                                  <input type="text" class="form-control" id="sid" name="sid"
                                           placeholder="ID" onKeyUp="showUser(this.value)">
                                           
                                  <label for="exampleInputName2">ชื่อนักเรียน</label>
                                  <input type="text" class="form-control" id="stname" name="stname"
                                           placeholder="ชื่อนักเรียน">
                            </div>
                              
                             <input type="submit" value="ทำแบบทดสอบก่อนเรียน" name="ok"/>
                          </form>
   <?php } elseif($u=="content_03.php"){ ?>
       <h4>แบบทดสอบก่อนเรียน</h4>
                        <h4>เรื่อง ค่าคงที่สมดุลกับสมการเคมี </h4>
                          <form action="first_test3.php?sid=<?php echo $sid; ?>" class="form-inline">
                            <div class="form-group">
                                  <label for="exampleInputName2">รหัสนักเรียน</label>
                                  <input type="text" class="form-control" id="sid" name="sid"
                                           placeholder="ID" onKeyUp="showUser(this.value)">
                                           
                                  <label for="exampleInputName2">ชื่อนักเรียน</label>
                                  <input type="text" class="form-control" id="stname" name="stname"
                                           placeholder="ชื่อนักเรียน">
                            </div>
                              
                             <input type="submit" value="ทำแบบทดสอบก่อนเรียน" name="ok"/>
                          </form>
   <?php } elseif($u=="content_04.php"){ ?>
       <h4>แบบทดสอบก่อนเรียน</h4>
                        <h4>เรื่อง การคำนวณค่าคงที่สมดุล </h4>
                          <form action="first_test4.php?sid=<?php echo $sid; ?>" class="form-inline">
                            <div class="form-group">
                                  <label for="exampleInputName2">รหัสนักเรียน</label>
                                  <input type="text" class="form-control" id="sid" name="sid"
                                           placeholder="ID" onKeyUp="showUser(this.value)">
                                           
                                  <label for="exampleInputName2">ชื่อนักเรียน</label>
                                  <input type="text" class="form-control" id="stname" name="stname"
                                           placeholder="ชื่อนักเรียน">
                            </div>
                              
                             <input type="submit" value="ทำแบบทดสอบก่อนเรียน" name="ok"/>
                          </form>
   <?php } elseif($u=="content_05.php"){ ?>
       <h4>แบบทดสอบก่อนเรียน</h4>
                        <h4>เรื่อง ปัจจัยที่มีผลต่อภาวะสมดุล </h4>
                          <form action="first_test5.php?sid=<?php echo $sid; ?>" class="form-inline">
                            <div class="form-group">
                                  <label for="exampleInputName2">รหัสนักเรียน</label>
                                  <input type="text" class="form-control" id="sid" name="sid"
                                           placeholder="ID" onKeyUp="showUser(this.value)">
                                           
                                  <label for="exampleInputName2">ชื่อนักเรียน</label>
                                  <input type="text" class="form-control" id="stname" name="stname"
                                           placeholder="ชื่อนักเรียน">
                            </div>
                              
                             <input type="submit" value="ทำแบบทดสอบก่อนเรียน" name="ok"/>
                          </form>
   <?php } elseif($u=="content_06.php"){ ?>
       <h4>แบบทดสอบก่อนเรียน</h4>
                        <h4>เรื่อง หลักเลอชาเตอลิเอ สมดุลเคมีในสิ่งมีชีวิตและสิ่งแวดล้อม </h4>
                          <form action="first_test6.php?sid=<?php echo $sid; ?>" class="form-inline">
                            <div class="form-group">
                                  <label for="exampleInputName2">รหัสนักเรียน</label>
                                  <input type="text" class="form-control" id="sid" name="sid"
                                           placeholder="ID" onKeyUp="showUser(this.value)">
                                           
                                  <label for="exampleInputName2">ชื่อนักเรียน</label>
                                  <input type="text" class="form-control" id="stname" name="stname"
                                           placeholder="ชื่อนักเรียน">
                            </div>
                              
                             <input type="submit" value="ทำแบบทดสอบก่อนเรียน" name="ok"/>
                          </form>
   <?php }  ?>
  <?php } 
  else { ?>
   <div class="col-xs-12 border pd15 top30">
                      <div class="text-center">
<?php 
echo "<h4> รหัสนักเรียน : ".$sid." </br>ชื่อ-สกุล :".$stname."  </h4> "; 
echo "<h4> คะแนนสอบก่อนเรียน = ".$ftest." คะแนน </h4> "; 
echo "<h4> คะแนนสอบหลังเรียน = ".$ltest." คะแนน </h4> "; 
?>
      </div><!-- /text center  -->
          </div>
              <div class="jumbotron">
              </br>
               <p>&nbsp;</p>
               <?php echo $title; ?>
            </div>
            <div class="row pd15">
                <div id="sectionj1">
                    <div class="col-xs-12 border pd15">
                        <?php echo $subtitle; ?>
                    </div>
                    <div class="col-xs-12 border pd15 top30">
                        <?php echo $satitle; ?>
                    </div>
<?php   echo $content; ?>
                </div> <!-- sectionj1 -->
                </div> <!-- sectionj1 -->
<?php } ?>
                </div> <!-- sectionj1 -->
                <div id="sectionj2">
                    <div class="col-xs-12 border pd15 top30 border-solid">

                        </p>
                    </div><!-- /col-xs-12 border pd15 top30 border-solid  -->
                </div><!-- sectionj2 -->



            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                <div class="list-group">
                    <a href="login.php" class="list-group-item active"><?php if(empty($sid)){ echo "เข้าสู่ระบบ"; } else{ echo "รหัสนักเรียน : ".$sid." </br>ชื่อ-สกุล :".$stname."   ";} ?></a>
                    <a href="page.php?u=content_01.php" class="list-group-item">บทเรียนที่ 1</a>
                    <a href="page.php?u=content_02.php" class="list-group-item">บทเรียนที่ 2</a>
                    <a href="page.php?u=content_03.php" class="list-group-item">บทเรียนที่ 3</a>
                    <a href="page.php?u=content_04.php" class="list-group-item">บทเรียนที่ 4</a>
                    <a href="page.php?u=content_05.php" class="list-group-item">บทเรียนที่ 5</a>
                    <a href="page.php?u=content_06.php" class="list-group-item">บทเรียนที่ 6</a>
                    <a href="#" class="list-group-item">ข้อสอบวัดผล</a>
                    <a href="#" class="list-group-item">Link</a>
                    <?php if(isset($sid)){ echo "<a href='logout.php' class='list-group-item'>ออกจากระบบ</a>"; }?>
                </div>
            </div><!--/.sidebar-offcanvas-->
        </div><!--/row-->
        <hr>
        <footer>
            <p>&copy; 2015 Company, Inc.</p>
        </footer>
      </div>

    </div><!--/.container-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jQuery1.11.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Touch script -->
    <script>

        $("#sectionj2").hide();
        $("#sectionj3").hide();
        $("#sectionj4").hide();
        $("#sectionj5").hide();


        $(document).ready(function () {
            $("#bsec1").click(function () {
                $("#sectionj1").hide();
                $("#sectionj2").show();
            });
        });

        $("#bsec2").click(function () {
            $("#sectionj2").hide();
            $("#sectionj3").show();
        });

        $("#bsec3").click(function () {
            $("#sectionj3").hide();
            $("#sectionj4").show();
        });

        $("#bsec4").click(function () {
            $("#sectionj4").hide();
            $("#sectionj5").show();
        });


    </script>
    <script src="assets/js/method.js"></script>
</body>
</html>
