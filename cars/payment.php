<?php
include 'connection/config2.php';
ob_start();
session_start();
$email = $_SESSION['email'];
$location = $_GET['location'];
$fromDate = $_GET['fromDate'];
$toDate = $_GET['toDate'];
$IdCar = $_GET['IdCar'];

$date_expire = '2020-06-06';

$fromDate = new DateTime($fromDate);
$toDate = new DateTime($toDate);
$dateDiff =  $toDate->diff($fromDate)->format("%d");

$sql = $db->prepare("SELECT * FROM cars c, fueltype ft, transmission t, branch b WHERE IdCar = $IdCar AND c.IdTransmission = t.IdTransmission AND c.IdFuelType = ft.IdFuelType AND b.IdBranch = c.IdBranch");
$sql->execute();
$theCar = $sql->fetch(PDO::FETCH_ASSOC);

$buy = $dateDiff * $theCar['PricePerDay'];
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
          if(isset($_SESSION['email'])){?>
            <a href="myAccount.php">
            <span class="material-icons-sharp logosa">person</span>
            </a>
          <?php } else {?>
            <li><a href="#" id="login-btn">Login</a></li>
            <?php }?>
            
        
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
      <p>Rezervasyon yap</p>
    </div>
  </section>

  <!-- Checkout Section -->

  <section id="checkout" class="sectionArea">
    <div class="checkoutTop">
      <h2 class="sectionHeader">Main Driver's Details</h2>
      <p>As they appear on driving licence</p>
    </div>
    <div class="checkoutBody">
      <div class="container">
        <div class="wrapper">
          <form class="checkoutForm" method="POST" action="connection/process8.php?location=<?php echo $location ?>&fromDate=<?php echo $_GET['fromDate'] ?>&toDate=<?php echo $_GET['toDate'] ?>&IdCar=<?php echo $IdCar ?>">
            <div class="fields">
              <div class="formItem">
                <img src="<?php echo $theCar['CarImage'] ?>" alt="">
                <label class="formHeader">Car Name</label>
                <input type="text" class="formField" name="carName" value="<?php echo $theCar['CarName'] ?>" disabled>
              </div>

              <div class="formItem">
                <label class="formHeader">Model Year</label>
                <input type="text" class="formField" name="modelYear" value="<?php echo $theCar['ModelYear'] ?>" disabled>
              </div>

              <div class="formItem">
                <label class="formHeader">Transmission</label>
                <input type="text" class="formField" name="transmission" value="<?php echo $theCar['Transmission'] ?>" disabled>
              </div>

              <div class="formItem">
                <label class="formHeader">Seating Capacity</label>
                <input type="text" class="formField" name="seatingCapacity" value="<?php echo $theCar['SeatingCapacity'] ?>" disabled>
              </div>

              <div class="formItem">
                <label class="formHeader">Fuel Type</label>
                <input type="text" class="formField" name="fuelType" value="<?php echo $theCar['FuelType'] ?>" disabled>
              </div>

              <div class="formItem">
                <label class="formHeader">From Date</label>
                <input type="text" class="formField" name="fuelType" value="<?php echo $_GET['fromDate'] ?>" disabled>
              </div>

              <div class="formItem">
                <label class="formHeader">To Date</label>
                <input type="text" class="formField" name="fuelType" value="<?php echo $_GET['toDate'] ?>" disabled>
              </div>

              <div class="formItem">
                <label class="formHeader">Price Per Day</label>
                <input name="xPrice" class="formField" type="text" value="$ <?php echo $theCar['PricePerDay'] ?>" disabled required>
              </div>

              <div class="formItem">
                <label class="formHeader">Total Price</label>
                <input name="totPrice" class="formField" id="kalin" type="text" value="$ <?php echo $buy ?>" $ disabled>
              <?php $_SESSION['totalPrice'] = $buy; ?>
              </div>
              <div class="box1">
                <label>How would you like to pay?</label>
                <div class="icons">
                  <i class="fa-brands fa-cc-visa"></i>
                  <i class="fa-brands fa-cc-mastercard"></i>
                  <i class="fa-brands fa-cc-amex"></i>
                </div>
                <div class="formItem">
                  <label class="formHeader">Cardholder's name</label>
                  <input type="text" class="formField" />
                </div>
                <div class="formItem">
                  <label class="formHeader">Card Number</label>
                  <div class="bor">
                    <img src="https://t-ec.bstatic.com/static/img/payments/payment_icons_redesign/generic-cc.svg" />
                    <input type="tel" class="formField" />
                  </div>
                </div>
                <div class="formItem">
                  <label class="formHeader">CVC</label>
                  <div class="bor">
                    <img src="https://t-ec.bstatic.com/static/img/payments/payment_icons_redesign/generic-cvc.svg" />
                    <input type="tel" class="formField" />
                  </div>
                </div>
                <div class="button">
                  <button type="submit" class="priceButton" name="paymentBut" onclick="checker()">
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
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