<?php include_once 'includes/dbconnect.php';


    $message = "";
    if(isset($_POST['send'])) {

        $imgFormat = array("jpg", "png", "jpeg");
        if(!empty($_FILES['imgUpload']['name'])) {
            print_r($_FILES);
            $file_name = $_FILES['imgUpload']['name'];
            $file_tmp = $_FILES['imgUpload']['tmp_name'];

            $file_name_2 = $_FILES['imgUpload']['name'];
            $file_tmp_2 = $_FILES['imgUpload']['tmp_name'];

            $target_dir = "imgUpload/$file_name";
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = explode('.', $file_name_2);
            $file_format  = strtolower(end($file_format));

            if(in_array($file_format, $imgFormat)) {
                if(move_uploaded_file($file_tmp, $target_dir)) {
                    $query = $conn->query("INSERT INTO `pictures` (`picture`) VALUES  ('$target_dir')");
                    $message = '<p>File Uploaded</p>';
                }else {
                    $message = '<p>Not File type</p>';
                }
                if(move_uploaded_file($file_tmp_2, $target_dir)) {
                    $query = $conn->query("INSERT INTO `pictures` (`picture`) VALUES  ('$target_dir')");
                    $message = '<p>File Uploaded</p>';
                }else {
                    $message = '<p>Not File type</p>';
                }
            }else {
                $message = "Error";
            }
        }else {
            $message = "Error";
        }
    }
?><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Img</title>
</head>
<body><br>

    <span><?=$message?></span>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="imgUpload[0]" id=""><br><br>
        <input type="file" name="imgUpload[1]" id=""><br><br>
        <!-- <input type="file" name="img[2]" id=""><br> -->

        <input type="submit" name="send" value="Send">

        <?php 
            $query = $conn->query("SELECT * FROM `pictures`");
            while($pic = mysqli_fetch_array($query)) {
        
        ?>

        <img src="<?=$pic['picture']?>" alt="" width="100px">
        <?php };?>
    </form>
</body>
</html>