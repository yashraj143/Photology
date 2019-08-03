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
img {
    border-radius: 90%;
	
}

</style>
</head>
<div>
<form action="upload_profile.php" method="POST" enctype="multipart/form-data">
	
	<input type="file" onchange="previewFile()" name = "file"><br>
<img src="" height="200" alt="Image preview..." height ="150px" width='150px'><br><br>

	<input type="submit" value="submit">
 
</form>

</div>
<div>
<form action="upload_cover.php" method="POST" enctype="multipart/form-data">
	
	<input type="file" onchange="previewFile()" name = "file"><br>
<img src="" height="200" alt="Image preview..." height ="150px" width='150px'><br><br>

	<input type="submit" value="submit">
 
</form>

<form action ="upload_text.php" method= "POST" >

<textarea rows="4" cols="50" name="cover_txt" >...</textarea>
<input type="submit" value="submit">

</form>

</div>

</html>