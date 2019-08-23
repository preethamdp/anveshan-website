<?php
session_start();
if(isset($_SESSION["user"])){
$user = $_SESSION['user'];
//$pwd = $_SESSION["pwd"];
if(isset($_POST["submit"])){
  $new = $_POST["newpwd"];
  $confirm = $_POST["conpwd"];
  if($new==$confirm){
  include 'connect.php';
  $sql = "update Login set password='$confirm' where email='$user'";
  $result = mysqli_query($conn,$sql) or die(mysqli_error());
}
//// TODO: keep an eye on .replace in below js script inside echo
else{
  echo '
  <script>
    alert("Error\npassword entered did not matched")
    window.location.replace = "./"
  </script>
  ';
}

}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
    <div class = "login container disForm form-group w3-orange w3-hover-yellow w3-hover-shadow w3-card" >
      <!-- <div class="container"> -->
        <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <div class="form-group">
           <label class="control-label col-sm-2" for="email" style = "color:grey;">Email:</label>
           <div class="col-sm-8">
             <input type="email" class="form-control w3-input w3-animate-input" id="email" placeholder="Enter email" name="email" value=<?php echo $user; ?>>
           </div>
           <?php
            if(isset($_SESSION["emailErr"])){
            ?>
            <p id="emailErr" style="margin-left:15px"></p>

           <?php } ?>

         </div>

         <div class="form-group">
           <label class="control-label col-sm-2" for="pwd" style = "color:grey;">Password:</label>
           <div class="col-sm-8">
             <input type="password" class="w3-input w3-animate-input" id="pwd" placeholder="New password" name="newpwd" required>
           </div>
           <?php
           if(isset($_SESSION["pwdErr"])){
           ?>
           <p id="pwdErr" style="margin-left:15px"></p>


         <?php } ?>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-2" for="pwd" style = "color:grey;">Password:</label>
           <div class="col-sm-8">
             <input type="password" class="w3-input w3-animate-input" id="confirmpwd" placeholder="Confirm password" name="conpwd" required>
           </div>
</div>
         <div class="form-group">
           <div class="col-sm-offset-2 col-sm-8">
             <button type="submit" name="submit" id="submit" class="w3-btn w3-black">change</button>
           </div>
         </div>
       </form>
     </div>
     <!-- </div> -->
     <script type="text/javascript">
       var pwd = document.getElementById('pwd');
var confirmpwd = document.getElementById('confirmpwd');
       console.log(pwd);
      document.getElementById("submit").addEventListener('click',function(e){
        if(pwd!=confirmpwd){
          confirmpwd.style.border='1px solid red';
        }
      })


     </script>


  </body>
</html>
<?php
}
else{
  echo '
  404 error
  ';
} ?>
