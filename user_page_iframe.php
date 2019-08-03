<!DOCTYPE html>


<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";


$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);
session_start();


if(isset($_SESSION["USERNAME"])){
$user_name = $_SESSION["USERNAME"];
}

?>



<html>
<head>
<style>
* {
    box-sizing: border-box;
}

body {
    background-color: #f1f1f1;
    padding: 20px;
    font-family: Arial;
}

/* Center website */
.main {
    max-width: 1000px;
    margin: auto;
}

h1 {
    font-size: 50px;
    word-break: break-all;
}

.row {
    
    margin: 10px -16px;
	padding:8px;
}



.column {
     padding: 8px;
    float: left;
    width: 33.33%;
	display:block;
}


.content {
    background-color: white;
    padding: 10px;
	height:230px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

.btn {
  border: none;
  outline: none;
  padding: 15px 20px;
  background-color: white;
  cursor: pointer;
  float:left;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}

	

</style>
</head>
<body>

<!-- MAIN (Center website) -->
<div class="main">

<h1>Competitions</h1>
<hr>

<h2>If you like Then must Vote</h2>

<?php 
         $result = mysqli_query($conn,"SELECT * FROM competition");

          while($row = mysqli_fetch_assoc($result)){
 
    
     ?>
	      
            <div id="myBtnContainer">
			
	           <?php echo '<button class="btn" id= "'.$row['id'].'"  value = "'.$row['id'].'" onclick = "ShowImage(this.value)"   > '.$row['Competition_name'].' </button>' ?>
                
             </div>
			 

		  <?php  }  ?>
<br><br>
<!-- Portfolio Gallery Grid -->

<div class="row" id ="inside">
  
	
        <div id = "check">
	    <div id="div1-wrapper">
		<div id="div1">
		</div>
		</div>
		
		</div>
		
	
	
  </div>
  
  
  <?php  ?>
  

</div>
  

</div>

                  <script src="http://code.jquery.com/jquery-latest.js">
                  </script>
 
				 

<script>


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}


function ShowImage(str) {
    if (str == "") {
        
        return;
    } else {
      //document.getElementById("check").innerHTML = str;		
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
			//document.getElementById("check2").innerHTML = this.status;
			
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("check").innerHTML = this.response;
				
            }
			else{}
        };
        xmlhttp.open("GET","show_cometiton_images.php?q="+str,true);
        xmlhttp.send();
    }
		
	
}





function update(str) {
	
    if (str == "") {
        
        return;
    } else {
      	
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
			document.getElementById("check2").innerHTML = this.status;
			
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("inside").innerHTML = this.response;
				document.getElementById(str).innerHTML = "Done";
				
            }
			else{}
        };
        xmlhttp.open("GET","updating_vote.php?q="+str,true);
        xmlhttp.send();
    }
	
	location.reload();
	
	  
                     
                   
	
	
}





</script>

</body>
</html>
