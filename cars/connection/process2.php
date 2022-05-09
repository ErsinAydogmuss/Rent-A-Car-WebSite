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

$sql2 = $db->prepare("SELECT * FROM cars WHERE IdCar=:id");
$sql2->execute(array(
    'id' => $_GET['IdCar']
));
$theCar = $sql2->fetch(PDO::FETCH_ASSOC);
$carId = $theCar['IdCar'];

$editButton = $_POST['editButton'];

if (isset($editButton)) {
    $xPrice = $_POST['xPrice'];
    $xStatus = $_POST['xStatus'];

    $ayarkaydet = $db->prepare("UPDATE cars SET PricePerDay = $xPrice, CarStatus = $xStatus  WHERE (IdCar = $carId);
    ");

    $update = $ayarkaydet->execute();

    header("Location:../adminCars.php");
}

if ($_GET['carDelete'] == "ok") {

    $delete = $db->prepare("DELETE from cars where IdCar=:id");
    $control = $delete->execute(array(
        'id' => $_GET['IdCar']
    ));
    if ($control) {
        header("location:../adminCars.php?delete=ok");
    } else {
        header("location:../adminCars.php?delete=no");
    }
}

