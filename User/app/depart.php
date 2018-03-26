<?php

	if(isset($_POST['dpart']))
	{
     	  require_once('config.inc.php');
		  $dpart=$_POST['dpart'];
		 
		  $sql = "SELECT * FROM books Where dept like '%".$dpart."%' AND `booking`=0 ORDER BY `books`.`available` DESC";
          
          $statement = $connection->prepare($sql);
          $statement->execute();
          if($statement->rowCount())
          {
				$row_all = $statement->fetchall(PDO::FETCH_ASSOC);
				header('Content-type: application/json');
   		  		echo json_encode($row_all);
          		
          }  
          elseif(!$statement->rowCount())
          {
			  echo "no rows";
          }
	}
		  
?>