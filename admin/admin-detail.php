<?php
    // session_start();
    include_once('header.php');

    if(isset($_REQUEST['account_id'])) {
        $account_id = $_REQUEST['account_id'];
    }

    $queryInsert = $conn->query("SELECT * FROM `admins` WHERE `account_id` = $account_id");
    $rowCount = mysqli_num_rows($queryInsert);
    while($row = mysqli_fetch_array($queryInsert)) {
        $admin_username = $row['username'];
        $admin_email = $row['email'];
        $adminRole = $row['user_role'];
        $activty = $row['activity'];
        $login = $row['log_time'];
    }

    // $account_id = $_SESSION['account_id'];


?>

    <!--  -->
    <div class="row">
    <div class="col-lg-12 stretch-card">
      
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Admins</h4>
                <h4 class="card-title"><h4>
                  <div class="table-responsive pt-3">
                    
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="container">
                        <h4 class="h3 text-primary">Staff Detail:</h4>
                        <p class="h5">Name: <small class="h6"><?=$admin_username?></small></p>
                        <p class="h5">Email: <small class="h6"><?=$admin_email?></small></p>
                    </div>

                    <div class="container">
                        <p class="h5">User Role: <small class="h6"><?=strtoupper($adminRole)?></small></p>
                    </div>
                  </div>
                  <table class="table table-hover table-bordered rounded">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Activity done</th>
                        <th>Activity Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                          $count = 1;
                          
                          // if(isset($_SESSION['account_id'])) {
                          //   $account_id = $_SESSION['account_id'];
                          // }
                        
                                
                          $accountId = $_GET['account_id'];
                        
                          $queryInsert = $conn->query("SELECT * FROM `admin_log` WHERE `admin_id` = $accountId");
                            // $rowCount = mysqli_num_rows($queryInsert);
                            while($detail = mysqli_fetch_array($queryInsert)) {
                      ?>
                      <tr>
                        <td><?= $count++;?></td>
                        <td><?=$detail['activities']?></td>
                        <td><?=$detail['activity_time']?></td>
                       
                        <td><a href="message.php?account_id=<?=$accountId?>" class="btn btn-outline-info">
                        <?php if($adminRole == 'admin' || $adminRole == 'owner'){ echo "Message" ?> <?php }else { echo "Add task" ;?></a><?php }?></td>
                       
                      </tr>
                      <?php };?>
                    </tbody>
                    
                  </table>

                  <!-- <div class="container my-4 d-flex ">
                    <a href="news-posted.php?page=<?=$prev?>" class="btn btn-outline-danger <?php if($page <= 1){?>disabled <?php }?>me-1">Prev</a>

                    <?php 
                        if($pages <= 10) {
                            for($counter = 1; $counter <= $pages; $counter++) {
                                if($counter === $page) {                                
                    ?>
                        <a href="news-posted.php" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                    <?php } else { ?>
                        <a href="news-posted.php?page=<?=$counter?>" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                    <?php } } }?>

                    <a href="news-posted.php?page=<?=$next?>" class="btn btn-outline-primary <?php if($page >= $pages){?>disabled <?php } ?>">Next</a>
                  </div> -->

                  <div class="container my-3">
                    <?php if($adminRole == "manager" || $adminRole == "staff") {?>
                      <a href="delete-staff.php" class="btn btn-outline-danger" name="detele">Remove staff</a>
                    <?php };?>
                  </div>
                </div>
              </div>
          </div>
    </div>
  </div>
<?php include_once('footer.php');?>