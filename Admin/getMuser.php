<?php
if(isset($_POST['page'])){
    //Include pagination class file
    include('Pagination.php');
    
   include('session.php');
    
    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 20;
	
	$q = $_GET['q'];
    
    if($q==0)
	{
		//get number of rows
		$queryNum = $db->query("SELECT COUNT(*) as Id FROM faculty");
		$resultNum = $queryNum->fetch_assoc();
		$rowCount = $resultNum['Id'];
	}
	
	if($q==1)
	{
		$queryNum = $db->query("SELECT COUNT(*) as Id FROM members");
		$resultNum = $queryNum->fetch_assoc();
		$rowCount = $resultNum['Id'];
	}
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>"getMuser.php?q=$q", 'totalRows'=>$rowCount, 'currentPage'=>$start, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    if($q==0)
	{
		//get rows
		$query = $db->query("SELECT * FROM faculty ORDER BY `faculty`.`name` ASC LIMIT $start,$limit");
	}
	
	if($q==1)
	{
		//get rows
		$query = $db->query("SELECT * FROM members ORDER BY `members`.`FirstName` ASC LIMIT $start,$limit");
	}
	
	echo '<div class="white-header">';
	if($q==0){
		echo "<h5>Staffs</h5>";
	}
	
	if($q==1){
		echo "<h5>All Students</h5>";
	}
	
	echo '<table class="table w3-card-2 table-bordered w3-animate-opacity table-striped table-condensed">
<tr>
<th>ID</th>
<th>Name</th>
<th>Department</th>';

if($q==1)
{
echo "<th>Year</th>
<th>Edit</th>
</tr>";
}

if($q==0)
{
	echo "<th>designation</th></tr>";
}
    
    if($query->num_rows > 0){ ?>
        <div class="posts_list">
        <?php
            while($row = $query->fetch_assoc()){ 
             
        ?>
            <tr>
					<td>
					<?php					
							if($q==1)
							{
								
							?>
							<a href="extra.php?activity=smemberDetails&selectedsMemberId=<?php echo $row['Id']; ?>"> <?php echo $row['Id']; ?> </a>
							
							<?php
							}
							if($q==0)
							{
							?>
							<a href="extra.php?activity=memberDetails&selectedMemberId=<?php echo $row['Id']; ?>"> <?php echo $row['Id']; ?> </a>
							<?php
							
							}
							?>
						
					</td>
					
					
					
					<td><?php 
							if($q==1)
							{
								echo ucfirst($row['FirstName']);
							}
							if($q==0)
							{
								echo ucfirst($row['name']);
							}
							 ?></td>
					<td><?php echo $row['dept']; ?></td>
					<td><?php					
							if($q==1)
							{
								echo ucfirst($row['year']);
							?>
							<td>
								<a href="extra.php?activity=updateMember&uMemberId=<?php echo $row['Id'];?>">Edit</a>
							</td>
							
							<?php
							}
							if($q==0)
							{
								echo ucfirst($row['deg']);
							}
							
							?></td>
					
				</tr>
         <?php } ?>
		 </table>
        </div>
        <?php echo $pagination->createLinks(); ?>
<?php }
}
?>