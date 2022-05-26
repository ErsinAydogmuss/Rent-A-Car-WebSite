<?php
include 'connection/config2.php';
ob_start();
session_start();
$email = $_SESSION['email'];

$sql = $db->prepare("SELECT * FROM users WHERE Email=:email");
$sql->execute(array(
    'email' => $_SESSION['email']
));
$isUser = $sql->fetch(PDO::FETCH_ASSOC);

if ($sql->rowCount() == 0) {
    Header("Location:index.php");
    exit;
}

$sql2 = $db->prepare("SELECT * FROM booking b, users u, cars c, branch br, status s WHERE 
u.Email = '$email' AND 
b.IdCar = c.IdCar AND
b.IdBranch = br.IdBranch AND
b.IdStatus = s.IdStatus");
$sql2->execute();

$sql = $db->prepare("SELECT * FROM users u, gender g WHERE Email = '$email' AND u.IdGender = g.IdGender");
$sql->execute();

$user = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <link rel="stylesheet" href="./css/admin.css" />
    <link rel="stylesheet" href="./css/asd.css" />
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <a href="index.php">
                        <img src="./img/carIcon.jpg" alt="" />
                    </a>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sideBar">
                <a href="editProfile.php">
                    <span class="material-icons-sharp">edit</span>
                    <h3>Edit Profile</h3>
                </a>
                <a href="myAccount.php">
                    <span class="material-icons-sharp">content_paste</span>
                    <h3>My Past Trips</h3>
                </a>

                <a href="changePassword.php">
                    <span class="material-icons-sharp">lock</span>
                    <h3>Change Password</h3>
                </a>

                <a href="connection/logout2.php" onclick="checker()">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <main>
            <header>Edit Personal Information</header>

            <form action="connection/process14.php" method="POST">
                <div class="details personal">

                    <div class="fields">

                        <div class="input-field">
                            <label>Name</label>
                            <input type="text" name="custName" value="<?php echo $user['Name'] ?>">
                        </div>

                        <div class="input-field">
                            <label>Lastname</label>
                            <input type="text" name="lastName" value="<?php echo $user['LastName'] ?>">
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender">
                                <option disabled selected value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="eMail" value="<?php echo $user['Email'] ?>">
                        </div>

                        <div class="input-field">
                            <label>Phone Number</label>
                            <input type="tel" name="phoneNumber" value="<?php echo $user['PhoneNumber'] ?>">
                        </div>

                        <div class="input-field">
                            <label>Birth Date</label>
                            <input name="birthDate" type="text" disabled value="<?php echo $user['BirthDate'] ?>" required>
                        </div>

                    </div>
                </div>
                <button class="nextBtn" type='submit' name='editBtn' onclick="checker()">
                    Update
                </button>
            </form>
        </main>


    </div>

    <script src="js/script.js"></script>
</body>

</html>