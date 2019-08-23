<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JSSATEB</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body onbeforeunload="myUnload()">
  <div class="top">

  </div>
  <?php
  session_start();
  if(!isset($_SESSION['loggedin'])){
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

  $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $_SESSION["currentpage"] = $url;
  $_SESSION["previouspage"] = "";



$email = $password = "";
include 'connect.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password =$_POST["pwd"];
    $sql = "select password from login where email='$email';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
      $row = mysqli_fetch_assoc($result);
      if($row['password']==$password){
        $_SESSION["user"] = $email;
        $_SESSION["pwd"] = $password;
      header("Location: userHome.php");
      // echo '<script>window.location.replace("userHome.php");</script>

    }
      else {
        $_SESSION["pwdErr"] = 'set';
        header("Location: user.php");
          }
    }
    else{

      $_SESSION["emailErr"] = 'set';
        header("Location: user.php");
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <!-- nav -->
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">JSSATEB</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="#">Home</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </div>
</nav>
<div class = "login container">
  <!-- <div class="container"> -->
    <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <div class="form-group">
       <label class="control-label col-sm-2" for="email" style = "color:grey;">Email:</label>
       <div class="col-sm-8">
         <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
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
         <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
       </div>
       <?php
       if(isset($_SESSION["pwdErr"])){
       ?>
       <p id="pwdErr" style="margin-left:15px"></p>


     <?php } ?>
     </div>

     <div class="form-group">
       <div class="col-sm-offset-2 col-sm-8">
         <button type="submit" class="btn btn-default">Sign in</button>
       </div>
     </div>
   </form>
 </div>
 <!-- </div> -->


<script type="text/javascript">
if(document.getElementById('emailErr') && !document.getElementById('pwdErr')){
var errMsg1 = document.getElementById('emailErr');
errMsg1.innerHTML = "Enter a valid email";
errMsg1.style.color = 'white';
errMsg1.style.margin = '%15';
var email = document.getElementById('email');
// console.log(email);
email.addEventListener("click",function(){
  errMsg1.innerHTML = null;
})
}

if(document.getElementById('pwdErr') && document.getElementById('emailErr')){
var errMsg2 = document.getElementById('pwdErr');


errMsg2.innerHTML = "Enter a valid password";
errMsg2.style.color = 'white';
errMsg2.style.margin = '%15';


var pwd = document.getElementById('pwd');
// console.log(email);
pwd.addEventListener("click",function(){
  errMsg2.innerHTML = null;
})
}

</script>
<script type="text/javascript">
window.addEventListener('beforeunload',function(e){
  alert("lol")
})
  function myUnload(){
    alert("hello")
  }
</script>

<?php }
else
{ ?>
</script>
<!-- <script type="text/javascript">
window.addEventListener('beforeunload',function(e){
  alert("lol")
})
  function myUnload(){
    alert("hello")
  }
</script> -->
  <script type="text/javascript">
  alert("Logout to leave page");
     window.location.href ="userHome.php";
  </script>

<?php } ?>
</body>
</html>
