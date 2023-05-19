<?php include "header.php"; ?>

<?php 

    // $events_description = "SELECT * FROM `events_data`";
    // $results = mysqli($conn, $events_description);
    // $events = mysqli_fetch_all($events_description, MYSQLI_ASSOC);

?>

    <div class="container" style="margin-top: 100px;"></div>

    <section class="my-4">
        <div class="container">
            <h2 class="my-3">Events</h2>
            <?php if(empty($events)): ?>
                <p class="lead">No events</p>
            <?php endif; ?>
            <?php if(($events)): ?>
                <p class="lead">Yes there's events</p>
            <?php endif; ?>

            <div class="container row my-2">
                <!-- Card title -->
                <? foreach($events as $event): ?>
                <div class="col-12 col-lg-4">
                    <div class="card my-2 w-100">
                    <img src="./Img/paolo-nicolello-umUfeLXPB_I-unsplash.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href=event-details.php#" class="btn btn-danger">Preview</a>
                            <a href="#" class="btn btn-primary">Set schedule</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php include "footer.php"; ?>