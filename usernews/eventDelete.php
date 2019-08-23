<?php
session_start();
include 'connect.php';
$event = $_GET['name'];
$sql = "delete from news where news='$event';";
mysqli_query($conn,$sql);
echo mysqli_affected_rows($conn);


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body onload="func()">
     <script type="text/javascript">
       window.location.href = "userHome.php";
     </script>
   </body>
 </html>
