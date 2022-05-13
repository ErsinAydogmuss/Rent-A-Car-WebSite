<?php
include 'config2.php';
ob_start();
session_start();

if ($_POST['login']) {
    $userMail = htmlspecialchars($_POST['email']);
    $userPassword = htmlspecialchars($_POST['password']);
    echo $userMail;
    echo $userPassword;
    $sql = $db-> prepare("SELECT * FROM users Where Email = '$userMail' AND Password = '$userPassword'");
    $sql -> execute();
    $cnt = $sql -> rowCount();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if ($cnt == 1) {
        $_SESSION['email'] = $userMail;
        header("Location:../index.php?IdUser=$row[IdUser]");
        exit;
    }
    else{
        header("Location:../index.php?status=error");
        exit;
    }
}

