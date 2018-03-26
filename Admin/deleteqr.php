<?php
include('session.php');
$delbatchid=$_GET['delbatchid'];



$sql="Select Id From members Where year='$delbatchid'";
$result = mysqli_query($db,$sql);
$num1 = mysqli_num_rows($result);
$delc=0;
for($i=0;$i<$num1;$i++)
{
$row = mysqli_fetch_array($result);
$mid=$row['Id'];

$result1 = mysqli_num_rows(mysqli_query($db,"SELECT issueId FROM borrow Where issueId = '$mid'"));
if(empty($result1)){
	$deleteResult = mysqli_query($db,"Delete From members Where Id = '$mid'");
	$delc=$delc+1;
	}



}

if($num1==0){
$errorMsg = "Please Select Valid Batch Year";
}else{

$errorMsg = "Batch $delbatchid Tatal $delc/$num1 members Sucessfully deleted";
}
header("location: delmemb.php?ch=1&Msg=$errorMsg");

?>