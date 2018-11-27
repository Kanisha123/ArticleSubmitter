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

if($_GET['command'] === "query")
 {
    require('connect.php'); 

        $title = filter_input(INPUT_GET, 'typeahead', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($title==="" || empty($title))
        {
            header("Location: index.php");
        }
        $select = "SELECT * FROM article_details WHERE article_title = :title";
        $statement = $db->prepare($select);
        $statement->bindValue(':title', $title);
        $statement->execute(); 
        $posts = $statement->fetch();
        // $atitle = $posts['article_title'];
        // $abody = $posts['article_body'];
        if(empty($posts))

  ?>