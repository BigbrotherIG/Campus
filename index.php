<?php include 'header.php';

    $sql = "SELECT * FROM `post_data` WHERE trends = 'latest_trends' LIMIT 10";
    $sql_2 = "SELECT * FROM `post_data` WHERE trends = 'latest_news' LIMIT 5";
    $sql_3 = "SELECT * FROM `post_data` WHERE trends = 'trends' LIMIT 8";
    $sql_4 = "SELECT * FROM `upcoming_events` WHERE event_status = 'upcoming' LIMIT 9";
    $faq = "SELECT * FROM `campus_guide_faq` LIMIT 5";
    $result = mysqli_query($conn, $sql);
    $result_2 = mysqli_query($conn, $sql_2);
    $result_3 = mysqli_query($conn, $sql_3);
    $result_4 = mysqli_query($conn, $sql_4);
    $faq_result = mysqli_query($conn, $faq);
    $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $news_2 = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
    $news_3 = mysqli_fetch_all($result_3, MYSQLI_ASSOC);
    $events = mysqli_fetch_all($result_4, MYSQLI_ASSOC);
    $get_faq = mysqli_fetch_all($faq_result, MYSQLI_ASSOC);
?>
    
    <title>Campus guide - Home</title>
    <!-- Carousel -->
    <div class="carousel slide mt-5" id="myCarousel" data-bs-ride="carousel">
            
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button class="active" type="button" data-bs-slide-to="0" data-bs-target="#myCarousel"></button>
                <button type="button" data-bs-slide-to="1" data-bs-target="#myCarousel"></button>
                <button type="button" data-bs-slide-to="2" data-bs-target="#myCarousel"></button>
            </div>

            <!-- Carousel Inner -->
            <div class="carousel-inner shadow-5-strong">
                <div class="carousel-item active">
                    <img src="./Img/group-five-african-college-students-spending-time-together-campus-university-yard-black-afro-friends-studying-education-theme.jpg" alt="" class="d-block w-100" style="width:100%; height: 550px;">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h4>First Slide</h4>
                            <p>This is the first slide</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./Img/paolo-nicolello-umUfeLXPB_I-unsplash.jpg" alt="" class="d-block w-100" style="width:100%; height: 550px;">
                    <div class="container">
                        <div class="carousel-caption">
                            <h4>Second Slide</h4>
                            <p>This is the second slide</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="d-block w-100" style="width:100%; height: 550px;">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h4>Third Slide</h4>
                            <p>This is the third slide</p>
                        </div>
                    </div>
                </div>

            <!-- Button control icon left/right -->
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
    </div>

    <!-- Showcase -->
    <section class="container my-5" style="margin-top: 300px;">
        <div id="section3" class="p-2 p-md-5 rounded text-bg-dark animate__fadeInDown">
            <div class="col-md-9 px-0">
                <h2 class="display-6 fst-italic">Stay updated with the lastest news & trends</h2>
                <p class="lead my-2">concerning Nigerian Univerities with Campus Guide</p>
                <p class="lead mb-0"><a href="#news" class="text-white fw-normal">Check lastest news</a></p>
            </div>
        </div>
        
        <div class="row my-4">
            <?php 
                $querySelect = $conn->query("SELECT * FROM `post_data` WHERE trends = 'new' LIMIT 1");
                while($featurePost = mysqli_fetch_array($querySelect)) {  
            ?>
            <div id="section1" class="col-md-6 animate__animated animate__fadeInLeft">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-bl#ock mb-2 pb-2 text-primary">World</strong>
                        <h3 class="mb-0 fs-6"><?=$featurePost['post_url']?></h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="news.php?post_id=<?=$featurePost['post_id']?>" class="stretched-link text-danger">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>></svg>
                    </div>
                </div>
            </div>
            <?php };?>

            <?php 
                $querySelect = $conn->query("SELECT * FROM `post_data` WHERE trends = 'trends' LIMIT 1");
                while($featurePost = mysqli_fetch_array($querySelect)) {  
            ?>
            <div id="section2" class="col-md-6 animate__animated animate__fadeInRight">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shawdow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">New</strong>
                        <h3 class="mb-0 fs-6"><?=$featurePost['post_url']?></h3>
                        <div class="mb-1 text-muted"><?php echo date('F jS'); ?></div>
                        <p class="card-text mb-auto">This is a wilder card with supportings text below as a natural lead-in to additional content.</p>
                        <a href="news.php?post_id=<?=$featurePost['post_id']?>" class="stretched-link text-danger">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>></svg>
                    </div>
                </div>
            </div>
            <?php } ;?>
        </div>
    </section>
    <!-- Showcase -->

    <!-- New Update -->
    <section class="my-4 py-0" id="news">
        <div class="container">
            <h2 class="display-6 text-start text-danger">New Update</h2>
            <?php if(empty($news)): ?>
                <p>There is no news</p>
            <?php endif; ?>
            <hr class="featurette-divider">
            <div class="row">
                <div class="col-md-8">
                    <p class="col-md-8 display-6 fw-auto text-danger">Lastest News</p>
                    <div class="container row">
                        <div class="col-md">
                            <div class="lastest-news">                        
                                <?php foreach($news as $post): ?>
                                    <div class="heading">
                                        <a href="news.php?post_id=<?php echo $post['post_id']; ?>" class="pb-5 text-primary"><?php echo $post['post_url']; ?></a>
                                        <hr>
                                    </div>
                                <?php endforeach; ?>
                            </div>                      
                        </div>
                            
                        <div class="col-md">
                            <div class="flex flex-column pb-0">
                                <h5 class="">
                                    <a href="" class="text-danger text-underline-hover"><?php echo $post['post_url'] ?></a>
                                </h5>
                                <img src="./img/group-five-african-college-students-spending-time-together-campus-university-yard-black-afro-friends-studying-education-theme.jpg" alt="" class="w-100 img-container">
                            </div>
                            <div class="d-flex">
                                <ul>
                                    <li><a href="" class="text-primary"></a></li>
                                </ul>
                            </div>
                            <?php foreach($news_2 as $post): ?>
                                <div class="heading">
                                    <a href="news.php?post_id=<?= $post['post_id'];?>" class="text-danger"><?php echo $post['post_url']; ?></a>
                                    <hr>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>     
                </div>

                <div class="col-md-4">
                    <p class="col-md-4 display-6 fw-auto text-danger">Trends</p>
                    <img src="./img/group-five-african-college-students-spending-time-together-campus-university-yard-black-afro-friends-studying-education-theme.jpg" alt="" class="w-100 img-container">
                    <div class="d-flex">
                        <ul>
                            <li><a href="" class="text-primary"></a></li>
                        </ul>
                    </div>
                    <?php  foreach($news_3 as $post): ?>
                        <div class="heading">
                            <a href="news.php?post_id=<?= $post['post_id']; ?>" class="pb-2 text-primary"><?php echo $post['post_url']; ?></a>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="d-flex py-2 justify-content-start">
                <a href="latest-gists.php" class="btn btn-outline-danger me-2" type="button">Read more here</a>
                <a href="" class="btn btn-outline-warning" type="button">Subcribe</a>
            </div>
        </div>
    </section>
    <!-- New Update -->

    <!-- FAQs -->
    <section id="questions" class="my-4 mb-5">
        <h2 class="text-center text-dark py-3">Frequently Asked Questions</h2>

        <div class="container accordion accordion-flush" >
            <?php foreach($get_faq as $faq_ans): ?>
                <div class="accordion-item">
                    
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?=$faq_ans['faq_id']?>">
                        <?php echo $faq_ans['faq_title']; ?>
                    </button>
                    <div id="flush-collapseOne<?=$faq_ans['faq_id']?>" class="accordion-collapse collapse">
                        <div class="accordion-body"><?php echo $faq_ans['faq_ans']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>    
        </div>
    </section>
    <!-- FAQs -->


    <!-- Past questions -->
    <section class="my-4 mb-3">
        <div class="container my-4">
            <h2 class="text-dark text-center">Buy and study official past questions</h2>
            <hr>
            <div class="container row g-3">
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex  align-items-center">
                        <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="100">
                        <a href="" class="text-primary">JAMB past questions</a>
                    </div>             
                </div>
                <div class="col-md-6 col-lg-4">
                <div class="d-flex  align-items-center">
                        <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="100">
                        <a href="" class="text-primary">Uniport past questions</a>
                    </div>      
                </div>
                <div class="col-md-6 col-lg-4">
                <div class="d-flex  align-items-center">
                        <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="100">
                        <a href="" class="text-primary">Rivers state past questions</a>
                    </div>      
                </div>
            
            </div>
            <p class="lead text-danger my-2 p-3">Didn't see what you looking for? click <a href="#" class="text-primary">Here</a></p>
        </div>
    </section>
    <!-- Past questions -->


    <!-- Marketplace -->
    <!-- <section class="my-5 mt-3">
        <div class="container my-4">
            <h2 class="text-center text-dark">Marketplace</h2>
            <hr>
            <div class="container row g-3">
                    <div class="col-md-6 col-lg-4">
                        <div class="d-flex  align-items-center">
                            <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="120">
                            <a href="" class="text-primary">JAMB past questions</a>
                        </div>             
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="d-flex  align-items-center">
                            <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="120">
                            <a href="" class="text-primary">JAMB past questions</a>
                        </div>      
                    </div>
                    <div class="col-md-6 col-lg-4">
                    <div class="d-flex  align-items-center">
                            <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="120">
                            <a href="" class="text-primary">JAMB past questions</a>
                        </div>      
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="d-flex  align-items-center">
                            <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="120">
                            <a href="" class="text-primary">JAMB past questions</a>
                        </div>             
                    </div>
                    <div class="col-md-6 col-lg-4">
                    <div class="d-flex  align-items-center">
                            <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="120">
                            <a href="" class="text-primary">JAMB past questions</a>
                        </div>      
                    </div>
                    <div class="col-md col-lg-4">
                    <div class="d-flex  align-items-center">
                            <img src="./Img/baim-hanif-pYWuOMhtc6k-unsplash.jpg" alt="" class="img-container me-3" width="120">
                            <a href="" class="text-primary">JAMB past questions</a>
                        </div>      
                    </div>
                </div>
        </div>
    </section> -->

    <!-- Questions & Answer Section -->
    <section class="my-5 mb-5">
        <div class="container">
            <h2 class="text-center texr-dark">Ask your Questions</h2>
            <hr>
            <div class="row g-3">
                <div class="col-md">
                    <div class="container d-flex align-items-center">
                        <img src="./img/1.png" alt="" class="img-container" width="100">
                        <div class="ms-2">
                            <a href="" class="link-primary">When is last list coming out?</a>
                            <a href="" class="link-danger">Answer</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class=" col-md">
                    <div class="container d-flex align-items-center">
                        <img src="./img/2.png" alt="" class="img-container" width="100">
                        <div class="ms-2">
                            <a href="" class="link-primary">When is last list coming out?</a>
                            <a href="" class="link-danger">Answer</a>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="d-flex py-2 justify-content-start">
                <a href="" class="btn btn-outline-danger me-2" type="button">All Questions</a>
                <a href="" class="btn btn-outline-warning" type="button">Ask a question</a>
            </div>
        </div>
    </section>
    <!-- Questions & Answer Section -->


    <!-- Upcoming Events -->
    <section class="my-5 mb-4 mt-3">
        <div class="container my-4">
            <h2 class="text-center text-dark">Upcoming Events</h2>
            <hr>
            <div class="container row g-3">
                <?php foreach($events as $event): ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="d-flex  align-items-center">
                            <img src="<?php echo $event['event_img']; ?>" alt="" class="img-container me-3" width="80"  height="80">
                            <a href="event-details.php?events_id=<?php echo $event['events_id']; ?>" class="text-primary"><?php echo $event['event_url']; ?></a>
                        </div>   
                    </div>
                <?php endforeach; ?>

            </div>
            <p class="text-danger my-1 p-3">For more events! Check out the latest and trending events. Click <a href="events.php" class="text-primary">Here</a></p>

        </div>
    </section>
    <!-- Upcoming Events -->


<?php include "footer.php";?>