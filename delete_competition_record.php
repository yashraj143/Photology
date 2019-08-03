
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "photograph";
session_start();

$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,$database);


$q = intval($_GET['q']);

echo '$q';
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql2 = mysqli_query($conn,"SELECT * FROM competition where id = '".$q."'");
$result = mysqli_fetch_assoc($sql2);

$table = "main";
$column = $result['Competition_name'];

$sql="DELETE FROM competition WHERE id = '".$q."'";
$result = mysqli_query($conn,$sql);

$off = mysqli_query($conn,"UPDATE `total_competition` set `status` = 1 where `Competition_name` = '$column'");


$delete = mysqli_query($conn,"ALTER TABLE `$table` DROP COLUMN `$column`");
//header('REFRESH:0; url:Competition.php');
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

