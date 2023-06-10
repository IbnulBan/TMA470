<?php

 session_start();
 if ( !isset( $_SESSION['adminUser'] ) ) {
  header( 'Location:index.php' );
 }

 require "../db_connect.php";

 $title = "All Business Sector";
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
                        <h1 class="mt-4">Business Lists</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Business Sector</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="table-title">
                                    <i class="fas fa-table me-1"></i>
                                    All Business Sectors
                                </div>
                                <div class="add-btn">
                                    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" id="add_form" class="row">
                                        <div class="col-auto">
                                            <input type="text" class="form-control" id="add_sector" name="name" placeholder="Type New Sector">
                                            <?php
                                             if ( isset( $_POST['save'] ) ) {

                                              $add_sector = $_POST['name'];

                                              $errors = array();

                                              $sql      = "SELECT * FROM business_category WHERE name='$add_sector'";
                                              $query    = mysqli_query( $conn, $sql );
                                              $rowCount = mysqli_num_rows( $query );

                                              if ( $rowCount > 0 ) {
                                               array_push( $errors, "Sector already exists in the lists.." );
                                              }

                                              if ( count( $errors ) > 0 ) {
                                               foreach ( $errors as $error ) {
                                                echo "<div class='text-danger'>$error</div>";
                                               }
                                              } else {
                                               $sql         = "INSERT INTO business_category (name) VALUES(?)";
                                               $stmt        = mysqli_stmt_init( $conn );
                                               $prepareStmt = mysqli_stmt_prepare( $stmt, $sql );

                                               if ( $prepareStmt ) {
                                                mysqli_stmt_bind_param( $stmt, "s", $add_sector );
                                                mysqli_stmt_execute( $stmt );

                                                echo "<div class='text-success'>Sector Added</div>";
                                               } else {
                                                die( "Something went wrong!" );
                                               }
                                              }
                                             }
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" name="save" class="btn btn-success mb-3">Add Sector</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="myTable" class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Sector Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Sector Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                     $n   = 1;
                                     $sql = "SELECT * FROM business_category ORDER BY name ASC";

                                     $result = $conn->query( $sql );

                                     if ( $result ) {
                                      while ( $data = mysqli_fetch_assoc( $result ) ) {

                                        $cat_id=$data['id'];
                                        $cat_name=$data['name'];
                                      ?>
                                            <tr>
                                                <td><?php echo $n; ?></td>
                                                <td><?php echo $data['name']; ?></td>
                                                <td>
                                                    <a href="edit_sector.php?id=<?php echo $cat_id; ?>" class="btn btn-success">Edit</a>
                                                    <a href="delete_sector.php?id=<?php echo $cat_id; ?>" class="btn btn-danger">Delete</a>
                                                </td>
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
                </main>
<?php include 'footer.php'; ?>