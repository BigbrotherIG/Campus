<?php include_once('./includes/dbconnect.php');

    $message = "";
    if(isset($_POST['send'])) {

        $pdf_file_type = array('pdf');
        if($_FILES['pdfUpload']['name']) {
            print_r($_FILES);
            $pdf_name = $_FILES['pdfUpload']['name'];
            $pdf_size = $_FILES['pdfUpload']['size'];
            $pdf_tmp = $_FILES['pdfUpload']['tmp_name'];

            $target_dir = "pdfUpload/.$pdf_name";
            $pdf_type = explode('.', $pdf_name);
            $pdf_type = strtolower(end($pdf_type));

            if(in_array($pdf_type, $pdf_file_type)) {
                if($pdf_size <= 500000) {
                    if(move_uploaded_file($pdf_tmp, $target_dir)) {
                        $queryInsert = $conn->query("INSERT INTO `pdf` (`pdf_name`) VALUES ('$target_dir')");
                        $message = "PDF uploaded";
                    }else {
                        $message = "Not file type";
                    }
                }else {
                    $message = "File is too large";
                }
            }else {
                $message = "File is not supported";
            }
        }else {
            $message = "error";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?=$message?>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="pdfUpload" id=""><br><br>
        <input type="submit" name="send" value="Send">
    </form>

    <?php 

    ?>
</body>
</html>