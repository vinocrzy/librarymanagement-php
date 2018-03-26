<?php
   include('session.php');
   
					
$sql6 = "Select count(bookId) From books Where available >= 1";
$query6 = mysqli_query($db,$sql6);
$result6 = mysqli_fetch_assoc($query6);

$sql9 = "Select count(bookId) From books Where available < 1";
$query9 = mysqli_query($db,$sql9);
$result9 = mysqli_fetch_assoc($query9);


   
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
	<link rel="stylesheet" type="text/css" href="assets/css/w3.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
	<link rel="stylesheet" type="text/css" href="assets/css/w3.css"> 
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
	<script>
			function issb(str) {
				var x = document.getElementById("myForm");
				
				if (str == "") {
					document.getElementById("vwd2").innerHTML = "";
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
							document.getElementById("vwd2").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","issb.php?bid="+x.elements[0].value+"&mid="+x.elements[1].value,true);
					xmlhttp.send();
				}
			}
			
			function reb(str) {
				var x = document.getElementById("myForm");
				
				if (str == "") {
					document.getElementById("vwd2").innerHTML = "";
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
							document.getElementById("vwd2").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","reb.php?bid="+x.elements[0].value+"&mid="+x.elements[1].value,true);
					xmlhttp.send();
				}
			}
			
			function rwb(str) {
				var x = document.getElementById("myForm");
				
				if (str == "") {
					document.getElementById("vwd2").innerHTML = "";
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
							document.getElementById("vwd2").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","rwb.php?bid="+x.elements[0].value+"&mid="+x.elements[1].value,true);
					xmlhttp.send();
				}
			}

			function isearchm(str) {
				var str1 = document.getElementById("ism").value;
				if (str == "") {
					document.getElementById("vwdst").innerHTML = "";
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
							
								document.getElementById("vwdst").innerHTML = this.responseText;
							
						}
					};
					if(str1<422500000000){
								xmlhttp.open("GET","searchf.php?q="+str1,true);
								xmlhttp.send();
							}
							else{
								xmlhttp.open("GET","searchmem.php?q="+str1,true);
								xmlhttp.send();
							}
					
				}
			}

			function isearchb(str) {
				var str1 = document.getElementById("isb").value;
				if (str == "") {
					document.getElementById("vwdb").innerHTML = "";
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
							document.getElementById("vwdb").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","searchb.php?q="+str1,true);
					xmlhttp.send();
				}
			}
			$(document).ready(function() {
				$("#txtboxToFilter").keydown(function (e) {
					// Allow: backspace, delete, tab, escape, enter and .
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
						 // Allow: Ctrl/cmd+A
						(e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
						 // Allow: Ctrl/cmd+C
						(e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
						 // Allow: Ctrl/cmd+X
						(e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
						 // Allow: home, end, left, right
						(e.keyCode >= 35 && e.keyCode <= 39)) {
							 // let it happen, don't do anything
							 return;
					}
					// Ensure that it is a number and stop the keypress
					if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						e.preventDefault();
					}
				});
			});
		</script>
    
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
                      <a  href="home.php">
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
                      <a class="active" href="javascript:;" >
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
						
							<div class="col-lg-12">
							  <div class="form-panel">
								<h1 class="major">Issue Books<br /></h1>
								<div class="addMemberForm">
									<form action="#" id="myForm" >
									<div class="btn-group btn-group-justified">
									  <div class="btn-group">
										<input type="text" class="form-control round-form" name="issueBookId" id="isb" onkeyup="isearchb(this.value)" required autofocus placeholder="Access-ID" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
									  </div>
									  <div class="btn-group">
										<input type="text" class="form-control round-form" name="issuerId" id="ism" onkeyup="isearchm(this.value)" required autofocus placeholder="Member id" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><br>
									  </div>										
									</div>
									
									</form>
									
										<div class="alert alert-info" id="vwdb"><b>Book info</b></div>
										<div class="alert alert-info" id="vwdst"><b>Student info</b></div>
									
									<br>
									<div class="btn-group btn-group-justified">
									  <div class="btn-group">
										<button class="btn btn-theme" onclick="issb(this.value)" value="Issue">Issue </button>
										
									  </div>
									  <div class="btn-group">
										<button class="btn btn-theme" onclick="reb(this.value)" value="Return">Return </button>
										
									  </div>
									  <div class="btn-group">
										<button class="btn btn-theme" onclick="rwb(this.value)" value="Return">Renewal </button>
										
									  </div>
									</div>   
									
									
									
									
								</div>
								<br>
								<div id="vwd2" class="alert alert-info"><b>Server Response here...</b></div>
							</div>
							
						</div>
                  	
                  	</div><!-- /row mt -->	
                  
                      
					  
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      	
                      	
                      	

                    </div><!-- /row -->
                    
					
					<div class="row mt">
                      
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
