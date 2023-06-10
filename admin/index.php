<?php

 session_start();
 if ( isset( $_SESSION['adminUser'] ) ) {
  header( 'Location:dashboard.php' );
 }

 require "../db_connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>

  <link rel="shortcut icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
  <div class="container">
    <div class="content-area">
      <h2 class="title-text">Admin Login</h2>
      <div class="form-container">
        <?php
         if ( isset( $_POST['login'] ) ) {

          $admin_email = $_POST['email'];
          $admin_pass  = $_POST['password'];

          $sql   = "SELECT * FROM admin WHERE email='$admin_email'";
          $query = mysqli_query( $conn, $sql );

          $adminUser = mysqli_fetch_array( $query, MYSQLI_ASSOC );

          if ( $adminUser ) {
           if ( password_verify( $admin_pass, $adminUser['password'] ) ) {
            session_start();
            $_SESSION['adminUser'] = 'yes';
            header( 'Location:dashboard.php' );
            die();
           } else {
            echo "<div class='alert alert-danger'>Password does not match!</div>";
           }
          } else {
           echo "<div class='alert alert-danger'>Email does not match!</div>";
          }
         }
        ?>
        <form id="login-form" class="login-form" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="POST">
          <div class="avater">
            <img src="assets/images/avatar-1295397__340.webp" alt="profile">
          </div>

          <div class="field">
            <input type="email" class="form-input" id="useremail" name="email" placeholder="Admin Email">
          </div>
          <div class="field">
            <input type="password" class="form-input" id="password" name="password" placeholder="password">
          </div>
          <div class="submit-btn">
            <button type="submit" class="btn" name="login">Login</button>
          </div>
          <div id="createAccount" class="form-text text-center my-2 text-dark">Not Registered? <a href="registration.php" class="text-dark fw-bold">Create an Account</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery-3.6.4.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
