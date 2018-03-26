<?php
	

	$selectedMemberId = $_REQUEST['selectedMemberId'];

	$query = mysqli_query($db,"Select Id,name,dept,deg From faculty Where Id = '$selectedMemberId'");
	$result = mysqli_fetch_assoc($query);
	

	$query1 = "SELECT bookId,issueDate From borrow Where issueId = '$selectedMemberId'";
	$return1 = mysqli_query($db,$query1);
	$return2 = mysqli_query($db,$query1);
	$result1 = mysqli_fetch_assoc($return1);

?>


<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/styleMemberInfo.css">
		<link rel="stylesheet" type="text/css" href="../css/styleTable.css">
	</head>
	<body>
	
	<div class="white-header">
									<h5>Member Information</h5>
		</div>
		
								<p><b><?php echo ucfirst($result['name']); ?>[<?php echo $selectedMemberId; ?>]</b></p>
									<div class="row">
										<div class="col-md-6">
											<p class="mt">Deg</p>
											<p><?php echo ucfirst($result['deg']); ?></p>
										</div>
										<div class="col-md-6">
											<p class="mt">Department</p>
											<p><?php echo ucfirst($result['dept']); ?></p>
										</div>	
					
								
									
								</div>
		
			
			

	
		
			<div class="alert alert-warning">
				<div class="issuedBookTitle">Issued Book</div>
				<table class="table w3-card-2">
					<tr>
						<th>Book ID</th>
						<th>Date</th>
					</tr>
					<?php
						while($result2 = mysqli_fetch_assoc($return2)){
							?>
							<tr>
								<td>
									<a href="extra.php?activity=bookDetails&selectedBookId=<?php echo $result1['bookId']; ?>"> <?php echo $result2['bookId']; ?> </a>
								</td>
								<td><?php echo $result2['issueDate']; ?></td>
							</tr>
							<?php
						}
					?>
				</table>
			</div>
		
		
	</body>
</html>  