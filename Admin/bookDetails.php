<?php
	

	$selectedBookId = $_REQUEST['selectedBookId'];

	$query = mysqli_query($db,"Select * From books Where bookId = '$selectedBookId'");
	$result = mysqli_fetch_assoc($query);

	$query1 = mysqli_query($db,"Select issueId From borrow Where bookId = '$selectedBookId'");
	$result1 = mysqli_fetch_assoc($query1);

	$issueId = $result1['issueId'];

	if($issueId){
		$query2 = mysqli_query($db,"Select FirstName From members Where Id = '$issueId'");
		$result2 = mysqli_fetch_assoc($query2);
		$num = mysqli_num_rows($query2);
		if($num==NULL){
			$query2 = mysqli_query("Select name From faculty Where Id = '$issueId'");
			$result2 = mysqli_fetch_assoc($query2);
		}
		//print_r($result2);
	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/styleBookInfo.css">
	</head>
	<body>
		<div class="white-header">
									<h5>Book Information</h5>
		</div>
								<p><b><?php echo ucfirst($result['title']); ?>[<?php echo $selectedBookId; ?>]</b></p>
									<div class="row">
										<div class="col-md-6">
											<p class="mt">ISBN Number</p>
											<p><?php echo ucfirst($result['ISBN']); ?></p>
										</div>
										<div class="col-md-6">
											<p class="mt">Author</p>
											<p><?php echo ucfirst($result['author']); ?></p>
										</div>
										<div class="col-md-6">
											<p class="mt">Department</p>
											<p><?php echo $result['dept']; ?></p>
										</div>
										<div class="col-md-6">
											<p class="mt">Publisher</p>
											<p><?php echo ucfirst($result['publisher']); ?></p>
									
										</div>
										<div class="col-md-6">
											<p class="mt">Price</p>
											<p><?php echo "Rs.".ucfirst($result['price']); ?></p>
										</div>
									
								</div>
		
			
			<?php
									if($issueId){
									?>
									<div class="alert alert-warning">
										<?php
											
											if($num==NULL)
											{
												if($result2['name']){
													?>
													Sorry! This book is already issued to 
													<a href="extra.php?activity=memberDetails&selectedMemberId=<?php echo $issueId; ?>"><?php echo ucfirst($result2['name']) ; ?>.
													</a>
													<?php
												}
											}
											else
											{
												if($result2['FirstName']){
													?>
													Sorry! This book is already issued to 
													<a href="extra.php?activity=smemberDetails&selectedsMemberId=<?php echo $issueId; ?>"><?php echo ucfirst($result2['FirstName']); ?>.
													</a>
													<?php
												}
											}
										?>
									</div>
									<?php
									}
									?>

			
		
	</body>
</html>  