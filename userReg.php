<?php

require "db_connect.php";

 if ( isset( $_POST['submit'] ) ) {

  $shop_name            = $_POST['shop_name'];
  $owner_name           = $_POST['owner_name'];
  $cell_number          = $_POST['cell_number'];
  $email                = $_POST['email'];
  $shop_description     = $_POST['shop_description'];
  $business_category_id = $_POST['business_category_id'];
  $upload_file          = $_POST['upload_file'];

  $empmsg_sname    = "";
  $empmsg_semail   = "";
  $empmsg_sdetails = "";
  $empmsg_b_cat    = "";

  if ( empty( $shop_name ) ) {
   $empmsg_sname = "Please fillup the Shop Name";
  }

  if ( empty( $email ) ) {
   $empmsg_semail = "Please Provide a valid email";
  }

  if ( empty( $shop_description ) ) {
   $empmsg_sdetails = "Please Provide all your offers in brief";
  }

  if ( empty( $business_category_id ) ) {
   $empmsg_b_cat = "Please select the right business sector";
  }

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shop Registration</title>

    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6 mt-5">
                <div class="header-content d-flex align-items-center justify-content-between mb-4">
                    <a href="index.php" class="home-icon fs-2 fw-bold"><i class="bi bi-house-fill"></i></a>
                    <h2>Business Registration Form.</h2>
                </div>
                <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" id="reg_form" class="reg-form">
                    <div class="mb-3">
                        <label for="business_name" class="form-label">Name of your business (required)</label>
                        <input type="text" class="form-control" name="shop_name" id="business_name">
                        <span class="text-danger"><?php if ( isset( $_POST['submit'] ) ) {echo $empmsg_sname;} ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Contact Person's name (optional)</label>
                        <input type="text" class="form-control" name="owner_name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Contact phone number (optional)</label>
                        <input type="text" class="form-control" name="cell_number" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address (required)</label>
                        <input type="email" class="form-control" name="email" id="email">
                        <span class="text-danger"><?php if ( isset( $_POST['submit'] ) ) {echo $empmsg_semail;} ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">What your business offers - Please put as much details as you like for others to see (required)</label>
                        <textarea class="form-control" name="shop_description" id="description" rows="3"></textarea>
                        <span class="text-danger"><?php if ( isset( $_POST['submit'] ) ) {echo $empmsg_sdetails;} ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="form-select" class="form-label">Choose your business sector from the dropdown list (required)</label>
                        <select id="form-select" name="business_category_id" class="form-select">
                            <option selected>Select Type</option>
                            <option>Barber</option>
                            <option>Construction</option>
                            <option>DIY</option>
                            <option>Dry cleaning</option>
                            <option>Finance</option>
                            <option>Food</option>
                            <option>Production</option>
                            <option>Retail</option>
                            <option>Trade</option>
                            <option>Others</option>
                        </select>
                        <span class="text-danger"><?php if ( isset( $_POST['submit'] ) ) {echo $empmsg_b_cat;} ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Please upload your shop's image (optional)</label>
                        <input class="form-control" name="upload_file" type="file" id="formFile">
                    </div>
                    <div class="publishBtn text-center">
                        <button type="submit" class="btn mb-5" name="submit">Submit & Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>