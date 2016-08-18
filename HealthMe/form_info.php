<?php include"head.php"; ?>

<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">  
<script  src="js/jquery-1.3.2.min.js"></script>
<script  src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script  src="js/bootstrap.js"></script>

<script type="text/javascript">
	$(function(){  
    // แทรกโค้ต jquery  
    $("#dateInput").datepicker({ dateFormat: 'yy-mm-dd' });  
    // รูปแบบวันที่ที่ได้จะเป็น 2009-08-16  
});  
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
                    document.getElementById("spname").value = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "regisgetuser.php?q=" + str, true);
            xmlhttp.send();
        }

        function checkid(str) {

            if (str == "") {
                document.getElementById("txtHint4").innerHTML = "";
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
                    document.getElementById("txtHint4").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "regischeckCard.php?q=" + str, true);
            xmlhttp.send();
        }

</script>  
<style type="text/css">  
.ui-datepicker{  
    width:150px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
}  
</style>  
<div class="container">
                  <h1>&nbsp;</h1>
                  <br><br><br><center>
					<?php
                    	if($_SESSION["msgicon"] == 1){
                	?>
                    		<img src="images/success.png" alt="" width="64" height="64" />
                	<?php	
                    	}else{
                	?>
                    		<img src="images/error.png" alt="" width="64" height="64" />
                	<?php	
                    	}
                    	echo "<br>". $_SESSION["msgsystem"] . "<br>";
                	?>
                 <a href="<?php echo $_SESSION["msglink"];?>">ต่อไป >></a><br />                  
                 </center> 
                  
                    
            </div>

<script src="js/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
$j= $.noConflict(true);
</script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>