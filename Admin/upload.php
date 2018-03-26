<?php
if(!empty($_FILES)){
	
	include('session.php');
	
	$targetDir = "uploads/";
	$fileName = $_FILES['file']['name'];
	$targetFile = $targetDir.$fileName;
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		//insert file information into db table
		$db->query("INSERT INTO files (file_name, uploaded) VALUES('".$fileName."','".date("Y-m-d H:i:s")."')");
		
	}
	
}
header("location: addst.php");
?>