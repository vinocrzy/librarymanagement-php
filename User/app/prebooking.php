<?php
   include('session.php');
   
   $bid = $_GET['bookId'];
   $mid = $user_checkm;
   
$query = "Select count(memberId) From booking Where memberId='$mid'";
$returnD = mysqli_query($db,$query);
$result = mysqli_fetch_assoc($returnD);
$maxRows = $result['count(memberId)'];
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
			
			$avil=1;
			
			$query3 = "Select bookId,issueId From borrow Where bookId = '$bid'";
			$returnD3 = mysqli_query($db,$query3);
			$result3 = mysqli_fetch_assoc($returnD3);
			
			$query4 = "Select bookId From booking Where bookId = '$bid'";
			$returnD4 = mysqli_query($db,$query4);
			$result4 = mysqli_fetch_assoc($returnD4);
			
			if($bid != $result3['bookId'] && $bid != $result4['bookId'])
			{//checks that book is already issued or not..
				date_default_timezone_set('Asia/Kolkata');
				$dt = date("y/m/d h:i:s");
				$query = "INSERT INTO booking(bookId,memberId,bookingdate) Values('$bid','$mid','$dt')";        
				$returnD = mysqli_query($db,$query);
				$queryForUnavailableBook = mysqli_query($db,"Update books Set booking = '$avil' Where bookId = '$bid'");
				if($returnD){
					$errorMsg = "Book has been successfully Booked.";
				}
				else{
					$errorMsg = "Problem in Booking this book.";
				}
			}
			else{
				$errorMsg = "already Booked by ".$result4['memberId'].".";
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
		$errorMsg = "MEMBER Reach Maximum No of Book ";
	}
}
else{
	$errorMsg = "Both fields can't be Empty.";
}

header("location: home.php?ch=1&errorMsg=$errorMsg");



   
?>