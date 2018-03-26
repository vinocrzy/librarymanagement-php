<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/w3.css"> 
<script>
function searchm(str) {
	var str1 = document.getElementById("sm").value;
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
        xmlhttp.open("GET","searchmem.php?q="+str1,true);
        xmlhttp.send();
    }
}

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

function searchf(str) {
	var str1 = document.getElementById("sf").value;
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
        xmlhttp.open("GET","searchf.php?q="+str1,true);
        xmlhttp.send();
    }
}



</script>
</head>
<body>
<h1 class="fa fa-search"> Search<br /></h1>
<form>
<div class="btn-group btn-group-justified">
<div class="btn-group">
  <div class="searchFormField "><input class="form-control round-form"  type="text" id="sf" onkeyup="searchf(this.value)" name="searchField" required autofocus placeholder="Faculty Search" value=""></div><br>
</div>
<div class="btn-group">
  <div class="searchFormField"><input class="form-control round-form"  type="text" id="sb" onkeyup="searchb(this.value)" name="searchField" required autofocus placeholder="Book Search" value=""></div> <br>
</div>
<div class="btn-group">  
  <div class="searchFormField"><input class="form-control round-form"  type="text" id="sm" onkeyup="searchm(this.value)" name="searchField" required autofocus placeholder="Student Search" value=""></div><br>
</div>
</div>
  </form>
<br>
<div id="vwd" class="alert alert-info w3-animate-right"><b>Search info will be listed here...</b></div>
<p id="demo"></p>

</body>
</html>