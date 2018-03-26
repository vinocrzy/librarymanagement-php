<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
$q = $_GET['q'];

include('session.php');


$sql="Select bookId,title,author,dept,available From books WHERE ISBN = '".$q."' LIMIT 0 , 500";
$result = mysqli_query($db,$sql);

echo '<table class="table w3-card-2 table-bordered table-striped table-condensed">
<tr>
<th>Access-ID</th>
<th>Title</th>
<th>Author</th>
<th>Available</th>
<th>Edit</th>
<th>Delete</th>
</tr>';
while($row = mysqli_fetch_array($result)) {
   
	
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
					<td>
						<a href="extra.php?activity=updateBook&uBookId=<?php echo $row['bookId'];?>">Edit</a>
					</td>
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
				<?php
}
echo "</table>";
mysqli_close($db);
?>

</body>
</html>