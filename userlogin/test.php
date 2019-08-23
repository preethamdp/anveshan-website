<?php
include 'connect.php';
$r = mysqli_query($conn,"select event from events order by priority");
$i = 0 ;
while($row = mysqli_fetch_array($r)){
  echo $row[0]."\n";
}
 ?>
