<?php
include 'connection/config2.php';
ob_start();
session_start();

$sql = $db -> prepare("SELECT * FROM users WHERE Email=:email");
$sql -> execute(array(
  'email' => $_SESSION['email']
));
$admin = $sql -> fetch(PDO::FETCH_ASSOC);

if ($admin['Role'] == 0) {
  Header("Location:adminLogin.php");
  exit;
}

$sql2 = $db->prepare("SELECT sum(price) as Total, count(price) as Count FROM Booking");
$sql2->execute();

$sql3 = $db->prepare("SELECT count(IdCar) as CountCar FROM Cars");
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
        <a href="Connection/logout.php">
          <span class="material-icons-sharp">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>
    <main>
      <h1>Dashboard</h1>

      <div class="date">
        <input type="date" />
      </div>
      
      <?php $total = $sql2->fetch(PDO::FETCH_ASSOC) ?>
      <?php $totalCar = $sql3->fetch(PDO::FETCH_ASSOC) ?>

      <div class="insights">
        <div class="sales">
          <span class="material-icons-sharp">analytics</span>
          <div class="middle">
            <div class="left">
              <h3>Total Sales</h3>
              <h1> $ <?php echo $total['Total'] ?></h1>
            </div>
          </div>
        </div>
        <div class="expenses">
          <span class="material-icons-sharp">bar_chart</span>
          <div class="middle">
            <div class="left">
              <h3>Total Rentals</h3>
              <h1><?php echo $total['Count'] ?></h1>
            </div>
          </div>
        </div>
        <div class="income">
          <span class="material-icons-sharp">stacked_line_chart</span>
          <div class="middle">
            <div class="left">
              <h3>Total Cars</h3>
              <h1><?php echo $totalCar['CountCar'] ?></h1>
            </div>
          </div>
        </div>
      </div>
      <div class="recent-orders">
        <h2>Recent Trips</h2>
        <table>
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Product Number</th>
              <th>Payment</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>BMW</td>
              <td>123</td>
              <td>Due</td>
              <td>Pending</td>
              <td class="primary"><a href="">Details</a></td>
            </tr>
            <tr>
              <td>AUDI</td>
              <td>321</td>
              <td>Due</td>
              <td class="warning">Pending</td>
              <td class="primary"><a href="">Details</a></td>
            </tr>
            <tr>
              <td>MERCEDES</td>
              <td>213</td>
              <td>Due</td>
              <td>Pending</td>
              <td class="primary"><a href="">Details</a></td>
            </tr>
            <tr>
              <td>OPEL</td>
              <td>345</td>
              <td>Due</td>
              <td>Pending</td>
              <td class="primary"><a href="">Details</a></td>
            </tr>
            <tr>
              <td>FIAT</td>
              <td>678</td>
              <td>Due</td>
              <td>Pending</td>
              <td class="primary"><a href="">Details</a></td>
            </tr>
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
          <div class="profile-photo">
            <img src="img/pic-33.png" />
          </div>
        </div>
      </div>
      <div class="recent-updates">
        <h2>Recent Updates</h2>
        <div class="updates">
          <div class="update">
            <div class="profile-photo">
              <img src="img/pic-22.png" />
            </div>
            <div class="message">
              <p><b>Agatha Doe</b> Very well..</p>
              <small class="text-muted">2 Minutes Ago</small>
            </div>
          </div>
          <div class="update">
            <div class="profile-photo">
              <img src="img/pic-44.png" />
            </div>
            <div class="message">
              <p><b>Amy Soe</b> Very well..</p>
              <small class="text-muted">2 Minutes Ago</small>
            </div>
          </div>
          <div class="update">
            <div class="profile-photo">
              <img src="img/profil22.jpg" />
            </div>
            <div class="message">
              <p><b>Carmen Joe</b> Very well..</p>
              <small class="text-muted">2 Minutes Ago</small>
            </div>
          </div>
        </div>
      </div>
      <div class="sales-analytics">
        <h2>Sales Analytics</h2>
        <div class="item online">
          <div class="icon">
            <span class="material-icons-sharp">shopping_cart</span>
          </div>
          <div class="right">
            <div class="info">
              <h3>Online Orders</h3>
              <small class="text-muted">Last 24 Hours</small>
            </div>
            <h5 class="success">+39%</h5>
            <h3>3849</h3>
          </div>
        </div>
        <div class="item offline">
          <div class="icon">
            <span class="material-icons-sharp">local_mall</span>
          </div>
          <div class="right">
            <div class="info">
              <h3>Offline Orders</h3>
              <small class="text-muted">Last 24 Hours</small>
            </div>
            <h5 class="danger">-17%</h5>
            <h3>1100</h3>
          </div>
        </div>
        <div class="item customers">
          <div class="icon">
            <span class="material-icons-sharp">person</span>
          </div>
          <div class="right">
            <div class="info">
              <h3>New Customers</h3>
              <small class="text-muted">Last 24 Hours</small>
            </div>
            <h5 class="success">+25%</h5>
            <h3>849</h3>
          </div>
        </div>
        <a href="">
          <div class="item add-product">
            <div>
              <span class="material-icons-sharp">add</span>
              <h3>Add Car</h3>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>