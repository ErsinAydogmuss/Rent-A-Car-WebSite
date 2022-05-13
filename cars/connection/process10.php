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

$addToBranch = $_POST['addToBranch'];
if(isset($addToBranch)) {
    $branch = $_POST['branchName'];
    echo $branch;

    $sql = $db -> prepare("INSERT INTO `branch` (`BranchName`) VALUES ('$branch');
    ");
    $sql -> execute();
    Header("Location:../adminBranch.php");
    exit;
}

?>