<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Cars Page</title>
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
        <h1>Cars</h1>
        <div class="insights cust">
          <table>
            <thead>
              <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Body Color</th>
                <th>Km</th>
                <th>Gearing Type</th>
                <th>Person</th>
                <th>First Registration</th>
                <th>Price</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>BMW</td>
                <td>C220</td>
                <td>White</td>
                <td>55km</td>
                <td>Manual</td>
                <td>5</td>
                <td>2020</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>BMW</td>
                <td>C220</td>
                <td>White</td>
                <td>55km</td>
                <td>Manual</td>
                <td>5</td>
                <td>2020</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>BMW</td>
                <td>C220</td>
                <td>White</td>
                <td>55km</td>
                <td>Manual</td>
                <td>5</td>
                <td>2020</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>BMW</td>
                <td>C220</td>
                <td>White</td>
                <td>55km</td>
                <td>Manual</td>
                <td>5</td>
                <td>2020</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>BMW</td>
                <td>C220</td>
                <td>White</td>
                <td>55km</td>
                <td>Manual</td>
                <td>5</td>
                <td>2020</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>BMW</td>
                <td>C220</td>
                <td>White</td>
                <td>55km</td>
                <td>Manual</td>
                <td>5</td>
                <td>2020</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>BMW</td>
                <td>C220</td>
                <td>White</td>
                <td>55km</td>
                <td>Manual</td>
                <td>5</td>
                <td>2020</td>
                <td>856$</td>
                <td><a href="#">View</a></td>
              </tr>
              <tr>
                <td>BMW</td>
                <td>C220</td>
                <td>White</td>
                <td>55km</td>
                <td>Manual</td>
                <td>5</td>
                <td>2020</td>
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
        <div class="recent-updates">
          <h2>Recently Rented Cars</h2>
          <div class="updates">
            <div class="update">
              <div class="profile-photo">
                <img src="img/car22.jpg" />
              </div>
              <div class="message">
                <p><b>BMW</b></p>
                <small class="text-muted">2 Minutes Ago</small>
              </div>
            </div>
            <div class="update">
              <div class="profile-photo">
                <img src="img/car33.jpg" />
              </div>
              <div class="message">
                <p><b>Mercedes</b></p>
                <small class="text-muted">23 Minutes Ago</small>
              </div>
            </div>
            <div class="update">
              <div class="profile-photo">
                <img src="img/car44.jpg" />
              </div>
              <div class="message">
                <p><b>Audi</b></p>
                <small class="text-muted">12 Hours Ago</small>
              </div>
            </div>
          </div>
        </div>
        <div class="sales-analytics">
            <div class="item add-product">
              <div>
                <span class="material-icons-sharp">add</span>
                <h3>Add Car</h3>
              </div>
              <div>
                <span class="material-icons-sharp">update</span>
                <h3>Update Car</h3>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>