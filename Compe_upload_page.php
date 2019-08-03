<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";
session_start();

$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);

//$username = $_SESSION["USERNAME"];


if(isset($_SESSION["USERNAME"])){
  $user_name = $_SESSION["USERNAME"];
      //echo $username;
}




if(isset($_FILES['file']['name']) && isset($_POST['idnum']))
{
	if(!empty($_POST['idnum'])){
		
	if(!empty($_FILES['file']['name']))
	{
		$target_dir = "uploads/";
         $target_file = $target_dir . basename($_FILES['file']["name"]);
           $uploadOk = 1;
             $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		$name = $_FILES['file']['name'];
		$image_name = addslashes($_FILES['file']['name']);
		$size = $_FILES['file']['size'];
		$max_size = 2097152;
		
		$type = $_FILES['file']['type'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$location = 'uploads/';
		
		
		$id = $_POST['idnum'];
		$result = mysqli_query($conn,"SELECT Competition_name FROM competition where id = '$id'");
		$row = mysqli_fetch_assoc($result);
		if(!$row){
			echo '<script type="text/javascript">
                   alert("There is No Such Competition are Running...");
                         window.location.href = "Competition.php";
                                          </script>';
			exit();
			
		}else{		
		$compe_name = $row['Competition_name'];
		}
		
		
		
		$offset = 0;
		while($strpos = strpos($name, '.', $offset))
		{
			$offset = $strpos + 1;
			$extension = strtolower(substr($name, $offset));
		}
		//echo $extension;
		//echo $imageFileType;
		if(($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg'  )&&($imageFileType=='jpeg'|| $imageFileType=='jpg' || $imageFileType=='png' )&& ($size<=$max_size))
		{
			$yas = move_uploaded_file($tmp_name, 'uploads/'.$name);
			if($yas)
			{
				//echo 'Uploaded.';
				$file_to_saved = "uploads/".$name;
				
                        				
				    
				    $insert_img = mysqli_query($conn,"INSERT INTO competition_gallary (username,competition_name,image,image_name) values  ('$user_name','$compe_name','".$file_to_saved."','$image_name')");
                      if ($insert_img) {
                                 echo '<script type="text/javascript">
                                            alert("Image Uploaded Successfully");
                                                  window.location.href = "Competition.php";
                                                          </script>';
                              }
                       else{
                              echo '<script type="text/javascript">
                                            alert("There is something wrong while Setting image");
                                                  window.location.href = "Competition.php";
                                                          </script>';	
                              }
					

				
				
				
				
				
			}
			else
			{
				echo '<script type="text/javascript">
                                            alert("There is was an Error");
                                                  window.location.href = "Competition.php";
                                                          </script>';	
			}
		}
		else
		{
			echo '<script type="text/javascript">
                                            alert("File must be jpg/jpeg and must be 2MB or less.");
                                                  window.location.href = "Competition.php";
                                                          </script>';	
		}
	}
	else
	{
		echo '<script type="text/javascript">
                                            alert("Please choose a Profile pic.");
                                                  window.location.href = "Competition.php";
                                                          </script>';
		
	}
	
	
	}else
	{
		echo '<script type="text/javascript">
                  alert("Please choose a id");
                       window.location.href = "Competition.php";
                                  </script>';
		
	}
}





//}
?>