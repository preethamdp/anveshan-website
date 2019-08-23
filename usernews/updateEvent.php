<?php
session_start();
include "connect.php";
$p1 = $_POST['editevent'];
$p2=$_POST['editdesc'];
$p3 = $_GET['event'];
echo $p1.$p2.$p3;
$sql = "update events set event='$p1', description='$p2' where event = '$p3';";
mysqli_query($conn,$sql);
header("Location: userHome.php")
 ?>
