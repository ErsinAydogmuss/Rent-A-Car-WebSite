<?php
include 'connection/config2.php';
ob_start();
session_start();

$sql = $db->prepare("SELECT * FROM users WHERE Email=:email");
$sql->execute(array(
    'email' => $_SESSION['email']
));
$admin = $sql->fetch(PDO::FETCH_ASSOC);

if ($admin['Role'] == 0) {
    Header("Location:adminLogin.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Add Car</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <link rel="stylesheet" href="./css/admin.css" />
    <link rel="stylesheet" href="./css/asd.css" />
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <a href="adminHome.php">
                        <img src="./img/carIcon.jpg" alt="" />
                    </a>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sideBar">
                <a href="adminCustomer.php" class="active">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Customers</h3>
                </a>
                <a href="adminTrips.php">
                    <span class="material-icons-sharp">receipt_long</span>
                    <h3>Trips</h3>
                </a>
                <a href="adminBranch.php">
                    <span class="material-icons-sharp"> account_balance </span>
                    <h3>Branch</h3>
                </a>
                <a href="adminAddToBranch.php">
                    <span class="material-icons-sharp"> add </span>
                    <h3>Add Branch</h3>
                </a>
                <a href="adminCars.php">
                    <span class="material-icons-sharp"> time_to_leave </span>
                    <h3>Cars</h3>
                </a>
                <a href="adminAddToCar.php">
                    <span class="material-icons-sharp"> add </span>
                    <h3> Add Cars</h3>
                </a>

                <a href="adminMessages.php">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                </a>
                <a href="adminLogin.php" onclick="checker()">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <main>
            <header>Add Car Information</header>
            <?php
            $sqlTrans = $db->prepare("SELECT * FROM transmission");
            $sqlTrans->execute();
            ?>
            <form action="connection/process3.php" method="POST" enctype="multipart/form-data">
                <div class="details personal">

                    <div class="fields">
                        <div class="input-field">
                            <label>Car Image</label>
                            <input type="file" name="fileImage" required style="border:none">
                        </div>

                        <div class="input-field">
                            <label>Car Name</label>
                            <input type="text" name="carName" placeholder="Enter the Car Name">
                        </div>

                        <div class="input-field">
                            <label>Model Year</label>
                            <select name="modelYear">
                                <option selected disabled>Select Model Year</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Transmission</label>
                            <select name="transmission">
                                <option disabled selected>Select Transmission</option>
                                <?php while ($trans = $sqlTrans->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $trans['IdTransmission'] ?>"><?php echo $trans['Transmission'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Seating Capacity</label>
                            <select name="seatingCapacity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <?php
                        $sqlFuel = $db->prepare("SELECT * FROM fuelType");
                        $sqlFuel->execute();
                        ?>
                        <div class="input-field">
                            <label>Fuel Type</label>
                            <select name="fuelType">
                                <option selected disabled>Select Fuel Type</option>
                                <?php while ($fuel = $sqlFuel->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $fuel['IdFuelType'] ?>"><?php echo $fuel['FuelType'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Price Per Day</label>
                            <input name="xPrice" placeholder="Price" type="text" required>
                        </div>

                        <?php
                        $sqlType = $db->prepare("SELECT * FROM carType");
                        $sqlType->execute();
                        ?>
                        <div class="input-field">
                            <label>Car Type</label>
                            <select name="type" class="branch">
                                <option selected disabled>Select Car Type</option>
                                <?php while ($type = $sqlType->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $type['IdCarType'] ?>"><?php echo $type['CarType'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <?php
                        $sqlBranch = $db->prepare("SELECT * FROM branch");
                        $sqlBranch->execute();
                        ?>
                        <div class="input-field">
                            <label>Branch Name</label>
                            <select name="branch" class="branch">
                                <option selected disabled>Select Branch</option>
                                <?php while ($branch = $sqlBranch->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $branch['IdBranch'] ?>"><?php echo $branch['BranchName'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Status</label>
                            <select name="xStatus" required>
                                <option disabled selected>Availability Status</option>
                                <option value="1">Available</option>
                                <option value="0">In Use</option>
                            </select>
                        </div>

                    </div>
                </div>
                <button class="nextBtn" type='submit' name='addToCar' onclick="alert()">
                    Add Car
                </button>
            </form>
        </main>


    </div>


    <script src="js/script.js"></script>
</body>

</html>