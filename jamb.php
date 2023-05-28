<?php include 'header.php';

    $jambNews = "SELECT * FROM `post_data` WHERE trends = 'latest_trends' LIMIT 10";
    $connJamb = mysqli_query($conn, $jambNews);
    $get_jamb = mysqli_fetch_all($connJamb, MYSQLI_ASSOC);

    // $getQuery -> query("SELECT FROM `post_data` WHERE  news_detail ='news_detail' LIMIT 20");

    if($getQuery){

    }
?>

    <div class="container" style="margin-top:100px"></div>

    <!--  -->
    <section class="my-4">
        <div class="container">
            <h2 class="my-4">JAMB News</h2>
            <div class="container row g-3">
                <div class="col-md-8 col-xs-6 border p-2 me-5">
                    <?php foreach($get_jamb as $jamb):?>
                        <div>
                            <a href="news.php?post_id=<?php echo $jamb['post_id']; ?>" class="lead fs-4 fw-normal text-primary"><?php echo $jamb['post_url']?></a>
                            <p></p>
                            <div class=" d-flex flex-column mb-3">
                                <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" class="img-responsive mx-auto" width="70%" height="300">
                                <div class="ms-md-3 mt-2 mb-2">
                                    <small>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident aliquid voluptate ipsa ullam facilis voluptates assumenda esse aperiam adipisci magni? Quibusdam modi voluptas, soluta temporibus illo, quod alias eaque sequi minus quo cum eveniet assumenda?
                                        <p><?= $jamb['news_detail'];?></p>
                                        <a href="news.php?post_id=<?= $jamb['post_id'];?>" class="text-primary">Read more</a>
                                        </p>
                                    </small>
                                    <small class="">
                                       
                                        <!-- <small> <?= $jamb [date('jS F')] ?> |</small> -->
                                        <small> <?= $jamb ['news_date']?> |</small>
                                        <small> comment</small>
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
                <a href="" class="btn btn-outline-danger me-1">Prev</a>
                <a href="jamb.php?" class="btn btn-outline-primary">Next</a>
            </div>
        </div>

    </section>

<?php include 'footer.php'; ?>
