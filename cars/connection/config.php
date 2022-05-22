<?php 

$server = "localhost";
$user = "root";
$pass = "159753";
$db = "rent_a_ride";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
else{
}

?>