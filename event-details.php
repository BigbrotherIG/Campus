<?php include "header.php"; ?>

<?php 

    $events_description = "SELECT * FROM `upcoming_events`";
    $results = mysqli_query($conn, $events_description);
    $events = mysqli_fetch_all($results, MYSQLI_ASSOC);

    
?>
    <!-- Space b/w the header and body -->
    <div class="container" style="margin-top: 100px;"></div>
    
    <!-- Houses Details -->
    <div class="container">
        <h2 class="text-start py3">Events Details</h2>
        <?php foreach($events as $event): ?>
        <div class="">
            <div class="carousel slide" id="housesImages" data-bs-ride="houseImgs">
                <div class="carousel-indicators">
                <button class="active" type="button" data-bs-slide-to="0" data-bs-target="#housesImages"></button>
                <button type="button" data-bs-slide-to="1" data-bs-target="#housesImages"></button>
                <button type="button" data-bs-slide-to="2" data-bs-target="#housesImages"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./Img/abiodun-ageh-5EJQ6xVpRKc-unsplash.jpg" alt="" class="img-responsive w-100" height="450">
                    </div>
                    <div class="carousel-item">
                        <img src="./Img/desola-lanre-ologun-v6yJuavoADs-unsplash.jpg" alt="" class="img-responsive w-100" height="450">
                    </div>
                    <div class="carousel-item">
                        <img src="./Img/cut-in-a-moment-rotRaep7gpY-unsplash.jpg" alt="" class="img-responsive w-100" height="450">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 my-4">
            <div class="col-sm-12 col-md-7">
                <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti repudiandae, inventore perferendis dolor molestiae porro. Quis, incidunt doloribus similique possimus accusamus facere neque necessitatibus quibusdam officia? Nisi, rem eum. Soluta ea, odit suscipit quia repudiandae ipsa unde quisquam quo sint beatae neque cupiditate est commodi.</p>
                <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti repudiandae, inventore perferendis dolor molestiae porro. Quis, incidunt doloribus similique possimus accusamus facere neque necessitatibus quibusdam officia? Nisi, rem eum. Soluta ea, odit suscipit quia repudiandae ipsa unde quisquam quo sint beatae neque cupiditate est commodi.</p>
            </div>
            <div class="col-sm-12 col-md-3">
                <h4 class="">Amenities</h4>
                <li class="px-2">Lorem ipsum dolor sit amet consectetur.</li>
                <li class="px-2">Lorem ipsum dolor sit amet consectetur.</li>
                <li class="px-2">Lorem ipsum dolor sit amet consectetur.</li>
                <li class="px-2">Lorem ipsum dolor sit amet consectetur.</li>
            </div>
            <div class="col-sm-12 col-md-2">
                <h4 class="">Price</h4>
                <span class="">150,000</span>&nbsp;
                <span class="bg-warning badge badge-warning">New</span>
                <p class="text-muted fs-6">Posted 7:45 am</p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php include "footer.php"; ?>