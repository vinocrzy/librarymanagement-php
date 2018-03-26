<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
$bid = $_GET['bid'];
$mid = $_GET['mid'];


include('session.php');

if(!empty($mid) && !empty($bid))
{ //checks that both fields are filled or not...
	$query1 = "Select bookId,issueId,returnId From borrow Where bookId = '$bid' && issueId = '$mid'";
	$returnD1 = mysqli_query($db,$query1);
	$result1 = mysqli_fetch_assoc($returnD1);
	
	$qu = "Select available From books Where bookId = '$bid'";
	$re = mysqli_query($db,$qu);
	$res = mysqli_fetch_assoc($re);
	$avil=$res['available']+1;
	
	if($mid == $result1['issueId'] && $bid == $result1['bookId'])
	{ //checks that book is issued or not or student id exists or not...
		date_default_timezone_set('Asia/Kolkata');
		$dt = date("y/m/d");
		$query2 = "Update borrow Set returnBookId = '$bid',bookId = '0', returnId = '$mid', issueId = '0' , returnDate = '$dt' Where bookId = '$bid' && issueId = '$mid'";
		$returnD2 = mysqli_query($db,$query2);
		$queryForAvailableBook = mysqli_query($db,"Update books Set available = '$avil' Where bookId = '$bid'");
		$queryForNotify = mysqli_query($db,"Insert Into notify(memberid,ncontent) Values('$mid','Your Book $bid was returned')");
					
		if($returnD2){ //checks that book is returned or not..
			$errorMsg = '<div class="alert alert-success w3-animate-right">Book has been successfully returned.</div>';
			
		}
		else{
			$errorMsg = '<div class="alert alert-danger w3-animate-right">Problem in returning this book.</div>';
		}
	}
	else{
		$errorMsg = '<div class="alert alert-danger w3-animate-right">Access-ID or Issued-Id does not Exists or may not be issued.</div>';
	}
}
else{
	$errorMsg = '<div class="alert alert-danger w3-animate-right">Both fields must be filled.</div>';
}

echo $errorMsg;

mysqli_close($db);
?>
</body>
</html>