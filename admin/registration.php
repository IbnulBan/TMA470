<?php

 require "../db_connect.php";

 if ( isset( $_POST['registration'] ) ) {

  $full_name        = $_POST['full_name'];
  $email            = $_POST['email'];
  $password         = $_POST['password'];
  $confirm_password = $_POST['con_password'];

  $empmsg_full_name        = "";
  $empmsg_admin_email      = "";
  $empmsg_admin_pass       = "";
  $empmsg_confirm_password = "";

  if ( empty( $full_name ) ) {
   $empmsg_full_name = "Admin Name";
  }

  if ( empty( $email ) ) {
   $empmsg_admin_email = "Admin email";
  }

  if ( empty( $password ) ) {
   $empmsg_admin_pass = "Admin password";
  }

  if ( empty( $confirm_password ) ) {
   $empmsg_confirm_password = "Admin confirm password";
  }

  // if ( !empty( $email ) && !empty( $password ) ) {
  //  echo "ok";
  // }

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Registration</title>

  <link rel="shortcut icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
  <div class="container">
    <div class="content-area">
      <h2 class="title-text">Admin Registration</h2>
      <div class="form-container">
        <form class="login-form" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?></form>" method="post">
          <div class="field">
            <input type="name" class="form-input" id="username" name="full_name" placeholder="Admin Name">
            <span class="text-danger"><?php if ( isset( $_POST['registration'] ) ) {echo $empmsg_full_name;} ?></span>
          </div>
          <div class="field">
            <input type="email" class="form-input" id="useremail" name="email" placeholder="Admin Email">
            <span class="text-danger"><?php if ( isset( $_POST['registration'] ) ) {echo $empmsg_admin_email;} ?></span>
          </div>
          <div class="field">
            <input type="password" class="form-input" id="password" placeholder="Password">
            <span class="text-danger"><?php if ( isset( $_POST['registration'] ) ) {echo $empmsg_admin_pass;} ?></span>
          </div>
          <div class="field">
            <input type="conpassword" class="form-input" id="conpassword" name="con_password" placeholder="Confirm password">
            <span class="text-danger"><?php if ( isset( $_POST['registration'] ) ) {echo $empmsg_confirm_password;} ?></span>
          </div>
          <div class="submit-btn">
            <button type="submit" name="registration" class="btn">Register</button>
          </div>
          <div id="createAccount" class="form-text text-center my-2 text-dark">Have Account? <a href="index.php" class="text-dark fw-bold">Please Login</a>
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
