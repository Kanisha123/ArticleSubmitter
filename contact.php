
<?php
if ($_POST['email'])
{
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$formcontent="From: $name \n Message: $message";
$recipient="kanishapatel003@yahoo.com";
$subject=$_POST['subject'];
$mailheader="From: $email \r\n";
mail($recipient,$subject,$formcontent,$mailheader) or die("Error!");
echo "Thank you";

}?>

