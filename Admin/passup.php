<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
include('session.php');

$oldpass = $_GET['oldpass'];
$newpass = $_GET['newpass'];

$sql = "select id from admin where username='$user_check' and pwd='$oldpass'";
		  $result = mysqli_query($db,$sql);
		  $count = mysqli_num_rows($result);




if(!empty($oldpass) && !empty($newpass) ){

	if($count){
		$query = "UPDATE `admin` SET `pwd`='$newpass' WHERE username='$user_check' and pwd='$oldpass'";
		mysqli_query($db,$query);
		$errorMsg = "Password Updated Successfully";
    	
	}
	else{
		$errorMsg = "Password not match";
	}
}
else{
	$errorMsg = "Please! Enter Old and New Password.";
}

echo $errorMsg;

echo $user_check;

mysqli_close($db);
?>
</body>
</html>