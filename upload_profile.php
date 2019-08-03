<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";
session_start();

$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['file']["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$user_name = $_SESSION["USERNAME"];

//echo $user_name;



if(isset($_FILES['file']['name']))
{
	if(!empty($_FILES['file']['name']))
	{
		$name = $_FILES['file']['name'];
		$image_name = addslashes($_FILES['file']['name']);
		$size = $_FILES['file']['size'];
		$max_size = 2097152;
		
		$type = $_FILES['file']['type'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$location = 'uploads/';
		
		
		$offset = 0;
		while($strpos = strpos($name, '.', $offset))
		{
			$offset = $strpos + 1;
			$extension = strtolower(substr($name, $offset));
		}
		echo $extension;
		echo $imageFileType;
		if(($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg'  )&&($imageFileType=='jpeg'|| $imageFileType=='jpg' || $imageFileType=='png' )&& ($size<=$max_size))
		{
			$yas = move_uploaded_file($tmp_name, 'uploads/'.$name);
			if($yas)
			{
				//echo 'Uploaded.';
				$file_to_saved = "uploads/".$name;
				
                        $sql2 = "select name from profile where name = '$user_name' ";
                                    $result2 = mysqli_query($conn,$sql2);
                                           $row2 = mysqli_fetch_array($result2);
										   
                        if ($row2) {
                          
						     //$delet = mysqli_query($conn," DELETE FROM profile WHERE id = 'user_name' ");
						
							
							$update_img = mysqli_query($conn,"UPDATE profile SET profile = '".$file_to_saved."', pname = '$image_name' WHERE name ='$user_name' ");
							if($update_img){
								echo '<script type="text/javascript">
                                            alert("Image UPDATE Successfully");
                                                  window.location.href = "user_page.php";
                                                          </script>';
							}
							else{
								echo '<script type="text/javascript">
                                            alert("There is something wrong while updating image");
                                                  window.location.href = "user_page.php";
                                                          </script>';	
								
							}
							
							
						}				
				    else{
				    $insert_img = mysqli_query($conn,"INSERT INTO profile (name,profile,pname) values  ('$user_name','".$file_to_saved."','$image_name')");
                      if ($insert_img) {
    echo '<script type="text/javascript">
                                            alert("Image Set Successfully");
                                                  window.location.href = "user_page.php";
                                                          </script>';
                                       }
                       else{
                              echo '<script type="text/javascript">
                                            alert("There is something wrong while Setting image");
                                                  window.location.href = "user_page.php";
                                                          </script>';	
                              }
					}

				
				
				
				
				
			}
			else
			{
				echo '<script type="text/javascript">
                                            alert("There is was an Error");
                                                  window.location.href = "user_about.php";
                                                          </script>';	
			}
		}
		else
		{
			echo '<script type="text/javascript">
                                            alert("File must be jpg/jpeg and must be 2MB or less.");
                                                  window.location.href = "user_about.php";
                                                          </script>';	
		}
	}
	else
	{
		echo '<script type="text/javascript">
                                            alert("Please choose a Profile pic.");
                                                  window.location.href = "user_about.php";
                                                          </script>';
		
	}
}
?>



<html>
<!--
 <img src="<?=$row[0]?>" width="175" height="175" alt ="Set Profile Pic">
-->
</html>