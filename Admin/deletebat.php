<?php
$sq1="SELECT DISTINCT year From members";
	$res1=mysqli_query($db,$sq1);
	$num1 = mysqli_num_rows($res1);
?>
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

</head>
<body>
<h1 class="w3-center"><span>Batch Delete</span></i><br /></h1>
<form id="batch">

 <select name="dept" class="form-control round-form" >
												 <option value="">Year</option>
												 <?php
												for ($i = 0; $i < $num1; $i++)
												{
													
													$userdata=mysqli_fetch_row($res1);
													$option=$userdata[0];
												?>
													
													<option value="<?php echo $option?>" ><?php echo $option?></option>
													
												<?php
												}
												?>
											
										</select><br>

  </form>
<p><a class="btn btn-theme04" id="demo3" >  Delete</a></p>
<br>

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

		var x = document.getElementById("batch");
        
        var demobtn2 = document.querySelector("#demo3");
        demobtn2.addEventListener("click", function() {
			mscConfirm("Delete", "Are you sure you want to delete this "+x.elements[0].value+" Batch?", function(){
           
			window.location="deleteqr.php?delbatchid="+x.elements[0].value;
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