<?php include_once('header.php');

    // $error_message = " ";
    if(isset($_POST['post'])){

        // $post_title = $post_url = $author = $status = $


        $post_url = $_POST['post_url'];
        if(empty($post_url)){
            $error_message = "Post url must not be empty";
        }else{

        }

        $author = $_POST['author'];
        if(empty($author)){
            $error_message = "Post url must not be empty";
        }else{

        }
        // $trends = $_POST['trends'];
        // if(empty($trends)){
        //     $error_message = "Post trends must not be empty";
        // }else{

        // }

        if(empty($error_message)) {

            $queryInsert = $conn->query("INSERT INTO `post_data` (`post_url`, `trends`, `news_author`, `news_detail`, `news_date`)
            VALUES ('$post_url', '', '$author', '', current_timestamp())");
            
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


?>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Post Advert</h4>
                <p class="card-description">Basic form elements</p>

                <form class="forms-sample" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" name="img"class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputEmail3">Post Title</label>
                        <input type="text" name="post_url" class="form-control" id="InputEmail3" placeholder="Post Title">
                    </div>

                    <div class="form-group">
                        <label for="accommodation_url">Accommodation Title</label>
                        <input type="text" name="accommodation_url" class="form-control" id="Author" placeholder="Accommodation Title">
                    </div>

                    <div class="form-group">
                        <label for="trends">Trends</label>
                        <select class="form-control" name="status" id="trends">
                            <option>lastest</option>
                            <option>trends</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" name="img"class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Textarea1">Textarea</label>
                        <textarea class="form-control" id="Textarea1" rows="6"></textarea>
                    </div>
                    
                    <button type="submit" name="post" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include_once('footer.php')?>