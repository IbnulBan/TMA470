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
    <title>Business Owner Registration</title>
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
            <nav class="navbar navbar-expand-lg">
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
                                <a class="nav-link text-white" href="mailto:"><i class="bi bi-envelope-at-fill"></i>
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
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php
                    if ( isset( $_POST['submit'] ) ) {
                        $user_name        = $_POST['user_name'];
                        $user_phone       = $_POST['user_phone'];
                        $user_email       = $_POST['user_email'];
                        $shop_name        = $_POST['user_bus_name'];
                        $user_address     = $_POST['user_bus_add'];
                        $business_details = $_POST['user_bus_desc'];
                        $sector_id        = $_POST['sector_id'];

                        $upload_img       = $_FILES['upload_img']['name'];
                        $tmp_img_name     = $_FILES['upload_img']['tmp_name'];
                        $upload           = 'upload_img/' . $upload_img;
                        

                        $sql = "INSERT INTO user (user_name, user_phone, user_email, user_bus_name, user_bus_add, user_bus_desc, sector_id, upload_img) VALUES('$user_name', '$user_phone', '$user_email', '$shop_name', '$user_address', '$business_details', '$sector_id', '$upload_img')";

                        if ( $conn->query( $sql ) == TRUE ) {
                            move_uploaded_file( $tmp_img_name, $upload );
                            echo "<span class='text-success'>Data Inserted Successfully</span>";
                        } else {
                            echo "<span class='text-danger'>Data Not Inserted</span>";
                        }
                    }
                    ?>
                    <form class="row g-3" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="POST" enctype="multipart/form-data">
                        <h2 class="text-center">Business Registration Form</h2>
                        <div class="col-md-6">
                            <label for="shop_name" class="form-label">Business Name (required)</label>
                            <input type="text" class="form-control" id="shop_name" name="user_bus_name" placeholder="xyz company">
                        </div>
                        <div class="col-md-6">
                            <label for="owner_name" class="form-label">Contact Person's name (optional)</label>
                            <input type="text" class="form-control" id="owner_name" name="user_name" placeholder="Jhon Doe">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Contact phone number (optional)</label>
                            <input type="tel" class="form-control" id="phone" name="user_phone"
                                placeholder="Enter valid phone number">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email address (required)</label>
                            <input type="email" class="form-control" id="email" name="user_email"
                                placeholder="Enter valid email address">
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Business address (optional)</label>
                            <input type="text" class="form-control" id="address" name="user_bus_add"
                                placeholder="Enter Your Business address">
                        </div>
                        <div class="col-12">
                            <label for="business_details" class="form-label">What your business offers - Please put as
                                much details as you like for others to see (required)</label>
                            <textarea class="form-control" name="user_bus_desc" id="business_details" cols="30"
                                rows="10"
                                placeholder="Please write details of you business offer for customer."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="form-label">Choose business sector from the dropdown (required)</label>
                            <select class="form-select" id="category" name="sector_id">
                                <?php                                
                                $sql_optn   = "SELECT * FROM category ORDER BY cat_name ASC";
                                $query = $conn->query( $sql_optn );
                                while ( $data = mysqli_fetch_assoc( $query ) ) {

                                    $sectorId   = $data['cat_id'];
                                    $sectorName = $data['cat_name'];
                                    ?>
                                    <option value="<?php echo $sectorId; ?>"><?php echo $sectorName; ?></option>;
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="upload_img" class="form-label">Please upload your shop's image (optional)</label>
                            <input type="file" class="form-control" id="upload_img" name="upload_img"
                                placeholder="Upload your business image">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn custom_btn" name="submit">Submit & Publish</button>
                        </div>
                    </form>
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