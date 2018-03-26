<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$id = $_GET['id'];
$name = $_GET['name'];
$deg = $_GET['deg'];
$dept = $_GET['dept'];


include('session.php');

$query = "Select Max(Id) From faculty";
$returnD = mysqli_query($db,$query);
$result = mysqli_fetch_assoc($returnD);
$maxRows = $result['Max(Id)'];
if(empty($maxRows)){
	$lastRow = $maxRows = 1;      
}
else{
	$lastRow = $maxRows + 1 ;
}

if(!empty($id) && !empty($name) ){

	if($maxRows){
		$query = "Insert Into faculty(Id,name,deg,dept) Values('$id','$name','$deg','$dept')";
		mysqli_query($db,$query);
		$errorMsg = '<div class="alert alert-success w3-animate-right">Member Sucessfully Added.</div>';
    	$query = "Select Max(Id) From faculty";
		$returnD = mysqli_query($db,$query);
		$result = mysqli_fetch_assoc($returnD);
		$maxRows = $result['Max(Id)'];
		if(empty($maxRows)){
			$lastRow = $maxRows = 1;      
		}
		else{
			$lastRow = $maxRows + 1 ;
		}
	}
	else{
		$errorMsg = '<div class="alert alert-warning w3-animate-right">Table is Empty.</div>';
	}
}
else{
	$errorMsg = '<div class="alert alert-warning w3-animate-right">Please! Enter in Empty Field.</div>';
}

echo $errorMsg;

mysqli_close($db);
?>
</body>
</html>