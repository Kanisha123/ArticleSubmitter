<?php

		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        // when user click on delete button this code will delete data from databse
		require('connect.php');
		if($_POST['command'] === "Delete")
    	{
    		$query = "DELETE FROM article_comment WHERE comment_id = :id";
    		$statement = $db->prepare($query);
    		$statement->bindValue(':id', $id, PDO::PARAM_INT);
    		$statement->execute();
    		header("Location: index.php");
    	}
		

		?>


        <?php if(empty($name) || empty($comment)): ?>
        <script>
alert("Any field must not be empty");
window.location.href="editcomment.php";
</script>

<?php else: ?>
        <?php 
      

        if($_POST['command'] === "Update")
            {
                  if (isset($_POST['not'])) {
                   $hide = 'Y';
            
                    }
                
                $query     = "UPDATE article_comment SET name = :name, comment = :comment , hide = :hide WHERE comment_id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':name', $name);        
                $statement->bindValue(':comment', $comment);
                $statement->bindValue(':hide', $hide);
                $statement->bindValue(':id', $id, PDO::PARAM_INT);
    
                // Execute the UPDATE.
                $statement->execute();
                header("Location: index.php");
            }
            ?>
    <?php endif ?>