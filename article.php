<?php

include("connect.php");
include("isLogin.php");

date_default_timezone_set("America/North_Dakota/Center");
// $hii=date("y/m/d");
// $tkn=md5(uniqid(rand()));

$var= $_SESSION['success'];
// $username = $_POST['Email'];
//   $password = $_POST['Password'];

        $select = "SELECT author_id FROM author_details WHERE author_email = :email";
        $statement = $db->prepare($select);
        $statement->bindValue(':email', $var);
        $statement->execute(); 
        $posts = $statement->fetch();
// $query="select Author_id from author_mstr where Email='$var'";
// $rs=mysql_query($query);

        $aid = $posts['author_id'];

// while($row=mysql_fetch_array($rs))

// {
// 	$aid=$row['Author_id'];
	
	

// }
        $image_filename  = $_FILES['image']['name'];

        $query     = "INSERT INTO article_details (author_id,article_title,article_body,article_image,article_date) values (:authorID,:title,:body,:image,now())";
    		$statement = $db->prepare($query);
    		$statement->bindValue(':authorID', $aid); 
    		$statement->bindValue(':title', $_POST['Title']);  
    		$statement->bindValue(':body', $_POST['Body']); 
    		$statement->bindValue(':image', $image_filename);     

    		$statement->execute();
    		$insert_id = $db->lastInsertId();


// $qry="INSERT INTO article_mstr (Author_id,Article_Title,Article_Section
// ,Article_Category,Article_Summary,Article_Body,Article_Feature,About_Author
// ,Article_Resources,Article_Keyword,Article_Code,Article_Date,Article_Status) VALUES ('".$aid."','$_POST[Title]','$_POST[Section]','$_POST[Category]','$_POST[Summary]','$_POST[Body]','$_POST[Feature]','$_POST[Author]','$_POST[Resources]','$_POST[Keyword]','".$tkn."','".$hii."','A')";

// $rs=mysql_query($qry,$con);

if($statement!=NULL)
{
    		?>  

<script>
alert("Article send Successfully");
window.location.href="feedback.php";
</script>


<?php 
}


include 'php-image-resize-master/lib/ImageResize.php';
      use \Gumlet\ImageResize;
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
            // copy($new_image_path, file_upload_path($newfileName2));
            // copy($new_image_path, file_upload_path($newfileName3));
            $image = new ImageResize(file_upload_path($image_filename));
            $image->resizeToWidth(400);
            $image->save(file_upload_path($image_filename));
            // $thumbImage = new ImageResize(file_upload_path($newfileName3));
            // $thumbImage->resizeToWidth(50);
            // $thumbImage->save(file_upload_path($newfileName3));

   	 	}
   

   	 }





?>
