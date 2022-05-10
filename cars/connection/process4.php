<?php
include 'config2.php';
ob_start();
session_start();
$but = $_POST['register'];

if(isset($but)){
    
    $userfName = htmlspecialchars($_POST['fName']);
    $userlName = htmlspecialchars($_POST['lName']);
    $userPassword = htmlspecialchars($_POST['password']);
    $userCPassword= htmlspecialchars($_POST['cPassword']);
    $userGender = htmlspecialchars($_POST['gender']);
    $userMail = htmlspecialchars($_POST['email']);
    $userPhoneNumber = htmlspecialchars($_POST['phoneNumber']);
    $idNumber = htmlspecialchars($_POST['IdNumber']);
    if($userPassword == $userCPassword){
        if($userPassword >= 6){
            $userControl = $db -> prepare("SELECT * FROM users WHERE Email = '$userMail'");
            $userControl -> execute();
            $count = $userControl->rowCount();
            
            if($count == 0) {
                
                $pass = md5($userCPassword);
                $role = 0;
                $registerUser = $db -> prepare("INSERT INTO users SET
                Name =:name,
                LastName =:lName,
                Password =:password,
                Gender =: gender,
                Email =: email,
                PhoneNumber =: phoneNumber,
                Role =: role
                IdNumber =: idNumber");
                echo ($idNumber);
                $insert = $registerUser->execute(array(
                    'name' => $userfName,
                    'lName' => $userlName,
                    'password' => $userPassword,
                    'gender' => $userGender,
                    'mail' => $userMail,
                    'phoneNumber' => $userPhoneNumber,
                    'role' => $role,
                    'idNumber' => $idNumber));
                if($insert){
                    header("Location:../index.php"); 
                    exit;
                }
                else{
                    header("Location:../register.php?status=failed");
                    exit;
                }

            }
        }
        else{
            header("Location:../register.php?status=shortPassword");
            exit;
        }
    }
    else{
        header("Location:../register.php?status=diffPassword");
        exit;
    }
}
