<?php include "header.php"; ?>

<?php 

    $events_description = "SELECT * FROM `upcoming_events` WHERE event_status = 'more_events'";
    $results = mysqli_query($conn, $events_description);
    $events = mysqli_fetch_all($results, MYSQLI_ASSOC);

?>

    <!-- Space b/w the header and body -->
    <div class="container" style="margin-top: 100px;"></div>

    <section class="my-4">
        <div class="container">
            <h2 class="my-3">Events</h2>
            <?php if(empty($events)): ?>
                <p class="lead">No events</p>
            <?php endif; ?>
          

            <div class="container row my-2">
                <!-- Card title -->
                <?php foreach($events as $event): ?>
                <div class="col-12 col-lg-4">
                    <div class="card my-2 w-100">
                        <img src="<?php echo $event['event_img']; ?>" height="255.33" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text"><?php echo $event['event_des']; ?></p>
                            <a href="event-details.php?events_id=<?php echo $event['events_id']; ?>" class="btn btn-danger"><?php echo $event['event_url']; ?></a>
                            <a href="#" class="btn btn-primary">Set schedule</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
<?php include "footer.php"; ?>