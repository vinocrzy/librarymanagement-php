<?php

	if(isset($_POST['searchQuery']))
	{
     	  require_once('config.inc.php');
		  $search_query=$_POST['searchQuery'];
          $sql = "SELECT * FROM books where title LIKE '%".$search_query."%' || author LIKE '%".$search_query."%' || bookId LIKE '".$search_query."%' AND `booking`=0 ORDER BY `books`.`available` DESC";
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
