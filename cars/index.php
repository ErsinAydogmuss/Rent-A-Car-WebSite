<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="Description" content="Rent a Car" />
    <meta name="Author" content="Ersin Aydogmus" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Cars Home Page</title>

    <script
      src="https://kit.fontawesome.com/31a68f4fa9.js"
      crossorigin="anonymous"
    ></script>
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
            <li><a href="#" id="login-btn">Login</a></li>
          </ul>
        </div>
        <form action="islem.php" class="login-form">
          <h3>Login</h3>
          <input type="email" placeholder="Your Email..." class="box" />
          <input type="password" placeholder="Your Password..." class="box" />
          <p>Forget your password? <a href="#">Click Here</a></p>
          <p>Don't have an account <a href="signUp.php">Create Now</a></p>
          <input type="submit" value="Login Now" class="btnLgn" />
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

    <!-- Feature Section -->

    <section id="features" class="sectionArea">
      <div class="featuresTop">
        <h2 class="sectionHeader">Featured Cars</h2>
      </div>
      <div class="featuresBody">
        <div class="container">
          <div class="col3">
            <div class="item">
              <div class="zoom">
                <img src="img/car1.jpg" alt="car" />
              </div>
              <div class="itemText">
                <h3>BMW</h3>
                <p>
                  5 Seats<br />Automatic<br />1 Large Bag<br />1 Small Bag<br />Unlimited
                  Milleage<br />656$
                </p>
                <a href="#" class="btnDetails">View Details</a>
              </div>
            </div>
          </div>
          <div class="col3">
            <div class="item">
              <div class="zoom">
                <img src="img/car2.jpg" alt="car" />
              </div>
              <div class="itemText">
                <h3>AUDI</h3>
                <p>
                  5 Seats<br />Automatic<br />1 Large Bag<br />1 Small Bag<br />Unlimited
                  Milleage<br />656$
                </p>
                <a href="#" class="btnDetails">View Details</a>
              </div>
            </div>
          </div>
          <div class="col3">
            <div class="item">
              <div class="zoom">
                <img src="img/car3.jpg" alt="car" />
              </div>
              <div class="itemText">
                <h3>MERCEDES</h3>
                <p>
                  5 Seats<br />Automatic<br />1 Large Bag<br />1 Small Bag<br />Unlimited
                  Milleage<br />656$
                </p>
                <a href="#" class="btnDetails">View Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Parallax Section -->

    <section id="parallax" class="sectionArea">
      <div class="parallaxTop">
        <h2 class="sectionHeader">Welcome To Car</h2>
        <p>The car is waiting for you...</p>
      </div>
    </section>

    <!-- Review Section -->

    <section class="review" id="review">
      <div class="reviewTop">
        <h2 class="sectionHeader">Reviews</h2>
      </div>
      <div class="reviewBody">
        <div class="container">
          <div class="col3">
            <img src="img/profil1.jpg" alt="" />
            <hr />
            <h3>Agatha Doe</h3>
            <p>
              Lorem ipsum dolor sit, amet consectur adipisicin elit Unde sunt
              fugiat dolore ipsum id est maxime ad tempore quasi tenetur
            </p>
            <br>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <div class="col3">
            <img src="img/profil2.jpg" alt="" />
            <hr />
            <h3>Amy Soe</h3>
            <p>
              Lorem ipsum dolor sit, amet consectur adipisicin elit Unde sunt
              fugiat dolore ipsum id est maxime ad tempore quasi tenetur
            </p>
            <br>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <div class="col3">
            <img src="img/profil3.jpg" alt="" />
            <hr />
            <h3>Carmen Joe</h3>
            <p>
              Lorem ipsum dolor sit, amet consectur adipisicin elit Unde sunt
              fugiat dolore ipsum id est maxime ad tempore quasi tenetur
            </p>
            <br>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
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
                <a href="#"
                  ><i class="fa-brands fa-facebook fa" class="fa"></i
                ></a>
              </li>
              <li>
                <a href="#"
                  ><i class="fa-brands fa-twitter fa" class="fa"></i
                ></a>
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
