<?php 
  ob_start();
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/adminLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Admin Login</title>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Admin Login</span></div>
        <form action="connection/process.php" method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email" name="Email" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="Password" required>
          </div>
          <div class="row button">
            <input type="submit" value="Login" name="adminLogin">
          </div>
        </form>
      </div>
    </div>

  </body>
</html>
