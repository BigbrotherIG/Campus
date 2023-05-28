<?php include "header.php"; ?>
<?php 

    $my_sql = "SELECT * FROM `accommodation_data`";
    $result = mysqli_query($conn, $my_sql);
    $accommodation = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
    <!-- Accomodation showcase -->
    <section class="my-4 mt-5" >
        <div class="container py-3" style="margin-top:100px">
            <h2 class="text-start">Campus Guide - Accommodation</h2>
            <?php if(empty($accommodation)): ?>
                <p class="lead">No House available; come back later..</p>
            <?php endif; ?>

            <div class="container py-3 row g-3">
                <div class="col-md-8 col-xs-8 bg-white border me-5">
                    <p class="lead text-start text-dark fs-6 fw-normal p-2">Campus guide accomodation is created to verify houses and accomodations for stundents, businesses etc to rent available.</p>
                    <?php foreach($accommodation as $item): ?>

                    <div class="container d-flex flex-column justify-content-center my-3">
                        <div class="container" name="accommodation_image">
                            <img src="<?php echo $item['accommodation_image']; ?>" alt=""  class="w-100 img-responsive" style="max-width: 100%; max-height: 450px">
                        </div>
                        <div class="container text-dark" name="accommodation_det">                           

                            <li><a href="accommodation-detail.php?accommodation_id=<?php echo $item['accommodation_id']; ?>" class="h5 h6-xs link-primary"><?php echo $item['accommodation_url']; ?></a></li>
                            <span class=""><?php echo $item['accommodation_price']; ?></span>&nbsp;
                            <span class="bg-warning badge badge-warning">New</span>
                            <p class="text-muted fs-6">Posted <?php echo $item['date']; ?></p>
                        </div>
                    </div>
                    
                    <?php endforeach; ?>
                 
                </div>
                
                <div class="col-md-3 col-xs-4 border h-100">
                    <p class="lead text-dark">Accomodation</p>
                    <p class="lead text-dark">Accomodation</p>
                    <p class="lead text-dark">Accomodation</p>
                    <p class="lead text-dark">Accomodation</p>
                    <p class="lead text-dark">Accomodation</p>
                </div>
            </div>
        </div>
    </section>

<?php include "footer.php"; ?>