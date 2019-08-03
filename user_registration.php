<html>

<?php

$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";


mysqli_select_db($conn,"photograph");
// Form Variable

$fname = $_POST['name'];
$mail = $_POST['email'];
$pass = $_POST['password'];


//---------------------------------------------------



//$flag=0;
 if($fname!=NULL )
 {  
   // $check = "SELECT userid FROM reg WHERE userid='$use')";
	$result=mysqli_query($conn,"SELECT * FROM main WHERE email='$mail'");
	$result1=mysqli_query($conn,"SELECT * FROM main WHERE name='$fname'");
	
	if($result && $result1){
		
    if(mysqli_num_rows($result1))
    {
		//echo "Username already taken!!!";
	
		//echo '<script type="text/javascript">alert("Username already taken!!!")</script>';
		echo '<script type="text/javascript">
           alert("Username is already Taken!!!");
          window.location.href = "homepage.php";
             </script>';
	
    }
	else if(mysqli_num_rows($result)){
		//echo "Email registered!!!";
	
		//echo '<script type="text/javascript">alert("Username already taken!!!")</script>';
		echo '<script type="text/javascript">
           alert("Email is already Registred !!!");
          window.location.href = "homepage.php";
             </script>';
		
		
		
		
		
	}
    else {
      //echo '<script type="text/javascript">alert("Invalid Username or Password!!!")</script>';
	$sql = "INSERT INTO main (name, email ,password)   
         VALUES ('$fname','$mail','$pass')";
	   if ($conn->query($sql) === TRUE) {
		   echo '<script type="text/javascript">
           alert("registration  Successfully");
          window.location.href = "homepage.php";
             </script>';
	//echo "Login ID : " .$use;}
	}
 }
 }
    else {
      //echo '<script type="text/javascript">alert("Invalid Username or Password!!!")</script>';
	$sql = "INSERT INTO main (name, email ,password)   
         VALUES ('$fname','$mail','$pass')";
	   if ($conn->query($sql) === TRUE) {
		   echo '<script type="text/javascript">
           alert("registration  Successfully");
          window.location.href = "homepage.php";
             </script>';
	//echo "Login ID : " .$use;}
	}
	else{echo "Not done";}
 
 
 }
 }
 else{ echo "Not done";}
?>

</html>