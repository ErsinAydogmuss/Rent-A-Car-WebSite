<?php
include 'connection/config2.php';
ob_start();
session_start();

$sql2 = $db->prepare("SELECT c.IdCar, COUNT(c.IdCar), c.CarName, c.IdFuelType, c.ModelYear, c.PricePerDay, c.SeatingCapacity, c.IdTransmission, c.CarImage, t.Transmission, f.FuelType
FROM booking b INNER JOIN cars c 
ON b.IdCar = c.IdCar INNER JOIN fuelType f 
ON c.IdFuelType = f.IdFuelType INNER JOIN transmission t 
ON c.IdTransmission = t.IdTransmission 

GROUP BY c.IdCar order by COUNT(c.IdCar) DESC");
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

  <section id="mainSlider" class="slider">
    <div id="mainCaption" class="caption">
      <h1>RENT A RIDE</h1>
      <p>Cheapest prices and High performance</p>
    </div>
  </section>

  <!-- Parallax Section -->

  <section id="parallax" class="sectionArea">
    <div class="parallaxTop">
      <h2 class="sectionHeader">Welcome To Car</h2>
      <p>The car is waiting for you...</p>
    </div>
  </section>

  <!-- Feature Section -->

  <section id="features" class="sectionArea">
    <div class="featuresTop">
      <h2 class="sectionHeader">Featured Cars</h2>
    </div>
    <div class="featuresBody">
      <div class="container">

        <?php
        for ($i = 0; $i < 3; $i++) {
          $car = $sql2->fetch(PDO::FETCH_ASSOC);
          if ($car) {
        ?>

            <div class="col3">
              <div class="item">
                <div class="zoom">
                  <img src="img/<?php echo $car['CarImage'] ?>" alt="" />
                </div>
                <div class="itemText">
                  <h3><?php echo $car['CarName'] ?></h3>
                  <p>
                    <?php echo $car['ModelYear'] ?> Model<br /><?php echo $car['SeatingCapacity'] ?> Capacity<br /><?php echo $car['Transmission'] ?> <br /><?php echo $car['FuelType'] ?><br /><?php echo $car['PricePerDay'] ?> $
                    $<br />
                  </p>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
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