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

</script>
</head>
<body>
<div class="col-lg-12">
							  <div class="form-panel">
								<h1 class="major">Browse Book<br /></h1>
								<div class="browse">
									<form>
									<div class="btn-group btn-group-justified">
									
										<div class="btn-group">
										<select class="btn btn-theme" name="users" onChange="showid(this.value)">
										   <option value="">ISBN No</option>
																 <?php
																for ($i = 0; $i < $num1; $i++)
																{
																	
																	$userdata=mysqli_fetch_row($res1);
																	$option=$userdata[0];
																?>
																	
																	<option value="<?php echo $option?>"><?php echo $option?></option>
																	
																<?php
																}
																?>
										  </select>
										 </div>
										  
										  <div class="btn-group">
										  <select class="btn btn-theme" name="avai" onChange="showisu(this.value)">
											<option value="">Availability</option>
											<option value="1">Issued</option>	
										  </select>
										</div>
										  
										  <div class="btn-group">
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
										 </div> 
									</div>	  
									</form>
									
									
<br>
<div id="txtHint" class="alert alert-info"><b>Book info will be listed here...</b></div>
</div>
</div>
</div>
</body>
</html>