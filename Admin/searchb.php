<!DOCTYPE html>
<html>
<head>
<style>

</style>
<script>

</script>
</head>
<body>
<?php
$q = $_GET['q'];

echo "<h1>".$q."</h1>";
include('session.php');


$sql="SELECT bookId,title,author,dept,available FROM books Where title LIKE '%".$q."%' || author LIKE '%".$q."%' || bookId LIKE '".$q."%' LIMIT 0 , 250";
$result = mysqli_query($db,$sql);

echo '<table class="table w3-card-2 table-bordered table-striped table-condensed alert alert-success w3-animate-opacity">
<tr>
<th>Access-ID</th>
<th>Title</th>
<th>Author</th>
<th>Available</th>
<th>Edit</th>
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
							
							if($row['available'] >= 1){
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
					
					
				</tr>
				<?php
}
echo "</table>";
mysqli_close($db);
?>
</body>
</html>