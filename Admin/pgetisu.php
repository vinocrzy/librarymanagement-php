<?php
$q = intval($_GET['q']);
if($q==0)
{
	echo '<div class="white-header">
						  			<h5>Issued Books</h5>
                      			</div>';
}
if($q==1)
{
	echo '<div class="white-header">
						  			<h5>Available</h5>
                      			</div>';
}

include('session.php');

$start = !empty($_POST['page'])?$_POST['page']:0;
$limit = 50;

//get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as bookId FROM books WHERE available = '".$q."'");
    $resultNum = $queryNum->fetch_assoc();
    $num1 = $resultNum['bookId'];
	
	//get number of rows
    $queryNum1 = $db->query("SELECT COUNT(*) as bookId FROM borrow Where issueId > 0");
    $resultNum1 = $queryNum->fetch_assoc();
    $num = $resultNum['bookId'];

$sql="Select bookId,title,author,dept,available From books WHERE available = '".$q."' ORDER BY bookId DESC LIMIT LIMIT $start,$limit";
$result = mysqli_query($db,$sql);


$sql1="SELECT bookId,issueId,issueDate FROM borrow Where issueId > 0 ORDER BY bookId DESC LIMIT LIMIT $start,$limit";
$result1 = mysqli_query($db,$sql1);


 //Include pagination class file
    include('Pagination.php');
	
	







echo '<table class="table w3-card-2 table-bordered table-striped table-condensed">
<tr>
<th>Access-ID</th>
<th>Title</th>
<th>Author</th>';

if($q==1)
{
	//initialize pagination class
    $pagConfig = array('baseURL'=>'pgetisu.php', 'totalRows'=>$num1, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
	
echo "<th>Available</th>
<th>Edit</th>
<th>Delete</th>";
}

if($q==0)
{
	//initialize pagination class
    $pagConfig = array('baseURL'=>'pgetisu.php', 'totalRows'=>$num, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);
	
	echo "<th>Issue-ID</th>
	<th>Issue-Date</th></tr>";
}
for($i=0;$i<$limit;$i++)
{
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1) ;
	
	?>
				<tr>
					<td>
						<a href="extra.php?activity=bookDetails&selectedBookId=<?php echo $row['bookId']; ?>"> <?php echo $row['bookId']; ?> </a>
					</td>
					<td><?php echo ucfirst($row['title']); ?></td>
					<td><?php echo ucfirst($row['author']); ?></td>
					<?php 
					if($q==1)
					{
					?>
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
				
				<?php
					}



if($q==0)
{
 echo "<td>" . $row1['issueId'] . "</td>";
 echo "<td>" . $row1['issueDate'] . "</td>";
 echo "</tr>";
}

}
echo "</table>";
mysqli_close($db);
?>
<?php echo $pagination->createLinks(); ?>