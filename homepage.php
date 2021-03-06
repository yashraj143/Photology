<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";


$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);?>

<!DOCTYPE html>

<html>
<head>
<link href="StyleSheet.css" rel="stylesheet" />
<style>
html {
    height: 100%;
	width: 100%;
	margin:0;
}
body{
    height: 100%;
	width: 100%;
	margin:0;
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
}
.header {
    background-color: #f1f1f3;
    padding: 20px;
    text-align: center;
}
.row {
    margin: 10px -16px;
	padding:8px;
}
.column {
     padding: 8px;
    float: left;
    width: 33.33%;

}
.dropbtn {
    background-color: #4CAF50;
	width:150px;
    color: white;
    padding: 16px;
    font-size: 16px;
    border:  solid black;
}

.dropdown {
   
    display: inline-block;
	position: absolute;
    top: 250px;
    right: 0;
    width: 200px;
    height: 100px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
 .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.bg {
    
    background-image: url("bgk.jpg");
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100% 100%;
	position: relative;
}
.bgimg {
    background-image: url("pic.jpg");
    height: 80%;
    background-size: 100% 100%;
	backgrond-repeat: no-repeat;
    position: relative;
    color: black;
    font-family: "Courier New", Courier, monospace;
    font-size: 25px;
}

.topleft {
    position: absolute;
    top: 0;
    left: 16px;
}

.bottomleft {
    position: absolute;
    bottom: 0;
    left: 16px;
}

.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display:block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  margin: 0;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #4CAF50;
  color: white;
}
.topnav .icon{
display:none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: left;}


.slideshow-container {
  overflow:hidden;
  max-width: 300px;
  max-height: 500px;
  position: relative;
  margin: auto;
}

.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}


.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}


.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}


@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

#mysidenav a {
    position: absolute;
    right: -80px;
    transition: 0.3s;
    padding: 15px;
    width: 160px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 5px 5px 5px 5px;
}

#mysidenav a:hover {
    right: 0;
}

#Signup {
    top: 80px;
    background-color: #4CAF50;
}

#Log-in {
    top: 140px;
    background-color: #2196F3;
}

#Competitions {
    top: 200px;
    background-color: #f44336;
}

#Contact {
    top: 260px;
    background-color: #555
}

input[type=text], input[type=password] {
    width: 40%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
	
    
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;
	opacity: 0.9;
}

button:hover {
    opacity: 1;
}

.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}



.containe {
    padding: 10px;
}

span.psw {
    float: right;
    padding-top: 16px;
	
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
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from t
    border: 1px solid #888;
    width: 50px; /* Could be more or less, depending on screen size */
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
    background-color: #fefefe;
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
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

<script src="jquery.flexslider-min.js"></script>

<script>

$(document).ready(function () {

$('.flexslider').flexslider({

animation: 'fade',

controlsContainer: '.flexslider'

});

});





</script>
</head>

<body>
<div class="bg">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a onclick="document.getElementById('id01').style.display='block'" style="width:auto; cursor:pointer">Signup</a>
  <a  onclick="document.getElementById('id02').style.display='block'" style="width:auto; cursor:pointer">Log-in</a>
  <a href="#">Contact</a>
</div>

<div id="main">
  <div class="header">
  <h1>Photology</h1>
</div>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
</div>
<div class="row">
<?php 
$result = mysqli_query($conn,"select distinct competition_name from competition_gallary");



 while($row = mysqli_fetch_assoc($result)){
 
 
     ?>
<div class="column">
   <!-- <div class="content">-->
<div class="slideshow-container"> 
<?php echo '<p style="text-align:center;font-size:25px"> '.$row['competition_name'].' </p>' ?>
<div class="flexslider">
<ul class="slides">

                    <?php

// Creating query to fetch state information from mysql database table.
$piccompe=$row['competition_name'];
$state_query = "select * from competition_gallary where competition_name='$piccompe' order by vote desc";

$state_result = mysqli_query($conn,$state_query);

while($r = mysqli_fetch_array($state_result)){ ?>
<li>

<img src="uploads/<?php echo $r['image_name'];?>" / style="height:400px">

</li>
<?php } ?>

</ul>
</div>
</div>

</div>
<?php
 }
 ?>
</div>
</div>

<script>
var countDownDate = new Date("Feb 8, 2018 15:37:25").getTime();

var countdownfunction = setInterval(function() {

    
    var now = new Date().getTime();
    
    
    var distance = countDownDate - now;
    
   
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
 
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    

    if (distance < 0) {
        clearInterval(countdownfunction);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
//
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000);
}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}


function validate()
{

var x=document.myform.password.value;
var y=document.myform.repeatpwd.value;


if(x.length<8)
{
   window.alert("Enter a strong password");
   return false;
}
if(y!=x)
{
  window.alert("Password and confirm password not matched");
  return false;
  }




}
</script>

<div id="id01" class="modal1">
  
  <form name = "myform" class="modal1-content animate" onsubmit="return validate()" action="user_registration.php" method = "post" style = "width:50%; height:90%" >
   

    <div class="containe">
	   <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
	  
      <span id="s1"><label><b>Username</b></label></span>
      <input type="text" placeholder="Enter Name" name="name" required><br>
	  
      <span id="s1"><label><b>Email</b></label></span>
      <input type="text" placeholder="Enter Email" name="email" required><br>

      <span id="s1"><label><b>Password</b></label></span>
      <input type="password" placeholder="Enter Password" name="password" required><br>

      <span id="s1"><label><b>Repeat-Password</b></label></span>
      <input type="password" placeholder="Repeat Password" name="repeatpwd" required><br>
      
      

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        
		<div>
		<button type="submit" class="signupbtn" value= "submit">Sign Up</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        
      </div>
      
    </div> 
    
  </form>
</div>

<div id="id02" class="modal2">
  
  <form class="modal2-content animate" action="user_login.php" method="post" style = "width:55%; height:61%">
   

    <div class="containe">
	<h1>Login</h1>
      <p>Enter the Details.</p>
      <hr>
       <span id="s1"><label><b>Username</b></label></span>
      <input type="text" placeholder="Enter Username" name="uname" required style = "width:40% ; margin: 10px 0px;"><br>

       <span id="s1"><label><b>Password</b></label></span>
      <input type="password" placeholder="Enter Password" name="psw" required  style = "width:40% ; margin: 10px 0px;"><br>
        
      
      
    </div>

    
	  <div>
	     <button type="submit" class="signupbtn" value="submit">Login</button>
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
		
      <span class="forget">Forgot <a href="#">password?</a></span>
      </div>
    
  </form>
</div>
<script>
var modal1 = document.getElementById('id01');
var modal2 = document.getElementById('id02');


window.onclick = function(event) {
    if (event.target == modal1 || event.target == modal2 ) {
        modal1.style.display = "none";
		modal2.style.display = "none";
    }
}

</script>
</body>
</html> 