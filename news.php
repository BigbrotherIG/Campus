<?php include 'header.php'; ?>
<?php
    if(isset($_GET['post_id'])){
         $new = $_GET['post_id'];
    }

    $my_news = "SELECT * FROM `post_data` WHERE `post_id` = $new";
    $eachnews = mysqli_query($conn, $my_news);
    $get_news = mysqli_fetch_all($eachnews, MYSQLI_ASSOC);


    $name = $comments = '';
    $nameErr = $bodyErr = '';


    if(isset($_POST['comment'])){
        
        if(empty($_POST['name'])) {
            $nameErr = "Name is required";
        }else {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if(empty($_POST['comments'])) {
            $bodyErr = "Comment is required";
        }else {
            $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }


        if(!empty($nameErr) && !empty($bodyErr)) {
            // Echo error
            echo "Error";
        } else {
                      
            $queryInsert = $conn->query("INSERT INTO `post_comments` ( `post_id`, `name`, `comment`, `date`)
                VALUES ('$new', '$name', '$comments', current_timestamp())");
            
            if(!empty($queryInsert)){
                $query = $conn->query("SELECT * FROM `post_comments`");
                echo '$query';
                // while($query )
            }

     
        }

    }
    
?>

    <div class="container" style="margin-top: 100px;"></div>

    <!--  -->
    <section class="my-4">
        <div class="container">
            <?php foreach($get_news as $newsId):?>
                <h2 class="my-4 text-primary"><?php echo $newsId['post_url']?></h2>
                <div class="container row g-3">
                
                <!-- News blog -->
                <div class="col-md-8 col-xs-6 border p-2 me-3">
                    <!-- Date posted and author -->
                    <p class="container">
                        <small>Posted by:</small>
                        <small class="text-primary"><?php echo $newsId['news_author']; ?></small><br>
                        <small> <?= $newsId['news_date']?> |</small>
                        <small> comment</small>
                    </p>
                    <!-- News details -->
                    <p class="container lead fs-6 fw-normal text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum earum est natus dolorem alias nulla maiores, praesentium quasi accusamus dolorum.</p>
                    <div class="container d-flex flex-column mb-4">
                        <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" class="mx-auto img-responsive align-" width="80%" height="300">
                        <div class="ms-md-3 mt-2">
                            <p class="mb-0 text-primary"><?php echo $newsId['news_author']; ?></p>
                        </div>
                        
                    </div>

                    <div class="container d-flex flex-column mt-3">
                        <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" class="mx-auto img-responsive" width="80%" height="300">
                        <div class="ms-md-3 ">
                            
                        </div>
                        
                    </div>

                    <!-- See comments -->
                    <div class="container comment-section my-3" style="background-color: var(--lg-grey);">
                        <p class="mx-3 my-0 text-primary"><?= $name;?></p>
                        <p class="mx-3 my-2 text-primary"><?= $comments;?></p>
                    </div>

                    <!-- Comments -->
                    <div class="container mt-3">
                        <form action="" class="form container" method="POST">
                            <p class="m-0">Post your comment</p>
                            <div>
                                <label class="form-label <?= $nameErr ? 'is-invalid' : null;?>" for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <div class="invalid-feedback">
                                    <?= $nameErr; ?>
                                </div>
                            </div>
                            
                            <div class="">                           
                                <label class="form-label " for="comments">Comment: </label>
                                <textarea name="comments" id="comments" class="form-control <?= $bodyErr[''] ?? "is-invalid";?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $bodyErr; ?>
                                </div>
                            </div>

                            <input type="submit" name="comment" value="Send" class="send btn btn-primary mt-3">
                        </form>
                    </div>

                    <div class="container my-4">
                        <div class="bg-info text-white">
                            <p class="lead fw-normal text-center">Be the first to know</p> 
                            <p class="text-center">Get notify when a new question is ask or answer</p>
                            <div class="d-flex justify-content-center pb-3">
                                <a href="" class="btn btn-outline-light">Subcribe</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        
                <!-- Advertisement -->
                <div class="col-md-3 col-xs-3 border h-100">
                    <p>Place your advert.</p>
                </div>
            </div>

            <div class="container p-3 mx-auto text-center">
                Advertisement
            </div>
        </div>
    </section>


<?php include 'footer.php'; ?>