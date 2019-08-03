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

if(isset($_SESSION["USERNAME"])){
$user_name = $_SESSION["USERNAME"];
//$user_name = 'yash';
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
				echo 'Uploaded.';
				$file_to_saved = "uploads/".$name;
				
                       				
				    
				    $insert_img = mysqli_query($conn,"INSERT INTO gallary (name,image,image_name) values  ('$user_name','".$file_to_saved."','$image_name')");
                      if ($insert_img) {
    
		                              echo '<script type="text/javascript">
                                             alert("Image Uploaded Sucessfully");
                                                  window.location.href = "user_gallary.php";
                                                          </script>';
					  }
                                       
                       else{
                              
		                              echo '<script type="text/javascript">
                                             alert("There is something Wrong While updating.");
                                                  window.location.href = "user_gallary.php";
                                                          </script>';
					}

				
				
				
				
				
			}
			else
			{
				
		          echo '<script type="text/javascript">
                        alert("There Was an Erroe.");
                        window.location.href = "user_gallary.php";
                                     </script>';
			}
		}
		else
		{
			
			
		          echo '<script type="text/javascript">
                        alert("File must be jpg/jpeg and must be 2MB or less.");
                        window.location.href = "user_gallary.php";
                                     </script>';
		}
	}
	else
	{
		
		          echo '<script type="text/javascript">
                alert("Please choose a Profile pic.");
                              window.location.href = "user_gallary.php";
                                         </script>';
	}
}

}else{
	echo "Not done";
	
}
?>


