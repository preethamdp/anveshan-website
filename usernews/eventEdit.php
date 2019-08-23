<?php
session_start();
include 'connect.php';
$news = $_GET['edit'];

$_SESSION['event'] = $news;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body onload="func()">
    <script type="text/javascript">
      window.location.href = "userHome.php?edit="+"<?php echo $news; ?>";
    </script>
  </body>
</html>
