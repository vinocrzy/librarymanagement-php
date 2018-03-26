<?php
   include('session.php');
   
$sql="Select * From notify WHERE memberid = $user_checkm";
$result = mysqli_query($db,$sql);
$num1 = mysqli_num_rows($result);

if($num1>0)
{
	$sql="DELETE FROM `notify` WHERE memberid = $user_checkm";
	$result = mysqli_query($db,$sql);
	$errorMsg="Notification Deleted";
	header("location: home.php?ch=1&errorMsg=$errorMsg");
}
else
{
	header("location: home.php?ch=0");
}


   
?>