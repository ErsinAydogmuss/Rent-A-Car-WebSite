<?php
include 'config2.php';
ob_start();
session_start();

$bookBtn = $_POST['bookBtn'];
if(isset($bookBtn)){
    $location = $_POST['branch'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $IdcarType = $_POST['carType'];
    
    if(strtotime($toDate) >= strtotime($fromDate)){
        header("Location:../car.php?location=$location&fromDate=$fromDate&toDate=$toDate&IdcarType=$IdcarType");
        exit;
    }
    else {
        header("Location:../book.php");
        exit;
    }

    
}



