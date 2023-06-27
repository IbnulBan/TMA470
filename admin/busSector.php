<?php
session_start();
if ( !isset( $_SESSION['login'] ) ) {
    header( 'Location:index.php' );
}

require "../db_connect.php";

$title = "Business Sector";
include "header.php";
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">All Business Sectors</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Business Sectors</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="table-title">
                                <i class="fas fa-table me-1"></i>
                                Business Sectors
                            </div>
                            <div class="add-btn">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="add_form" class="row">
                                    <div class="col-auto">
                                        <input type="text" class="form-control form-control-sm" id="add_sector" name="cat_name" placeholder="Type New Sector">
                                        <?php
                                        if (isset($_POST['save'])) {

                                            $cat_name = $_POST['cat_name'];

                                            $sql = "INSERT INTO category (cat_name) VALUES('$cat_name')";

                                            if ($conn->query($sql) == true) {
                                                echo "<span class='text-success'>New Sector Added</span>";
                                            } else {
                                                echo "<span class='text-danger'>New Sector Added</span>";
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="save" class="btn btn-success btn-sm">Add Sector</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL. #</th>
                                        <th>Sector Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>SL. #</th>
                                        <th>Sector Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $n = 1;

                                $sql   = "SELECT * FROM category ORDER BY cat_name ASC";
                                $query = $conn->query($sql);

                                if ($query) {
                                    while ($data = mysqli_fetch_assoc($query)) {

                                        $cat_id   = $data['cat_id'];
                                        $cat_name = $data['cat_name'];
                                        ?>
                                    <tr>
                                        <td><?php echo $n; ?></td>
                                        <td><?php echo $cat_name; ?></td>
                                        <td>
                                            <a href="sectorEdit.php?id=<?php echo $cat_id; ?>" class="btn btn-success btn-sm">Edit</a>
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
<?php include "footer.php";?>