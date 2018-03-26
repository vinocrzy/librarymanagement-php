<?php



	//include('session.php');
	

	$sql = "SELECT id, file_name FROM files";
	$result = mysqli_query($db, $sql) or die('Error, query failed');
	if(mysqli_num_rows($result) == 0)
	{
	echo "Filebase is empty <br>";
	} 
	else
	{
		while(list($id, $name) = mysqli_fetch_array($result,MYSQLI_NUM))
		{
?>			<div class="btn-group btn-group-justified ">
					
					<b class="list-group-item btn-group"><?php echo $name; ?></b>
				
					<a href="bulkinsert.php?file=<?php echo $name;?>" class="btn-group btn btn-primary btn-xs"><i class="fa fa-download fa-fw"></i></a>
											
				
					<a href="deletefile.php?file=<?php echo $name;?>" class="btn-group btn btn-theme04 btn-xs"><i class="fa fa-trash-o"></i></a>
					
											
			</div> 
			</br>
			</hr>
			
			
<?php 
		}
	}



?>
