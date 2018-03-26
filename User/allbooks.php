<!DOCTYPE html>
<html>
<head>
<link href='style.css' rel='stylesheet' type='text/css'>
<script src="jquery.min.js"></script>
</head>
<body>
<div Id="posts_content">
<?php
//Include pagination class file
    include('Pagination.php');
    
    //Include database configuration file
    
    
    $limit = 10;
    
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as bookId FROM books Where booking=0");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['bookId'];
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>'getData.php', 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM books Where booking=0 ORDER BY bookId ASC LIMIT $limit");

	echo '<div class="header">
<h4 class="title"> All Books</h4>
<p class="category">Book In Available!</p>
</div>';
	echo '<div class="content table-responsive table-full-width">
	<table class="table table-hover table-striped">
		<tr>
		
		<th>Title</th>
		<th>Author</th>
		';
		
	echo "<th>Available</th>
		<th>Book</th>";
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
                
        ?>
            <tr>
					
					<td><?php echo ucfirst($row['title']); ?></td>
					<td><?php echo ucfirst($row['author']); ?></td>
					<td>
						<?php 
							
							if($row['available'] == 1){
								echo 'Yes';
							}
							elseif($row['available'] == 0){
								echo 'No';
							}
						?>
					</td>
					<td><a href="prebooking.php?bookId=<?php echo $row['bookId']; ?>" class="btn btn-primary btn-xs" > Prebook </a></td>
					
			</tr>
			
        <?php } ?>
        </table>
        
    <?php } ?>
    </div>
	<?php echo $pagination->createLinks(); ?>
</div>

<?php 
mysqli_close($db);
?>
</body>
</html>