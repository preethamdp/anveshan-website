<?php
include 'connect.php';
$p = 'nam he boss';
$sql = "select htmlname from news where news='$p'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo $row['htmlname'];
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="index.html" method="post" enctype="multipart/form-data">
       <input type="file" name="" value="<?php $row['htmlname'] ?>">
     </form>
   </body>
 </html>
