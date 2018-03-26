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
    
   
    
	
    $limit = 20;
    
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as bookId FROM booking INNER JOIN books ON books.bookId=booking.bookId");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['bookId'];
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>"getbookingData.php", 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM booking INNER JOIN books ON books.bookId=booking.bookId LIMIT $limit");

	echo '<div class="white-header">
						  			<h5>Booking Details</h5>
                      			</div>';
	echo '<table class="table w3-card-2 table-bordered table-striped table-condensed">
		<tr>
		<th>Access-ID</th>
		<th>Title</th>
		<th>Member Id</th>';
		
	echo "<th>Date</th>
		<th>Issue</th>";
    
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
					<td><?php echo ucfirst($row['memberId']); ?></td>
					
					<td><?php echo ucfirst($row['bookingdate']); ?></td>
					<td>
					<a href="bissue.php?bid=<?php echo $row['bookId']; ?>&mid=<?php echo $row['memberId']; ?>" class="btn btn-primary btn-xs" > Issue </a>
						
					</td>
				</tr>
        <?php } ?>

    <?php } ?>
	    </table>
        <?php echo $pagination->createLinks(); ?>
    </div>
<?php 
mysqli_close($db);
?>
</body>
</html>