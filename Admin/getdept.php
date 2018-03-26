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
    $queryNum = $db->query("SELECT COUNT(*) as bookId FROM books WHERE dept = '".$q."'");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['bookId'];
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>"getDatadept.php?q=$q", 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM books WHERE dept = '".$q."' ORDER BY bookId DESC LIMIT $limit");

	echo '<div class="white-header">
						  			<h5>Available</h5>
                      			</div>';
	echo '<table class="table w3-card-2 table-bordered table-striped table-condensed">
		<tr>
		<th>Access-ID</th>
		<th>Title</th>
		<th>Author</th>';
		
	echo "<th>Available</th>
		<th>Edit</th>
		<th>Delete</th>";
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
                $postID = $row['bookId'];
        ?>
            <tr>
					<td>
						<a href="extra.php?activity=bookDetails&selectedBookId=<?php echo $row['bookId']; ?>"> <?php echo $row['bookId']; ?> </a>
					</td>
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
					<td><a href="extra.php?activity=updateBook&uBookId=<?php echo $row['bookId'];?>">Edit</a></td>
					<td>
					
						<a onclick="document.getElementById('id02').style.display='block'">Delete</a>
							<div id="id02" class="w3-modal ">
							  <div class="w3-modal-content span-2-75 w3-round">
								<header class="w3-container w3-purple">
								  
								  <h2>Are you Sure you want to delete this record?</h2>
								</header>
								
								
								<footer class="w3-container w3-purple">
								  &nbsp&nbsp<a class="w3-button w3-red w3-round-xlarge" href="extra.php?activity=deleteBook&deleteBookId=<?php echo $row['bookId']; ?>">Delete</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								  
								  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="w3-button w3-red w3-round-xlarge" onclick="document.getElementById('id02').style.display='none'">Cancel</a>
								</footer>
							  </div>
							</div>
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