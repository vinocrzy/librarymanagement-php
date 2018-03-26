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

$query = "Select count(issueId) From borrow Where issueId='$mid'";
$returnD = mysqli_query($db,$query);
$result = mysqli_fetch_assoc($returnD);
$maxRows = $result['count(issueId)'];
if(empty($maxRows)){
	$lastRow = $maxRows = 1;      
}
else{
	$lastRow = $maxRows + 1 ;
}

$query = "Select issueId From borrow Where issueId='$mid'";
$returnD = mysqli_query($db,$query);
$result = mysqli_fetch_assoc($returnD);
$pos = $result['issueId'];
if($pos<422514000000)
{
	if($lastRow<6)
	{
		$lastRow = 1;
	}
	else{
		$lastRow = 4 ;
	}

}


if(!empty($bid) && !empty($mid)){ //checks that both fields is not empty..
	
	$qu = "Select * From books Where bookId = '$bid'";
	$re = mysqli_query($db,$qu);
	$res = mysqli_fetch_assoc($re);
	$avil=$res['available']-1;
	$bt = $res['title'];
	
	if($lastRow<4)
	{
		$query1 = "Select bookId From books Where bookId = '$bid'";
		$returnD1 = mysqli_query($db,$query1);
		$result1 = mysqli_fetch_assoc($returnD1);
		$query2 = "Select Id From members Where Id = '$mid'";
		$returnD2 = mysqli_query($db,$query2);
		$result2 = mysqli_fetch_assoc($returnD2);
		$num = mysqli_num_rows($returnD2);
		if($num==NULL){
			$query2 = mysqli_query($db,"Select Id From faculty Where Id = '$mid'");
			$result2 = mysqli_fetch_assoc($query2);
		}
		if($bid == $result1['bookId'] && $mid == $result2['Id'])
		{ //checks that book or issuer id exists or not..
			
			
			$query3 = "Select bookId,issueId From borrow Where bookId = '$bid'";
			$returnD3 = mysqli_query($db,$query3);
			$result3 = mysqli_fetch_assoc($returnD3);
			if($bid != $result3['bookId'])
			{//checks that book is already issued or not..
				date_default_timezone_set('Asia/Kolkata');
				$dt = date("y/m/d");
				$query = "Insert Into borrow(bookId,issueId,issueDate) Values('$bid','$mid','$dt')";        
				$returnD = mysqli_query($db,$query);
				$queryForResetBooking = mysqli_query($db,"Update books Set booking = 0 Where bookId = '$bid'");
				
				$queryForUnavailableBook = mysqli_query($db,"Update books Set available = '$avil' Where bookId = '$bid'");
				
				$queryForDeleteBooking = mysqli_query($db,"DELETE FROM booking Where bookId = '$bid'");
				
				$bt = $res['title'];
				
				$queryForNotify = mysqli_query($db,"Insert Into notify(memberid,ncontent) Values('$mid','Your Book $bt was Issued')");
				
				if($returnD){
					$errorMsg = "Book has been successfully issued.";
				}
				else{
					$errorMsg = "Problem in issueing this book.";
				}
			}
			else{
				$errorMsg = "already issued to ".$result3['issueId'].".";
			}
		}
		elseif($bid != $result1['bookId']){
		$errorMsg = "Please! Enter valid Access-ID.";
		}
		elseif($mid != $result2['Id']){
		$errorMsg = "Please! Enter valid Issuer-Id.";
		}
	}
	else{
		
		$errorMsg = "Issued Maximum No of Book ";
		$queryForDeleteBooking = mysqli_query($db,"DELETE FROM booking Where bookId = '$bid'");
		$queryForNotify = mysqli_query($db,"Insert Into notify(memberid,ncontent) Values('$mid','Your Booking $bt was canceled')");
		$queryForResetBooking = mysqli_query($db,"Update books Set available = '$avil' Where bookId = '$bid'");
	}
}
else{
	$errorMsg = "Both fields can't be Empty.";
}

mysqli_close($db);

header("location: booking.php?ch=1&Msg=$errorMsg");


?>
</body>
</html>