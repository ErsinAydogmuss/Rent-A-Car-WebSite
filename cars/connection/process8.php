<?php
include 'config2.php';
ob_start();
session_start();
$paymentBut = $_POST['paymentBut'];
$email = $_SESSION['email'];
$user = $db->prepare("SELECT * FROM users WHERE Email = '$email'");
$user -> execute();
$theUser = $user->fetch(PDO::FETCH_ASSOC);



if (isset($paymentBut)) {
    $location = $_GET['location'];
    $fromDate = $_GET['fromDate'];
    $toDate = $_GET['toDate'];
    $IdCar = $_GET['IdCar'];
    $totalPrice = $_SESSION['totalPrice'];

    $loca =$db -> prepare("SELECT * FROM branch WHERE BranchName = '$location'");
    $loca -> execute();
    $theLoc = $loca->fetch(PDO::FETCH_ASSOC);

    $sql = $db->prepare("INSERT INTO `booking` (`IdUser`, `IdCar`, `FromDate`, `ToDate`, `IdBranch`, `Price`) VALUES ('$theUser[IdUser]','$IdCar','$fromDate','$toDate','$theLoc[IdBranch]','$totalPrice')");
    $sql -> execute();

    header("Location:../index.php");
    exit;
    
}