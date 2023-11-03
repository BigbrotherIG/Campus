<?php include_once("header.php");

    $message = "";
    if(isset($_POST['send'])) {
        if(!empty($_FILES['imgUpload']['name'])) {
            print_r($_FILES);
            $file_name = $_FILES['imgUpload']['name'];
            $file_size = $_FILES['imgUpload']['size'];
            $file_tmp = $_FILES['imgUpload']['tmp_name'];


        }else {
            $message = "No file type";
        }
    }
?>


    <div style="margin-top: 100px;"></div>
    <section class="my-5">
        <div class="row">
            <span><?=$message;?></span>
            <div class="container col col-6 border-dark">
                <form class="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
               
                    <div class="input-group mb-3">
                        <input type="file" name="imgUpload" class="form-control">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                

                    <!-- <div class="form-floating mb-3">
                        <label for="img">Image</label>
                        <input type="file" name="img2" id="">
                    </div>

                    <div class="form-floating mb-3">
                        <label for="img">Image</label>
                        <input type="file" name="img2" id="">
                    </div> -->
                    <div class="form-floating mb-3">
                        <input type="submit" name="send" id="">
                    </div>

                </form>
            </div>
            <div class="container">
                <?php 
                    $queryImg = $conn->query("SELECT * FROM upcoming_events");
                    while($row = mysqli_fetch_assoc($queryImg)){
                ?>
                <img src="<?=$row['event_img']?>" alt="" style="width: 250px; height: 200px"><br>
                <?php }?>
            </div>
        </div>
    </section>
<?php include_once("footer.php")?>