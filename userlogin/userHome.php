<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title><style media="screen">
  div {
-webkit-user-select: none; /* Safari 3.1+ */
-moz-user-select: none; /* Firefox 2+ */
-ms-user-select: none; /* IE 10+ */
user-select: none; /* Standard syntax */
}



  </style>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>
<body  >
  <?php
  session_start();
  if(isset($_SESSION['user'])){
    $_SESSION['loggedin'] = "true";
  include 'connect.php';
  $eventdesc1 = "";
  if(isset($_SESSION['event'])){
    $p11 = $_SESSION['event'];
}

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if ($_SESSION["currentpage"] != null)
{
   $_SESSION["previouspage"] = $_SESSION["currentpage"];
}
$_SESSION["currentpage"] = $url;
  ?>
  <!-- nav bar -->
  <div class="top-line" style="position:relative;top:0px">


  </div>
  <nav style=";" class="navbar navbar-inverse fix">
  <div class="container-fluid ">
    <div class="navbar-header " >
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
        <li><a href="#">Events</a></li>
          <li><a href="../usernews/userHome.php">News</a></li>



      </ul>
      <ul class="nav navbar-nav navbar-right">
            <li><a href="changePassword.php">Change Password</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["user"]; ?> <span class="caret"></span></a>
          <!-- <ul class="dropdown-menu " style="background-color:#2f3030;"> -->
            <!-- <li><a class="bg" href="#" style="color:#b5b5b5;">Events</a></li>
            <li><a class="bg" href="#" style="color:#b5b5b5;">News</a></li>
            <li><a class="bg" href="#" style="color:#b5b5b5;">Profile</a></li> -->

            <!-- <li><a style="color:#b5b5b5;" href="logout.php" onclick=""><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> -->
          <!-- </ul> -->
        </li>


      </ul>
    </div>
  </div>
</nav>


<div class="container " id='eventAdd' style = " ">
<div class="" style="display:block;">
  <!-- <p style="float:left">Add new event?</p> -->
  <button class="add w3-btn w3-block" type="button" name="addevent" style="float; width:95%;">Add new event</button>
</div>
<div class="disForm form-group w3-orange w3-hover-yellow w3-hover-shadow w3-card" style="display:none;padding:32px;width:95%;">
  <form  action="upload.php" method="post" enctype="multipart/form-data">
    <label for="">Image</label>
<input class="w3-input w3-animate-input" style="width:50%" type="file" name="image" id='image'/>
<label for="">Name</label>
<input class="w3-input w3-animate-input" style="width:50%" type="text" name="event" required/>
<label for="">Description</label>
<input class="w3-input w3-animate-input" style="width:50%" type="text" name="desc" required/>
<label for="">Html page</label>
<input type="file" class="w3-input w3-animate-input" style="width:50%" name="htmlfile" id="htmlfile" value="">
<label for="">Select priority</label><br>
  <select class="w3-select w3-bordered" style="width:50%" name="priority" required>
  <option value="1">High</option>
  <option value="2">Medium</option>
  <option value="3">Low</option>
</select><br><br>
<input type="submit" class="w3-btn w3-black" name="insert" id='insert' value="Submit">
<button onclick="cancel() " class="w3-btn w3-black" type="button" name="button">cancel</button>
</form>

</div>
<br>
<br>
</div>


<div class="container main" id='eventList'>
  <!-- generating event list-->

<?php
$sql = 'select image,event,description,htmlname from events order by priority';
$result = mysqli_query($conn,$sql) or die(mysqli_error());
while($row = mysqli_fetch_array($result)){
  $pic = $row[0];
  $event = $row[1];
  $ds = $row[2];
  $htmlname = $row[3];
  echo '

  <div class="row w3-hover-shadow w3-card w3-container" style="display:block;height:auto;padding:24px;margin:10px 0 10px ;width:95%;">
    <div class = "w3-card-4" >
      <img src="data:image/jpeg;base64,'.base64_encode($pic).' "class = "w3-round" style="float:left;height:75px;width:75px;margin-right:12px;"/>
    </div>
  '

?>

  <div  style="float:left;display:block;width:25%;margin-top:15px;" class="">
    <h4 class="event" for="img" style="overflow:hidden;text-overflow:ellipsis;"><b><?php echo $event; ?></b></h4>
  </div>

  <div class="delete " style="float:right;display:block;margin:20px 0px 20px 10px;">
    <button type="button" class="delete w3-btn" name="delevent" style="">Delete</button>
  </div>
  <div class="edit" style="float:right;display:block;margin:20px 0 20px 10px;">
    <button type="button" class="edit w3-btn" name="editevent" id = "editevent" style="background-color:#fe990f;">Edit</button>
  </div>

  <form class="" action="updateEvent.php?event=<?php echo $p11; ?>" method="post" style="display:none;" enctype="multipart/form-data">
    <input type="text" class = "w3-input " name="editevent" placeholder="Event Name" style="float:left;width:25%;margin-right:10px;" value="<?php echo $p11; ?>">
    <input type="text" name="editdesc" class = "w3-input" placeholder="Description" style="float:left;width:30%;margin:0 25px;" value="<?php echo $eventdesc1; ?>">
    <input type="file" name="htmlfile1" id="htmlfile1" value="" style="float:left;" >
    <input type="submit" class="w3-btn w3-red" style="float:right;" name="update" value="Apply">
  </form>
  <div class="desc" style="float:left;display:block;margin-top:15px;margin-left:20px;width:30%; ">
    Description:<br><p style="overflow:hidden;text-overflow:ellipsis; "><?php echo $ds; ?></p>
  </div>
  <div class="w3-yellow" style="float:right;display:block;margin:20px 0 20px 0px;">
    <button type="button" class="htmlbtn w3-btn" name="button" style=""><?php echo $htmlname; ?></button>
  </div>
</div>


<?php } ?>
</div>
<!--footer-->

<?php
if(isset($_SESSION['event'])){
  $x = $_GET['x'];
  $y = $_GET['y'];
  echo '
  <script>
  window.scrollTo('.'"'.$x.'"'.','.'"'.$y.'"'.')
  </script>
  ';

  $sqledit = "select description,htmlname from events where event = '$p11'";
  $result1 = mysqli_query($conn,$sqledit);
  $resultCheck1 = mysqli_num_rows($result1);
  if($resultCheck1>0){
    $row1 = mysqli_fetch_assoc($result1);

    $eventdesc1 = $row1['description'];
    $eventhtmlname = $row1['htmlname'];
    echo '
    <script>
    var row1 = document.querySelectorAll(".event");
    var element;
    var row2 = Array.from(row1);
    console.log(row2)
    row2.forEach(function(e){
    var t = e.textContent
        if (t =='.'"'.$p11.'"'.')
          element = e;


    })

    var mainrow = element.parentNode.parentNode.childNodes;
  element.parentNode.parentNode.style.backgroundColor = "#ff8787";
    console.log(mainrow);
    mainrow[3].style.display = "none";
    mainrow[5].style.display = "none";
    mainrow[7].style.display = "none";
    mainrow[9].style.display = "block";
    mainrow[11].style.display = "none";
    mainrow[13].style.display = "none";
    var formcol = mainrow[9].childNodes;
    formcol[3].value="' .$eventdesc1.'"
    console.log(formcol)
      </script>
    ';
    unset($_SESSION['event']);
}
}
 ?>

<script type="text/javascript">
//event manage
var globaleventname;
const delbtn = document.querySelectorAll('#eventList .row ');
delbtn.forEach(function(e){
  e.addEventListener('click',function(e1){
    //delete operation
    var query = e1.target.parentNode.parentNode.childNodes;
    var temp = query[3].textContent;
    globaleventname = temp.trim();
    if(e1.target.className == "delete w3-btn"){

console.log(temp);
  var div = e1.target.parentElement.parentElement;
  var flag = 0;
  if(confirm("Are you sure?")){
    flag = 1;
  }
  if(flag == 1){
  div.parentElement.removeChild(div);
  window.location.href = "eventDelete.php?name="+temp.trim();
}
}
else if(e1.target.className == "edit w3-btn"){

      var x= event.clientX;
      var y = event.clientY-100;
      window.location.href = "eventEdit.php?edit="+temp.trim()+"&x="+x+"&y="+y;


    }
    else if(e1.target.className == 'htmlbtn w3-btn'){
     window.location.href = "htmlbtn.php?html="+temp.trim();
   }
})
});

//adding events
const addbtn = document.querySelector("#eventAdd .add");
addbtn.addEventListener('click',function(e){
  var form = document.querySelector("#eventAdd .disForm")
  form.style.display = "block";


// form.style.display = "block";
addbtn.parentNode.style.display = "none"
})
  // var previous = document.getElementById('block');
  // // document.write(previous.innerHTML);
  // var url = document.referrer;
  //
  // function handleBack(){
  //
  //
  //
  //   if (url == previous.innerHTML)
  //   {
  //       alert("Its a back button click...");
  //       //Specific code here...
  //   }
  // }
</script>


<script>
  $(document).ready(function(){
    $('#insert').click(function(){
      var image_name = $('#image').val();
      if(image_name == '')
      {
        alert("please Select Image");
        return false;
      }
      else {
        {
          var extensions = $('#image').val().split('.').pop().toLowerCase();
          if(jQuery.inArray(extention,['gif','png','jpg','jpeg']) == -1)
          {
            alert('Invalid Image File');
            $('#image').val('');
            return false;
          }
        }
      }
    })
  })
</script>
<script type="text/javascript">

</script>
<?php }
else {
  echo '<script>alert("Redirecting to login page");
  window.location.href = "user.php";</script>
  ';
} ?>
<!--cancel btn in eventadd-->
<script type="text/javascript">
  function cancel(){
    var canbtn = document.querySelector("#eventAdd .disForm");
    canbtn.style.display = "none";
    var canbtn = document.querySelector("#eventAdd .add");
    canbtn.parentNode.style.display = "block"

  }
</script>

</body>
</html>
