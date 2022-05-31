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

if($_GET['finishRepair'] = "ok"){
    $IdCar = $_GET['IdCar'];
    $sql2 = $db -> prepare("UPDATE `rent_a_ride`.`cars` SET `IdStatus` = '1' WHERE (`IdCar` = '$IdCar');
    ");
    $sql2 -> execute();

    Header("Location:../adminSelectRepairCars.php");
    exit;
}
