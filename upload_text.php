<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";
session_start();

$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);

$user_name = $_SESSION["USERNAME"];


if(!empty($_POST['cover_txt'])){
	$txt = $_POST['cover_txt'];
 $update_txt = mysqli_query($conn,"UPDATE `cover` SET `cover_text` = '$txt' WHERE name ='$user_name' ");
							if($update_txt){
								 echo '<script type="text/javascript">
                                            alert(" UPDATE Successfully");
                                                  window.location.href = "user_page.php";
                                                          </script>';
							}
							else{
								echo '<script type="text/javascript">
                                            alert("There is something wrong while updating text");
                                                  window.location.href = "user_page.php";
                                                          </script>';								
							}	
	
	
}







mysqli_close($conn);
?>