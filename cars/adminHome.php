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

$sql2 = $db->prepare("SELECT sum(price) as Total, count(price) as Count FROM Booking");
$sql2->execute();

$sql3 = $db->prepare("SELECT count(IdCar) as CountCar FROM Cars");
$sql3->execute();

$sql4 = $db->prepare("SELECT count(IdUser) AS CountUser FROM users WHERE Role = 0");
$sql4->execute();

$sql5 = $db->prepare("SELECT IdBooking, u.IdUser, Name, LastName, c.IdCar, CarName, ModelYear, FromDate, ToDate, PickUpLocation, datediff(ToDate, FromDate)*c.PricePerDay as Price, Message, BookRate, CarStatus, BookStatus
FROM booking b INNER JOIN cars c 
ON b.IdCar = c.IdCar 
INNER JOIN users u 
ON u.IdUser = b.IdUser 
INNER JOIN review r 
ON r.IdReview = b.IdReview");
$sql5->execute();

$sql6 = $db->prepare("SELECT * FROM booking b INNER JOIN users u ON b.IdUser = u.IdUser INNER JOIN review r ON b.IdReview = r.IdReview");
$sql6->execute();

$sql7 = $db->prepare("SELECT count(IdUser) as CountAdmin FROM Users WHERE Role = 1");
$sql7->execute();

$sql8 = $db->prepare("SELECT AVG(CarRate) as Rate FROM Cars");
$sql8->execute();


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

      <?php 
      $total = $sql2->fetch(PDO::FETCH_ASSOC);
      $totalCar = $sql3->fetch(PDO::FETCH_ASSOC);
      $totalUser = $sql4->fetch(PDO::FETCH_ASSOC);
      $totalAdmin = $sql7->fetch(PDO::FETCH_ASSOC);
      $AvgRate = $sql8->fetch(PDO::FETCH_ASSOC);
      ?>

      <div class="insights">

        <div class="sales">
          <span class="material-icons-sharp">attach_money</span>
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
          <span class="material-icons-sharp">car_rental</span>
          <div class="middle">
            <div class="left">
              <h3>Total Cars</h3>
              <h1><?php echo $totalCar['CountCar'] ?></h1>
            </div>
          </div>
        </div>
        <div class="income">
          <span class="material-icons-sharp">person</span>
          <div class="middle">
            <div class="left">
              <h3>Total Customers</h3>
              <h1><?php echo $totalUser['CountUser'] ?></h1>
            </div>
          </div>
        </div>
        <div class="sales">
          <span class="material-icons-sharp">admin_panel_settings</span>
          <div class="middle">
            <div class="left">
              <h3>Total Admin</h3>
              <h1><?php echo $totalAdmin['CountAdmin'] ?></h1>
            </div>
          </div>
        </div>
        <div class="sales">
          <span class="material-icons-sharp">star</span>
          <div class="middle">
            <div class="left">
              <h3>Car Average Rating</h3>
              <h1><?php echo $AvgRate['Rate'] ?></h1>
            </div>
          </div>
        </div>
      </div>






      <div class="recent-orders">
        <h2>Recent Rentals</h2>
        <table>
          <thead>
            <tr>
              <th>Book Id</th>
              <th>Customer Name</th>
              <th>Customer Surname</th>
              <th>Car Name</th>
              <th>Car Model Year</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>Pick Up Location</th>
              <th>Price</th>
              <th>Book Rate</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

            <?php
            for ($i = 0; $i < 10; $i++) {
              $book = $sql5->fetch(PDO::FETCH_ASSOC);
              if ($book) {
            ?>
                <tr>
                  <td><?php echo $book['IdBooking'] ?></td>
                  <td><?php echo $book['Name'] ?></td>
                  <td><?php echo $book['LastName'] ?></td>
                  <td><?php echo $book['CarName'] ?></td>
                  <td><?php echo $book['ModelYear'] ?></td>
                  <td><?php echo $book['FromDate'] ?></td>
                  <td><?php echo $book['ToDate'] ?></td>
                  <td><?php echo $book['PickUpLocation'] ?></td>
                  <td><?php echo $book['Price'] ?></td>
                  <td><?php echo $book['BookRate'] ?></td>
                  <td><?php echo $book['BookStatus'] ?></td>
                </tr>
            <?php }
            } ?>
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
      <div class="recent-updates">
        <h2>Recent Reviews</h2>
        <div class="updates">

          <?php for($i = 0; $i<20; $i++){ 
            $review = $sql6->fetch(PDO::FETCH_ASSOC);
            if($review){
          ?>

          <div class="update">
            <div class="profile-photo">
              <img src="<?php echo $review['UserImage'] ?>" alt="">
            </div>
            <div class="message">
              <p><b><?php echo $review['Name']." ".$review['LastName']." : ";
              ?>
              </b> <?php echo $review['Message']?></p>
            </div>
          </div>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>