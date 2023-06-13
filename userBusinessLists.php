<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Barking Portal Business Lists</title>

    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h2 class="text-center text-uppercase bg-info py-2">All 
                  <?php
                  if($_GET['name']){
                    echo $_GET['name'];
                  }
                  ?> Owner Lists</h2>
                <table id="myTable" class="table table-striped table-hover table-bordered mt-5">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">SL. #</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Owner Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Business Email</th>
                        <th scope="col">Business Sector</th>
                        <th scope="col">Business URL</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="table-primary">
                        <th scope="col">SL. #</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Owner Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Business Email</th>
                        <th scope="col">Business Sector</th>
                        <th scope="col">Business URL</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <tr>
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Otto</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><a href="#">xyz</a></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>

        <div class="row">
            <div class="col text-center mt-4 mb-5">
                <a href="index.php" class="btn"><i class="bi bi-house-fill"></i> Barking Portal Home</a>
            </div>
        </div>
    </div>
    
    
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>