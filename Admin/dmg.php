<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
$bookId = $_GET['bid'];

include('session.php');


if(!empty($bookId)){ //checks that both fields is not empty..
	
										$query = "SELECT bookId FROM books Where bookId='$bookId'";
										
										$returnD = mysqli_query($db,$query);
										$result = mysqli_fetch_assoc($returnD);
										$maxRows = $result['bookId'];
										if(empty($maxRows)){
											$errorMsg = 'class="alert alert-warning w3-animate-right"Please Enter Valid BOOK ID.</div>';
										}else{
											$queryForUnavailableBook = mysqli_query($db,"Update books Set damage = 1 Where bookId = '$bookId'");
											$errorMsg = '<div class="alert alert-success w3-animate-right">The BOOK Added into Damage list.</div>';
										}
}
else{
	$errorMsg = '<div class="alert alert-warning w3-animate-right">Fields can not be Empty.</div>';
}

echo $errorMsg;

mysqli_close($db);
?>
</body>
</html>