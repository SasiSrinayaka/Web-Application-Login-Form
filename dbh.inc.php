<?php
$severName="localhost";
$dbUsername= "sasindu123";
$dbPassword= "kCBiErji_no4MGNO";
$dbName="energyeffix_login";

$conn = mysqli_connect($severName, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}