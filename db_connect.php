<?php

// $localhost  = "localhost";
// $dbuser     = "root";
// $dbpassword = "";
// $dbname     = "barkingdb";

$conn = new mysqli( 'localhost', 'root', '', 'barkingdb' );

if(!$conn){
    echo "Not Connect";
}
?>