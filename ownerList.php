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
    <title>Business Owner Lists</title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Data Table css -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="admin/assets/css/styles.css">
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
            <h2 class="text-white text-center bg-primary py-3 mb-4">All 
            <?php
            if ( isset($_GET['cat_name']) ) {
                echo ( $_GET['cat_name'] ).' Owner Lists';
            }
            ?>
            </h2>
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="table-title">
                        <i class="fas fa-table me-1"></i>
                        Owner Details
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Owner Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Business Sector</th>
                                <th>Address</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                        $n = 1;

                        $sql = "SELECT * FROM user";
                        $query = $conn->query($sql);

                        if ($query) {
                            while ($data = mysqli_fetch_assoc($query)) {

                                $user_id        = $data['user_id'];
                                $user_name      = $data['user_name'];
                                $user_phone     = $data['user_phone'];
                                $user_email     = $data['user_email'];
                                $shop_name      = $data['user_bus_name'];
                                $user_address   = $data['user_bus_add'];
                                $sector_id      = $data['sector_id'];
                                $user_url       = $data['bus_url'];
                            ?>
                            <tr>
                                <td><?php echo $n; ?></td>
                                <td><?php echo $shop_name; ?></td>
                                <td><?php echo $user_name; ?></td>
                                <td><?php echo $user_phone; ?></td>
                                <td><?php echo $user_email; ?></td>
                                <td><?php echo $data_list[$sector_id]; ?></td>
                                <td><?php echo $user_address; ?></td>
                                <td><a href="userPortal.php?name=<?php echo $shop_name; ?>"><?php echo $shop_name; ?></a></td>
                            </tr>
                            <?php
                            $n++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>