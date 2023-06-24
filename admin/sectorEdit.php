<?php
session_start();
if ( !isset( $_SESSION['login'] ) ) {
    header( 'Location:index.php' );
}

require "../db_connect.php";

$title = "Edit Sector";
include "header.php";

?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Business Sector</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="busSector.php">Business Sectors</a></li>
                        <li class="breadcrumb-item active">Edit Business Sector</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="table-title">
                                <i class="fas fa-table me-1"></i>
                                Edit Business Sector
                            </div>
                        </div>
                        <div class="card-body">
                        <?php                                
                            if ( isset( $_GET['id'] ) ) {
                                $get_id = $_GET['id'];

                                $sql   = "SELECT * FROM category WHERE cat_id=$get_id";
                                $query = $conn->query( $sql );

                                $data     = mysqli_fetch_assoc( $query );
                                $cat_id   = $data['cat_id'];
                                $cat_name = $data['cat_name'];
                            }

                            if ( isset( $_GET['cat_name'] ) ) {
                                $new_catName = $_GET['cat_name'];
                                $new_catId   = $_GET['cat_id'];

                                $new_sql = "UPDATE category SET cat_name='$new_catName' WHERE cat_id='$new_catId'";

                                if ( $conn->query( $new_sql ) == TRUE ) {
                                    echo "<span class='text-success'>Update Success</span>";
                                } else {
                                    echo "<span class='text-danger'>No Changes</span>";
                                }
                            }
                            ?>
                            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="GET" id="edit_form" class="row">
                                <div class="col-auto">
                                    <input type="hidden" class="form-control" name="cat_id" value="<?php echo $cat_id; ?>" hidden>
                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control" id="edit_sector" name="cat_name" value="<?php if ( isset( $_GET['cat_name'] ) ) {echo $new_catName;} else {echo $cat_name;}?>">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" name="update" class="btn btn-success">Update Sector</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
<?php include "footer.php";?>