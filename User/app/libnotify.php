<?php

	if(isset($_POST['uid']))
	{
     	  require_once('config.inc.php');
		  $Id=$_POST['uid'];
          $sql = "Select * From notify WHERE memberid ='$Id' ";
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