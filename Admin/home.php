<?php
   include('session.php');
   
   
$sql1 = "Select count(Id) From members";
$query = mysqli_query($db,$sql1);
$result = mysqli_fetch_assoc($query);

$sql2 = "Select count(bookId) From books";
$query2 = mysqli_query($db,$sql2);
$result2 = mysqli_fetch_assoc($query2);

$sql4 = "Select count(publisher) From books Group By publisher";
$query4 = mysqli_query($db,$sql4);
$result4 = mysqli_num_rows($query4);
						
$sql5 = "Select bookId From books Where damage = 1";
$query5 = mysqli_query($db,$sql5);
$result5 = mysqli_num_rows($query5);
						
$sql6 = "Select count(bookId) From books Where available >= 1";
$query6 = mysqli_query($db,$sql6);
$result6 = mysqli_fetch_assoc($query6);

$sql9 = "Select count(bookId) From books Where available < 1";
$query9 = mysqli_query($db,$sql9);
$result9 = mysqli_fetch_assoc($query9);
						
$sql7 = "Select count(Id) From faculty";
$query7 = mysqli_query($db,$sql7);
$result7 = mysqli_fetch_assoc($query7);
						
$sql8 = "Select count(author) From books Group By author";
$query8 = mysqli_query($db,$sql8);
$result8 = mysqli_num_rows($query8);
   
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
	<link rel="stylesheet" type="text/css" href="assets/css/w3.css"> 
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	
	<script src="assets/js/jqu.js"></script>

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b>Library System</b></a>
            <!--logo end-->
           
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="home.php"><img src="assets/img/annauniv.jpg" class="img" width="80"></a></p>
              	  <h5 class="centered">University College of Engineering,Villupuram</h5>
              	  	
                  <li class="mt">
                      <a class="active" href="home.php">
                          <i class="fa fa-desktop"></i>
                          <span>Inventory</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Member Access</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="addst.php"><i class="fa fa-plus-circle"></i>Add Student</a></li><li><a  href="uupdate.php"><i class="fa fa-adjust"></i>User Update</a></li><li><a  href="delmemb.php"><i class="fa fa-trash-o"></i>Delete Members</a></li><li><a  href="addStaff.php"><i class="fa fa-plus-circle"></i>Add Staff</a></li> <li><a  href="members.php"><i class="fa fa-user"></i>Members Details</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Book Details</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="browse.php">Browse Book</a></li>
						  <li><a  href="damagelist.php">Damage Books</a></li>
						  <li><a  href="Issuedlist.php">Issued Books</a></li>
						  <li><a  href="returnBooksHisory.php">Returned Books</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-edit"></i>
                          <span>Book Access</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="addBook.php">Add Book</a></li>
						  <li><a  href="issueBooks.php">Issue Book</a></li>
						  <li><a  href="booking.php?ch=0">Booked Books</a></li>
                          <li><a  href="damage.php">Set Damage Books</a></li>
						   <li><a  href="report.php">Report</a></li>
                      </ul>
                  </li>
                  
				  <li class="sub-menu">
                      <a href="srch.php" >
                          <i class="fa fa-search"></i>
                          <span>Search</span>
                      </a>
                     
                  </li>
				  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Settings</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="pupdate.php?ch=0">Password Update</a></li>
                          <li><a  href="lock_screen.php?ch=0">Lock</a></li>
                      </ul>
                  </li>
                   <li  class="sub-menu">
                      <a class="" href="about.php" >
                          <i class="fa fa-info"></i>
                          <span>About</span>
                      </a>
                     
                  </li>
				  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_user"></span>
					  			<h3><?php echo $result7['count(Id)'];?></h3>
                  			</div>
					  			<p>Total Staffs </p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_study"></span>
					  			<h3><?php echo $result['count(Id)'];?></h3>
                  			</div>
					  			<p>Total Students </p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_stack"></span>
					  			<h3><?php echo $result6['count(bookId)']; ?></h3>
                  			</div>
					  			<p>Books in library</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_pen"></span>
					  			<h3><?php echo $result8; ?></h3>
                  			</div>
					  			<p>Total Authors</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_trash"></span>
					  			<h3><?php echo $result5; ?></h3>
                  			</div>
					  			<p>Total Damaged Books</p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	
                  
                      
					  
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      	
                      	
                      	

                    </div><!-- /row -->
                    
					
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    
						
                      		<div class="white-panel pn donut-chart">
                      			<div class="white-header">
						  			<h5>Books Chart</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i><?php echo $result9['count(bookId)']; ?> Issued Books  </p>
									</div>
	                      		</div>
								<canvas id="serverstatus01" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: <?php echo $result9['count(bookId)']; ?>,
												color:"#68dff0"
											},
											{
												value : <?php echo $result6['count(bookId)']; ?>,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
	                      	</div><! --/grey-panel -->
                      	<br>
                      
						

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 - www.aucev.edu.in
              <a href="##" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to UCEV library!',
            // (string | mandatory) the text inside the notification
            text: 'Developed by UCEV CSE Students Batch 2014-2018.',
            // (string | optional) the image to display on the left
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
