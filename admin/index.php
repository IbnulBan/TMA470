<?php

require "../db_connect.php";

 if ( isset( $_POST['login'] ) ) {

  $email    = $_POST['email'];
  $password = $_POST['password'];



  $empmsg_admin_email = "";
  $empmsg_admin_pass  = "";

  if ( empty( $email ) ) {
   $empmsg_admin_email = "Please provide valid Admin email";
  }

  if ( empty( $password ) ) {
   $empmsg_admin_pass = "Please provide correct password";
  }

  if(!empty($email) && !empty($password)){
    echo "ok";
  }

 }
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
        <form id="login-form" class="login-form" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
          <div class="avater">
            <img src="assets/images/avatar-1295397__340.webp" alt="profile">
          </div>

          <div class="field">
            <input type="email" class="form-input" id="useremail" name="email" placeholder="Admin Email">
            <span class="text-danger"><?php if ( isset( $_POST['login'] ) ) {echo $empmsg_admin_email;} ?></span>
          </div>
          <div class="field">
            <input type="password" class="form-input" id="password" name="password" placeholder="password">
            <span class="text-danger"><?php if ( isset( $_POST['login'] ) ) {echo $empmsg_admin_pass;} ?></span>
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
