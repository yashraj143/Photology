<!DOCTYPE html>
<?php


?>



<html>

<head>
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
<style>
/*img {
    border-radius: 100%;
	
}*/
.preview{
	position: absolute;
	top: 250px;
    width: 150px;
    height: 200px;
    border: 3px solid #73AD21;
	
	
}

</style>
</head>
<div>
<form name="upload" action="Compe_upload_page.php" method="POST" enctype="multipart/form-data" >
	
	<input type="file" onchange="previewFile()" name = "file"><br>
	<div class = "preview">
<img src="" height="200" alt="Image preview..." height ="150px" width='150px'><br><br>
</div>
<br>
<input type = "text" name ="idnum" >
	<input type="submit" value="submit">
 
</form>

</div>

</html>