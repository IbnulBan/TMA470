<?php
session_start();
if ( !isset( $_SESSION['login'] ) ) {
    header( 'Location:index.php' );
}

require "../db_connect.php";

if ( isset( $_GET['delete_id'] ) ) {
    $deleteid = $_GET['delete_id'];

    $sql2   = "DELETE FROM user WHERE user_id='$deleteid'";
    $query2 = $conn->query( $sql2 );

    if ( $query2 == TRUE ) {
        echo "<script>alert('Business owner deleted.');</script>";
        header('Location:businessLists.php');
    }

}

$title = "Business Owner Lists";
include "header.php";
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">All Business Lists</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Business Lists</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Business Owner Lists
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
                                        <th>Address</th>
                                        <th>URL</th>
                                        <th>Action</th>
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
                                        <td><a href="../userPortal.php?name=<?php echo $shop_name; ?>" target="_blank"><?php echo $shop_name; ?></a></td>
                                        <td>
                                            <a href="listEdit.php?id=<?php echo $user_id; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="businessLists.php?delete_id=<?php echo $user_id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $n++;
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
<?php include "footer.php";?>