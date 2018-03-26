<!DOCTYPE html>
<html>
<head>
<link href='style.css' rel='stylesheet' type='text/css'>
<script src="jquery.min.js"></script>
</head>
<body>
<div Id="posts_content">
<?php
    
    $limit = 10;
    
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as bookId FROM booking INNER JOIN books ON books.bookId=booking.bookId WHERE booking.memberId=$user_checkm");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['bookId'];
    
    
    //get rows
    $query = $db->query("SELECT * FROM booking INNER JOIN books ON books.bookId=booking.bookId WHERE booking.memberId=$user_checkm");

	echo '<div class="header">
<h4 class="title"> All Books</h4>
<p class="category">Book In Available!</p>
</div>';
	echo '
	<table class="table w3-card-2">
		<tr>
		
		<th>Title</th>
		<th>Status</th>
		<tr>
		';
		
	
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
			
			
        ?>
            <tr>
					
					<td><?php echo ucfirst($row['title']); ?></td>
					<td>
						<?php 
							
							if($row['status'] == 1){
								echo '<div class="alert alert-danger">Canceled</div>';
							}
							elseif($row['status'] == 0){
								echo '<div class="alert alert-warning">Waiting!</div>';
							}
						?>
					</td>
					
			</tr>
			
        <?php } ?>
        
        
    <?php } ?>
	</table>
    
</div>
<?php 
mysqli_close($db);
?>
</body>
</html>