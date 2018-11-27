<?php
//CAPTCHA Matching code
session_start();
if ($_SESSION["code"] == $_POST["captcha"]) {
echo "You Entered RIGHT Text....!";
} else {
die("Wrong TEXT Entered");
header("Location: register.php");
exit();
}
?>