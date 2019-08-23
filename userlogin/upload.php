<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body >
<?php
include 'connect.php';
$target_dir = "assests/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["insert"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
echo "here1";
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image or file too big')
        window.location.href = 'userHome.php'</script>";
        $uploadOk = 0;
    }
}
echo "l";
// Check if file already exists

// Check file size
if ($_FILES["image"]["size"] > 1000000) {
    echo "<script>alert('Sorry, your file is too large.');
    window.location.href = 'userHome.php'</script>";
    $uploadOk = 0;
}
// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed or file is too large')
    window.location.href = 'userHome.php';
    </script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
else if ($uploadOk == 0) {
    echo "<script>alert(Sorry, your file was not uploaded)
    window.location.href = 'userHome.php'</script>";
// if everything is ok, try to upload file
echo "here";
} else {
  if(isset($_POST["insert"])){
          $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
            $pic = basename( $_FILES["image"]["name"]);
          $p1 = $_POST['event'];
          $p1 = htmlspecialchars($p1);
          $p2 = $_POST['desc'];
          $p2 = htmlspecialchars($p2);
          $p3 = $_POST['priority'];
          $p3 = htmlspecialchars($p3);
          $htmlfile = addslashes(file_get_contents($_FILES["htmlfile"]["tmp_name"]));
          $htmlname = basename($_FILES["htmlfile"]["name"]);
          echo $p3;
          $sql = "insert into events(pic,event,description,image,htmlfile,htmlname,priority) values('$pic','$p1','$p2','$file','$htmlfile','$htmlname','$p3')";


        if(mysqli_query($conn,$sql)){
        echo '
        <script type="text/javascript">
        alert("Image Upload Successfull");
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
?>


  </body>
</html>
