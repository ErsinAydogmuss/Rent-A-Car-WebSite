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

if ($_GET['branchDelete'] == "ok") {

    $delete = $db->prepare("DELETE from branch where IdBranch=:id");
    $control = $delete->execute(array(
        'id' => $_GET['IdBranch']
    ));
    if ($control) {
        header("location:../adminBranch.php?delete=ok");
    } else {
        header("location:../adminBranch.php?delete=no");
    }
}
?>