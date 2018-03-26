<?php
if(isset($_POST['page'])){
    //Include pagination class file
    include('Pagination.php');
    
    include('session.php');
    
    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 20;
	
	$q = $_GET['q'];
    
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as bookId FROM booking INNER JOIN books ON books.bookId=booking.bookId");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['bookId'];
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>"getDatadept.php", 'totalRows'=>$rowCount, 'currentPage'=>$start, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM booking INNER JOIN books ON books.bookId=booking.bookId LIMIT $start,$limit");
	
	echo '<div class="white-header">
						  			<h5>Booking Details</h5>
                      			</div>';
	echo '<table class="table w3-card-2 table-bordered table-striped table-condensed">
		<tr>
		<th>Access-ID</th>
		<th>Title</th>
		<th>Member Id</th>';
		
	echo "<th>Member Name</th>
		<th>Date</th>
		<th>Issue</th>";
    
    if($query->num_rows > 0){ ?>
        <div class="posts_list">
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
        </div>
        <?php echo $pagination->createLinks(); ?>
<?php }
?>