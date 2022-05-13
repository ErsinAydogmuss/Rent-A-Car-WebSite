<?php
include 'config2.php';
ob_start();
session_start();

$button = $_POST['sbmt'];

if(isset($button)) {
    $fullName = htmlspecialchars($_POST['fullName']);
    $eMail = htmlspecialchars($_POST['email']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $sql = $db -> prepare("INSERT INTO `rent_a_ride`.`contactus` (`FullName`, `Email`, `PhoneNumber`, `Subject`, `Message`) VALUES ('$fullName', '$eMail', '$phoneNumber', '$subject', '$message');
    ");
    $sql -> execute();

    header("Location:../index.php");
    exit;
}


?>