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
                <a href="adminCars.php">
                    <span class="material-icons-sharp"> time_to_leave </span>
                    <h3>Cars</h3>
                </a>
                <a href="adminMessages.php">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                </a>
                <a href="index.php">
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
            <form action="connection/process10.php" method="POST" enctype="multipart/form-data">
                <div class="details personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Branch Name</label>
                            <input type="text" name="branchName" placeholder="Enter the Branch Name">
                        </div>
                    </div>
                </div>
                <button class="nextBtn" type='submit' name='addToBranch' onclick="alert()">
                    Add Branch
                </button>
            </form>
        </main>


    </div>


    <script src="js/script.js"></script>
</body>

</html>