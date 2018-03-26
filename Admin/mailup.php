<?php
include('session.php');
$memid=$_GET['memid'];
$mail=$_GET['mail'];

echo $mail;
echo $memid;

$sql="Select Id From members Where Id='$memid'";
$result = mysqli_query($db,$sql);
$num1 = mysqli_num_rows($result);

$password=mt_rand();

if($num1==1){
	$query1 = mysqli_query($db,"UPDATE members Set email='$mail',pass='$password' Where Id = '$memid'");
	$errorMsg= "'$mail' was Registerd for '$memid'";
}


$to = $mail; 
$subject = "Library Access Password"; 
$email = "svkanna.g@gmail.com" ; 
$message = "Your Password is '$password'" ; 
$headers = "From: $email"; 
$sent = mail($to, $subject, $message, $headers) ; 
if($sent) 
{$errorMsg2= "Your Password was sent to your mail"; }
else 
{$errorMsg2="We encountered an error sending your mail"; }

$errorMsg=$errorMsg.' '.$errorMsg2;


header("location: uupdate.php?ch=1&Msg=$errorMsg");

?>