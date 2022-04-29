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
                    <form>
                        <div class="input-box">
                            <input type="search" placeholder="Pick Up Location" required>
                        </div>
                        <div class="input-box">
                            <input type="date">
                        </div>
                        <div class="input-box">
                            <input type="date">
                        </div>
                        <button type="button" class="btn" onClick="location.href='car.php'">Submit</button>
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