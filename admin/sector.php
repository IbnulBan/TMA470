<?php

    require "../db_connect.php";

    if ( isset( $_POST['save'] ) ) {

        $new_sector = $_POST['name'];

        $empmsg_add_sector = "";

        if ( empty( $new_sector ) ) {
            $empmsg_add_sector = "Please Add new sector";
        }

        if ( !empty( $new_sector ) ) {

            $sql = "INSERT INTO business_category (name) VALUES ('$new_sector')";

            if ( $conn->query( $sql ) ) {
                header( 'Location:sector.php' );
            }
        }
    }

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
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
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
                                            <span class="text-danger"><?php if ( isset( $_POST['save'] ) ) {echo $empmsg_add_sector;} ?></span>
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
                                            ?>
                                            <tr>
                                                <td><?php echo $n; ?></td>
                                                <td><?php echo $data['name']; ?></td>
                                                <td>
                                                    <a href="edit.php" class="btn btn-success">Edit</a>
                                                    <a href="edit.php" class="btn btn-danger">Delete</a>
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
<?php include 'footer.php';?>