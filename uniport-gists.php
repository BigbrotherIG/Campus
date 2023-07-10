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

    $uniportGist = "SELECT * FROM `post_data` WHERE trends = 'trends'  LIMIT $limit";
    $connPost = mysqli_query($conn, $uniportGist);
    $get_uniport = mysqli_fetch_all($connPost, MYSQLI_ASSOC);

    $uniportGistAll = $conn->query("SELECT * FROM `post_data` WHERE trends = 'trends'");
    $countAll = $uniportGistAll->num_rows;

    $pages = ceil($countAll/$limit);

?>

<div class="container" style="margin-top:100px"></div>

<!--  -->
<section class="my-4">

    <div class="container">
            <h2 class="my-4">Uniport Gists</h2>
            <h2 class="my-4"><?=$countAll?></h2>
            <div class="container row g-3">
                <div class="col-md-8 col-xs-6 border p-2 me-5">
                    <?php foreach($get_uniport as $uniport):?>
                        <div>
                            <a href="news.php?post_id=<?= $uniport['post_id']; ?>" class="lead fs-4 fw-normal text-primary"><?= $uniport['post_url']?></a>
                            <p></p>
                            <div class=" d-flex flex-column mb-3">
                                <img src="<?=$uniport['news_img']?>" class="img-responsive mx-auto" width="70%" height="300" alt="news-image">
                                <div class="ms-md-3 mt-2 mb-2">
                                    <small>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident aliquid voluptate ipsa ullam facilis voluptates assumenda esse aperiam adipisci magni? Quibusdam modi voluptas, soluta temporibus illo, quod alias eaque sequi minus quo cum eveniet assumenda?
                                        <a href="news.php?post_id=<?= $uniport['post_id'];?>" class="text-primary">Read more</a>
                                        </p>
                                    </small>
                                    <small class="">
                                        <small>Posted by:</small>
                                        <small class="text-danger"><?=$uniport['news_author']?></small>
                                        <small>| Date: <?=$uniport['news_date']?> </small><br>
                                        <small> Comment:</small>
                                    </small>
                                    <hr>
                                </div>    
                            </div>
                        </div>
                    <?php endforeach ;?>

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
                <a href="uniport-gists.php?page=<?=$prev?>" class="btn btn-outline-danger <?php if($page <= 1){?> disabled <?php }?>me-1">Prev</a>
                <?php 
                    if($pages <= 10) {
                        for($counter = 1; $counter <= $pages; $counter++) {
                            if($counter == $page) {                                        
                ?>
                    <a href="uniport-gists.php" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                <?php } else {?>
                    <a href="uniport-gists.php?page=<?=$counter?>" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                <?php } } }?>
                <a href="uniport-gists.php?page=<?=$next?>" class="btn btn-outline-primary <?php if($page >= $pages){?>disabled <?php }?>">Next</a>
            </div>
    </div>


</section>

<?php include 'footer.php' ?>