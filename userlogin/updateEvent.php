<?php
session_start();
include "connect.php";
$p1 = $_POST['editevent'];
$p2=$_POST['editdesc'];
$p3 = $_GET['event'];
echo $_FILES["htmlfile1"]["name"];

if(file_exists($_FILES['htmlfile1']['tmp_name']) || is_uploaded_file($_FILES['htmlfile1']['tmp_name'])){
  echo "files";
  $target_dir = "assests/";
  $target_file = $target_dir . basename($_FILES["htmlfile1"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image

  // Check if file already exists

  // Check file size
  if ($_FILES["htmlfile1"]["size"] > 500000) {
      echo "<script>alert(Sorry, your file is too large.)
    window.location.href = 'userHome.php'</script>";
      $uploadOk = 0;
  }
  // Allow certain file formats
  else if($imageFileType != "html" && $imageFileType != "php" ) {
      echo "<script>alert('Sorry, only html,php files')
   window.location.href = 'userHome.php';
      </script>";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  else if ($uploadOk == 0) {
      echo "<script>alert(Sorry, your file was not uploaded)
     window.location.href = 'userHome.php'</script>";
  // if everything is ok, try to upload file
  } else {
    if(isset($_POST["update"])){


            $htmlfile = addslashes(file_get_contents($_FILES["htmlfile1"]["tmp_name"]));
            $htmlname = basename($_FILES["htmlfile1"]["name"]);
            $sql = "update events set event='$p1',description='$p2',htmlfile='$htmlfile',htmlname='$htmlname' where event = '$p3'";
            // $sql = "insert into events(pic,event,description,image,htmlfile,htmlname) values('$pic','$p1','$p2','$file','$htmlfile','$htmlname')";


          if(mysqli_query($conn,$sql)){
          echo '
          <script type="text/javascript">
          alert("update succesfull");
            window.location.href = "userHome.php";
          </script>
          ';
        }
        else {
            echo '
            <script>alert unable to upload image
            window.location.href = "userHome.php"</script>
            ';
        }
      }else {
          echo '
          <script>alert unable to upload image
          window.location.href = "userHome.php"</script>
          ';
      }
  }
}
else {

  $sql = "update events set event='$p1', description='$p2' where event = '$p3';";
  mysqli_query($conn,$sql);
echo "sec";
  header("Location: userHome.php");
}
 ?>
