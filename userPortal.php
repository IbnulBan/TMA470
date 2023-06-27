<?php
require "db_connect.php";

$sql1   = "SELECT * FROM category";
$query1 = $conn->query($sql1);

$data_list = array();

while ($data1 = mysqli_fetch_assoc($query1)) {
	$cat_id   = $data1['cat_id'];
	$cat_name = $data1['cat_name'];

	$data_list[$cat_id] = $cat_name;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>User Portal</title>
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
	<section class="section-height py-4">
		<div class="container">
			<div class="row g-1 g-lg-1">
				<?php
				if ( isset( $_GET['name'] ) ) {
					$get_bus_name = $_GET['name'];

					$sql   = "SELECT * FROM user WHERE user_bus_name='$get_bus_name'";
					$query = $conn->query( $sql );

					$data = mysqli_fetch_assoc( $query );

					$user_id          = $data['user_id'];
					$user_name        = $data['user_name'];
					$user_phone       = $data['user_phone'];
					$user_email       = $data['user_email'];
					$shop_name        = $data['user_bus_name'];
					$user_address     = $data['user_bus_add'];
					$business_details = $data['user_bus_desc'];
					$sector_id        = $data['sector_id'];
					$upload           = $data['upload_img'];
				}

				?>
				<div class="col">
					<div class="card">
						<div class="row">
							<div class="col-6 col-md-4">
							<?php
							if(!empty($upload)){
								?>
								<img src="<?php echo 'upload_img/' . $upload; ?>" class="img-fluid rounded-start userImg" alt="<?php echo $shop_name; ?>">
								<?php
							}else{
								?>
								<img src="assets/images/businessImg.jpg" class="img-fluid rounded-start userImg" alt="<?php echo $shop_name; ?>">
								<?php
							}
							?>
								<!--<img src="<?php //echo 'upload_img/' . $upload; ?>" class="img-fluid rounded-start userImg" alt="Barking Portal">-->
							</div>
							<div class="col-6 col-md-8">
								<div class="card-body">
									<h2 class="card-title"><?php echo $shop_name; ?></h2>
									<p class="card-text"><?php echo 'Owner Name: ' . $user_name; ?></p>
									<p class="card-text"><?php echo 'Contact Phone: 0' . $user_phone; ?></p>
									<p class="card-text"><?php echo 'Contact Email: ' . $user_email; ?></p>
									<p class="card-text"><?php echo 'Shop Address: ' . $user_address; ?></p>
									<p class="card-text"><?php echo 'Business Type: ' . $data_list[$sector_id]; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="card mt-1">
						<!-- User Portal details-->
						<div class="card-body p-4">
							<p class="fs-5"><?php echo $business_details; ?></p>
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