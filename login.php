<?php
session_start();




  $username = $_POST['Email'];
  $password = $_POST['Password'];

  if (isset($_REQUEST['remember'])) {
    /*
     * Set Cookie from here for one hour
     * */
    setcookie("Email", $username, time()+(60*60*1));
    setcookie("password", $password, time()+(60*60*1));  /* expire in 1 hour */
  } 



else {
  $username = '';
  $password = '';

  if (isset($_COOKIE['Email'])) {
    $username = $_COOKIE['Email'];
  }

  if (isset($_COOKIE['Password'])) {
    $password = $_COOKIE['Password'];
  }
}

?>



<?php

  require('connect.php');
  $username = $_POST['Email'];
  $password = $_POST['Password'];


        $select = "SELECT * FROM author_details WHERE author_email = :email";
        $statement = $db->prepare($select);
        $statement->bindValue(':email', $username);
        // $statement->bindValue(':password', $password);
        $statement->execute(); 
        $posts = $statement->fetch();

// $connection=mysqli_connect("localhost","root","mysql","aas");

//$db=mysqli_select_db("aas",$connection);

// $query=mysqli_query($connection,"SELECT * FROM author_mstr WHERE Email='$username' AND Password='$password'");


// $rows=mysqli_num_rows($query);
$result =password_verify($password, (string)$posts['author_password']);


if($result)
{

// if($rows==1)
// {

// while($row=mysqli_fetch_assoc($query))

// {
// 	$status=$row['Authorstatus'];
	
// }

// if(mysqli_num_rows($query)==1 && $status=='A')
// {

// 	$_SESSION['success']=$_POST['Email'];
  $_SESSION['success']=$_POST['Email'];
		
?>

<script>
alert("Login Done Successfully");
window.location.href="submit.php";
</script>

<?php
	// header("Location: submit.php");
	}

// else
// {
// 	echo "Please Activate Your Account";
// 	echo "<a href='activate.html'>: Click Here </a>";
	 
// }

// }

else{
?>

<!-- <script>
alert("Please Enter Valid E-mail id or Password");
window.location.href="logg.html";
</script> -->

<?php
}
// mysqli_close($connection);


?>