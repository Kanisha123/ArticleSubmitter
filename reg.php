<?php
//CAPTCHA Matching code
session_start();
if ($_SESSION["code"] === $_POST["captcha"]) {
?>
<script>
alert('Correct CAPTCHA Entered');
window.location.href="reg.php";
</script>
<?php

} else {

?>


<script>
alert('Wrong Text Entered');
window.location.href="register.php";
</script>

<?php
}
?>


<?php

include("connect.php"); 
include("validation.php");
date_default_timezone_set("America/North_Dakota/Center");
//$hii=date("y/m/d");
// $tkn=md5(uniqid(rand()));


$em=$_POST['Email'];
$pe=$_POST['Password'];
$encr=trim(password_hash($pe, PASSWORD_BCRYPT, [12]));

// $encr=md5($pe);
$select = "SELECT author_email FROM author_details WHERE author_email = :email";
        $statement = $db->prepare($select);
        $statement->bindValue(':email', $em);
        $statement->execute(); 
        $posts = $statement->fetch();

// $sql="select Email from author_mstr where Email='$em'";

// $result=mysqli_query($con,$sql);

// $rows=mysqli_num_rows($result);

if(!empty($posts))
{
?>
<script>
alert("Email id is Already Registered");
window.location.href="register.php";
</script>
<?php
}

else
{
		$query     = "INSERT INTO author_details (author_firstName,author_lastName,author_email,author_password) values (:firstName,:lastName,:email,:password)";
    		$statement = $db->prepare($query);
    		$statement->bindValue(':firstName', $_POST['FirstName']); 
    		$statement->bindValue(':lastName', $_POST['LastName']);
    		$statement->bindValue(':email', $em); 
    		$statement->bindValue(':password', $encr);     

    		$statement->execute();
    		$insert_id = $db->lastInsertId();


// $qry="INSERT INTO author_mstr (Firstname,Lastname,Email,Password,Address,City,State,Country,Birthdate,Gender,Authorstatus,Authorcode,AuthorDate) VALUES ('$_POST[FirstName]','$_POST[LastName]','".$em."','".$encr."','$_POST[Address]','$_POST[City]','$_POST[State]','$_POST[Country]','$_POST[Birth]','$_POST[Gender]','I','".$tkn."','".$hii."')";

// $rs=mysqli_query($con,$qry);

if($statement!=NULL)
{
?>
<script>
alert('Registration Done Successfully');
window.location.href="logg.html";
</script>

<?php
}

}
// mysqli_close($con);


 ?>