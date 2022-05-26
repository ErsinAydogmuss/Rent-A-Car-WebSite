<?php
include 'config2.php';
ob_start();
session_start();
$but = $_POST['register'];
if (isset($but)) {

    $userfName = htmlspecialchars($_POST['fName']);
    $userlName = htmlspecialchars($_POST['lName']);
    $userPassword = htmlspecialchars($_POST['password']);
    $userCPassword = htmlspecialchars($_POST['cPassword']);
    $userGender = htmlspecialchars($_POST['gender']);
    $userMail = htmlspecialchars($_POST['email']);
    $userPhoneNumber = htmlspecialchars($_POST['phoneNumber']);
    $idNumber = htmlspecialchars($_POST['IdNumber']);

    $userCount = $db->prepare("SELECT * FROM users WHERE Email=:email");
    $userCount->execute(array(
        'email' => $userMail
    ));

    $count = $userCount->rowCount();

    if ($count == 0) {
        if ($userPassword == $userCPassword) {
            if ($userPassword >= 6) {
                $registerUser = $db->prepare("INSERT INTO users (Name, LastName, Password, IdGender, Email, PhoneNumber, IdNumber) values('$userfName', '$userlName', '$userPassword', '$userGender', '$userMail', '$userPhoneNumber', '$idNumber')");
                $registerUser->execute();


                if ($registerUser) {
                    header("Location:../index.php");
                    exit;
                } else {
                    header("Location:../signUp.php?status=failed");
                    exit;
                }
            } else {
                header("Location:../signUp.php?status=shortPassword");
                exit;
            }
        } else {
            header("Location:../signUp.php?status=dontMatch");
            exit;
        }
    } else {
        header("Location:../signUp.php?status=duplicate");
        exit;
    }
}
