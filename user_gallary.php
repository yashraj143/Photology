<!DOCTYPE html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";
session_start();

if(isset($_GET['variable'])){
$_SESSION["USERNAME"] = $_GET['variable'];
$user_name = $_SESSION["USERNAME"];

//echo $_GET['variable'];
}else{
	
	//echo "error2";
}
if(isset( $_SESSION["USERNAME"])){
$user_name = $_SESSION["USERNAME"];
//echo $user_name;
}

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
    height: 100%;
    margin: 0;
    font-family: Arial;
}

/* Style tab links */
.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
    color: white;
    display: none;
    padding: 100px 20px;
    height: 100%;
	
}
.preview{
	position: absolute;
	top: 250px;
    left: 125px;
    width: 150px;
    height: 200px;
    border: 3px solid #73AD21;
	
	
}
.absolute1
{
    position: absolute;
    background-color:#dfff80;
	left: 332px;
    width: 1000px;
    height: 750px;
	top:48px;
}
.relative {
    position: relative;
    width: 1335px;
    height: 800px;
   
}

.Logout{
	position:absolute;
	left: 130px;
	top:700px;
	
}
.btn {
    border: none;
    color: white;
    padding: 14px 20px;
    font-size: 16px;
    cursor: pointer;
}


.log {background-color: #f44336;} 
.log:hover {background-color: #da190b;}



#Home {background-color: #ff9999;}
#Home1 {background-color: #ffff66;}
#Home2 {background-color: #4d94ff;}
#About {background-color: #a64dff;}
</style>
</head>
<body    onunload="onBak()">
<div class ="relative">
<button class="tablink" onclick="openPage('Home2', this, '#ff9999')" id="defaultOpen">Home</button>
<button class="tablink" onclick="openPage('Home1', this, '#ffff66')" >Home1</button>
<button class="tablink" onclick="openPage('Home', this, '#ff9999')">Home2</button>
<button class="tablink" onclick="openPage('About', this, '#a64dff')">About</button>

<div id="Home2" class="tabcontent">
  <h3>Gallary</h3>
  <p>Uplaod and store Images</p>
  <form action="upload_img_gallary.php" method="POST" enctype="multipart/form-data">
	
	<input type="file" onchange="previewFile()" name = "file"><br>
	<div class= "preview">
    <img src="" height="200px" alt="Image preview..." width="150px"><br><br>
    </div>
	<input type="submit" value="submit">
   </form>
   
   
   <div class="absolute1">
      <iframe src="gallary.php?var = <?php echo $user_name?>" name="yas" height="750px" width="1000px"></iframe>
	  
	</div>
	<div class = "Logout">
	<button class="btn log"> logout</button>
	</div>
	
</div>

<div id="Home1" class="tabcontent">
  <h3>Home1</h3>
  <p></p> 
</div>

<div id="Home" class="tabcontent">
  <h3>Home2</h3>
  <p>ns</p>
</div>

<div id="About" class="tabcontent">
  <h3>About</h3>
  <p>Here My Profile.</p>
</div>
</div>
<script>
function previewFile(){
       
       var preview = document.querySelector('img'); 
       var file    = document.querySelector('input[type=file]').files[0]; 
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file);
       } else {
           preview.src = "";
       }
	   }

previewFile();


function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();








</script>


     
</body>
</html> 
