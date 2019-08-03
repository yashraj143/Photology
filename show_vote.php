
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

$sql="SELECT *  FROM competition_gallary WHERE id = '".$q."'";
$result = mysqli_query($conn,$sql);
echo $result['vote'];
//header('REFRESH:0; url:Competition.php');
mysqli_close($conn);
?>











































