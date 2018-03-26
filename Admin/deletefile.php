<?php
include('session.php');
$file ='uploads/'.$_GET['file'];
$rfile=$_GET['file'];
echo $rfile;
if(!unlink($file))
{
	echo("Error");
}
else{
	$sql = "DELETE FROM `files` WHERE `file_name`='$rfile'";
	if (mysqli_query($db, $sql)) {
		echo("Delete");
		header("location: addst.php");
	}
	
}
?>