<?php 
    try {
        $db = new PDO("mysql:host=localhost;dbname=rent_a_ride;charset=utf8",'root','');
    }catch (PDOException $e) {
        echo $e->getMessage();
    }
?>