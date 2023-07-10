<?php include_once('header.php');

    $error_message = "";
    if(isset($_POST['post-house'])){

        // $post_title = $post_url = $author = $status = $

        $imgFormat = ['jpg', 'jpeg', 'png', 'gif'];
        if(!empty($_FILES['accommodation_image']['name'])){

            $file_name = $_FILES['accommodation_image']['name'];
            $file_size = $_FILES['accommodation_image']['size'];
            $file_tmp = $_FILES['accommodation_image']['tmp_name'];
            
            $target_dir = "../imgUpload/.$file_name";
            $target_file_name = 'imgUpload/'.$file_name;
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));

            if(!in_array($file_format, $imgFormat)) {
                $error_message = "Invalid Image type";
            }
        
        }else {
            $error_message = "Accomodation Image required";
        }

        $accommodation_title = $_POST['accommodation_url'];
        if(empty($accommodation_title)){
            $error_message = "Post Title must not be empty";
        }

        $accommodation_price = $_POST['accommodation_price'];
        if(empty($accommodation_price)){
            $error_message = "Price must not be empty";
        }

        // 
        $accommodation_detail = $_POST['accommodation_det'];
        if(empty($accommodation_detail)){
            $error_message = "Details must not be empty";
        }

        // Carousel Images
        $imgFormat = ['jpg', 'jpeg', 'png', 'gif'];
        if(!empty($_FILES['accommodation_img_1']['name'])){

            $file_name = $_FILES['accommodation_img_1']['name'];
            $file_size = $_FILES['accommodation_img_1']['size'];
            $file_tmp = $_FILES['accommodation_img_1']['tmp_name'];
            
            $target_dir = "../imgUpload/.$file_name";
            $target_file_name_1 = 'imgUpload/'.$file_name;
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));

            if(!in_array($file_format, $imgFormat)) {
                $error_message = "Invalid Image type";
            }
        
        }else {
            $error_message = "Carousel Image 1 required";
        }

        $imgFormat = ['jpg', 'jpeg', 'png', 'gif'];
        if(!empty($_FILES['accommodation_img_2']['name'])){

            $file_name = $_FILES['accommodation_img_2']['name'];
            $file_size = $_FILES['accommodation_img_2']['size'];
            $file_tmp = $_FILES['accommodation_img_2']['tmp_name'];
            
            $target_dir = "../imgUpload/.$file_name";
            $target_file_name_2 = 'imgUpload/'.$file_name;
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));

            if(!in_array($file_format, $imgFormat)) {
                $error_message = "Invalid Image type";
            }
        
        }else {
            $error_message = "Carousel Image 2 required";
        }

        $imgFormat = ['jpg', 'jpeg', 'png', 'gif'];
        if(!empty($_FILES['accommodation_img_3']['name'])){

            $file_name = $_FILES['accommodation_img_3']['name'];
            $file_size = $_FILES['accommodation_img_3']['size'];
            $file_tmp = $_FILES['accommodation_img_3']['tmp_name'];
            
            $target_dir = "../imgUpload/.$file_name";
            $target_file_name_third = 'imgUpload/'.$file_name;
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));

            if(!in_array($file_format, $imgFormat)) {
                $error_message = "Invalid Image type";
            }
        
        }else {
            $error_message = "Carousel Image 3 required";
        }

        $accommodation_amenities = $_POST['accommodation_amenities'];
        if(empty($accommodation_amenities)){
            $error_message = "Amenities must not be empty";
        }

        if(empty($error_message)) {

            if(move_uploaded_file($file_tmp, $file_format)) {

            
                $queryInsert = $conn->query("INSERT INTO `accommodation_data` (`accommodation_image`, `accommodation_url`, `accommodation_price`, `accommodation_det`, `accommodation_img_1`, `accommodation_img_2`, `accommodation_img_3`, `accommodation_amenities`, `date`)
                VALUES ('$target_file_name', '$accommodation_title', '$accommodation_price', '$accommodation_detail', '$target_file_name_1', '$target_file_name_2', '$target_file_name_third', '$accommodation_amenities', current_timestamp())");
                if($queryInsert){
                echo"
                    <script>alert('Form Submitted Successfully')</script>
                ";
                }else{
                echo"
                    <script>alert('Form Not Submitted')</script>
                ";
                }
            }
        }
       

    }


?>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Post House</h4>
                <p class="card-description"><?=$error_message?></p>

                <form class="forms-sample" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Accommodation Image</label>
                        <div class="input-group col-xs-12">
                            <input type="file" name="accommodation_image" class="form-control"  placeholder="Upload Image">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="accommodation_url">Accommodation Title</label>
                        <input type="text" name="accommodation_url" class="form-control" id="Author" placeholder="Accommodation Title">
                    </div>
                    
                    <div class="form-group">
                        <label for="accommodation_price">Accommodation Price</label>
                        <input type="num" name="accommodation_price" class="form-control" id="accommodation_price" placeholder="Accommodation price">
                    </div>

                    <div class="form-group">
                        <label for="editor">Accommodation Detail</label>
                        <textarea class="form-control" name="accommodation_det" id="editor"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Moving image 1</label>
                        <input type="file" name="accommodation_img_1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Moving image 2</label>
                        <input type="file" name="accommodation_img_2" class="form-control">         
                    </div>

                    <div class="form-group">
                        <label>Moving image 3</label>
                        <input type="file" name="accommodation_img_3" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="accommodation_amenities">Accommodation amenities</label>
                        <textarea class="form-control" name="accommodation_amenities" id="editor2"></textarea>
                    </div>
                    
                    <button type="submit" name="post-house" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include_once('footer.php')?>