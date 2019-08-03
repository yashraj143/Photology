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
<meta name="viewport" content="width=device-width, initial-scale=1">
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
.row {
    margin: 10px -16px;
	padding:8px;
}
.column {
     padding: 8px;
    float: left;
    width: 33.33%;

}
.num{
	color: black;
	font-size: 25px;
	padding:8px 12px;
	position:absolute;
	top: 0;
}
.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
.active {
  background-color: #4CAF50;
  color: white;
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
.animate {
    animation: animatezoom 0.6s
}
.text{
	color: black;
	font-size:50px;
	padding: 8px 12px;
	position:absolute;
	bottom: 8px;
	width:100%;
	text-align:center;
}
.header {
    background-color: #f1f1f3;
    padding: 20px;
    text-align: center;
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
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

<div class="header">
  <h1>Result</h1>
</div>
<div class="bg">
<div class="row">
<?php 
$result = mysqli_query($conn,"select Competition_name from total_competition where status=1");



 while($row = mysqli_fetch_assoc($result)){
 
 
     ?>
<div class="column">
   <!-- <div class="content">-->
<div class="slideshow-container"> 
<?php echo '<p style="text-align:center;font-size:25px"> '.$row['Competition_name'].' </p>' ?>
<div class="flexslider">
<ul class="slides">

                    <?php

// Creating query to fetch state information from mysql database table.
$piccompe=$row['Competition_name'];
$state_query = "select * from competition_gallary where competition_name='$piccompe' order by vote desc";

$state_result = mysqli_query($conn,$state_query);
$i=0;
$m=0;
while($r = mysqli_fetch_array($state_result)){
if($i<=3)
{
if($r['vote']!=$m)
{	
$m=$r['vote'];
$i++;
?>
<li>

<img src="uploads/<?php echo $r['image_name'];?>" / style="height:400px">
<div class="num"><?php echo $i; ?></div>
<div class="text"><?php echo $r['username']; ?></div>
</li>
<?php
 }
else if($r['vote']==$m)
{

	?>
	<li>

<img src="uploads/<?php echo $r['image_name'];?>" / style="height:400px">
<div class="num"><?php echo $i; ?></div>
<div class="text"><?php echo $r['username']; ?></div>
</li>
<?php
}
}
}
 ?>
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
</script>
</html>