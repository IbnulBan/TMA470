<?php

$servername = "localhost";
$username   = "barkingportal_portal";
$password   = "JKG]Cd-ys%34";
$dbname     = "barkingportal_localPortal";

// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );
// Check connection
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}