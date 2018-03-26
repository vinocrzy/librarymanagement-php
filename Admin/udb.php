<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php

$id = $_GET['id'];
$ISBN=$_GET['ISBN'];
$name = $_GET['name'];
$aname = $_GET['aname'];
$pub = $_GET['pub'];
$price=$_GET['price'];
$bid=$_GET['bid'];

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
		$query = "UPDATE books Set bookId='$id',ISBN='$ISBN',title='$name',author='$aname',publisher='$pub',price='$price' Where bookId = '$bid'";
		mysqli_query($db,$query);
		$errorMsg = "Book Sucessfully UPDATED.";
    	
	}
	else{
		$errorMsg = "Table is Empty.";
	}
}
else{
	$errorMsg = "Please! Enter in Empty Field.";
}

echo $errorMsg;

mysqli_close($db);
?>
</body>
</html>