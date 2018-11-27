<?php
session_start();
$var=$_SESSION['success'];
if($var=="" || $var==null)
{
header("Location: logg.html");
exit;
}
?>