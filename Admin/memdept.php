<!DOCTYPE html>
<html>
<head>
<script src="jquery.min.js"></script>
</head>
<body>
<div Id="posts_content">
<?php
//Include pagination class file
    include('Pagination.php');
    
    include('session.php');
    
	$q = $_GET['q'];
	
	
    $limit = 20;
    
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as Id FROM members WHERE dept = '".$q."'");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['Id'];
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>"getMdept.php?q=$q", 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM members WHERE dept = '".$q."' ORDER BY `members`.`FirstName` ASC LIMIT $limit");

	echo '<div class="white-header">';
	echo "<h5>".$q."</h5>";
	echo '</div>
	<table class="table w3-card-2 table-bordered table-striped table-condensed alert alert-success w3-animate-opacity">
<tr>
<th>Id</th>
<th>Name</th>
<th>Year</th>
<th>Department</th>
<th>Edit</th>
</tr>';
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
                
        ?>
				<tr>
					<td>
						<a href="home.php?activity=smemberDetails&selectedsMemberId=<?php echo $row['Id']; ?>"> <?php echo $row['Id']; ?> </a>
					</td>
					<td><?php echo ucfirst($row['FirstName']); ?></td>
					<td><?php echo $row['year']; ?></td>
					<td><?php echo ucfirst($row['dept']); ?></td>
					<td>
						<a href="home.php?activity=updateMember&uMemberId=<?php echo $row['Id'];?>">Edit</a>
					</td>
					
				</tr>
        <?php } ?>
        </table>
        <?php echo $pagination->createLinks(); ?>
    <?php } ?>
    </div>
<?php 
mysqli_close($db);
?>
</body>
</html>