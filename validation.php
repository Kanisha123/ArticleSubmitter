<?php


if (empty($_POST["FirstName"])||empty($_POST["LastName"])||empty($_POST["Password"])) {
?>

<script>
alert("Any Field in the Form is Empty");
window.location.href="register.html";
</script>

<?php 
   } 
   
 $ck = $_POST['Password'];
$ck1 = $_POST['passwordConfirm'];


if($ck!==$ck1)
{
header("location:register.html");
}
   
 
?>