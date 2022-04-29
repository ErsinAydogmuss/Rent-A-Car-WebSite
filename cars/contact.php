<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Rent a Car">
    <meta name="Author" content="Ersin Aydogmus">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Page</title>

    <script src="https://kit.fontawesome.com/31a68f4fa9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <img src="img/carIcon.jpg" alt="carIcon">
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
                <input type="email" placeholder="Your Email..." class="box">
                <input type="password" placeholder="Your Password..." class="box">
                <p>Forget your password? <a href="#">Click Here</a></p>
                <p>Don't have an account <a href="signUp.php">Create Now</a></p>
                <input type="submit" value="Login Now" class="btnLgn">
            </form>
        </div>
    </header>

    <!-- Main Section -->

    <section id="contactSlider" class="slider">
        <div id="contactCaption" class="caption">
            <h1>Contact</h1>
        </div>
    </section>
    
    <!-- Form Section -->

    <section id="contact" class="sectionArea">
        <div class="contactTop">
            <h2 class="sectionHeader">Contact Us</h2>
            <p>Let us know about our mistakes or omissions...</p>
            <br>
        </div>
        <div class="contactBody">
            <div class="container">
                <div class="wrapper">
                    <form class="contactForm">
                        <div class="formItem">
                            <span class="formShape">
                                <i class="fa fa-user fa-2x"></i>
                            </span>
                            <input class="formField" type="text" placeholder="Full Name" required>
                        </div>
                        <div class="formItem">
                            <span class="formShape">
                                <i class="fa fa-envelope fa-2x"></i>
                            </span>
                            <input class="formField" type="email" placeholder="E-mail" required>
                        </div>
                        <div class="formItem">
                            <span class="formShape">
                                <i class="fa fa-mobile-phone fa-2x"></i>
                            </span>
                            <input class="formField" type="text" placeholder="Phone Number" required>
                        </div>
                        <div class="formItem">
                            <span class="formShape">
                                <i class="fa fa-info fa-2x"></i>
                            </span>
                            <input class="formField" type="text" placeholder="Subject" required>
                        </div>
                        <div class="formItem">
                            <span class="formShape">
                                <i class="fa fa-comment fa-2x"></i>
                            </span>
                            <textarea class="formField" placeholder="Message" rows="8"></textarea>
                        </div>
                        <div class="formItem">
                            <input class="formBtn" type="submit" value="Submit">
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
                        <li><a href="#"><i class="fa-linkedin fa" ></i></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>