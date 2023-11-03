<?php include "header.php"; 
    if(isset($_GET['accommodation_id'])){
        $aId = $_GET['accommodation_id'];
    }

    $my_sql = "SELECT * FROM `accommodation_data` WHERE accommodation_id = $aId";
    $result = mysqli_query($conn, $my_sql);
    $accommodation = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

    <title>Campus guide - Accommodation Detail</title>
    <!-- Space b/w the header and body -->
    <div class="container" style="margin-top: 100px;"></div>
    
    <!-- Houses Details -->
    <div class="container">
        <h2 class="text-start py3">Houses and Accommodation</h2>

        <?php if(empty($accommodation)): ?>
            <p class="lead">No House available; come back later..</p>
        <?php endif; ?>

        <?php foreach($accommodation as $key): ?>
            <div class="">
                <div class="carousel slide" id="housesImages" data-bs-ride="houseImgs">
                    <div class="carousel-indicators">
                        <button class="active" type="button" data-bs-slide-to="0" data-bs-target="#housesImages"></button>
                        <button type="button" data-bs-slide-to="1" data-bs-target="#housesImages"></button>
                        <button type="button" data-bs-slide-to="2" data-bs-target="#housesImages"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?=$key['accommodation_img_1']?>" alt="house-image-1" class="img-responsive w-100" height="450">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $key['accommodation_img_2'] ?>" alt="house-image-2" class="img-responsive w-100" height="450">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $key['accommodation_img_3'] ?>" alt="house-image-3" class="img-responsive w-100" height="450">
                        </div>

                        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#housesImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#housesImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button> -->
                    </div>
                </div>
            </div>

            <div class="row g-3 my-4">
                <div class="col-sm-12 col-md-7">
                    <p class="text-dark"><?php echo $key['accommodation_det']; ?></p>
                </div>
                <div class="col-sm-12 col-md-3">
                    <h4 class="">Amenities</h4>
                    <li class="px-2"><?php echo $key['accommodation_amenities'] ;?></li>   
                </div>
                <div class="col-sm-12 col-md-2">
                    <h4 class="">Price</h4>
                    <span class="">₦<?php echo $key['accommodation_price'] ?></span>&nbsp;
                    <span class="bg-warning badge badge-warning">New</span>
                    <p class="text-muted fs-6">Posted: <?php echo $key['date'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
      
    </div>
    
<?php include "footer.php"; ?>