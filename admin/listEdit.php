<?php
session_start();
if ( !isset( $_SESSION['login'] ) ) {
    header( 'Location:index.php' );
}

require "../db_connect.php";

$title = "Edit Business List";
include "header.php";
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="businessLists.php">Business Lists</a></li>
                        <li class="breadcrumb-item active">Edit Business List</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Business List
                        </div>
                        <div class="card-body">
                        <?php
                        if ( isset( $_GET['id'] ) ) {
                            $get_id = $_GET['id'];

                            $sql   = "SELECT * FROM user WHERE user_id=$get_id";
                            $query = $conn->query( $sql );
                            
                            $data             = mysqli_fetch_assoc( $query );

                            $user_id          = $data['user_id'];
                            $user_name        = $data['user_name'];
                            $user_phone       = $data['user_phone'];
                            $user_email       = $data['user_email'];
                            $shop_name        = $data['user_bus_name'];
                            $user_address     = $data['user_bus_add'];
                            $business_details = $data['user_bus_desc'];
                            $sector_id        = $data['sector_id'];
                            $upload           = $data['upload_img'];
                            
                        }

                        //print_r($data);exit;
                        if ( isset( $_GET['user_id'] ) ) {
                            $new_userId          = $_GET['user_id'];
                            $new_userName        = $_GET['user_name'];
                            $new_userPhone       = $_GET['user_phone'];
                            $new_userEmail       = $_GET['user_email'];
                            $new_shopName        = $_GET['user_bus_name'];
                            $new_userAddress     = $_GET['user_bus_add'];
                            $new_businessDetails = $_GET['user_bus_desc'];
                            $new_sectorId        = $_GET['sector_id'];
                            $new_upload          = $_GET['upload_img'];

                            $new_sql = "UPDATE user SET user_name='$new_userName', user_phone='$new_userPhone', user_email='$new_userEmail', user_bus_name='$new_shopName', user_bus_add='$new_userAddress', user_bus_desc='$new_businessDetails', sector_id='$new_sectorId', upload_img='$new_upload' WHERE user_id='$new_userId'";

                            if ( $conn->query( $new_sql ) == TRUE ) {
                                echo "<span class='text-success'>Update Success</span>";
                            } else {
                                echo "<span class='text-danger'>No Changes</span>";
                            }
                        }
                        ?>
                        <form class="row g-3" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="GET" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>" hidden>
                            <div class="col-md-6">
                                <label for="shop_name" class="form-label">Business Name (required)</label>
                                <input type="text" class="form-control" id="shop_name" name="user_bus_name" value="<?php if ( isset( $_GET['user_bus_name'] ) ) {echo $new_shopName;} else {echo $shop_name;}?>">
                            </div>
                            <div class="col-md-6">
                                <label for="owner_name" class="form-label">Contact Person's name (optional)</label>
                                <input type="text" class="form-control" id="owner_name" name="user_name" value="<?php if ( isset( $_GET['user_name'] ) ) {echo $new_userName;} else {echo $user_name;}?>">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Contact phone number (optional)</label>
                                <input type="text" class="form-control" id="phone" name="user_phone" value="<?php if ( isset( $_GET['user_phone'] ) ) {echo $new_userPhone;} else {echo $user_phone;}?>">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email address (required)</label>
                                <input type="text" class="form-control" id="email" name="user_email" value="<?php if ( isset( $_GET['user_email'] ) ) {echo $new_userEmail;} else {echo $user_email;}?>">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Business address (optional)</label>
                                <input type="text" class="form-control" id="address" name="user_bus_add" value="<?php if ( isset( $_GET['user_bus_add'] ) ) {echo $new_userAddress;} else {echo $user_address;}?>">
                            </div>
                            <div class="col-12">
                                <label for="business_details" class="form-label">What your business offers - Please put as much details as you like for others to see (required)</label>
                                <textarea class="form-control" name="user_bus_desc" id="business_details" cols="30" rows="10" placeholder="Please write details of you business offer for customer."><?php if ( isset( $_GET['user_bus_desc'] ) ) {echo $new_businessDetails;} else {echo $business_details;}?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Choose business sector from the dropdown (required)</label>
                                <select class="form-select" id="category" name="sector_id">
                                    <option value="" selected="selected" disabled>Select business type</option>
                                    <?php                                
                                    $sql_optn   = "SELECT * FROM category ORDER BY cat_name ASC";
                                    $query = $conn->query( $sql_optn );
                                    while ( $data = mysqli_fetch_assoc( $query ) ) {

                                        $sectorId   = $data['cat_id'];
                                        $sectorName = $data['cat_name'];
                                        ?>
                                        <option value="<?php echo $sectorId; ?>" <?php if ( $sectorId == $sector_id ) {echo 'selected';} ?>><?php echo $sectorName; ?></option>;
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="upload_img" class="form-label">Please upload your shop's image (optional)</label>
                                <input type="file" class="form-control" id="upload_img" name="upload_img" value="">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success" name="submit">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </main>
<?php include "footer.php";?>