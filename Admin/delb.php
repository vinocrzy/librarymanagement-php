<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="msc-style.css">
   
    <style>
    body {
      font-family: 'Bitter', serif;
      font-size: 1em;
      color: #444;
    }
    </style>

</head>
<body>
<?php
$q = $_GET['q'];

include('session.php');


$sql="SELECT bookId,title,author,dept,available FROM books Where title LIKE '%".$q."%' || author LIKE '%".$q."%' || bookId LIKE '".$q."%' LIMIT 0 , 5";
$result = mysqli_query($db,$sql);

echo '<table class="table w3-card-2 table-bordered table-striped table-condensed alert alert-success w3-animate-opacity">
<tr>
<th>Access-ID</th>
<th>Title</th>
</tr>';
while($row = mysqli_fetch_array($result)) {
   
	
	?>
				<tr>
					<td>
						<a href="extra.php?activity=bookDetails&selectedBookId=<?php echo $row['bookId']; ?>"> <?php echo $row['bookId']; ?> </a>
					</td>
					<td><?php echo ucfirst($row['title']); ?></td>
					
					
					
				</tr>
				<?php
}
echo "</table>";
mysqli_close($db);
?>

</body>


</html>