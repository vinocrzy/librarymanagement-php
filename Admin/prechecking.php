<?php
date_default_timezone_set('Asia/Kolkata');
$dt = date("Y/m/d");
$lastofmonth=date("Y/m/t",strtotime('today'));


$query = $db->query("Select * From booking ");
$query1 = $db->query("SELECT * FROM `borrow` WHERE `warning` = 0");


while($row = $query->fetch_assoc())
{
	$boid=$row['bookId'];
	$mbid=$row['memberId'];
	$dt2=date($row['bookingdate']);
	$date2=date_create($dt2);
	
	$qu = "Select * From books Where bookId = '$boid'";
	$re = mysqli_query($db,$qu);
	$res = mysqli_fetch_assoc($re);
	$bt = $res['title'];
	
	$qu1 = "SELECT DATEDIFF('$dt','$dt2')";
	$re1 = mysqli_query($db,$qu1);
	$res1 = mysqli_fetch_array($re1);
	
	$ch=$res1[0];
	//echo $ch;
	
	if($ch>1)
	{
		$queryForResetBooking = mysqli_query($db,"Update books Set booking = 0 Where bookId = '$boid'");
			
		$queryForDeleteBooking = mysqli_query($db,"DELETE FROM booking Where bookId = '$boid'");
		
		$queryForNotify = mysqli_query($db,"Insert Into notify(nid,memberid,ncontent) Values('$boid','$mbid','Your Booking $bt was Timeout!')");
		
	}
	
}
while($row1 = $query1->fetch_assoc())
{
	$boid=$row1['bookId'];
	$mbid=$row1['issueId'];
	$dt2=date($row1['issueDate']);
	$date2=date_create($dt2);
	
	$qu = "Select * From books Where bookId = '$boid'";
	$re = mysqli_query($db,$qu);
	$res = mysqli_fetch_assoc($re);
	$bt = $res['title'];
	
	$qu1 = "SELECT DATEDIFF('$dt2','$dt')";
	$re1 = mysqli_query($db,$qu1);
	$res1 = mysqli_fetch_array($re1);
	
	$ch=$res1[0];
	
	if($ch>15)
	{
		
		$querySetWarning = mysqli_query($db,"Update borrow Set warning = 1 Where bookId = '$boid'");
		$queryForNotify = mysqli_query($db,"Insert Into notify(memberid,ncontent) Values('$mbid','Your Book $bt was Timeout! Please Return it')");
		
	}
	
	
	
	
	
}

if($dt==$lastofmonth)
{
	$sq="SELECT DISTINCT dept From books";
	$res=mysqli_query($db,$sq);
	$num = mysqli_num_rows($res);
	
	$sql2 = "Select bookId From books";
					$query2 = mysqli_query($db,$sql2);
					$result2 = mysqli_num_rows($query2);
					
					$sql5 = "Select bookId From books Where damage = 1";
					$query5 = mysqli_query($db,$sql5);
					$result5 = mysqli_num_rows($query5);
											
					$sql6 = "Select bookId From books Where available >= 1";
					$query6 = mysqli_query($db,$sql6);
					$result6 = mysqli_num_rows($query6);
					
					$sql6 = "Select departid From dept Where depart='All'";
					$query6 = mysqli_query($db,$sql6);
					$userdata2 = mysqli_fetch_row($query6);
					$did=$option=$userdata2[0];

					$sql9 = "Select bookId From books Where available < 1";
					$query9 = mysqli_query($db,$sql9);
					$result9 = mysqli_num_rows($query9);
					
					$query = "INSERT INTO `report`(`departid`, `reportdate`, `total`, `issued`, `available`, `damage`) VALUES ($did,'$lastofmonth',$result2,$result9,$result6,$result5)";
					mysqli_query($db,$query);
	
	for ($i = 0; $i < $num; $i++)
					{
						$userdata=mysqli_fetch_row($res);
						$option=$userdata[0];
						$sql2 = "Select bookId From books Where dept='".$option."'";
						$query2 = mysqli_query($db,$sql2);
						$totalb = mysqli_num_rows($query2);
						
						$sql6 = "Select departid From dept Where depart='".$option."'";
						$query6 = mysqli_query($db,$sql6);
						$userdata2 = mysqli_fetch_row($query6);
						$did=$userdata2[0];
						
						$sql3 = "Select bookId From books Where dept='".$option."' and available < 1";
						$query3 = mysqli_query($db,$sql3);
						$issuedb = mysqli_num_rows($query3);
						
						$sql4 = "Select bookId From books Where dept='".$option."' and available >= 1";
						$query4 = mysqli_query($db,$sql4);
						$availb = mysqli_num_rows($query4);
						
						$sql5 = "Select bookId From books Where dept='".$option."' and damage = 1";
						$query5 = mysqli_query($db,$sql5);
						$dmgb = mysqli_num_rows($query5);
						
						$query = "INSERT INTO `report`(`departid`, `reportdate`, `total`, `issued`, `available`, `damage`) VALUES ($did,'$lastofmonth',$totalb,$issuedb,$availb,$dmgb)";
						mysqli_query($db,$query);
						
					}
					
			
	
}
?>