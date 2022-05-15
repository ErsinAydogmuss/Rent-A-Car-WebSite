<?php
include 'connection/config2.php';
ob_start();
session_start();
$email = $_SESSION['email'];

$sql2 = $db->prepare("SELECT * FROM booking b, users u, cars c, branch br, status s WHERE 
u.Email = '$email' AND 
b.IdCar = c.IdCar AND
b.IdBranch = br.IdBranch AND
b.IdStatus = s.IdStatus");
$sql2->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Trips Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
  <link rel="stylesheet" href="./css/admin.css" />
</head>

<body>
  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          <a href="index.php">
            <img src="./img/carIcon.jpg" alt="" />
          </a>
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons-sharp">close</span>
        </div>
      </div>
      <div class="sideBar">
        <a href="index.php">
          <span class="material-icons-sharp">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>

    <main>
      <h1>My Past Rentals</h1>
      <div class="insights cust">
        <table>
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Customer Surname</th>
              <th>Car Name</th>
              <th>Car Model Year</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>Branch</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>

            <?php

            while ($book = $sql2->fetch(PDO::FETCH_ASSOC)) {

            ?>

              <tr>
                <td><?php echo $book['Name'] ?></td>
                <td><?php echo $book['LastName'] ?></td>
                <td><?php echo $book['CarName'] ?></td>
                <td><?php echo $book['ModelYear'] ?></td>
                <td><?php echo $book['FromDate'] ?></td>
                <td><?php echo $book['ToDate'] ?></td>
                <td><?php echo $book['BranchName'] ?></td>
                <td><?php echo $book['Price'] ?>$</td>
              </tr>

            <?php } ?>

          </tbody>
        </table>
      </div>
    </main>

    
  </div>

  <script src="js/script.js"></script>
</body>

</html>