<?php
   include("config.php");
   session_start();
   
  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
	   
		  // username and password sent from form 
		  
		  $myusername = mysqli_real_escape_string($db,$_POST['username']);
		  $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
		  
		  $sql = "select id from members where Id='$myusername' and pass='$mypassword'";
		  $result = mysqli_query($db,$sql);
		  $count = mysqli_num_rows($result);
		  
		  
		  // If result matched $myusername and $mypassword, table row must be 1 row
			
		  if($count == 1) 
		  {

			 $_SESSION['loginm_user'] = $myusername;
			 
			 header("location: home.php?ch=0");
		  }else 
		  {
			 header("location: error.php");
		  }
		
		
		
   }
   
  
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>library management</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="POST">
		        <h2 class="form-login-heading">Students Login</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="..\Admin\index.php"> Login as Admin?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="index.php" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            
		            
		            
		
		        </div>
		
		          
		
		      </form>	  	
	  	
	  	</div>
	  </div>

   


  </body>
</html>
