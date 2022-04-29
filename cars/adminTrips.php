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

$sql2 = $db->prepare("SELECT * FROM booking");
$sql2->execute();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Trips Page</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
    />
    <link rel="stylesheet" href="./css/admin.css" />
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
          <a href="#">
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
        <h1>Trips</h1>
        <div class="insights cust">
          <table>
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Customer LastName</th>
                <th>Car</th>
                <th>Departure Date</th>
                <th>Arrival Date</th>
                <th>Departure Point</th>
                <th>Arrival Point</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ersin</td>
                <td>Aydogmus</td>
                <td>BMW</td>
                <td>05.05.2022</td>
                <td>08.05.2022</td>
                <td>Ankara</td>
                <td>Antalya</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>Ersin</td>
                <td>Aydogmus</td>
                <td>BMW</td>
                <td>05.05.2022</td>
                <td>08.05.2022</td>
                <td>Ankara</td>
                <td>Antalya</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>Ersin</td>
                <td>Aydogmus</td>
                <td>BMW</td>
                <td>05.05.2022</td>
                <td>08.05.2022</td>
                <td>Ankara</td>
                <td>Antalya</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>Ersin</td>
                <td>Aydogmus</td>
                <td>BMW</td>
                <td>05.05.2022</td>
                <td>08.05.2022</td>
                <td>Ankara</td>
                <td>Antalya</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>Ersin</td>
                <td>Aydogmus</td>
                <td>BMW</td>
                <td>05.05.2022</td>
                <td>08.05.2022</td>
                <td>Ankara</td>
                <td>Antalya</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>Ersin</td>
                <td>Aydogmus</td>
                <td>BMW</td>
                <td>05.05.2022</td>
                <td>08.05.2022</td>
                <td>Ankara</td>
                <td>Antalya</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>Ersin</td>
                <td>Aydogmus</td>
                <td>BMW</td>
                <td>05.05.2022</td>
                <td>08.05.2022</td>
                <td>Ankara</td>
                <td>Antalya</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>Ersin</td>
                <td>Aydogmus</td>
                <td>BMW</td>
                <td>05.05.2022</td>
                <td>08.05.2022</td>
                <td>Ankara</td>
                <td>Antalya</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>

      <div class="right">
        <div class="top">
          <button id="menu-btn">
            <span class="material-icons-sharp">menu</span>
          </button>
          <div class="profile">
            <div class="info">
              <p>Hey, <b>Ersin</b></p>
              <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
              <img src="img/pic-33.png" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>