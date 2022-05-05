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

$sql2 = $db->prepare("SELECT * FROM cars");
$sql2->execute();

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
                <a href="adminCars.php">
                    <span class="material-icons-sharp"> time_to_leave </span>
                    <h3>Cars</h3>
                </a>
                <a href="adminMessages.php">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>
                <a href="index.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <main>
        <header>Update Car Information</header>

<form action="#">
    <div class="form first">
        <div class="details personal">

            <div class="fields">
                <div class="input-field">
                    <label>Car Name</label>
                    <input type="text" placeholder="Enter your name" disabled required>
                </div>

                <div class="input-field">
                    <label>Model Year</label>
                    <input type="date" placeholder="Enter birth date" required>
                </div>

                <div class="input-field">
                    <label>Email</label>
                    <input type="text" placeholder="Enter your email" required>
                </div>

                <div class="input-field">
                    <label>Mobile Number</label>
                    <input type="number" placeholder="Enter mobile number" required>
                </div>

                <div class="input-field">
                    <label>Gender</label>
                    <select required>
                        <option disabled selected>Select gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>

                <div class="input-field">
                    <label>Occupation</label>
                    <input type="text" placeholder="Enter your ccupation" required>
                </div>
            </div>
        </div>

        <div class="details ID">
            <span class="title">Identity Details</span>

            <div class="fields">
                <div class="input-field">
                    <label>ID Type</label>
                    <input type="text" placeholder="Enter ID type" required>
                </div>

                <div class="input-field">
                    <label>ID Number</label>
                    <input type="number" placeholder="Enter ID number" required>
                </div>

                <div class="input-field">
                    <label>Issued Authority</label>
                    <input type="text" placeholder="Enter issued authority" required>
                </div>

                <div class="input-field">
                    <label>Issued State</label>
                    <input type="text" placeholder="Enter issued state" required>
                </div>

                <div class="input-field">
                    <label>Issued Date</label>
                    <input type="date" placeholder="Enter your issued date" required>
                </div>

                <div class="input-field">
                    <label>Expiry Date</label>
                    <input type="date" placeholder="Enter expiry date" required>
                </div>
            </div>

            <button class="nextBtn">
                <span class="btnText">Next</span>
                <i class="uil uil-navigator"></i>
            </button>
        </div> 
    </div>

    <div class="form second">
        <div class="details address">
            <span class="title">Address Details</span>

            <div class="fields">
                <div class="input-field">
                    <label>Address Type</label>
                    <input type="text" placeholder="Permanent or Temporary" required>
                </div>

                <div class="input-field">
                    <label>Nationality</label>
                    <input type="text" placeholder="Enter nationality" required>
                </div>

                <div class="input-field">
                    <label>State</label>
                    <input type="text" placeholder="Enter your state" required>
                </div>

                <div class="input-field">
                    <label>District</label>
                    <input type="text" placeholder="Enter your district" required>
                </div>

                <div class="input-field">
                    <label>Block Number</label>
                    <input type="number" placeholder="Enter block number" required>
                </div>

                <div class="input-field">
                    <label>Ward Number</label>
                    <input type="number" placeholder="Enter ward number" required>
                </div>
            </div>
        </div>

        <div class="details family">
            <span class="title">Family Details</span>

            <div class="fields">
                <div class="input-field">
                    <label>Father Name</label>
                    <input type="text" placeholder="Enter father name" required>
                </div>

                <div class="input-field">
                    <label>Mother Name</label>
                    <input type="text" placeholder="Enter mother name" required>
                </div>

                <div class="input-field">
                    <label>Grandfather</label>
                    <input type="text" placeholder="Enter grandfther name" required>
                </div>

                <div class="input-field">
                    <label>Spouse Name</label>
                    <input type="text" placeholder="Enter spouse name" required>
                </div>

                <div class="input-field">
                    <label>Father in Law</label>
                    <input type="text" placeholder="Father in law name" required>
                </div>

                <div class="input-field">
                    <label>Mother in Law</label>
                    <input type="text" placeholder="Mother in law name" required>
                </div>
            </div>

            <div class="buttons">
                <div class="backBtn">
                    <i class="uil uil-navigator"></i>
                    <span class="btnText">Back</span>
                </div>
                
                <button class="sumbit">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div> 
    </div>
</form>
        </main>


    </div>


    <script src="js/script.js"></script>
</body>

</html>