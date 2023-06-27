<?php
require "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Barking Portal</title>
	<!-- Favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Bootstrap icons-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
	<!-- Bootstrap css-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
	<!-- Core theme CSS-->
	<link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body>
	<!-- Header-->
	<header class="bg-dark">
		<div class="container">
			<!-- Navigation-->
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand text-white" href="index.php">Barking Portal</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
						data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
						<ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
							<li class="nav-item">
								<a class="nav-link text-white" href="index.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white" href="businessLists.php">Business Lists</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white" href="userReg.php">User Registration</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white" href="mailto:admin@barkingportal.uk"><i class="bi bi-envelope-at-fill"></i>
									Email Us</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- Section-->
	<section class="py-4">
		<div class="container">
			<div class="row g-1 g-lg-1">
				<div class="col-md-7">
					<div class="card">
						<div class="row">
							<div class="col-6 col-md-4">
								<img src="assets/images/businessImg.jpg" class="img-fluid rounded-start" alt="Barking Portal">
							</div>
							<div class="col-6 col-md-8">
								<div class="card-body">
									<h1 class="card-title">Barking East London</h1>
									<p class="card-text fs-5">Where a diverse community thrives.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="card mt-1">
						<!-- Portal details-->
						<div class="card-body p-4">
							<p class="fs-5">We like to help local businesses move into wider Internet arena. Where you can reach a larger audience and find new customer. Our goal is to provide you a simple solution to publish your business webpage for free. You see the sectors link on th eright side and your business can be visible there as well.</p>
							<p class="card-text m-0">You need to register your details and fill up few fields and publish your web page in less than 5 minutes.</p>
							<div class="registrationBtn text-center pb-3">
								<a href="userReg.php" class="btn custom_btn">Click To Register</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card h-100 bg-secondary bg-opacity-50">
						<!-- Sector Title-->
						<h2 class="card-title text-center pt-4">Barking Business Sector Lists</h2>
						<!-- Sector lists Button-->
						<div class="card-body p-3">
						<?php
						$sql = "SELECT * FROM category ORDER BY cat_name ASC";

						$result = $conn->query( $sql );

						if ( $result ) {
							while ( $data = mysqli_fetch_assoc( $result ) ) {
								$cat_id = $data['cat_id'];
								$cat_name = $data['cat_name'];
							?>
							<a href="ownerList.php?cat_name=<?php echo $cat_name;?>" class="btn custom_btn m-1"><?php echo $data['cat_name']; ?></a>
							<?php
							}
						}
						?>
						</div>
						<!-- Sector info-->
						<div class="card-footer border-top-0 bg-transparent">
							<p>Please click on Sector button above for all related business lists.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer-->
	<footer class="py-3 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">
				Copyright &copy; Barking Portal 2023
			</p>
		</div>
	</footer>


	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="assets/js/scripts.js"></script>
</body>
</html>