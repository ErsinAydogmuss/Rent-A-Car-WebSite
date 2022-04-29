<?php
ob_start();
session_start();
include 'config2.php';

if (isset($_POST['adminLogin'])) {
    $adminEmail = $_POST['Email'];
    $adminPassword = $_POST['Password'];
    
    $sql = $db -> prepare("SELECT * FROM users WHERE Email=:email AND Password=:password AND Role=:role");

    $sql -> execute(array(
        'email' => $adminEmail,
        'password' => $adminPassword,
        'role' => 1
    ));

    $say = $sql -> rowCount();
    if ($say == 1) {
        $_SESSION['email'] = $adminEmail;
        Header("Location:../adminHome.php");
        exit;
    } 
    else {
        Header("Location:../adminLogin.php");
        exit;
    }
}
