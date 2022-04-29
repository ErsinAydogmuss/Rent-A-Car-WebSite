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
        <form action="" class="login-form">
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
          <div class="container">
            <div class="col2" id="cont">
                <div class="carImage">
                    <img src="img/car1.jpg" alt="Car">
                </div>
                <div class="carText">
                    <p class="date">2012</p>
                    <h4>BMW</h4>
                    <p>5 Seats <br>  
                        Automatic <br>  
                        1 Large Bag <br>  
                        1 Small Bag <br>  
                        Unlimited Milleage <br>  
                    </p>    
                    <h4>1656$</h4>
                    <a href="car1.php">Select</a>
                </div>
            </div>
            <div class="col2" id="cont">
                <div class="carImage">
                    <img src="img/car2.jpg" alt="Car">
                </div>
                <div class="carText">
                    <p class="date">2017</p>
                    <h4>AUDI</h4>
                    <p>5 Seats <br>  
                        Automatic <br>  
                        1 Large Bag <br>  
                        1 Small Bag <br>  
                        Unlimited Milleage <br>  
                    </p>    
                    <h4>987$</h4>
                    <a href="car1.php">Select</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col2" id="cont">
                <div class="carImage">
                    <img src="img/car3.jpg" alt="Car">
                </div>
                <div class="carText">
                    <p class="date">2019</p>
                    <h4>Volkswagen</h4>
                    <p>5 Seats <br>  
                        Manual <br>  
                        1 Large Bag <br>  
                        1 Small Bag <br>  
                        150 Km <br>  
                    </p>    
                    <h4>854$</h4>
                    <a href="car1.php">Select</a>
                </div>
            </div>
            <div class="col2" id="cont">
                <div class="carImage">
                    <img src="img/car5.jpg" alt="Car">
                </div>
                <div class="carText">
                    <p class="date">2022</p>
                    <h4>Ferrari</h4>
                    <p>2 Seats <br>  
                        Automatic <br>  
                        1 Large Bag <br>  
                        1 Small Bag <br>  
                        Unlimited Milleage <br>  
                    </p>    
                    <h4>2656$</h4>
                    <a href="car1.php">Select</a>
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
