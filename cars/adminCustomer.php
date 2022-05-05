<?php
include 'connection/config2.php';
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

$sql2 = $db->prepare("SELECT * FROM users");
$sql2->execute();

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Customers Page</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />


  <link rel="stylesheet" href="./css/admin.css" />

</head>

<body>
  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          <a href="adminHome.php">
            <img src="./img/carIcon.jpg" alt="" />
          </a>
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons-sharp">close</span>
        </div>
      </div>
      <div class="sideBar">
        <a href="adminCustomer.php" class="active">
          <span class="material-icons-sharp">person_outline</span>
          <h3>Customers</h3>
        </a>
        <a href="adminTrips.php">
          <span class="material-icons-sharp">receipt_long</span>
          <h3>Trips</h3>
        </a>
        <a href="adminCars.php">
          <span class="material-icons-sharp"> time_to_leave </span>
          <h3>Cars</h3>
        </a>
        <a href="adminMessages.php">
          <span class="material-icons-sharp">mail_outline</span>
          <h3>Messages</h3>
        </a>
        <a href="#">
          <span class="material-icons-sharp">report_gmailerrorred</span>
          <h3>Reports</h3>
        </a>
        <a href="#">
          <span class="material-icons-sharp">settings</span>
          <h3>Settings</h3>
        </a>
        <a href="index.php">
          <span class="material-icons-sharp">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>

    <main>
      <h1>Customers</h1>
      <div class="insights cust">
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>LastName</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>City</th>
              <th>Country</th>
              <th>Birthdate</th>
              <th>Registration Date</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php

            while ($user = $sql2->fetch(PDO::FETCH_ASSOC)) {

            ?>


              <tr>
                <td><?php echo $user['Name'] ?></td>
                <td><?php echo $user['LastName'] ?></td>
                <td><?php echo $user['Gender'] ?></td>
                <td><?php echo $user['Email'] ?></td>
                <td><?php echo $user['PhoneNumber'] ?></td>
                <td><?php echo $user['City'] ?></td>
                <td><?php echo $user['Country'] ?></td>
                <td><?php echo $user['BirthDate'] ?></td>
                <td><?php echo $user['RegDate'] ?></td>
                <td class="but">
                  <a href="editCustomer.php"><button style="width: 75px;height: 50px; background: #b68e64; border-radius: 15px; cursor: pointer; color: #fff; font-size: 16px;">Edit</button></a>
                </td>
                <td>
                  <a href="editCustomer.php"><button style="width: 75px;height: 50px; background: #b68e64; border-radius: 15px; cursor: pointer; color: #fff; font-size: 16px;">Delete</button></a>
                </td>
              </tr>



            <?php  }

            ?>

          </tbody>
        </table>
      </div>
    </main>
    
  </div>



  <script src="js/script.js"></script>
</body>

</html>