
<?php

		$title = filter_input(INPUT_POST, 'Title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$content = filter_input(INPUT_POST, 'Body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        // when user click on delete button this code will delete data from databse
		require('connect.php');
		if($_POST['command'] === "Delete")
    	{
    		$query = "DELETE FROM article_details WHERE article_id = :id";
    		$statement = $db->prepare($query);
    		$statement->bindValue(':id', $id, PDO::PARAM_INT);
    		$statement->execute();
    		header("Location: myarticle.php");
    	}
		

		?>


        <?php if(empty($title) || empty($content)): ?>
        <script>
alert("Any field must not be empty");
window.location.href="edit.php";
</script>

<?php else: ?>
        <?php 

        if($_POST['command'] === "Update")
            {

                $image_filename  = $_FILES['image']['name'];
                if (empty($image_filename)) {
                    $image_filename="noImage.png";
                     require('connect.php'); 

                     $select = "SELECT article_image FROM article_details WHERE article_id = :id";
                     $statement1 = $db->prepare($select);
                    $statement1->bindValue(':id', $id, PDO::PARAM_INT);
                    $statement1->execute(); 
                    $posts1 = $statement1->fetch();
                    $name = "upload/" . $posts1['article_image'];
                    unlink($name);
                }
                else{
                    // $image_filename  = $_FILES['image']['name'];

                    
      
    // file_upload_path() - Safely build a path String that uses slashes appropriate for our OS.
    // Default upload path is an 'uploads' sub-folder in the current folder.
    function file_upload_path($original_filename, $upload_subfolder_name = 'upload') {
         $current_folder = dirname(__FILE__);
         
       // Build an array of paths segment names to be joins using OS specific slashes.
         $path_segments = [$current_folder, $upload_subfolder_name, basename($original_filename)];
       
       // The DIRECTORY_SEPARATOR constant is OS specific.
        return join(DIRECTORY_SEPARATOR, $path_segments);
     }


     function file_is_an_image($temporary_path, $new_path) {
        $allowed_mime_types      = ['image/gif', 'image/jpg', 'image/jpeg', 'image/png'];
        $allowed_file_extensions = ['gif', 'jpg', 'jpeg', 'png'];
        
        $actual_file_extension   = pathinfo($new_path, PATHINFO_EXTENSION);
        $actual_mime_type        = getimagesize($temporary_path)['mime'];
        
        $file_extension_is_valid = in_array($actual_file_extension, $allowed_file_extensions);
        $mime_type_is_valid      = in_array($actual_mime_type, $allowed_mime_types);
        
        return $file_extension_is_valid && $mime_type_is_valid;
    }


        $image_upload_detected = isset($_FILES['image']) && ($_FILES['image']['error'] === 0);
        $upload_error_detected = isset($_FILES['image']) && ($_FILES['image']['error'] > 0);

     if ($image_upload_detected) {
        $image_filename        = $_FILES['image']['name'];
        $new_image_path        = file_upload_path($image_filename);
        $temporary_image_path  = $_FILES['image']['tmp_name'];
        // $extension = pathinfo($image_filename, PATHINFO_EXTENSION);
        // $fileName = pathinfo($image_filename, PATHINFO_FILENAME);
        // $newfileName2 = $fileName . "_medium" . "." . $extension;
        // $newfileName3 = $fileName . "_thumbnail" . "." . $extension;

        if ( file_is_an_image($temporary_image_path, $new_image_path) ) 
        {
            
            move_uploaded_file($temporary_image_path, $new_image_path);


        }
   

     }
                }
                
                $query     = "UPDATE article_details SET article_title = :title, article_body = :body, article_image = :image WHERE article_id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':title', $title);        
                $statement->bindValue(':body', $content);
                $statement->bindValue(':image', $image_filename);
                $statement->bindValue(':id', $id, PDO::PARAM_INT);
    
                // Execute the UPDATE.
                $statement->execute();
                header("Location: myarticle.php");
            }
            ?>
    <?php endif ?>