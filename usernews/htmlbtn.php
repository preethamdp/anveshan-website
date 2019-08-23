<?php
session_start();
include 'connect.php';
$html = $_GET['html'];

$_SESSION['html'] = $html;
$sql = "select htmlfile from news where news = '$html'";
$results = mysqli_query($conn,$sql) ;
$row = mysqli_fetch_assoc($results);
echo $row['htmlfile'];
?>
