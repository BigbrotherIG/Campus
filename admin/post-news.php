<?php include_once('header.php');

    $error_message = "";
    if(isset($_POST['post'])){

        $post_url = $_POST['post_url'];
        if(empty($post_url)){
            $error_message = "Post url must not be empty";
        }

        $author = $_POST['author'];
        if(empty($author)){
            $error_message = "Post url must not be empty";
        }

        $trends = $_POST['status'];
        if(empty($trends)){
            $error_message = "Post trends must not be empty";
        }
        
        $imgFormat = array('jpg', 'jpeg', 'png', 'gif');
        if(!empty($_FILES['news_img']['name'])){

            $file_name = $_FILES['news_img']['name'];
            $file_size = $_FILES['news_img']['size'];
            $file_tmp = $_FILES['news_img']['tmp_name'];
            
            $target_dir = "../imgUpload/.$file_name";
            $target_file_name = 'imgUpload/'.$file_name;
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));

            if(!in_array($file_format, $imgFormat)) {
                $error_message = "Invalid Image type";
            }
        
        }else {
            $error_message = "Image required";
        }

        $textarea = $_POST['textarea'];
        if(empty($textarea)) {
            $error_message = "News details must not be empty";
        }

        if(empty($error_message)) {

            if(move_uploaded_file($file_tmp, $target_dir)){

                $queryInsert = $conn->query("INSERT INTO `post_data` (`post_url`, `trends`, `news_author`, `news_img`, `news_detail`, `news_date`)
                VALUES ('$post_url', '$trends', '$author', '$target_file_name', '$textarea', current_timestamp())");

                    $id = $_SESSION['account_id'];
                    $queryUpdate = $conn->query("INSERT INTO `admin_log` (`admin_id`, `activities`, `activity_time`)
                     VALUES ('$id', 'Added a new post', current_timestamp())");
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
                <h4 class="card-title">Post News</h4>
                <p class="card-description"><?=$error_message?></p>

                <form action="" class="forms-sample" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="InputEmail3">Post Title</label>
                        <input type="text" name="post_url" class="form-control" id="InputEmail3" placeholder="Post Title">
                    </div>

                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" name="author" class="form-control" id="Author" placeholder="Author">
                    </div>

                    <div class="form-group">
                        <label for="trends">Trends</label>
                        <select class="form-control" name="status" id="trends">
                            <option>lastest_trends</option>
                            <option>trends</option>
                            <option>latest_news</option>
                            <option>new</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="news_img">File upload</label>                        
                        <input type="file" name="news_img" class="form-control" placeholder="Upload Image">             
                    </div>

                    <div class="form-group">
                        <label for="Textarea1">News Details</label>
                        <textarea class="form-control" name="textarea" id="editor" rows="6"></textarea>
                    </div>
                    
                    <button type="submit" name="post" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include_once('footer.php')?>