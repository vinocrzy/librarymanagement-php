<?php

	$sq1="SELECT DISTINCT ISBN From books LIMIT 0 , 500";
	$res1=mysqli_query($db,$sq1);
	$num1 = mysqli_num_rows($res1);
	
	$sq="SELECT DISTINCT dept From books";
	$res=mysqli_query($db,$sq);
	$num = mysqli_num_rows($res);
	
	

?>
<html>
<head>
<script>
function showdept(str) {
	var str1 = document.getElementById("deptb").value;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getdept.php?q="+str1,true);
        xmlhttp.send();

    }
}
</script>
</head>
<body>
<div class="header">
<h4 class="title"> Select Department</h4>
<p class="category">Book We Have!</p>
</div>
<div class="content">

									<form>

										   <select class="btn btn-theme"  id="deptb" name="dept" onChange="showdept(this.value)">
											<option value="">Category</option>
											
																 <?php
																for ($i = 0; $i < $num; $i++)
																{
																	
																	$userdata=mysqli_fetch_row($res);
																	$option=$userdata[0];
																?>
																	
																	<option value="<?php echo $option?>"><?php echo $option?></option>
																	
																<?php
																}
																?>
										  </select>
										 	  
									</form>
									
									
</div>
</body>
</html>