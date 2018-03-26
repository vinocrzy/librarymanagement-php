<?php
if(isset($_POST['page'])){
    //Include pagination class file
    include('Pagination.php');
    include('session.php');
    
    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 6;
	
	$q = $_GET['q'];
    
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as bookId FROM books WHERE dept = '".$q."'");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['bookId'];
    
    //initialize pagination class
    $pagConfig = array('baseURL'=>"getDatadept.php?q=$q", 'totalRows'=>$rowCount, 'currentPage'=>$start, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM books WHERE dept = '".$q."' ORDER BY bookId DESC LIMIT $start,$limit");
	
	echo '<div class="header"><h4 class="title">';
	echo "$q</h4>";
	echo '
	<p class="category">Book In Available!</p>
	</div>
	<div class="content table-responsive table-full-width">
	<table class="table w3-card-2 table table-hover table-striped table-condensed">
		<tr>
		<th>Title</th>
		<th>Author</th>';
		
	echo "<th>Available</th>
		<th>Book</th>";
    
    if($query->num_rows > 0){ ?>
        <div class="posts_list">
        <?php
            while($row = $query->fetch_assoc()){ 
                $postID = $row['bookId'];
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
        </div>
        <?php echo $pagination->createLinks(); ?>
<?php }
}
?>