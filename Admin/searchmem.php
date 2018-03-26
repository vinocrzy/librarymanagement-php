<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
$q = $_GET['q'];

echo "<h1>".$q."</h1>";
include('session.php');


$sql="SELECT Id,FirstName,year,dept FROM members WHERE FirstName like '%".$q."%' || Id like '%".$q."%' LIMIT 0 , 50";
$result = mysqli_query($db,$sql);

echo '<table class="table w3-card-2 table-bordered table-striped table-condensed alert alert-success w3-animate-opacity">
<tr>
<th>Id</th>
<th>Name</th>
<th>Year</th>
<th>Department</th>

</tr>';
while($row = mysqli_fetch_array($result)) {
   
	
	?>
				<tr>
					<td>
						<a href="extra.php?activity=smemberDetails&selectedsMemberId=<?php echo $row['Id']; ?>"> <?php echo $row['Id']; ?> </a>
					</td>
					<td><?php echo ucfirst($row['FirstName']); ?></td>
					<td><?php echo $row['year']; ?></td>
					<td><?php echo ucfirst($row['dept']); ?></td>
					
				</tr>
				<?php
}
echo "</table>";
mysqli_close($db);
?>
</body>
</html>