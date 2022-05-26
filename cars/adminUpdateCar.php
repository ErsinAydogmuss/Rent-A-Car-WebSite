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

$sql2 = $db->prepare("SELECT * FROM cars c, transmission t, fueltype ft, branch b, status s WHERE
c.IdTransmission = t.IdTransmission AND
c.IdFuelType = ft.IdFuelType AND
c.IdBranch = b.IdBranch AND
c.IdStatus = s.IdStatus AND
c.IdCar=:id");
$sql2->execute(array(
    'id' => $_GET['IdCar']
));

$theCar = $sql2->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Cars Page</title>
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
            <header>Update Car Information</header>

            <form action="connection/process2.php?IdCar=<?php echo $theCar['IdCar']; ?>" method="POST">
                <div class="details personal">

                    <img src="<?php echo $theCar['CarImage'] ?>" alt="">

                    <div class="fields">
                        <div class="input-field">
                            <label>Car Name</label>
                            <input type="text" name="carName" value="<?php echo $theCar['CarName'] ?>" disabled>
                        </div>

                        <div class="input-field">
                            <label>Model Year</label>
                            <input type="text" name="modelYear" value="<?php echo $theCar['ModelYear'] ?>" disabled>
                        </div>

                        <div class="input-field">
                            <label>Creation Date</label>
                            <input type="text" name="creationDate" value="<?php echo $theCar['CreationDate'] ?>" disabled>
                        </div>

                        <div class="input-field">
                            <label>Transmission</label>
                            <input type="text" name="transmission" value="<?php echo $theCar['Transmission'] ?>" disabled>
                        </div>

                        <div class="input-field">
                            <label>Seating Capacity</label>
                            <input type="text" name="seatingCapacity" value="<?php echo $theCar['SeatingCapacity'] ?>" disabled>
                        </div>

                        <div class="input-field">
                            <label>Fuel Type</label>
                            <input type="text" name="fuelType" value="<?php echo $theCar['FuelType'] ?>" disabled>
                        </div>
                        <?php
                        $sqlBranch = $db->prepare("SELECT * FROM branch");
                        $sqlBranch->execute();
                        ?>
                        <div class="input-field">
                            <select name="branch" required class="branch">
                                <option selected disabled>Select Branch</option>
                                <?php while ($branch = $sqlBranch->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $branch['IdBranch'] ?>"><?php echo $branch['BranchName'] ?></option>
                                <?php } ?>
                            </select>
                        </div>



                        <div class="input-field">
                            <label>Price Per Day</label>
                            <input name="xPrice" type="text" value="<?php echo $theCar['PricePerDay'] ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Status</label>
                            <select name="xStatus" required>
                                <option disabled selected>Availability Status</option>
                                <option value="1" <?php echo $theCar['Status'] == '1' ? 'selected=""' : '' ?>>Active</option>
                                <option value="0" <?php echo $theCar['Status'] == '0' ? 'selected=""' : '' ?>>Passive</option>
                            </select>

                        </div>
                    </div>
                </div>
                <button class="nextBtn" type='submit' name='editButton' onclick="alert()">
                    Update
                </button>
            </form>
        </main>
    </div>
    <script src="js/script.js"></script>
</body>

</html>