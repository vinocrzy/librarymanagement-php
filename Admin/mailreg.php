<html>
<head>
 <link rel="stylesheet" href="msc-style.css">
   
    <style>
    body {
      font-family: 'Bitter', serif;
      font-size: 1em;
      color: #444;
    }
    </style>
<script>
function searchm(str) {
	var str1 = document.getElementById("ism").value;
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




</script>
</head>
<body>
<h1 class="w3-center">Register The User Mail<br /></h1><br/>
<form id="mail">
<div class="btn-group btn-group-justified">

<div class="btn-group">
<input type="text" class="form-control round-form" name="issuerId" id="ism" onkeyup="searchm(this.value)" required autofocus placeholder="Member id" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
</div>
<div class="btn-group">
  <div class="searchFormField"><input class="form-control round-form"  type="email" id="sb"  name="Email" required autofocus placeholder="MailId" value=""></div> <br>
</div>
</div>
  </form>
<br>
<div id="vwd" class="alert alert-info w3-animate-right"><b>Search info will be listed here...</b></div>
<div class="btn-group btn-group-justified">
<div class="btn-group">
<p><button class="btn btn-theme03" id="demo4">Register</button></p>
</div>
</div>

    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-47902363-1', 'bitwiser.in');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
    </script>
    <script src="msc-script.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
		
		var x = document.getElementById("mail");
        
        var demobtn2 = document.querySelector("#demo4");
        demobtn2.addEventListener("click", function() {
		
          mscConfirm("Confirm", x.elements[0].value+" to Register '"+x.elements[1].value+"' this mail?", function(){
            mscAlert('Regitered');
			window.location="mailup.php?memid="+x.elements[0].value+"&mail="+x.elements[1].value;
          },
          function() {
            mscAlert('Cancelled');
          });
        });

		
       
    });
    var disqus_shortname = 'bitwiser'; // required: replace example with your forum shortname
        /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
    </script>

</body>
</html>