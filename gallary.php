<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.9); 
}

.modal-content,#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

#caption {
	position:relative;
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}


.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}



.img_left {
    position: absolute;
    top: 8px;
    left: 16px;
}
</style>

</head>
<body>

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
//echo $user_name;

$query = mysqli_query($conn,"SELECT id FROM gallary where name = '$user_name'");
$check = mysqli_fetch_array($query);

//echo $check['id'];
if($check){
	$query2 = mysqli_query($conn,"SELECT id FROM gallary where name = '$user_name'");
	
while($yas = mysqli_fetch_assoc($query2))
{
    $IDstore[] = $yas['id'];
	//echo $yas['id'];
	
	

if(1){
foreach($IDstore as $id){

$sql = "select image from gallary where id = $id";
$que="select image_name from gallary where id=$id";
$result = mysqli_query($conn,$sql);
$res=mysqli_query($conn,$que);
if (!$result || !$res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}







while(($row = mysqli_fetch_array($result) )&& ($pic = mysqli_fetch_array($res))){
	//echo $pic['image_name'];
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<img  class="myImg" src="<?=$row[0]?>" width="175" height="200" alt="<?=$pic[0]?>">
<div id="myModal" class="modal">
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
  <img class="modal-content" id="img01">
  
  <div id="caption">
  </div>
</div>
<?php
}
}	else{
	echo mysqli_error($conn);
	
}
}
}
}
else{
	echo mysqli_error($conn);
	//echo "error2";
	
}


?>
<script>
var modal = document.getElementById('myModal');
var img = $('.myImg');
var modalImg = $("#img01");
var captionText = document.getElementById("caption");
$('.myImg').click(function(){
    modal.style.display = "block";
    var newSrc = this.src;
    modalImg.attr('src', newSrc);
    captionText.innerHTML = this.alt;
});
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}

</script>
</body>
</html>

