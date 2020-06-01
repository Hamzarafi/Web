<?php 

session_start();
$_SESSION = [];

setcookie(session_name, "", 1, "/");
session_destroy();
header("Location:index.php");

?>