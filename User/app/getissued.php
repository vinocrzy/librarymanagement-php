<?php

	if(isset($_POST['uid']))
	{
     	  require_once('config.inc.php');
		  $Id=$_POST['uid'];
          $sql = "SELECT * FROM borrow INNER JOIN books ON books.bookId=borrow.bookId WHERE borrow.issueId='$Id'";
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
