<?php

    require_once "db_connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Barking Portal</title>

<link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5 border border-dark">
                <div class="left-wrapper">
                    <div class="left-header-content d-flex align-items-center justfy-content-between border-bottom border-dark">
                        <div class="portal-image">
                            <img src="assets/images/barkingCentre.jpg" class="img-fluid" alt="">
                        </div>

                        <div class="portal-heading-content ps-2">
                            <h1>Barking<br>East London</h1>
                            <h4>Where a diverse community thrives.</h4>
                        </div>
                    </div>

                    <div class="left-wrapper-content pt-4">
                        <p class="main-content">We like to help local businesses move into wider Internet arena. Where you can reach a larger audience and find new customer. Our goal is to provide you a simple solution to publish your business webpage for free. You see the sectors link on th eright side and your business can be visible there as well.</p>
                        <img src="assets/images/underconstructions.jpg" class="img-fluid" alt="">
                        <p class="main-content2">You need to register your details and fill up few fields and publish your web page in less than 5 minutes.</p>
                        <div class="registrationBtn text-center pb-3">
                            <a href="userReg.php" class="btn reg_btn">Click To Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 right-bg">
                <div class="right-wrapper">
                    <div class="business-list-content text-center">
                        <div class="business-list-heading py-3">
                            <h2>Barking Business Lists</h2>
                        </div>

                        <div class="bus_types_btn d-flex flex-wrap">
                        <?php
                            $sql = "SELECT * FROM business_category ORDER BY name ASC";

                            $result = $conn->query( $sql );

                            if ( $result ) {
                                while ( $data = mysqli_fetch_assoc( $result ) ) {
                                    $cat_name = $data['name'];
                                ?>
                                <a href="userBusinessLists.php?name=<?php echo $cat_name; ?>" class="btn sector_btn"><?php echo $data['name']; ?></a>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center my-3">
                <a href="mailto:support@barkingportal.com" class="btn btn-email"><i class="bi bi-envelope-at-fill"></i> Email Us</a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>