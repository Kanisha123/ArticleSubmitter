<?php

		$fname = filter_input(INPUT_POST, 'FirstName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST, 'LastName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        // when user click on delete button this code will delete data from databse
		require('connect.php');
		

		?>
         <?php if(empty($fname) || empty($lname) || empty($email)): ?>
        <script>
alert("Any field must not be empty");
window.location.href="update.php";
</script>

<?php else: ?>
        <?php 

       
                $query     = "UPDATE author_details SET author_firstName = :fname, author_lastName = :lname, author_email = :email WHERE author_id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':fname', $fname);        
                $statement->bindValue(':lname', $lname);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':id', $id, PDO::PARAM_INT);
    
                // Execute the UPDATE.
                $statement->execute();
                header("Location: myarticle.php");
            
            ?>
    <?php endif ?>