<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "jssateuser";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
