<?php
session_start();
if ( isset( $_SESSION['login'] ) ) {
    header( 'Location:dashboard.php' );
}

require "../db_connect.php";

$empmsg_name = $empmsg_email = $empmsg_pass = $empmsg_con_pass = "";

if ( isset( $_POST['registration'] ) ) {
    $admin_name     = $_POST['admin_name'];
    $admin_email    = $_POST['admin_email'];
    $admin_pass     = $_POST['admin_pass'];
    $admin_con_pass = $_POST['admin_con_pass'];

    $admin_pass_hash = md5($admin_pass);

    if ( empty( $admin_name ) ) {
        $empmsg_name = "Fill up this field";
    }
    if ( !filter_var( $admin_email, FILTER_VALIDATE_EMAIL ) ) {
        $empmsg_email = "Valid email is required";
    }
    if ( strlen( $admin_pass ) < 5 ) {
        $empmsg_pass = "Password must be at least 5 character";
    }
    if ( $admin_pass !== $admin_con_pass ) {
        $empmsg_con_pass = "Password does not match";
    }

    if ( !empty( $admin_name ) && !empty( $admin_email ) && !empty( $admin_pass ) && !empty( $admin_con_pass ) ) {
        if ( $admin_pass === $admin_con_pass ) {

            $sql   = "INSERT INTO admin (admin_name, admin_email, admin_pass) VALUES('$admin_name', '$admin_email', '$admin_pass_hash')";
            $query = $conn->query( $sql );

            if ( $query == TRUE ) {
                header('Location:index.php?adminCreated');
            } else {
                echo "admin not created";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Login</title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Core theme CSS-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2 class="text-center mt-5">Admin Registration</h2>
                <div class="card bg-info my-3">
                    <span class="text-success text-center"><?php //echo $reg_msg; ?></span>
                    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ) ?>" method="POST" class="card-body cardbody-color">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="admin_name" value="<?php if ( isset( $_POST['registration'] ) ) {echo $admin_name;}?>" placeholder="Admin name" />
                            <?php if ( isset( $_POST['registration'] ) ) {echo "<span class='text-danger'>" . $empmsg_name . "</span>";}?>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="admin_email" value="<?php if ( isset( $_POST['registration'] ) ) {echo $admin_email;}?>" placeholder="Please enter valid email" />
                            <?php if ( isset( $_POST['registration'] ) ) {echo "<span class='text-danger'>" . $empmsg_email . "</span>";}?>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="admin_pass" placeholder="password" />
                            <?php if ( isset( $_POST['registration'] ) ) {echo "<span class='text-danger'>" . $empmsg_pass . "</span>";}?>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="admin_con_pass" placeholder="confirm password" />
                            <?php if ( isset( $_POST['registration'] ) ) {echo "<span class='text-danger'>" . $empmsg_con_pass . "</span>";}?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn custom_btn" name="registration">Registration</button>
                        </div>
                        <div class="text-center">Have account? <a href="index.php" class="text-dark fw-bold ">Please Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../assets/js/scripts.js"></script>
</body>

</html>
