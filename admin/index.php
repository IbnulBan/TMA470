<?php
session_start();
if ( isset( $_SESSION['login'] ) ) {
    header( 'Location:dashboard.php' );
}
require "../db_connect.php";

$empmsg_email = $empmsg_pass = "";

if ( isset( $_POST['login'] ) ) {
    $admin_email = $_POST['admin_email'];
    $admin_pass  = $_POST['admin_pass'];

    $admin_pass_hash = md5( $admin_pass );

    if ( empty( $admin_email ) ) {
        $empmsg_email = "Email not correct";
    }
    if ( empty( $admin_pass ) ) {
        $empmsg_pass = "Password does not match";
    }

    if ( !empty( $admin_email ) && !empty( $admin_pass ) ) {

        $sql   = "SELECT * FROM admin WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass_hash'";
        $query = $conn->query( $sql );

        if ( $query->num_rows > 0 ) {
			$_SESSION['login'] = "login success";
            header( 'Location:dashboard.php' );
        } else {
            echo "not found";
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
				<h2 class="text-center mt-5">Admin Login</h2>
				<?php
				if ( isset( $_GET['adminCreated'] ) ) {
					echo "<p class='text-success text-center'>Admin Created Successfully.</p>";
				}
				?>
				<div class="card bg-info my-3">
					<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ) ?>" method="POST" class="card-body cardbody-color">
						<div class="text-center">
							<img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
								class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="150px"
								alt="profile" />
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" name="admin_email" placeholder="Admin email" />
							<?php if ( isset( $_POST['login'] ) ) {echo "<span class='text-danger'>" . $empmsg_email . "</span>";}?>
						</div>
						<div class="mb-3">
							<input type="password" class="form-control" name="admin_pass" placeholder="password" />
							<?php if ( isset( $_POST['login'] ) ) {echo "<span class='text-danger'>" . $empmsg_pass . "</span>";}?>
						</div>
						<div class="text-center">
							<button type="submit" class="btn custom_btn" name="login">Login</button>
						</div>
						<div class="text-center">Not Registered? <a href="adminReg.php" class="text-dark fw-bold">Create an Account</a>
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