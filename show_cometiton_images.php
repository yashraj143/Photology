
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
	position:relative;
}
.fr{
	
	position:absolute;
	left:250px;
	float:right;
	top:100px;
	
}
.not{
	display:none;
}

</style>
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
}else{
	$user_name = "yash";
}

$q = intval($_GET['q']);
//$q = 67;
//echo $q;
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql="SELECT Competition_name FROM competition WHERE id = '".$q."'";
$result = mysqli_query($conn,$sql);
if(!$result){
	echo 'not done1';
}else{
$row = mysqli_fetch_array($result);

$cname = $row['Competition_name'];
}


$sql2="SELECT * FROM competition_gallary WHERE competition_name = '$cname'";
$result2 = mysqli_query($conn,$sql2);

$check_vote = mysqli_query($conn,"SELECT `$cname` from `main` where name = '$user_name'");
$check_vote_value = mysqli_fetch_assoc($check_vote);
//echo $check_vote_value[$cname];

if(!$result2){
	echo 'not done2';
}
else{
while($row2 = mysqli_fetch_array($result2)){
	
	
	?>
         
               <div class="column" id = "count">
               <div class="content" >
			   <?php 
	
           echo'  <img src = "'.$row2['image'].' " width="200" height="200"  >';
				  

	
	/*echo '  <div class="fr">  <form action="updating_vote.php" method="post">
	             <input type="text" value='.$row2['id'].' name = "id_value" class = "not">
				  <button name = "submit" value = "submit" >vote</button></form>
				   <p id="t_vote">vote: '.$row2['vote'].'  </p>';  */
			
      	?>
		<div id="div1-wrapper">
		<div class="fr"  id= "div1">
		<p  id= "<?php $row2['id'] ?>">vote: <?php echo  $row2['vote'] ?></p>
		
        <?php
		
             if($check_vote_value[$cname]==0){
         		echo '<button  id= "btn_click"  value = "'.$row2['id'].'" onclick = "update(this.value)"   >vote</button>';

			 }?>
                 
			 
			 
               
		</div>
        </div>
		
				  </div>
				     </div>
					   </div>
					
				  
				
	








<?php }
          } 
		  mysqli_close($conn);
              ?>



























