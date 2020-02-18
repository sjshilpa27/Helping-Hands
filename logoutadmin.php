<?php session_start();
$_SESSION["ausername"]=null;
session_destroy();
header("Location:adminlogin.php");

?>
