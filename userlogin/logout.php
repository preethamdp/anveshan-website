<?php
session_start();
session_unset();
session_destroy();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body onload = 'myFunc()'>
<script>
function myFunc(){

  window.location = "./user.php";
}
</script>
  </body>
</html>
