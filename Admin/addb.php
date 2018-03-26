<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$id = $_GET['id'];
$ISBN=$_GET['ISBN'];
$name = $_GET['name'];
$aname = $_GET['aname'];
$dept = $_GET['dept'];
$pub = $_GET['pub'];
$price=$_GET['price'];


include('session.php');

$query = "Select Max(bookId) From books";
$returnD = mysqli_query($db,$query);
$result = mysqli_fetch_assoc($returnD);
$maxRows = $result['Max(bookId)'];
if(empty($maxRows)){
	$lastRow = $maxRows = 1;      
}
else{
	$lastRow = $maxRows + 1 ;
}

if(!empty($id) && !empty($name) ){

	if($maxRows){
		$query = "Insert Into books(bookId,ISBN,title,author,dept,publisher,price,available,damage) Values('$id','$ISBN','$name','$aname','$dept','$pub','$price','1','0')";
		mysqli_query($db,$query);
		$errorMsg = '<div class="alert alert-success w3-animate-right">Book Sucessfully Added.</div>';
    	$query = "Select Max(bookId) From books";
		$returnD = mysqli_query($db,$query);
		$result = mysqli_fetch_assoc($returnD);
		$maxRows = $result['Max(bookId)'];
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