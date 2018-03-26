<?php
//$obj = json_decode($_GET["x"], false);

if (isset($_POST['uid'])) {

    // receiving the post params
    $Id = $_POST['uid'];

include("config.php");
$result = $db->query("SELECT * FROM booking INNER JOIN books ON books.bookId=booking.bookId WHERE booking.memberId='$Id'");
$outp["bookings"] = array();

$i=0;

 while($row = $result->fetch_assoc()){ 
	
	$outp["bookings"][$i]=$row;
	$i++;
 }


echo json_encode($outp);
} else {
    // required post params is missing
    $response["data"]["error"] = TRUE;
    $response["data"]["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>