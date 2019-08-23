<?php
session_start();
include 'connect.php';
$event = $_GET['edit'];
$x =  $_GET['x'];
$y = $_GET['y'];

$_SESSION['event'] = $event;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body onload="func()">
    <script type="text/javascript">
      window.location.href = "userHome.php?edit="+"<?php echo $event; ?>"+"&x="+"<?php echo $x; ?>"+"&y="+"<?php echo $y ?>";
    </script>
  </body>
</html>
