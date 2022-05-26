<?php
include 'connection/config2.php';
ob_start();
session_start();

if (isset($_SESSION['email'])) {

  $email = $_SESSION['email'];
  $location = $_GET['location'];
  $fromDate = $_GET['fromDate'];
  $toDate = $_GET['toDate'];
  $carType = $_GET['IdcarType'];

} else {
  header("Location:index.php");
}












$sql2 = $db->prepare("SELECT DISTINCT * FROM cars c 
INNER JOIN branch b ON c.IdBranch = b.IdBranch 
INNER JOIN status s ON c.IdStatus = s.IdStatus 
INNER JOIN transmission t ON c.IdTransmission = t.IdTransmission INNER JOIN fueltype ft ON c.IdFuelType = ft.IdFuelType 
INNER JOIN cartype ct ON c.IdCarType = ct.IdCarType
WHERE BranchName = '$location' 
AND c.IdStatus = '1' 
AND c.IdCarType = '$carType';
");
$sql2->execute();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="Description" content="Rent a Car" />
  <meta name="Author" content="Ersin Aydogmus" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Cars Home Page</title>

  <script src="https://kit.fontawesome.com/31a68f4fa9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
  <link rel="stylesheet" type="text/css" href="css/reset.css" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body>
  <header>
    <div class="container">
      <div class="logo">
        <a href="index.php">
          <img src="img/carIcon.jpg" alt="carIcon" />
        </a>
      </div>
      <div class="menu">
        <ul>
          <li><a href="book.php">Book</a></li>
          <li><a href="cars.php">Cars</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php
          if (isset($_SESSION['email'])) { ?>
            <li><a href="myAccount.php">
                <span class="material-icons-sharp logosa">person</span>
              </a></li>

          <?php } else { ?>
            <li><a href="#" id="login-btn">Login</a></li>
          <?php } ?>


        </ul>
      </div>
      <form action="connection/process4.php" class="login-form" method="POST">
        <h3>Login</h3>
        <?php
        if (isset($_GET['status'])) {
          if ($_GET['status'] == "error") { ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> Login failed...
            </div>
        <?php }
        } ?>
        <input type="email" name="email" placeholder="Your Email..." class="box" />
        <input type="password" name="password" placeholder="Your Password..." class="box" />
        <p>Don't have an account <a href="signUp.php">Create Now</a></p>
        <input type="submit" value="Login Now" class="btnLgn" name="login" />
      </form>
    </div>
  </header>

  <!-- Main Section -->

  <section id="bookSlider" class="slider">
    <div id="bookCaption" class="caption">
      <h1>Book</h1>
    </div>
  </section>

  <!-- CarSelect Section -->

  <section id="car" class="sectionArea">
    <div class="carTop">
      <h2 class="sectionHeader">Select Car</h2>
      <p>Filtered cars are listed. Please select a car.</p>
    </div>

    <div class="carBody">

      <?php
      $sql3 = $db->prepare("SELECT * FROM booking b WHERE b.FromDate >= '$fromDate' AND b.ToDate <= '$toDate' AND IdStatus = 1");
      $sql3->execute();

      $str = "";
      while ($thecar = $sql3->fetch(PDO::FETCH_ASSOC)) {
        $str .= $thecar['IdCar'] . " ";
      }

      while ($car = $sql2->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="container">

          <?php if ($car) {
            if (!strpos($str, $car['IdCar']) AND 
            $car['IdCarType'] ='5') 
            { ?>
              <div class="col2" id="cont">
                <div class="carImage">
                  <img src="<?php echo substr($car['CarImage'], 3) ?>" alt="Car">
                </div>
                <div class="carText">
                  <p class="date"><?php echo $car['ModelYear'] ?></p>
                  <h4><?php echo $car['CarName'] ?></h2>
                    <h3><?php echo $car['CarType'] ?></h3>
                    <h3><?php echo $car['BranchName'] ?>
                  </h4>
                  <p>
                    <?php echo $car['SeatingCapacity'] ?> Seats <br>
                    <?php echo $car['Transmission'] ?> <br>
                    <?php echo $car['FuelType'] ?> <br>
                  </p>
                  <h4><?php echo $car['PricePerDay'] ?> $ </h4>
                  <a href="payment.php?location=<?php echo $location ?>&fromDate=<?php echo $fromDate ?>&toDate=<?php echo $toDate ?>&IdCar=<?php echo $car['IdCar'] ?> " onclick="checker()">Select</a>
                </div>
              </div>
            <?php }
          }

          $car = $sql2->fetch(PDO::FETCH_ASSOC);
          if ($car) {
            if (!strpos($str, $car['IdCar']) and $car['IdStatus'] = 1 and $car['IdCarType'] = '5') { ?>
              <div class="col2" id="cont">
                <div class="carImage">
                  <img src="<?php echo substr($car['CarImage'], 3) ?>" alt="Car">
                </div>
                <div class="carText">
                  <p class="date"><?php echo $car['ModelYear'] ?></p>
                  <h4><?php echo $car['CarName'] ?></h2>
                    <h3><?php echo $car['CarType'] ?></h3>
                    <h3><?php echo $car['BranchName'] ?>
                  </h4>
                  <p>
                    <?php echo $car['SeatingCapacity'] ?> Seats <br>
                    <?php echo $car['Transmission'] ?> <br>
                    <?php echo $car['FuelType'] ?> <br>
                  </p>
                  <h4><?php echo $car['PricePerDay'] ?> $ </h4>
                  <a href="payment.php?location=<?php echo $location ?>&fromDate=<?php echo $fromDate ?>&toDate=<?php echo $toDate ?>&IdCar=<?php echo $car['IdCar'] ?>" onclick="checker()">Select</a>
                </div>
              </div>

          <?php }
          } ?>

        </div>
      <?php }  ?>
  </section>

  <!-- Footer Section -->

  <footer class="sectionArea">
    <div class="container">
      <div class="col3">
        <div class="footerItem">
          <h3>Welcome To Our Site</h3>
          <a href="index.php">
            <img src="img/carIcon2.png" alt="carIcon" />
          </a>
          <p>Thank you for choosing us</p>
        </div>
      </div>
      <div class="col3">
        <div class="footerItem">
          <h3>Quick Links</h3>
          <ul class="footerLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="cars.php">Cars</a></li>
            <li><a href="myAccount.php">My Account</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="col3">
        <div class="footerItem">
          <h3>Be Social with us</h3>
          <ul class="socialLinks">
            <li>
              <a href="#"><i class="fa-brands fa-facebook fa" class="fa"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-twitter fa" class="fa"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-linkedin fa"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="js/script.js"></script>
</body>

</html>