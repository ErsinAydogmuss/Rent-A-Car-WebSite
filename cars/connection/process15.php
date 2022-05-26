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

if (isset($_POST['changeBtn'])) {
    $xOldPassword = $_POST['password'];

    if ($xOldPassword != $isUser['Password']) {
        header("location:../changePassword.php?oldStatus=no");
    } else {
        $xnewPassword = $_POST['newPassword'];
        $xnewPassword2 = $_POST['newPassword2'];
        if ($xnewPassword != $xnewPassword2) {
            header("location:../changePassword.php?newStatus=no");
        } else {
            $update = $db->prepare("UPDATE `users` SET `Password` = '$xnewPassword' WHERE (`IdUser` = '$isUser[IdUser]')");
            $update->execute();

            header("location:../changePassword.php?newStatus=yes");
        }
    }
}
