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
            <form class="checkoutForm">
              <div class="box1">
                <div class="formItem">
                  <label class="formHeader">E-mail</label>
                  <input type="email" class="formField" placeholder="E-Mail" />
                </div>
                <div class="formItem">
                  <label class="formHeader">First Name</label>
                  <input type="text" class="formField" />
                </div>
                <div class="formItem">
                  <label class="formHeader">Last Name</label>
                  <input type="text" class="formField" />
                </div>
                <div class="formItem">
                  <label class="formHeader">Contact Number</label>
                  <input type="tel" class="formField" />
                </div>
                <div class="formItem">
                  <label class="formHeader">Gender</label>
                  <select class="formField">
                    <option value="disabled">Please Select</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                  </select>
                </div>
                <div class="formItem">
                  <label class="formHeader">Where do you live?</label>
                  <select class="formField">
                    <option value="disabled">Please Select</option>
                    <option value="Mr">Turkey</option>
                    <option value="Mrs">England</option>
                  </select>
                </div>
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
                    <img
                      src="https://t-ec.bstatic.com/static/img/payments/payment_icons_redesign/generic-cc.svg"
                    />
                    <input type="tel" class="formField" />
                  </div>
                </div>
                <div class="formItem">
                  <label class="formHeader">CVC</label>
                  <div class="bor">
                    <img
                      src="https://t-ec.bstatic.com/static/img/payments/payment_icons_redesign/generic-cvc.svg"
                    />
                    <input type="tel" class="formField" />
                  </div>
                </div>
                <div class="button">
                  <h2 class="price">656$</h2>
                  <button
                    type="button"
                    class="priceButton"
                    onClick="location.href='index.php'"
                  >
                    Submit
                  </button>
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