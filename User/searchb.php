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
?>

<div class="header">
<h4 class="title"><?php echo "<h1>".$q."</h1>";?></h4>
<p class="category">Book We Have!</p>
</div>
<div class="content">
<?php

include('session.php');


$sql="SELECT bookId,title,author,dept,available FROM books Where title LIKE '%".$q."%' || author LIKE '%".$q."%' || bookId LIKE '".$q."%' ORDER BY `books`.`available` DESC LIMIT 0 , 300 ";
$result = mysqli_query($db,$sql);

echo '
<div class="content table-responsive table-full-width table-full-hight">
<table class="table table-hover table-striped">
<tr>
<th>Title</th>
<th>Author</th>
<th>Available</th>
<th>Book</th>
</tr>';
while($row = mysqli_fetch_array($result)) {
   
	
	?>
				<tr>
					
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
					<td><a href="prebooking.php?bookId=<?php echo $row['bookId']; ?>" class="btn btn-primary btn-xs" > Prebook </a></td>
					
				</tr>
				<?php
}
echo "</table>";
mysqli_close($db);
?>
</div>
</div>
</body>
</html>