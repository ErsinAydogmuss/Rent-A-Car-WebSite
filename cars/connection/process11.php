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

if ($_GET['userDelete'] == "ok") {

    $delete = $db->prepare("DELETE from users where IdUser=:id");
    $control = $delete->execute(array(
        'id' => $_GET['IdUser']
    ));
    if ($control) {
        header("location:../adminCustomer.php?delete=ok");
    } else {
        header("location:../adminCustomer.php?delete=no");
    }
}
?>