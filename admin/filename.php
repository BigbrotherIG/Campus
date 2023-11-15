<?php 
@include 'dbconnect.php';
    $data = [];
    if(isset($_FILES['uploads']['name'])) {
        print_r($_FILES);

        $file_name = $_FILES['uploads']['name'];
        $file_path = 'uploads/' .$file_name;
        $file_ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        if($file_ext == 'jpg' || $file_ext == 'png' || $file_ext == 'gif' || $file_ext == 'jpeg') {
            if(move_uploaded_file($_FILES['uploads']['tmp_name'], $file_path)){
                $data['file'] = $file_name;
                $data['url'] = $file_path;
                $data['uploaded'] = 1;

            }else {
                $data['uploaded'] = 0;
                $data['error']['message'] = 'error';

            }
        }
    }else {
        $data['uploaded'] = 0;
        $data['error']['message'] = 'Invalid ext';
    }

    echo json_encode($data)
?>