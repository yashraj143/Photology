<!DOCTYPE html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";
session_start();

if(isset($_GET['var'])){
$_SESSION["USERNAME"] = $_GET['var'];


//echo $_GET['variable'];
}else{
	
	//echo "error2";
}
if(isset( $_SESSION["USERNAME"])){

 $_SESSION["USERNAME"] = "";
 
 
 header('Location: homepage.php');
}


?>