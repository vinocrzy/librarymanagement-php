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
    
    $limit = 30;
    
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as bookId FROM books WHERE available = 0");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['bookId'];
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>'getData.php', 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM books WHERE available = 0 ORDER BY bookId DESC LIMIT $limit");
	$query1 = $db->query("SELECT * FROM borrow Where issueId > 0 ORDER BY bookId DESC LIMIT $limit");

	echo '<div class="white-header">
						  			<h5>Issued Books</h5>
                      			</div>';
	echo '<table class="table w3-card-2 table-bordered table-striped table-condensed">
		<tr>
		<th>Access-ID</th>
		<th>Title</th>
		<th>Author</th>';
		
	echo "<th>Issue-ID</th>
		<th>Issue-Date</th></tr>";
		
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
			$row1 = $query1->fetch_assoc()
                
        ?>
            <tr>
					<td>
						<a href="extra.php?activity=bookDetails&selectedBookId=<?php echo $row['bookId']; ?>"> <?php echo $row['bookId']; ?> </a>
					</td>
					<td><?php echo ucfirst($row['title']); ?></td>
					<td><?php echo ucfirst($row['author']); ?></td>
					<td><?php echo ucfirst($row1['issueId']); ?></td>
					<td><?php echo ucfirst($row1['issueDate']); ?></td>
					
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