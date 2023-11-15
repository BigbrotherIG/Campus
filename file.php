<?php 
@include 'includes/dbconnect.php';

$message="";
if(isset($_POST['submit'])) {
    
        $imgFormat = array('jpg', 'jpeg', 'png', 'gif');
        if(!empty($_FILES['imgUpload']['name'])){
            print_r($_FILES);
            $file_name = $_FILES['imgUpload']['name'];
            $file_size = $_FILES['imgUpload']['size'];
            $file_tmp = $_FILES['imgUpload']['tmp_name'];
            
            $target_dir = "imgUpload/$file_name";
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));


            if(in_array($file_format, $imgFormat, $editor)) {
                if($file_size <= 90000000) {
                    if(move_uploaded_file($file_tmp, $target_dir)){
                        $query = $conn->query("INSERT INTO `pictures` (`picture`) VALUES  ('$target_dir')");
                        $message = '<p>File Uploaded</p>';
                    }else{
                        $message = '<p>Not File type</p>';
                    }
                }else{
                    $message = "<p>File is too large</p>";
                }
            }else{
                $message = "<p>File is not suppoorted</p>";
            }

        }else {
            $message = "Error";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./images/favicon.png" />
</head>
<body><br>
    <span><?=$message;?></span>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <input type="file" name="imgUpload" id=""><br>
        <input type="submit" value="Send" name="submit">
    </form>

    <?php
        $query = $conn->query("SELECT * FROM `pictures`");
        while($pic = mysqli_fetch_array($query)) {
    ?>

    <img src="<?=$pic['picture']?>" alt="" width="100px">
    <?php };?>
</body>
</html>
