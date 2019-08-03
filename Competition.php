<!DOCTYPE html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";
session_start();

$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);
if(isset($_SESSION["USERNAME"])){
$user_name = $_SESSION["USERNAME"];
}
if((isset($_POST['year']) && !empty($_POST['year']))&& (isset($_POST['month']) && !empty($_POST['month']))
	&&(isset($_POST['day']) && !empty($_POST['day'])) && (isset($_REQUEST['number']) && (!empty($_REQUEST['number'])))  ){
	
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$name = $_REQUEST['number'];

$check1 = mysqli_query($conn,"SELECT * FROM competition where Competition_name = '$name' ");
$check2 = mysqli_num_rows($check1);

if($check2){
	echo '<script type="text/javascript">
              alert("Already Exis....Choose Diff name");
                window.location.href = "admin.php";
                              </script>';
			exit();
}
$insert_name = mysqli_query($conn,"INSERT INTO competition (Competition_name,year,month,day) values ('$name','$year','$month','$day')");

$insert_compe_entry = mysqli_query($conn,"INSERT INTO `total_competition` (Competition_name) values ('$name')");


$table = "main";
$column = $name;
//echo $column;

$add = mysqli_query($conn,"ALTER TABLE `$table` ADD `$column` VARCHAR(40) default 0");

if(!$add){
	
	echo mysqli_error($conn);
}

//$id = 4;
/*
echo $year;
echo $month;
echo $day;
*/
}


?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
  margin: 0;
  font-size: 28px;
  background-color: #f1f1f1;
   padding: 20px;
    font-family: Arial;
}

.header {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
}

#navbar {
  overflow: hidden;
  background-color: #ff0080;
}

#navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.content_outer {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%
}

.sticky + .content {
  padding-top: 60px;
}
 *{
    box-sizing: border-box;
}

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

}


/* Content */
.content {
    background-color: white;
    padding: 10px;
	height:230px;
}

</style>

<!-- style for block display -->
<style>

input[type=text], input[type=password] {
    
    padding: 12px 20px;
  
    display: inline-block;
    border: 1px solid #ccc;
    
}


.container {
    padding: 10px;
	position:relative;
}


.modal {
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

.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from t
    border: 1px solid #888;
    width: 50px; /* Could be more or less, depending on screen size */
}



.animate {
    animation: animatezoom 0.6s
}


    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

.preview{
	position: absolute;
	top: 100px;
    width: 155px;
    height: 190px;
    border: 3px solid #cc3399;
	
	
}

.submit{
	position:absolute;
	top:200px;
	left:230px;
	
}
button {
    background-color: #0066ff;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 25%;
}

button:hover {
    opacity: 0.8;
}

.link{
	color: red;
	cursor: pointer;
}
.link:hover {
    color:blue;
}
</style>


</head>
<body>

<div class="header">
  <h2>PhotoLogy</h2>
  <p>Participate And Explore Yourself</p>
</div>

<div id="navbar">
<a href="javascript:void(0)"></a>
 <a href="javascript:void(0)">.</a>
</div>

<div class="content_outer">
<div class="main" >

<h1>Going Competition</h1>
<p class = "link" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">  Click Here for Participation</p>





<div id="id01" class="modal">
  
  <form class="modal-content animate" name="upload" action="Compe_upload_page.php" method="POST" enctype="multipart/form-data" style = "width:55%; height:53%">
   
    
    <div class="container">
	<hr>
		<input type="file" onchange="previewFile()" name = "file"><br>
	        <div class = "preview">
              <img src="" height="200" alt="Image preview..." height ="150px" width='150px'><br><br>
                    </div>
                           <br>
					<div class ="submit" >
                       <input type = "text" name ="idnum" placeholder="Enter id carefully">
	              <button type="submit" value="submit">Submit</button>
				 </div>
    </div>
    
  </form>
</div>







<hr>

<!-- Competioton -->
<div class="row">
<?php 
$result = mysqli_query($conn,"SELECT * FROM competition");



 while($row = mysqli_fetch_assoc($result)){
 
    
     ?>
  <div class="column">
    <div class="content">
      
  <!--    <h4 id= "competition1"> </h4>   -->
         <h4 id = "4"> </h4>
	  <?php echo '<h4 id= "'.$row['id'].'"> </h4>' ?>  
     <?php echo '<p  id= "link'.$row['id'].'"  >  </p>'?>
	 <?php echo '<p> '.$row['Competition_name'].$row['id'].' </p>' ?>
	 
	 
    </div>
  </div>
 <?php   }?>
<!-- END GRID -->
</div>

<!-- END MAIN -->
</div>

 </div>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

</script>


<script type="text/javascript">



<?php 
$result1 = mysqli_query($conn,"SELECT * FROM competition");

 while($row1 = mysqli_fetch_assoc($result1)){ ?>
	 
var year = parseInt("<?php echo $row1['year'] ?>");
var mon = parseInt("<?php echo $row1['Month'] ?>");
var month =mon-1;
var day = parseInt("<?php echo $row1['Day'] ?>");

var id_outer = parseInt("<?php echo $row1['id'] ?>");
compe_name = "<?php echo $row1['Competition_name'] ?>";
 mycounter(year,month,day,id_outer);

function mycounter(y,m,d,id_name){
	
	var countDownDate = new Date(y,m,d).getTime();
	var id = id_name;
	var pre ="link";
	var id2 = pre + id;
	function count() {

    
    var now = new Date().getTime();
    
    
    var distance = countDownDate - now;
    
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
   
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
		DeleteUser(id);
        /*document.getElementById(id).innerHTML = "EXPIRED";
		result = "Sorry!";
		document.getElementById(id2).innerHTML = result;*/
		
		
		//window.location.href = "delete_competition_record.php";
		
		
    }
	else{
		document.getElementById(id).innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
	    
           /*  var text = "Click here for Participation";
			 
			 
			 
            var result = text.link('Compe_for_upload').fontsize(3);
	   document.getElementById(id2).innerHTML = result; */
	}
}

var x = setInterval(count, 1000);

	
}



function DeleteUser(str) {
    if (str == "") {
        window.alert("trying TO direct Access");
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('outer_div').innerHTML = this.response;
            }
        };
        
        xmlhttp.open("GET","delete_competition_record.php?q="+str,true);
        xmlhttp.send();
    }
	location.reload();
}

 <?php  }  ?>

</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

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



</script>
</body>
</html>
