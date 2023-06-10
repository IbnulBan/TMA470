<?php

 session_start();
 if ( !isset( $_SESSION['adminUser'] ) ) {
  header( 'Location:index.php' );
 }

 require "../db_connect.php";

 $title = "Delete Sector";
 include 'header.php';
?>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Business Sector</div>
                            <a class="nav-link text-white" href="sector.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                All Sector
                            </a>
                            <div class="sb-sidenav-menu-heading">All Business</div>
                            <a class="nav-link" href="businessList.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Business Lists
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Delete Sectors</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="sector.php">Business Sector</a></li>
                            <li class="breadcrumb-item active">Delete Sector</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="table-title">
                                    <i class="fas fa-table me-1"></i>
                                    Delete Business Sector
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="add-btn">
                                    <?php
                                     if ( isset( $_GET['id'] ) ) {
                                      $getid = $_GET['id'];

                                      $sql   = "SELECT * FROM business_category WHERE id='$getid'";
                                      $query = $conn->query( $sql );

                                      $data     = mysqli_fetch_assoc( $query );
                                      $cat_id   = $data['id'];
                                      $cat_name = $data['name'];
                                     }

                                     if ( isset( $_GET['name'] ) ) {
                                      $newCatid   = $_GET['id'];
                                      $newCatname = $_GET['name'];

                                      $new_sql="UPDATE business_category SET name='$newCatname' WHERE id='$newCatid'";

                                      if($conn->query($new_sql) == TRUE){
                                        echo "<div calss='text-success'>Update Success</div>";
                                      }else{
                                        echo "<div class='text-danger'>Not Update</div>";
                                      }
                                     }
                                    ?>
                                    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="GET" id="add_form" class="row">
                                        <div class="col-auto">
                                            <input type="text" class="form-control" id="add_sector" name="id" value="<?php echo $cat_id;?>" hidden>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" id="add_sector" name="name" value="<?php if(isset($_GET['name'])){echo $newCatname;}else{echo $cat_name;}?>">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" name="update" class="btn btn-danger mb-3">Delete Sector</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'footer.php'; ?>