<?php include "header.php"; 

    if(isset($_GET['events_id'])) {
        $eventId = $_GET['events_id'];
    };

    $events_description = "SELECT * FROM `upcoming_events` WHERE events_id = $eventId";
    $results = mysqli_query($conn, $events_description);
    $events = mysqli_fetch_all($results, MYSQLI_ASSOC);
  
?>

    <title>Campus guide - Event Detail</title>
    <!-- Space b/w the header and body -->
    <div class="container" style="margin-top: 100px;"></div>
    
    <!-- Events Details -->
    <div class="container">
        <h2 class="text-start py3">Events Details</h2>

        <?php if(empty($events)): ?>
            <p class="lead">No event available; come back later..</p>
        <?php endif; ?>

        <?php foreach($events as $eventDetail): ?>
            <div class="">
                <div class="carousel slide" id="housesImages" data-bs-ride="houseImgs">
                    <div class="carousel-indicators">
                        <button class="active" type="button" data-bs-slide-to="0" data-bs-target="#housesImages"></button>
                        <button type="button" data-bs-slide-to="1" data-bs-target="#housesImages"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?=$eventDetail['event_img_1']?>" alt="" class="img-responsive w-100" height="450">
                        </div>
                        <?php 

                            $queryImage = $conn->query("SELECT * FROM `event_image` WHERE 'events_id' = $eventId");
                            while($row = mysqli_fetch_array($queryImage)){
                                $wv = $row['event_img_2'];
                        
                        ?>
                        <div class="carousel-item">
                            <img src="<?=$wv?>" alt="" class="img-responsive w-100" height="450">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="row g-3 my-4">
                <div class="col-sm-12 col-md-7">
                    <p class="text-dark"><?php echo $eventDetail['event_detail']; ?></p>
                    <p class="text-dark"></p>
                </div>
                <div class="col-sm-12 col-md-3">
                    <h4 class="">Gifts</h4>
                    <li class="px-2"><?php echo $eventDetail['event_list']; ?></li>
                    <!-- <li class="px-2">Lorem ipsum dolor sit amet consectetur.</li> -->
                </div>
                <div class="col-sm-12 col-md-2">
                    <h4 class="">Price</h4>
                    <span class="">₦<?php echo $eventDetail['event_price']; ?></span>&nbsp;
                    <span class="bg-warning badge badge-warning">New</span>
                    <p class="text-muted fs-6"><?php echo $eventDetail['date']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php include "footer.php"; ?>