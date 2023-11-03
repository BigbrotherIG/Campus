<?php include 'header.php';

    $limit = 10;

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }

    $start = $limit * ($page - 1);
    $next = $page + 1;
    $prev = $page - 1;
    
    $jambNews = "SELECT * FROM `post_data` WHERE trends = 'latest_trends' LIMIT $limit OFFSET $start";
    $connJamb = mysqli_query($conn, $jambNews);
    $get_jamb = mysqli_fetch_all($connJamb, MYSQLI_ASSOC);

    $jambALL = $conn->query("SELECT * FROM `post_data` WHERE trends = 'latest_trends'");
    $countAll = $jambALL->num_rows;

    $pages = ceil($countAll/$limit);

?>
    
    <title>Campus guide - JAMB News</title>

    <div class="container" style="margin-top:100px"></div>

    <!--  -->
    <section class="my-4">
        
        <div class="container">
            <h2 class="my-3">JAMB News</h2>
            <h2 class="my-3"><?=$countAll?></h2>
            <div class="container row g-3">
                <div class="col-md-8 col-xs-6 border p-2 me-5">
                    <?php foreach($get_jamb as $jamb):?>
                        <div>
                            <a href="news.php?post_id=<?php echo $jamb['post_id']; ?>" class="lead fs-4 fw-normal text-primary"><?php echo $jamb['post_url']?></a>
                            <p></p>
                            <div class=" d-flex flex-column mb-3">
                                <img src="<?=$jamb['news_img']?>" class="img-responsive mx-auto" width="70%" height="300">
                                <div class="ms-md-3 mt-2 mb-2">
                                    <small>
                                        <p><?=substr($jamb['news_detail'], 0, 255)?>
                                        <a href="news.php?post_id=<?= $jamb['post_id'];?>" class="text-primary">Read more</a>
                                        </p>
                                    </small>
                                    <small>
                                        <small>Posted by:</small>
                                        <small class="text-danger"> <?=$jamb['news_author']?></small>
                                        <small>| <?=$jamb['news_date']?></small><br>
                                        <small>Comment:</small>
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

            <div class="container p-3 mx-auto text-center">
                Advertisement
            </div>

            <div class="container mx-auto d-flex ">
            
                <a href="jamb.php?page=<?=$prev?>" class="btn btn-outline-danger <?php if($page <= 1){?>disabled<?php }?> me-1">Prev</a>
                
                <?php 
                    if($pages <= 10) {
                        for($counter = 1; $counter <= $pages; $counter++) {
                            if($counter === $page) {
                ?>
                    <a href="jamb.php" class="btn btn-outline-secondary me-1"><?=$counter ?></a>
                <?php } else { ?>
                    <a href="jamb.php?page=<?= $counter?>" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                <?php } } }?>

                <a href="jamb.php?page=<?=$next?>"  class="btn btn-outline-primary <?php if($page >= $pages){?>disabled<?php } ?>">Next</a>
            
            </div>
        </div>

    </section>

<?php include 'footer.php'; ?>
