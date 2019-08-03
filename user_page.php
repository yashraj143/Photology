<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";
session_start();
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);

if(isset($_SESSION["USERNAME"])){
$name =$_SESSION["USERNAME"];

$flag1 = 0;
$flag2 = 0;
$sql = "select profile from profile where name ='$name' ";
$result = mysqli_query($conn,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}


$row = mysqli_fetch_array($result);

if(!$row){
	$flag1 = 1;
}
$sqll = "select cover from cover where name ='$name' ";
$result1 = mysqli_query($conn,$sqll);

if (!$result1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$row1 = mysqli_fetch_array($result1);

if(!$row1){
	
	$flag2 = 1;
}

$sql2 = "select cover_text from cover where name = '$name' ";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_array($result2);

}
	
	
	


//$image = $row['image'];

//$image_src = "upload/".$image;


?>

<!DOCTYPE html>
<html>
<head>

<style>

body {
    font-family: "Times new Roman", sans-serif;
}
.modal1 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

.modal1-content {
    background-color: #80ffff;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from t
    border: 5px solid #888;
    width: 50px; /* Could be more or less, depending on screen size */
}
.preview{
	position: absolute;
	top: 250px;
    width: 150px;
    height: 200px;
    border: 3px solid #73AD21;
	
	
}


.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

.animate {
    animation: animatezoom 0.6s
}


    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

span#s1{
float:left;
width:100px;
 margin: 10px 10px;
 }

.modal2 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

.modal2-content {
    background-color: #80ffff;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from t
    border: 1px solid #888;
    width: 50px; /* Could be more or less, depending on screen size */
}
.modal3 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

.modal3-content {
    background-color: #80ffff;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from t
    border: 1px solid #888;
    width: 50px; /* Could be more or less, depending on screen size */
}
.animate {
    animation: animatezoom 0.6s
}

span.forget {
    float:right;
    
}
.containe {
    padding: 20px;
	position:relative;
}
/*
button {
	background-color: #ccccff ;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
	opacity: 0.9;
}

button:hover {
    opacity: 1;
	background-color: #ccffff; 
}*/

.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
.sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #66b3ff;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 10px 6px 16px;
   
    font-size: 25px;
    color: #111;
    display: block;
}

.sidenav a:hover {
    color:#ff0066;
}

.main {
    margin-left: 200px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 0px;
	border: solid #ff0066;
	border-style: double;
    border-width: 10px;
	  position: relative;
}

#id1 {
    border-radius: 90%;
	
}
.cover{
	width: 100%;
    max-width: 100%;
    height: 500px;
	 display: block;
	 
	
	
}
.text_block {
    position: absolute;
    bottom: 5px;
    right: 10px;
    background-color: none;
    color: white;
    padding-left: 20px;
    padding-right: 20px;
}

.comeptiton_frame{
	position:absolute;
	left:208px;
	
	
}

</style>
</head>

<body>

<div class="sidenav">
  <img src="<?=$row[0]?>" width="175" height="175" alt ="Set Profile Pic" id="id1">  
  <br>
  <button onclick="document.getElementById('id11').style.display='block'" style="width:auto; cursor:pointer">Update Profile Photo</button>
  <br>
  <br>
  <a href="user_gallary.php?variable=<?php echo $name?>">My Gallary</a>
  <a href="Competition.php">Competition</a>
  <a href = "result.php">Result</a>
  <a href="Logout.php?var=<?php echo $name?>">Log Out</a>
  
</div>

<div class="main">
 <button onclick="document.getElementById('id03').style.display='block'" style="width:auto; cursor:pointer">Update Cover Text</button>
 <img src="<?=$row1[0]?>" alt="Nature" class="cover">
 <button onclick="document.getElementById('id02').style.display='block'" style="width:auto; cursor:pointer">Update Photo</button>
 <div class="text_block"> 
    
    <p><?php   echo $row2['cover_text'];?></p>
  </div>
 
</div>
<div id="id11" class="modal1">
  <form class="modal1-content animate" action="upload_profile.php" method="POST" enctype="multipart/form-data" style = "width:35%; height:45% ">
    <div class = "containe">
	<p>UPLOAD PROFILE PHOTO</p>
	<hr>
	<br>
	<input type="file" name = "file"><br>
	<br>
    <input type="submit" value="submit">
	</div>
</form>
</div>
<div id="id02" class="modal2">
  
  <form class="modal2-content animate" action="upload_cover.php" method="POST" enctype="multipart/form-data" style = "width:35%; height:45%">
   
    
    <div class="containe">
	<p>UPLOAD COVER PHOTO</p>
	<hr><br>
		<input type="file" name = "file"><br>
                           <br>
					<input type="submit" value="submit">
    </div>
    
  </form>
</div>
<div id="id03" class="modal3">
  
  <form class="modal3-content animate" action="upload_text.php" method="POST" enctype="multipart/form-data" style = "width:35%; height:45%">
   
    
    <div class="containe">
	<p>UPLOAD COVER TEXT</p>
	<hr><br>
		<textarea rows="4" cols="50" name="cover_txt" ></textarea>
		<br><br>
<input type="submit" value="submit">
    </div>
    
  </form>
</div>
<div class = "comeptiton_frame">
      <iframe src="user_page_iframe.php?var = <?php echo $name?>" name="yas" height="750px" width="1127px"></iframe>
	  
	</div>
<script>
// Get the modal
var modal1 = document.getElementById('id11');
var modal2 = document.getElementById('id02');
var modal3 = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it

window.onclick = function(event) {
    if (event.target == modal1 || event.target == modal2 || event.target == modal3 ) {
        modal1.style.display = "none";
		modal2.style.display = "none";
		modal3.style.display = "none";
    }
}

</script>
</body>
</html> 
