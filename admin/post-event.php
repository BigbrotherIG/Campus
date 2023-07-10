<?php include_once('header.php');

    $error_message = "";
    if(isset($_POST['post-event'])){

        $imgFormat = ['jpg', 'jpeg', 'png', 'gif'];
        if(!empty($_FILES['event_img']['name'])){

            $file_name = $_FILES['event_img']['name'];
            $file_size = $_FILES['event_img']['size'];
            $file_tmp = $_FILES['event_img']['tmp_name'];
            
            $target_dir = "../imgUpload/.$file_name";
            $target_file_name = 'imgUpload/'.$file_name;
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));

            if(!in_array($file_format, $imgFormat)) {
                $error_message = "Invalid Image type";
            }
        
        }else {
            $error_message = "Event Image required";
        }

        $eventTitle = $_POST['event_url'];
        if(empty($eventTitle)){
            $error_message = "Event Title must not be empty";
        }

        $eventPrice = $_POST['event_price'];
        if(empty($eventPrice)){
            $error_message = "Event Price must not be empty";
        }

        $eventDetail = $_POST['event_detail'];
        if(empty($eventDetail)){
            $error_message = "Event Detail  must not be empty";
        }

        $eventList = $_POST['event_list'];
        if(empty($eventList)){
            $error_message = "Event List  must not be empty";
        }

        $event_status = $_POST['event_status'];
        if(empty($event_status)){
            $error_message = "Event status trends must not be empty";
        }

        $imgFormat = ['jpg', 'jpeg', 'png', 'gif'];
        if(!empty($_FILES['event_img_1']['name'])){

            $file_name = $_FILES['event_img_1']['name'];
            $file_size = $_FILES['event_img_1']['size'];
            $file_tmp = $_FILES['event_img_1']['tmp_name'];
            
            $target_dir = "../imgUpload/.$file_name";
            $target_file_name_1 = 'imgUpload/'.$file_name;
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));

            if(!in_array($file_format, $imgFormat)) {
                $error_message = "Invalid Image type";
            }
        
        }else {
            $error_message = "Event Image required";
        }

        $imgFormat = ['jpg', 'jpeg', 'png', 'gif'];
        if(!empty($_FILES['event_img_2']['name'])){

            $file_name = $_FILES['event_img_2']['name'];
            $file_size = $_FILES['event_img_2']['size'];
            $file_tmp = $_FILES['event_img_2']['tmp_name'];
            
            $target_dir = "../imgUpload/.$file_name";
            $target_file_name_2 = 'imgUpload/'.$file_name;
            // Get file format
            $file_format = explode('.', $file_name);
            $file_format = strtolower(end($file_format));

            if(!in_array($file_format, $imgFormat)) {
                $error_message = "Invalid Image type";
            }
        
        }else {
            $error_message = "Event Image required";
        }

        if(empty($error_message)) {

            if(move_uploaded_file($file_tmp, $file_format)) {

                $queryInsert = $conn->query("INSERT INTO `upcoming_events` (`event_img`, `event_url`, `event_price`, `event_detail`, `event_img_1`, `event_img_2`, `event_list`,`event_status`, `date` ) 
                VALUES ('$target_file_name', '$eventTitle', '$eventPrice','$eventDetail', '$target_file_name_1', '$target_file_name_2', '$eventList', '$event_status', current_timestamp())");
                
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
                <h4 class="card-title">Post Event</h4>
                <p class="card-description"><?=$error_message?></p>

                <form class="forms-sample" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Event image</label>                      
                        <input type="file" name="event_img" class="form-control file-upload-info"  placeholder="Upload Image">
                    </div>

                    <div class="form-group">
                        <label for="event_url">Event Title</label>
                        <input type="text" name="event_url" class="form-control" id="event_url" placeholder="Event Title">
                    </div>

                    <div class="form-group">
                        <label for="Event Price">Event Price</label>
                        <input type="num" name="event_price" class="form-control" id="event_price" placeholder="Event Price">
                    </div>

                    <div class="form-group">
                        <label for="trends">Event Trends</label>
                        <select class="form-control" name="event_status" id="trends">
                            <option>upcoming</option>
                            <option>more-event</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Event image 1</label>                      
                        <input type="file" name="event_img_1" class="form-control file-upload-info"  placeholder="Upload Image">
                    </div>

                    <div class="form-group">
                        <label>Event image 2</label>                      
                        <input type="file" name="event_img_2" class="form-control file-upload-info"  placeholder="Upload Image">
                    </div>

                    <div class="form-group">
                        <label for="Textarea1">Event List</label>
                        <textarea class="form-control" name="event_list" id="Textarea1" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Textarea1">Event Description</label>
                        <textarea class="form-control" name="event_detail" id="Textarea1" rows="6"></textarea>
                    </div>
                    
                    <button type="submit" name="post-event" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include_once('footer.php')?>