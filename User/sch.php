<html>
<head>
<script>

function searchb(str) {
	var str1 = document.getElementById("sb").value;
    if (str == "") {
        document.getElementById("vwd").innerHTML = "";
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
                document.getElementById("vwd").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","searchb.php?q="+str1,true);
        xmlhttp.send();
    }
}




</script>
</head>
<body>
<div class="header">
<h4 class="title"> Search Books</h4>
<p class="category">Book We Have!</p>
</div>
<div class="content">
<form>



  <div class="searchFormField"><input class="form-control round-form"  type="text" id="sb" onkeyup="searchb(this.value)" name="searchField" required autofocus placeholder="Book Search" value=""></div> <br>



  </form>
<br>

<p id="demo"></p>
</div>
</body>
</html>