<?php
include 'config2.php';
ob_start();
session_start();

$sql = $db->prepare("SELECT * FROM users WHERE Email=:email");
$sql->execute(array(
    'email' => $_SESSION['email']
));
$isUser = $sql->fetch(PDO::FETCH_ASSOC);

if ($sql->rowCount() == 0) {
    Header("Location:index.php");
    exit;
}

if(isset($_POST['editBtn'])){
    $xName = $_POST['custName'];
    $xLastName = $_POST['lastName'];
    $xGender = $_POST['gender'];
    $xEmail = $_POST['eMail'];
    $xPhoneNumber = $_POST['phoneNumber'];

    $update = $db -> prepare("UPDATE `users` SET `Name` = '$xName', `LastName` = '$xLastName', `IdGender` = '$xGender', `Email` = '$xEmail', `PhoneNumber` = '$xPhoneNumber' WHERE (`IdUser` = '$isUser[IdUser]')");
    $update ->execute();

    header("location:../editProfile.php?update=ok");
}
