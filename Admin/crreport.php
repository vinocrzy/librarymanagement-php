<?php
include("session.php");

$sq="SELECT DISTINCT dept From books";
	$res=mysqli_query($db,$sq);
	$num = mysqli_num_rows($res);
	
	if(isset($_POST['formd'])&&isset($_POST['tod']))
	{
		$formd=date_create($_POST['formd']);
		$tod=date_create($_POST['tod']);
		
		$fd=date_format($formd,"Y-m-d");
		$td=date_format($tod,"Y-m-t");
		$query = $db->query("SELECT reportdate,depart,total,issued,available,damage FROM dept INNER JOIN report ON dept.departid=report.departid WHERE report.reportdate='$td'");
		
	}
	
	//$lastofmonth=date('t',$tod);
	
	
	
	date_default_timezone_set('Asia/Kolkata');
	$dt = date("Y-m-d");
?>

<html>
	<head>
		<style>
			table {
				width: 100%;
				border-collapse: collapse;
			}

			table, td, th {
				border: 1px solid black;
				padding: 5px;
			}

			th {text-align: left;}
		</style>
	</head>
	<body>
		<h2 style="text-align: center;"><strong>UNIVERSITY COLLEGE OF ENGINEERING </strong><strong>VILLUPURAM</strong><strong>&nbsp; </strong><strong>&nbsp;&nbsp;&nbsp;</strong></h2>
		<h3 style="text-align: center;"><strong>(A constituent college of Anna University Chennai)</strong></h3>
		<h3 style="text-align: center;"><strong>Villupuram &ndash; 605103.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></h3>
		<hr />
		<h3 style="text-align: center;"><strong>DEPARTMENT OF&nbsp;LIBRARY</strong></h3>
		<p><strong>Report Still &nbsp;<?php echo $dt;?>:</strong></p>
		<p><table>
			<tr>
				<th>Sno</th>
				<th>Department</th>
				<th>Total Books</th>
				<th>Issued Books</th>
				<th>Available Books</th>
				<th>Damaged Books</th>
				
			</tr>
			 <?php
			 $sql2 = "Select bookId From books";
					$query2 = mysqli_query($db,$sql2);
					$result2 = mysqli_num_rows($query2);
					
					$sql5 = "Select bookId From books Where damage = 1";
					$query5 = mysqli_query($db,$sql5);
					$result5 = mysqli_num_rows($query5);
											
					$sql6 = "Select bookId From books Where available >= 1";
					$query6 = mysqli_query($db,$sql6);
					$result6 = mysqli_num_rows($query6);

					$sql9 = "Select bookId From books Where available < 1";
					$query9 = mysqli_query($db,$sql9);
					$result9 = mysqli_num_rows($query9);
			 ?>
					
					<tr>
							<td></td>
							<td>All</td>
							<td><?php echo $result2?></td>
							<td><?php echo $result9?></td>
							<td><?php echo $result6?></td>
							<td><?php echo $result5?></td>
							
						</tr>
					
			<?php		
				for ($i = 0; $i < $num; $i++)
					{
						$userdata=mysqli_fetch_row($res);
						$option=$userdata[0];
						$sql2 = "Select bookId From books Where dept='".$option."'";
						$query2 = mysqli_query($db,$sql2);
						$totalb = mysqli_num_rows($query2);
						
						$sql3 = "Select bookId From books Where dept='".$option."' and available < 1";
						$query3 = mysqli_query($db,$sql3);
						$issuedb = mysqli_num_rows($query3);
						
						$sql4 = "Select bookId From books Where dept='".$option."' and available >= 1";
						$query4 = mysqli_query($db,$sql4);
						$availb = mysqli_num_rows($query4);
						
						$sql5 = "Select bookId From books Where dept='".$option."' and damage = 1";
						$query5 = mysqli_query($db,$sql5);
						$dmgb = mysqli_num_rows($query5);
						
			?>
						<tr>
							<td><?php echo $i+1;?></td>
							<td><?php echo $option;?></td>
							<td><?php echo $totalb?></td>
							<td><?php echo $issuedb?></td>
							<td><?php echo $availb?></td>
							<td><?php echo $dmgb?></td>
							
						</tr>
			<?php
					}
					
			?>
			
						
			
		</table>
		
		<?php
		if(isset($_POST['formd'])&&isset($_POST['tod'])){
		
		if($query->num_rows > 0){
		?>
		<p><strong>Report For &nbsp;<?php echo "(".$fd.")&nbsp;To&nbsp;(".$td.")";?>:</strong></p>
		<p><table>
			<tr>
				<th>Sno</th>
				<th>Department</th>
				<th>Total Books</th>
				<th>Issued Books</th>
				<th>Available Books</th>
				<th>Damaged Books</th>
				
			</tr>
			 <?php
				
				 while($row = $query->fetch_assoc()){ 
			 ?>
						<tr>
							<td><?php echo ucfirst($row['reportdate']); ?></td>
							<td><?php echo ucfirst($row['depart']); ?></td>
							<td><?php echo ucfirst($row['total']); ?></td>
							<td><?php echo ucfirst($row['issued']); ?></td>
							<td><?php echo ucfirst($row['available']); ?></td>
							<td><?php echo ucfirst($row['damage']); ?></td>
							
						</tr>
			<?php	}
					
			?>
						
			
		</table>
			<?php	}
			}
			?>
		

	</body>

</html>