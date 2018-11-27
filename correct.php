 <?php
include("connect.php");

		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

 $query     = "INSERT INTO article_comment (article_id,comment,name) values (:articleID,:comment,:name)";
    		$statement = $db->prepare($query);
    		$statement->bindValue(':articleID', $id); 
    		$statement->bindValue(':comment', $comment);  
    		$statement->bindValue(':name', $name); 
    
    		$statement->execute();
    		$insert_id = $db->lastInsertId();
    		header("Location: index.php");



  ?>