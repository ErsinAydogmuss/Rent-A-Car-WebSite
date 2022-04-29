<?php
include 'connection/config2.php';
ob_start();
session_start();

$sql = $db->prepare("SELECT * FROM users WHERE Email=:email");
$sql->execute(array(
    'email' => $_SESSION['email']
));
$admin = $sql->fetch(PDO::FETCH_ASSOC);

if (!$admin['Role'] == 1) {
    Header("Location:index.php");
    exit;
}

$sql2 = $db->prepare("SELECT * FROM cars");
$sql2->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Rent a Car">
    <meta name="Author" content="Ersin Aydogmus">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cars Page</title>

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

    <section id="carsSlider" class="slider">
        <div id="carsCaption" class="caption">
            <h1>CARS</h1>
            <p>Cheapest prices and High performance</p>
        </div>
    </section>

    <!-- Inspect Section -->

    <section id="inspect" class="sectionArea">
        <div class="inspectTop">
            <h2 class="sectionHeader">Inspect Cars</h2>
        </div>
        <div class="inspectBody">
            <?php
            while ($car = $sql2->fetch(PDO::FETCH_ASSOC)) {
            ?>
                
                <div class="container">

                    <div class="col2" id="cont">
                        <div class="inspectImage">
                            <img src="img/car1.jpg" alt="Car">
                        </div>
                        <div class="inspectText">
                            <p class="date"><?php echo $car['ModelYear'] ?></p>
                            <h4><?php echo $car['CarName'] ?></h4>
                            <p>
                                <?php echo $car['SeatingCapacity'] ?> <br>
                                <?php echo $car['Transmission'] ?> Seats <br>
                            </p>
                            <h4><?php echo $car['PricePerDay'] ?> $ </h4>
                            <a href="car.php">View Details</a>
                        </div>
                    </div>

                    <div class="col2" id="cont">
                        <div class="inspectImage">
                            <img src="img/car1.jpg" alt="Car">
                        </div>
                        <div class="inspectText">
                            <p class="date"><?php echo $car['ModelYear'] ?></p>
                            <h4><?php echo $car['CarName'] ?></h4>
                            <p>
                                <?php echo $car['SeatingCapacity'] ?> <br>
                                <?php echo $car['Transmission'] ?> Seats <br>
                            </p>
                            <h4><?php echo $car['PricePerDay'] ?> $ </h4>
                            <a href="car.php">View Details</a>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </section>

    <!-- Premium Section -->

    <section id="projectX" class="sectionArea">
        <div class="projectXTop">
            <h2 class="sectionHeader">Premium Cars</h2>
        </div>
        <div class="projectXBody">
            <div class="containerFluid">
                <div class="captionPX">
                    <div class="col2">
                        <div class="projectXInfo">
                            <h4 class="projectXTitle">Premium Tesla</h4>
                            <p class="projectXText">
                                Built for Safety
                                Safety is the most important part of every Tesla. We design our vehicles to exceed safety standards.
                                <br>
                                5-Star Rating
                                Model 3 achieved NHTSA 5-star safety ratings in every category and subcategory.
                                <br>
                                Top Safety Pick+
                                Model 3 received the IIHS Top Safety Pick+ award, with top ratings in all crashworthiness and front crash prevention categories.
                            </p>
                            <button type="button" class="projectXBTN">Learn More</button>
                        </div>
                    </div>
                    <div class="col2">
                        <div class="projectXHighlight">
                            <ul class="projectXDetail">
                                <li>Model 3 Tesla</li>
                                <li>2022</li>
                                <li>Model</li>
                                <li>Just Premium Customer</li>
                            </ul>
                        </div>
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