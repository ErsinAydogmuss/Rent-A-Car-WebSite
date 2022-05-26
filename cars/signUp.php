<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="Description" content="Rent a Car" />
  <meta name="Author" content="Ersin Aydogmus" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Sign Up Page</title>

  <script src="https://kit.fontawesome.com/31a68f4fa9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/reset.css" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
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

  <section id="mainSlider" class="slider">
    <div id="mainCaption" class="caption">
      <h1>RENT A RIDE</h1>
      <p>Cheapest prices and High performance</p>
    </div>
  </section>

  <section id="features" class="sectionArea">
    <div class="featuresTop">
      <h2 class="sectionHeader">Sign Up</h2>
      <p>Please fill in the required information and register.</p>
    </div>
    
    
    
    <div class="featuresBody">
      <div class="wrapper">
        <div class="title">
          Registration Form
        </div>


        <?php 
          if (isset($_GET['status']) AND $_GET['status']=="dontMatch") {?>
          <div class="alert alert-danger">
					  <strong>Error!</strong> The passwords you entered do not match.
				  </div>
				<?php } elseif (isset($_GET['status']) AND $_GET['status']=="shortPassword") {?>
          <div class="alert alert-danger">
					  <strong>Error!</strong> Your password must be at least 6 characters long.
				  </div>
				<?php } elseif (isset($_GET['status']) AND $_GET['status']=="duplicate") {?>
          <div class="alert alert-danger">
					  <strong>Error!</strong> This user has already been registered.
				  </div>
				<?php } elseif (isset($_GET['status']) AND $_GET['status']=="failed") {?>
          <div class="alert alert-danger">
					  <strong>Error!</strong> Registration Failed Consult the System Administrator.
				  </div>
        <?php } ?>
 

        <div class="form">
          <form action="connection/process5.php" method="POST">
            <div class="inputfield">
              <label>First Name</label>
              <input type="text" name="fName" class="input">
            </div>
            <div class="inputfield">
              <label>Last Name</label>
              <input type="text" name="lName" class="input">
            </div>
            <div class="inputfield">
              <label>Id Number</label>
              <input type="text" name="IdNumber" class="input">
            </div>
            <div class="inputfield">
              <label>Password</label>
              <input type="password" name="password" class="input">
            </div>
            <div class="inputfield">
              <label>Confirm Password</label>
              <input type="password" name="cPassword" class="input">
            </div>
            <div class="inputfield">
              <label>Gender</label>
              <div class="custom_select">
                <select name="gender">
                  <option disabled value="">Select</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
            </div>
            <div class="inputfield">
              <label>Email Address</label>
              <input type="email" name="email" class="input">
            </div>
            <div class="inputfield">
              <label>Phone Number</label>
              <input type="text" name="phoneNumber" class="input">
            </div>
            <div class="inputfield terms">
              <label class="check">
                <input type="checkbox" required>
                <span class="checkmark"></span>
              </label>
              <p>Agreed to terms and conditions</p>
            </div>
            <div class="inputfield">
              <button type="submit" class="btn" name="register">Register</button>
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