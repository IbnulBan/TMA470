<?php

$localhost  = "localhost";
$dbuser     = "root";
$dbpassword = "";
$dbname     = "barkingdb";

$conn = new mysqli( $localhost, $dbuser, $dbpassword, $dbname );

if(!$conn){
    die("Failed to connect with Database!");
}
?>