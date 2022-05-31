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

$IdBooking = $_GET['IdBooking'];

$sql2 = $db->prepare("SELECT * FROM booking b, users u, cars c, branch br, status s WHERE 
b.IdUser = u.IdUser AND 
b.IdCar = c.IdCar AND
b.IdBranch = br.IdBranch AND
b.IdStatus = s.IdStatus AND
b.IdBooking = $IdBooking");
$sql2->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel</title>
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
        <a href="adminBranch.php">
          <span class="material-icons-sharp"> account_balance </span>
          <h3>Branch</h3>
        </a>
        <a href="adminAddToBranch.php">
          <span class="material-icons-sharp"> add </span>
          <h3>Add Branch</h3>
        </a>
        <a href="adminCars.php">
          <span class="material-icons-sharp"> time_to_leave </span>
          <h3>Cars</h3>
        </a>
        <a href="adminAddToCar.php">
          <span class="material-icons-sharp"> add </span>
          <h3> Add Cars</h3>
        </a>

        <a href="adminMessages.php">
          <span class="material-icons-sharp">mail_outline</span>
          <h3>Messages</h3>
        </a>
        <a href="adminSelectCustomer.php">
          <span class="material-icons-sharp">check_box_outline_blank</span>
          <h3>Select Customer</h3>
        </a>
        <a href="adminLogin.php" onclick="checker()">
          <span class="material-icons-sharp">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>
    
    <main>
      <h1>Trips</h1>
      <div class="insights cust">
        <table>
          <thead>
            <tr>
              <th>Book Id</th>
              <th>Customer Id</th>
              <th>Customer Name</th>
              <th>Customer Surname</th>
              <th>Car Id</th>
              <th>Car Name</th>
              <th>Car Model Year</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>Branch</th>
              <th>Price</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php

            while ($book = $sql2->fetch(PDO::FETCH_ASSOC)) {

            ?>

              <tr>
                <td><?php echo $book['IdBooking'] ?></td>
                <td><?php echo $book['IdUser'] ?></td>
                <td><?php echo $book['Name'] ?></td>
                <td><?php echo $book['LastName'] ?></td>
                <td><?php echo $book['IdCar'] ?></td>
                <td><?php echo $book['CarName'] ?></td>
                <td><?php echo $book['ModelYear'] ?></td>
                <td><?php echo $book['FromDate'] ?></td>
                <td><?php echo $book['ToDate'] ?></td>
                <td><?php echo $book['BranchName'] ?></td>
                <td><?php echo $book['Price'] ?>$</td>
                <td><?php echo $book['Status'] ?></td>
                <td class="but">
                  <a href="connection/process13.php?IdBooking=<?php echo $book['IdBooking']; ?>&finishRental=ok"><button style="width: 75px;height: 50px; background: #b68e64; border-radius: 15px; cursor: pointer; color: #fff; font-size: 16px;" onclick="checker()">Finish Rental</button></a>
                </td>
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