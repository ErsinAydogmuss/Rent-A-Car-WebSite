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

$sql2 = $db->prepare("SELECT * FROM branch b ");
$sql2->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Branch Page</title>
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
        <a href="adminLogin.php" onclick="checker()">
          <span class="material-icons-sharp">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>

    <main>
      <h1>Branchs</h1>
      <div class="insights cust">
        <table>
          <thead>
            <tr>
              <th>Branch Id</th>
              <th>Branch Name</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php

            while ($branch = $sql2->fetch(PDO::FETCH_ASSOC)) {

            ?>
              <tr>
                <td><?php echo $branch['IdBranch'] ?></td>
                <td><?php echo $branch['BranchName'] ?></td>
                <td>
                  <a href="connection/process12.php?IdBranch=<?php echo $branch['IdBranch']; ?>&branchDelete=ok"><button style="width: 75px;height: 50px; background: #b68e64; border-radius: 15px; cursor: pointer; color: #fff; font-size: 16px;">Delete</button></a>
                </td>
                <td>
                  <a href="adminSelectBranchTrips.php?IdBranch=<?php echo $branch['IdBranch']; ?>"><button style="width: 75px;height: 50px; background: #b68e64; border-radius: 15px; cursor: pointer; color: #fff; font-size: 16px;">View Booking</button></a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </main>

    <div class="right">
      <div class="top">
        <button id="menu-btn">
          <span class="material-icons-sharp">menu</span>
        </button>
        <div class="profile">
          <div class="info">
            <p>Hey, <b><?php echo $admin['Name'] ?></b></p>
            <small class="text-muted">Admin</small>
          </div>
        </div>
      </div>

      <div class="sales-analytics">
        <div class="item add-product">
          <a href="adminAddToBranch.php">
            <div>
              <span class="material-icons-sharp">add</span>
              <h3>Add Branch</h3>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="js/script.js"></script>
</body>

</html>