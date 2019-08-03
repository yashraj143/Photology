
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
else{
	echo "error in session";
}

$q = intval($_GET['q']);
//$q = $_POST['id_value'];
echo $q;
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql = "UPDATE competition_gallary SET vote=vote+1  WHERE id= '$q'" ;
$result = mysqli_query($conn,$sql);


$comp_name = mysqli_query($conn,"SELECT `competition_name` from `competition_gallary`  WHERE id= '$q'");

$cname = mysqli_fetch_assoc($comp_name);
$competition = $cname['competition_name'];

echo $competition;

$sql2 = "UPDATE `main` SET `$competition` = '1' WHERE name = '$user_name'" ;
$result2 = mysqli_query($conn,$sql2);

if($result && $result2){
	/*echo '<script type="text/javascript">
                   alert("Voted");
                         window.location.href = "user_page_iframe.php";
                                          </script>';
			*/

}
else{
	
	echo mysqli_error($conn);
}

mysqli_close($conn);
?>











































<script>
/*
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}*/
</script>

