<?php
session_start();
if ( !isset( $_SESSION['login'] ) ) {
    header( 'Location:index.php' );
}

require "../db_connect.php";

$title = "Admin Dashboard";
include "header.php";
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">All Business Sector</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="busSector.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">All Business Owner Lists</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="businessLists.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Business Owner lists
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Owner Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Business Sector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql1   = "SELECT * FROM category";
                                $query1 = $conn->query($sql1);

                                $data_list = array();

                                while ($data1 = mysqli_fetch_assoc($query1)) {
                                    $cat_id   = $data1['cat_id'];
                                    $cat_name = $data1['cat_name'];

                                    $data_list[$cat_id] = $cat_name;
                                }

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
                                        $sector_id      = $data['sector_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $n; ?></td>
                                        <td><?php echo $shop_name; ?></td>
                                        <td><?php echo $user_name; ?></td>
                                        <td><?php echo $user_phone; ?></td>
                                        <td><?php echo $user_email; ?></td>
                                        <td><?php echo $data_list[$sector_id]; ?></td>
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
<?php include "footer.php";?>