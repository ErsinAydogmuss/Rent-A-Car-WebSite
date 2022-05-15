<?php
include 'config2.php';
ob_start();
session_start();

$sql = $db->prepare("SELECT * FROM users WHERE Email=:email");
$sql->execute(array(
    'email' => $_SESSION['email']
));
$admin = $sql->fetch(PDO::FETCH_ASSOC);

if ($admin['Role'] == 0) {
    Header("Location:adminLogin.php");
    exit;
}

if($_GET['finishRental'] = "ok"){
    $IdBooking = $_GET['IdBooking'];
    $sql2 = $db -> prepare("UPDATE `booking` SET `IdStatus` = '0' WHERE `IdBooking` = '$IdBooking'");
    $sql2 -> execute();

    Header("Location:../adminTrips.php");
    exit;
}
