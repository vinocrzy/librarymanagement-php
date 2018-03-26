<?php
	

	$sq1="SELECT DISTINCT Id From members";
	$res1=mysqli_query($db,$sq1);
	$num1 = mysqli_num_rows($res1);
	
	$sq="SELECT DISTINCT dept From members";
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
								<h1 class="major">Members List<br /></h1>
								<div class="browse">
									<form>
									<div class="btn-group btn-group-justified">
	<div class="btn-group">
  <select class="btn btn-theme" name="avai" onchange="memuser(this.value)">
    <option value="">Position</option>
	<option value="0">Staff</option>
	<option value="1">Student</option>	
  </select>
  </div>
 
  
  <div class="btn-group">
   <select class="btn btn-theme" id="dept" name="dept" onchange="memdept(this.value)">
    <option value="">Department</option>
	
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
<div id="vwd1" class="alert alert-info"><b>Members info will be listed here...</b></div>
</div>
</div>
</div>
</body>
</html>