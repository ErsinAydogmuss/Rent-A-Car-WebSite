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

$button = $_POST['addToCar'];

if (isset($button)) {
    
    $file = $_FILES['fileImage']['tmp_name'];
    $image = file_get_contents($_FILES['fileImage']['tmp_name']);
    $image_name = $_FILES['fileImage']['name'];
    $file_size = getimagesize($_FILES['fileImage']['tmp_name']);
    $crt = array("as", "rt", "ty", "yu", "fg");
    $url = substr($image_name, -4, 4);
    $rndNumber = rand(1, 10000);
    $newName = "../img/" . $crt[rand(0, 4)] . $rndNumber . $url;
    




    $carName = htmlspecialchars($_POST['carName']);
    $modelYear = htmlspecialchars($_POST['modelYear']);
    $transmission = htmlspecialchars($_POST['transmission']);
    $seatingCapacity = htmlspecialchars($_POST['seatingCapacity']);
    $fuelType = htmlspecialchars($_POST['fuelType']);
    $xPrice = htmlspecialchars($_POST['xPrice']);
    $xStatus = htmlspecialchars($_POST['xStatus']);
    $branch = htmlspecialchars($_POST['branch']);

    

    if (move_uploaded_file($_FILES['fileImage']['tmp_name'], $newName)) {
        $ekle = $db->prepare("INSERT INTO cars (CarName, ModelYear, IdTransmission, SeatingCapacity, IdFuelType, PricePerDay, CarImage, IdStatus, IdBranch) values('$carName', '$modelYear', '$transmission', '$seatingCapacity', '$fuelType', '$xPrice','$newName', '$xStatus', '$branch' )");
        $ekle->execute();
        header("Location:../adminCars.php");
    }

    /**/
}
else{
    Header("Location:adminLogin.php");
    exit;
}
?>