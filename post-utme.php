<?php include 'header.php';

    $limit = 10;

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $start = $limit * ($page - 1);
    $next = $page + 1;
    $prev = $page - 1;

    $postUtme = "SELECT * FROM `post_data` WHERE trends = 'latest_news'  LIMIT $limit OFFSET $start";
    $connPost = mysqli_query($conn, $postUtme);
    $get_post = mysqli_fetch_all($connPost, MYSQLI_ASSOC);

    $utmeAll = $conn->query("SELECT * FROM `post_data` WHERE trends = 'latest_news'");
    $countAll = $utmeAll->num_rows;

    $pages = ceil($countAll/$limit);

?>

    <title>Campus guide - Post Utme</title>
    <!-- Space -->
    <div class="container" style="margin-top:100px"></div>

    <!--  -->
    <section class="my-4">
    
        <div class="container">
                <h2 class="my-4">Post-Utme News</h2>
                <h2 class="my-4"><?=$countAll?></h2>
                <div class="container row g-3">
                    <div class="col-md-8 col-xs-6 border p-2 me-5">
                        <?php foreach($get_post as $utme):?>
                            <div>
                                <a href="news.php?post_id=<?php echo $utme['post_id']; ?>" class="lead fs-4 fw-normal text-primary"><?php echo $utme['post_url']?></a>
                                <p></p>
                                <div class=" d-flex flex-column mb-3">
                                    <img src="<?=$utme['news_img']?>" class="img-responsive mx-auto" width="70%" height="300">
                                    <div class="ms-md-3 mt-2 mb-2">
                                        <small>
                                            <p><?=$utme['news_detail']?>
                                            <a href="news.php?post_id=<?=$utme['post_id'];?>" class="text-primary">Read more</a>
                                            </p>
                                        </small>
                                        <small class="">
                                            <small>Posted by:</small>
                                            <small class="text-danger">author</small>
                                            <small>| Date: <?=$utme['news_date']?></small><br>
                                            <small>Comment</small>
                                        </small>
                                        <hr>
                                    </div>    
                                </div>
                            </div>
                        <?php endforeach; ?>

                    

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
                
                    <div class="col-md-3 col-xs-3 border h-100">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                
                <div class="container p-3 mx-auto d-flex ">
                    <a href="post-utme.php?page=<?=$prev?>" class="btn btn-outline-danger <?php if($page <= 1){?>disabled<?php }?> me-1">Prev</a>
                    <?php 
                        if($pages <= 10) {
                            for($counter = 1; $counter <= $pages; $counter++) {
                                if($counter === $page) {                                                            
                    ?>
                        <a href="post-utme.php?page=<?=$counter?>" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                    <?php } else {?>
                    <a href="post-utme.php?page=<?=$counter?>" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                    <?php } } }?>

                    <a href="post-utme.php?page=<?=$next?>" class="btn btn-outline-primary <?php if($page >= $pages){?>disabled<?php }?>">Next</a>
                </div>
                
                <div class="container p-3 mx-auto text-center">
                    Advertisement
                </div>

        </div>

    </section>

<?php include 'footer.php'?>