<?php
include 'connection/config2.php';
ob_start();
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Rent a Car">
    <meta name="Author" content="Ersin Aydogmus">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Page</title>

    <script src="https://kit.fontawesome.com/31a68f4fa9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

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

    <!-- Reservation Section -->

    <section id="reserve" class="sectionArea">
        <div class="reserveTop">
            <h2 class="sectionHeader">Book Reservation</h2>
            <p>Enter the information that you will receive the car.</p>
        </div>
        <div class="reserveBody">
            <div class="container">
                <div class="form-container">
                    <?php
                    $sqlBranch = $db->prepare("SELECT * FROM branch");
                    $sqlBranch->execute();

                    $sqlCarType = $db -> prepare("SELECT * FROM cartype");
                    $sqlCarType -> execute();
                    ?>
                    <form method="POST" action="connection/process6.php">
                        <div class="input-box">
                            <select name="branch" class="branch" required>
                                <option selected disabled>Select Branch</option>
                                <?php while ($branch = $sqlBranch->fetch(PDO::FETCH_ASSOC)) { ?>

                                    <option value="<?php echo $branch['BranchName'] ?>"><?php echo $branch['BranchName'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-box">
                            <select name="carType" class="branch" required>
                                <option selected disabled>Select Car Type</option>
                                
                                <?php while ($carType = $sqlCarType->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <?php echo $carType['CarType'] ?> 
                                    <option value="<?php echo $carType['IdCarType'] ?>"><?php echo $carType['CarType'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-box">
                            <input type="date" required min="<?php echo date("Y-m-d"); ?>" name="fromDate">
                        </div>
                        <div class="input-box">
                            <input type="date" required min="<?php echo date("Y-m-d"); ?>" name="toDate">
                        </div>
                        <button type="submit" class="btn" name="bookBtn" onclick="checker()">Submit</button>
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
                        <img src="img/carIcon2.png" alt="carIcon">
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
                        <li><a href="#"><i class="fa-brands fa-facebook fa" class="fa"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter fa" class="fa"></i></a></li>
                        <li><a href="#"><i class="fa-linkedin fa"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>